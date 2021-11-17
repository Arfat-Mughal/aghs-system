<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function index()
    {
        $student_count = Student::all()->count();
        return view('admin.panel',compact('student_count'));
    }

    public function certificateMerit()
    {
        return view('certificates.add_merit_data');
    }

    public function get_certificateMerit(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'ref_no' => 'required',
            'date' => 'required',
            'registration_code' => 'required',
            'weeks' => 'required',
            'name' => 'required',
            'father_name' => 'required',
            'content_1' => 'required',
            'content_2' => 'required',
            'content_3' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator);
        }

        $data = $request->all();
        return view('certificates.certificate_merit',compact('data'));
    }
}
