<?php

namespace App\Http\Controllers\BilalCenter;

use App\Http\Controllers\Controller;
use App\Models\BilalCenter\BikeModel;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class BikeModelController extends Controller
{
    public function index()
    {
        $bikeModels = BikeModel::orderBy('company')->orderBy('model')->get();

        return view('bilal-center.bike-models.index', compact('bikeModels'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'company' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'year_from' => 'required|integer|min:1950|max:2100',
            'year_to' => 'nullable|integer|min:1950|max:2100|gte:year_from',
        ]);

        BikeModel::create($request->only('company', 'model', 'year_from', 'year_to'));

        Alert::success('Bike Model Added', 'The bike model was created successfully.');

        return redirect()->route('bilal-center.bike-models.index');
    }

    public function update(Request $request, BikeModel $bikeModel)
    {
        $request->validate([
            'company' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'year_from' => 'required|integer|min:1950|max:2100',
            'year_to' => 'nullable|integer|min:1950|max:2100|gte:year_from',
        ]);

        $bikeModel->update($request->only('company', 'model', 'year_from', 'year_to'));

        Alert::success('Bike Model Updated', 'The bike model was updated successfully.');

        return redirect()->route('bilal-center.bike-models.index');
    }

    public function destroy(BikeModel $bikeModel)
    {
        $bikeModel->delete();

        Alert::success('Bike Model Deleted', 'The bike model was deleted successfully.');

        return redirect()->route('bilal-center.bike-models.index');
    }
}
