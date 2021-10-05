<?php

namespace App\Http\Controllers;

use App\Models\Datesheet;
use App\Models\Grade;
use App\Models\Recode;
use App\Models\Slip;
use App\Models\Student;
use PDF;
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

    public function getRollNumberSlip(Request $request)
    {
        $student = Student::where(['name'=>$request->full_name,'grade_id'=>$request->class])->first();
        $slip = Slip::with('grade')->where(['grade_id'=>$student->grade_id,'is_active'=>1])->first();
        $dataSheets = Datesheet::with('subject')->whereIn('slip_id',[$slip->id])->get();
        if ($student){
            if (!$slip || !$dataSheets){
                return redirect()->back()->withErrors(['errors'=>"Date sheet is not published yet"]);
            }
            return view('pdf.roll_no_slip',compact('student','slip','dataSheets'));
        }
        return redirect()->back()->withErrors(['errors'=>"No Recode Found"]);
    }

    public function getMaksSheet(Request $request)
    {
        $student = Student::where('addmission_no',$request->roll_no)->first();
        if ($student){
            $slip = Slip::with('grade')->where(['grade_id'=>$student->grade_id,'is_active'=>1])->first();
            if (!$slip){
                return redirect()->back()->withErrors(['errors'=>"Result is not published yet"]);
            }
            return view('pdf.mark_sheet',compact('student','slip'));
        }
        return redirect()->back()->withErrors(['errors'=>"No Recode Found"]);
    }
}
