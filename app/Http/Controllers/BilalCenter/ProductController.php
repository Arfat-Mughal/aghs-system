<?php

namespace App\Http\Controllers\BilalCenter;

use App\Http\Controllers\Controller;
use App\Models\BilalCenter\BikeModel;
use App\Models\BilalCenter\Brand;
use App\Models\BilalCenter\Category;
use App\Models\BilalCenter\Product;
use App\Models\BilalCenter\Supplier;
use App\Services\BilalCenter\BarcodeService;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $q = trim((string) $request->get('q', ''));

        $query = Product::with(['brand', 'category']);

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

        return view('bilal-center.products.index', compact('products', 'q'));
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

        $products = Product::whereIn('id', $request->product_ids)->get();

        return view('bilal-center.products.print-barcodes', compact('products'));
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

        return $request->validate([
            'sku' => "required|string|max:255|unique:bilal_center.bc_products,sku,{$productId},id",
            'barcode' => "nullable|string|max:255|unique:bilal_center.bc_products,barcode,{$productId},id",
            'oem_number' => 'nullable|string|max:255',
            'shop_code' => "nullable|string|max:255|unique:bilal_center.bc_products,shop_code,{$productId},id",
            'name_en' => 'required|string|max:255',
            'name_ur' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'internal_notes' => 'nullable|string',
            'purchase_price' => 'required|numeric|min:0',
            'selling_price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'minimum_stock' => 'nullable|integer|min:0',
            'unit' => 'required|string|max:255',
            'location' => 'nullable|string|max:255',
            'search_keywords' => 'nullable|string|max:1000',
            'brand_id' => 'nullable|exists:bilal_center.bc_brands,id',
            'category_id' => 'nullable|exists:bilal_center.bc_categories,id',
            'supplier_id' => 'nullable|exists:bilal_center.bc_suppliers,id',
            'status' => 'required|in:Active,Inactive,Out of Stock,Discontinued',
        ]);
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
