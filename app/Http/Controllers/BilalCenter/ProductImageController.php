<?php

namespace App\Http\Controllers\BilalCenter;

use App\Http\Controllers\Controller;
use App\Models\BilalCenter\Product;
use App\Models\BilalCenter\ProductImage;
use App\Services\ImageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class ProductImageController extends Controller
{
    public function store(Request $request, Product $product)
    {
        $request->validate([
            'camera_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:15360',
            'images' => 'nullable|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,webp|max:15360',
        ]);

        $files = array_merge(
            array_filter([$request->file('camera_photo')]),
            $request->file('images', [])
        );

        if (empty($files)) {
            Alert::error('No Photo Selected', 'Take a photo or choose at least one file to upload.');

            return back();
        }

        $nextSortOrder = (int) $product->images()->max('sort_order') + 1;
        $imageService = app(ImageService::class);

        DB::transaction(function () use ($files, $product, $nextSortOrder, $imageService) {
            foreach (array_values($files) as $index => $file) {
                $path = $imageService->compressToPublic($file, 'bc-product-images');

                $product->images()->create([
                    'image' => $path,
                    'sort_order' => $nextSortOrder + $index,
                ]);
            }
        });

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
        if (file_exists(public_path($image->image))) {
            unlink(public_path($image->image));
        }

        $image->delete();

        Alert::success('Image Deleted', 'The product image was deleted successfully.');

        return back();
    }
}
