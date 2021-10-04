<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\Student;
use Barryvdh\DomPDF\PDF;
use Dompdf\Dompdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\View;

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
        if ($student){
//            $pdf = new Dompdf();
//            $html = View::make('pdf.roll_no_slip',compact('student'))->render();
//            $pdf->loadHtml($html, 'UTF-8');
//            $pdf->render();
//            $filename = "Hi!";
//            return $pdf->stream($filename);

            $pdf = (new \Barryvdh\DomPDF\PDF)->loadView('pdf.roll_no_slip', compact('student'));

            return $pdf->download('disney.pdf');
        }
    }
}
