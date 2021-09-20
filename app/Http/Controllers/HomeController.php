<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->grades = Grade::all('id','name');
    }

    public function home()
    {
        return view('main');
    }

    public function contact()
    {
        return view('pages.contact');
    }

    public function courses()
    {
        return view('pages.courses');
    }

    public function roll_no()
    {
        return view('pages.roll_no')->with('grades',$this->grades);
    }

    public function result()
    {
        return view('pages.result')->with('grades',$this->grades);
    }
}
