<?php

namespace App\Http\Controllers\BilalCenter;

use App\Http\Controllers\Controller;
use App\Models\BilalCenter\BikeModel;
use App\Models\BilalCenter\Category;
use App\Models\BilalCenter\Product;

class BrowseController extends Controller
{
    public function categories()
    {
        $categories = Category::with('children')
            ->whereNull('parent_id')
            ->orderBy('name')
            ->get();

        return view('bilal-center.browse.categories', compact('categories'));
    }

    public function categoryProducts(Category $category)
    {
        $category->load('children');

        $products = Product::with(['brand', 'category'])
            ->whereIn('category_id', $category->selfAndDescendantIds())
            ->where('status', '!=', 'Discontinued')
            ->orderBy('name_en')
            ->paginate(20);

        return view('bilal-center.browse.category-products', compact('category', 'products'));
    }

    public function bikeModels()
    {
        $bikeModels = BikeModel::orderBy('company')->orderBy('model')->get()->groupBy('company');

        return view('bilal-center.browse.bike-models', compact('bikeModels'));
    }

    public function bikeModelProducts(BikeModel $bikeModel)
    {
        $products = $bikeModel->products()
            ->with(['brand', 'category'])
            ->where('status', '!=', 'Discontinued')
            ->orderBy('name_en')
            ->paginate(20);

        return view('bilal-center.browse.bike-model-products', compact('bikeModel', 'products'));
    }
}
