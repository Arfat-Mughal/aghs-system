<?php

namespace App\Http\Controllers\BilalCenter;

use App\Http\Controllers\Controller;
use App\Models\BilalCenter\Supplier;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class SupplierController extends Controller
{
    public function index()
    {
        $suppliers = Supplier::orderBy('name')->get();

        return view('bilal-center.suppliers.index', compact('suppliers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:255',
            'address' => 'nullable|string',
            'status' => 'required|in:Active,Inactive',
        ]);

        Supplier::create($request->only('name', 'phone', 'address', 'status'));

        Alert::success('Supplier Added', 'The supplier was created successfully.');

        return redirect()->route('bilal-center.suppliers.index');
    }

    public function update(Request $request, Supplier $supplier)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:255',
            'address' => 'nullable|string',
            'status' => 'required|in:Active,Inactive',
        ]);

        $supplier->update($request->only('name', 'phone', 'address', 'status'));

        Alert::success('Supplier Updated', 'The supplier was updated successfully.');

        return redirect()->route('bilal-center.suppliers.index');
    }

    public function destroy(Supplier $supplier)
    {
        $supplier->delete();

        Alert::success('Supplier Deleted', 'The supplier was deleted successfully.');

        return redirect()->route('bilal-center.suppliers.index');
    }
}
