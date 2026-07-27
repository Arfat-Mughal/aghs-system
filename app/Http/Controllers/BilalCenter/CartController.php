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

        $cart = session('bilal_center.cart', []);
        $cart[$product->id] = ($cart[$product->id] ?? 0) + 1;
        session(['bilal_center.cart' => $cart]);

        Alert::success('Added to Cart', $product->name_en . ' was added to the cart.');

        return back();
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'qty' => 'required|integer|min:0|max:999',
        ]);

        $cart = session('bilal_center.cart', []);

        if ((int) $request->qty === 0) {
            unset($cart[$product->id]);
        } else {
            $cart[$product->id] = (int) $request->qty;
        }

        session(['bilal_center.cart' => $cart]);

        return back();
    }

    public function remove(Product $product)
    {
        $cart = session('bilal_center.cart', []);
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

        $html = view('bilal-center.cart.invoice', compact('lines', 'total', 'generatedAt'))->render();

        session()->forget('bilal_center.cart');

        return response($html);
    }
}
