<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Fee;
use App\Models\Grade;
use App\Models\Student;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class FeeController extends Controller
{
    public function index()
    {
        $fees = Fee::with('payments','student')->get();
        return view('fee.fees',compact('fees'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'grade_id' => 'numeric|required',
            'issue_date' => 'required',
            'last_date' => 'required'
        ]);

        $students = Student::where('grade_id',$request->grade_id)->get();
        if (!$students){
            Alert::error('No Student Found For Select Class', 'No Student');
            return redirect()->route('fees');
        }

        foreach ($students as $student){
            $fee = new Fee;
            $fee->grade_id = $request->grade_id;
            $fee->student_id = $student->id;
            $fee->issue_date = $request->issue_date;
            $fee->last_date = $request->last_date;
            $fee->save();

            foreach ($request->fees as $data){
                $fee->payments()->create([
                    'detail'=> $data['detail'],
                    'fee'=> $data['fee']
                ]);
            }
        }
        Alert::success('Students Fee Cards Added', 'Success Message');
        return redirect()->route('fees');


    }

    public function create()
    {
        $grades = Grade::all('id','name');
        return view('fee.fee_create',compact('grades'));
    }
}
