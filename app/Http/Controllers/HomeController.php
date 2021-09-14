<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
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
        return view('pages.roll_no');
    }

    public function result()
    {
        return view('pages.result');
    }
}
