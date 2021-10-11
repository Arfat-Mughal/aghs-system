<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.panel');
    }

    public function certificateMerit()
    {
        return view('certificates.add_merit_data');
    }

    public function get_certificateMerit(Request $request)
    {
        return view('certificates.certificate_merit');
    }
}
