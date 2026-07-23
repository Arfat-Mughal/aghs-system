<?php

namespace App\Http\Controllers\BilalCenter;

use App\Http\Controllers\Controller;
use App\Models\BilalCenter\Category;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::with('parent')->orderBy('name')->get();

        return view('bilal-center.categories.index', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'parent_id' => 'nullable|exists:bc_categories,id',
        ]);

        Category::create($request->only('name', 'parent_id'));

        Alert::success('Category Added', 'The category was created successfully.');

        return redirect()->route('bilal-center.categories.index');
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'parent_id' => 'nullable|exists:bc_categories,id|different:id',
        ]);

        $category->update($request->only('name', 'parent_id'));

        Alert::success('Category Updated', 'The category was updated successfully.');

        return redirect()->route('bilal-center.categories.index');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        Alert::success('Category Deleted', 'The category was deleted successfully.');

        return redirect()->route('bilal-center.categories.index');
    }
}
