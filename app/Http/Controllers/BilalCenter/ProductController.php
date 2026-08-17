<?php

namespace App\Http\Controllers\BilalCenter;

use App\Http\Controllers\Controller;
use App\Models\BilalCenter\BikeModel;
use App\Models\BilalCenter\Brand;
use App\Models\BilalCenter\Category;
use App\Models\BilalCenter\Product;
use App\Models\BilalCenter\ProductImage;
use App\Models\BilalCenter\Supplier;
use App\Services\BilalCenter\BarcodeService;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $q = trim((string) $request->get('q', ''));

        $query = Product::with(['category', 'images']);

        if ($q !== '') {
            $like = '%' . $q . '%';

            $query->where(function ($w) use ($q, $like) {
                $w->where('barcode', $q)
                    ->orWhere('oem_number', $q)
                    ->orWhere('sku', $q)
                    ->orWhere('shop_code', $q)
                    ->orWhere('name_en', 'like', $like)
                    ->orWhere('name_ur', 'like', $like)
                    ->orWhere('description', 'like', $like)
                    ->orWhere('search_keywords', 'like', $like)
                    ->orWhereHas('aliases', function ($a) use ($like) {
                        $a->where('alias', 'like', $like);
                    });
            })->orderByRaw(
                'CASE
                    WHEN barcode = ? THEN 0
                    WHEN oem_number = ? THEN 1
                    WHEN sku = ? THEN 2
                    WHEN name_en = ? THEN 3
                    ELSE 4
                END',
                [$q, $q, $q, $q]
            );
        } else {
            $query->orderBy('name_en');
        }

        $products = $query->paginate(20)->withQueryString();

        $fuzzyMatches = collect();

        if ($q !== '' && $products->total() === 0) {
            $fuzzyMatches = $this->fuzzySearch($q);
        }

        return view('bilal-center.products.index', compact('products', 'q', 'fuzzyMatches'));
    }

    /**
     * Fallback for typos (e.g. "Cluch" -> "Clutch"): only runs when the exact/LIKE
     * search above found nothing, and scans the (small, single-shop) catalog scoring
     * each product's name/aliases by Levenshtein edit-distance to the typed term.
     */
    protected function fuzzySearch(string $q): \Illuminate\Support\Collection
    {
        $needle = strtolower($q);
        $maxDistance = max(2, (int) floor(strlen($needle) * 0.4));

        return Product::with(['brand', 'category', 'aliases'])
            ->where('status', '!=', 'Discontinued')
            ->get()
            ->map(function (Product $product) use ($needle) {
                // Compare against the full name/alias (catches multi-word typos like
                // "Sparkk Plag") and against each individual word (catches a single
                // mistyped word inside a longer product name, e.g. "Klutch" -> "Clutch Plate").
                $candidates = array_merge(
                    [$product->name_en],
                    explode(' ', $product->name_en),
                    $product->aliases->flatMap(fn ($alias) => array_merge([$alias->alias], explode(' ', $alias->alias)))->all()
                );

                $distance = collect($candidates)
                    ->map(fn ($candidate) => levenshtein($needle, strtolower(trim($candidate))))
                    ->min();

                $product->fuzzy_distance = $distance;

                return $product;
            })
            ->filter(fn (Product $product) => $product->fuzzy_distance <= $maxDistance)
            ->sortBy('fuzzy_distance')
            ->take(10)
            ->values();
    }

    public function show(Product $product)
    {
        $product->load(['brand', 'category', 'supplier', 'bikeModels', 'aliases', 'images']);

        return view('bilal-center.products.show', compact('product'));
    }

    public function create()
    {
        return view('bilal-center.products.create', $this->formData());
    }

    public function store(Request $request)
    {
        $data = $this->validateProduct($request);

        $product = Product::create($data);

        $this->syncRelated($request, $product);

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $uploadDir = 'bc-product-images';
            $imageName = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path($uploadDir), $imageName);

            ProductImage::create([
                'product_id' => $product->id,
                'image' => $uploadDir . '/' . $imageName,
                'sort_order' => 1,
            ]);
        }

        Alert::success('Product Added', 'The product was created successfully.');

        return redirect()->route('bilal-center.products.index');
    }

    public function edit(Product $product)
    {
        $product->load(['bikeModels', 'aliases', 'images']);

        return view('bilal-center.products.edit', array_merge(
            $this->formData(),
            ['product' => $product]
        ));
    }

    public function update(Request $request, Product $product)
    {
        $data = $this->validateProduct($request, $product);

        $product->update($data);

        $this->syncRelated($request, $product);

        Alert::success('Product Updated', 'The product was updated successfully.');

        return redirect()->route('bilal-center.products.index');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        Alert::success('Product Deleted', 'The product was deleted successfully.');

        return redirect()->route('bilal-center.products.index');
    }

    public function generateBarcode(Product $product)
    {
        if (empty($product->barcode)) {
            $product->update(['barcode' => BarcodeService::generate()]);
            Alert::success('Barcode Generated', 'A new barcode was generated for this product.');
        }

        return back();
    }

    public function printBarcodes(Request $request)
    {
        $request->validate([
            'product_ids' => 'required|array|min:1',
            'product_ids.*' => 'exists:bilal_center.bc_products,id',
        ]);

        $products = Product::whereIn('id', $request->product_ids)->with('brand')->get();

        return view('bilal-center.products.print-barcodes', compact('products'));
    }

    public function lowStock(Request $request)
    {
        $query = Product::with(['brand', 'category', 'supplier'])
            ->where(function ($w) {
                $w->whereColumn('stock', '<=', 'minimum_stock')
                    ->orWhere('stock', '<=', Product::LOW_STOCK_FALLBACK);
            })
            ->where('status', '!=', 'Discontinued');

        if ($request->filled('brand_id')) {
            $query->where('brand_id', $request->brand_id);
        }

        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        if ($request->filled('supplier_id')) {
            $query->where('supplier_id', $request->supplier_id);
        }

        $products = $query->orderBy('name_en')->get();

        return view('bilal-center.products.low-stock', array_merge(
            $this->formData(),
            compact('products')
        ));
    }

    protected function formData(): array
    {
        return [
            'brands' => Brand::where('status', 'Active')->orderBy('name')->get(),
            'categories' => Category::orderBy('name')->get(),
            'suppliers' => Supplier::where('status', 'Active')->orderBy('name')->get(),
            'bikeModels' => BikeModel::orderBy('company')->orderBy('model')->get(),
        ];
    }

    protected function validateProduct(Request $request, ?Product $product = null): array
    {
        $productId = $product->id ?? 'NULL';

        foreach (['stock', 'minimum_stock'] as $field) {
            if ($request->filled($field)) {
                $request->merge([$field => (int) $request->input($field)]);
            }
        }

        $data = $request->validate([
            'sku' => "nullable|string|max:255|unique:bilal_center.bc_products,sku,{$productId},id",
            'barcode' => "nullable|string|max:255|unique:bilal_center.bc_products,barcode,{$productId},id",
            'oem_number' => 'nullable|string|max:255',
            'shop_code' => "nullable|string|max:255|unique:bilal_center.bc_products,shop_code,{$productId},id",
            'name_en' => 'required|string|max:255',
            'name_ur' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'internal_notes' => 'nullable|string',
            'purchase_price' => 'nullable|numeric|min:0',
            'selling_price' => 'required|numeric|min:0',
            'stock' => 'nullable|integer|min:0',
            'minimum_stock' => 'nullable|integer|min:0',
            'unit' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
            'search_keywords' => 'nullable|string|max:1000',
            'brand_id' => 'nullable|exists:bilal_center.bc_brands,id',
            'category_id' => 'nullable|exists:bilal_center.bc_categories,id',
            'supplier_id' => 'nullable|exists:bilal_center.bc_suppliers,id',
            'status' => 'nullable|in:Active,Inactive,Out of Stock,Discontinued',
        ]);

        // Quick-add fields default quietly instead of forcing the shopkeeper to fill them in.
        $data['purchase_price'] = $data['purchase_price'] ?? 0;
        $data['stock'] = $data['stock'] ?? 0;
        $data['minimum_stock'] = $data['minimum_stock'] ?? 0;
        $data['unit'] = ($data['unit'] ?? '') ?: 'Piece';
        $data['status'] = ($data['status'] ?? '') ?: 'Active';

        // SKU is NOT NULL in the DB and auto-generated on create; on update, leave an
        // existing SKU untouched rather than trying to null it out if the field is blank.
        if ($product && empty($data['sku'])) {
            unset($data['sku']);
        }

        return $data;
    }

    protected function syncRelated(Request $request, Product $product): void
    {
        $product->bikeModels()->sync($request->input('bike_model_ids', []));

        $product->aliases()->delete();

        $aliases = array_filter(array_map('trim', explode(',', (string) $request->input('aliases', ''))));

        foreach ($aliases as $alias) {
            $product->aliases()->create(['alias' => $alias]);
        }
    }
}
