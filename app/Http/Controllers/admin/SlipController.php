<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Grade;
use App\Models\Subject;
use Illuminate\Http\Request;

class SlipController extends Controller
{
    public function index()
    {
        return view('admin.slips');
    }

    public function create()
    {
        $grades = Grade::all('id','name');
        $subjects = Subject::all('id','name');
        return view('admin.slip_add',compact('grades','subjects'));
    }

    public function store(Request $request)
    {
        dd($request->all());
    }
}
