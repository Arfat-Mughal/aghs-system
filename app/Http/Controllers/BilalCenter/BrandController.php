<?php

namespace App\Http\Controllers\BilalCenter;

use App\Http\Controllers\Controller;
use App\Models\BilalCenter\Brand;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::orderBy('name')->get();

        return view('bilal-center.brands.index', compact('brands'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'country' => 'nullable|string|max:255',
            'status' => 'required|in:Active,Inactive',
        ]);

        Brand::create($request->only('name', 'country', 'status'));

        Alert::success('Brand Added', 'The brand was created successfully.');

        return redirect()->route('bilal-center.brands.index');
    }

    public function update(Request $request, Brand $brand)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'country' => 'nullable|string|max:255',
            'status' => 'required|in:Active,Inactive',
        ]);

        $brand->update($request->only('name', 'country', 'status'));

        Alert::success('Brand Updated', 'The brand was updated successfully.');

        return redirect()->route('bilal-center.brands.index');
    }

    public function destroy(Brand $brand)
    {
        $brand->delete();

        Alert::success('Brand Deleted', 'The brand was deleted successfully.');

        return redirect()->route('bilal-center.brands.index');
    }
}
