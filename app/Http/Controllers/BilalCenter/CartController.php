<?php

namespace App\Http\Controllers\BilalCenter;

use App\Http\Controllers\Controller;
use App\Models\BilalCenter\Product;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class CartController extends Controller
{
    protected function buildLines(): array
    {
        $cart = session('bilal_center.cart', []);

        if (empty($cart)) {
            return [];
        }

        $products = Product::whereIn('id', array_keys($cart))->get()->keyBy('id');

        $lines = [];

        foreach ($cart as $productId => $qty) {
            $product = $products->get($productId);

            if (! $product) {
                continue;
            }

            $lines[] = [
                'product' => $product,
                'qty' => $qty,
                'unit_price' => $product->selling_price,
                'line_total' => $product->selling_price * $qty,
            ];
        }

        return $lines;
    }

    public function index()
    {
        $lines = $this->buildLines();
        $total = array_sum(array_column($lines, 'line_total'));

        return view('bilal-center.cart.index', compact('lines', 'total'));
    }

    public function add(Product $product)
    {
        if (empty($product->barcode)) {
            Alert::error('Cannot Add to Cart', 'Only scannable products can be added to the cart.');

            return back();
        }

        if ($product->stock < 1) {
            Alert::error('Out of Stock', $product->name_en . ' has no stock left.');

            return back();
        }

        $cart = session('bilal_center.cart', []);
        $cart[$product->id] = ($cart[$product->id] ?? 0) + 1;
        session(['bilal_center.cart' => $cart]);

        $product->decrement('stock');

        Alert::success('Added to Cart', $product->name_en . ' was added to the cart.');

        return back();
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'qty' => 'required|integer|min:0|max:999',
        ]);

        $cart = session('bilal_center.cart', []);
        $currentQty = $cart[$product->id] ?? 0;
        $newQty = (int) $request->qty;

        // Stock already reflects reserved cart qty (decremented on add), so only
        // the delta between old and new qty needs to move: increasing qty takes
        // more from stock, decreasing qty gives stock back.
        $diff = $newQty - $currentQty;

        if ($diff > 0 && $diff > $product->stock) {
            Alert::error('Not Enough Stock', 'Only ' . ($product->stock + $currentQty) . ' in stock.');

            return back();
        }

        if ($diff !== 0) {
            $product->decrement('stock', $diff);
        }

        if ($newQty === 0) {
            unset($cart[$product->id]);
        } else {
            $cart[$product->id] = $newQty;
        }

        session(['bilal_center.cart' => $cart]);

        return back();
    }

    public function remove(Product $product)
    {
        $cart = session('bilal_center.cart', []);
        $qty = $cart[$product->id] ?? 0;

        if ($qty > 0) {
            $product->increment('stock', $qty);
        }

        unset($cart[$product->id]);
        session(['bilal_center.cart' => $cart]);

        return back();
    }

    public function checkout()
    {
        $lines = $this->buildLines();

        if (empty($lines)) {
            Alert::error('Cart is Empty', 'Add at least one product before checking out.');

            return redirect()->route('bilal-center.cart.index');
        }

        $total = array_sum(array_column($lines, 'line_total'));
        $generatedAt = now();

        // Stock was already decremented when items were added to the cart, so
        // checkout/printing the invoice just finalizes the sale — it must NOT
        // touch stock again (that would double-count the reduction).
        $html = view('bilal-center.cart.invoice', compact('lines', 'total', 'generatedAt'))->render();

        session()->forget('bilal_center.cart');

        return response($html);
    }
}
