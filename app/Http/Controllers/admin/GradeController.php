<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\Grade;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    public function index()
    {
        $grades = Grade::orderBy('created_at', 'desc')->get();
    return view('admin.grades.index', compact('grades'));
    }

    public function create()
    {
        return view('grades.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255|unique:grades,name',
    ]);

    Grade::create(['name' => $request->name]);

    return redirect()->route('grades.index');
}

    public function edit($id)
{
    $grade = Grade::find($id);

    if (!$grade) {
        // Handle the case when the grade is not found, for example, redirect back to the index
        return redirect()->route('grades.index')->with('error', 'Grade not found.');
    }

    return view('grades.edit', compact('grade'));
}

    public function update(Request $request, Grade $grade)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $grade->update($request->all());

        return redirect()->route('grades.index');
    }

    public function destroy(Grade $grade)
    {
        $grade->delete();
        return redirect()->route('grades.index');
    }
}
