<?php

namespace App\Http\Controllers\BilalCenter;

use App\Http\Controllers\Controller;
use App\Models\BilalCenter\Product;
use App\Models\BilalCenter\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class ProductImageController extends Controller
{
    public function store(Request $request, Product $product)
    {
        $request->validate([
            'images' => 'required|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $nextSortOrder = (int) $product->images()->max('sort_order') + 1;

        foreach ($request->file('images', []) as $index => $file) {
            $path = $file->store('bilal-center/products', 'public');

            $product->images()->create([
                'image' => $path,
                'sort_order' => $nextSortOrder + $index,
            ]);
        }

        Alert::success('Images Uploaded', 'Product images were uploaded successfully.');

        return back();
    }

    public function update(Request $request, ProductImage $image)
    {
        $request->validate([
            'sort_order' => 'required|integer|min:0',
        ]);

        $image->update(['sort_order' => $request->sort_order]);

        return back();
    }

    public function destroy(ProductImage $image)
    {
        Storage::disk('public')->delete($image->image);
        $image->delete();

        Alert::success('Image Deleted', 'The product image was deleted successfully.');

        return back();
    }
}
