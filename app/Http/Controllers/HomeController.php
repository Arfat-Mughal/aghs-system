<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Datesheet;
use App\Models\Grade;
use App\Models\Recode;
use App\Models\Slip;
use App\Models\Student;
use App\Models\StudentRecodeCard;
use Illuminate\Http\Request;
use Artesaos\SEOTools\Facades\SEOMeta;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->grades = Grade::all('id','name');
    }

    public function home()
    {
        SEOMeta::setTitle('AGHS-Home');
        SEOMeta::setTitleDefault('AL-FALAH GRAMMAR HIGH SCHOOL & ACADEMY');
        SEOMeta::setDescription('Student teaching experience, and have passed additional state-mandated teaching examinations.');
        SEOMeta::setCanonical('https://aghslahore.com');
        return view('main');
    }

    public function contact()
    {
        SEOMeta::setTitle('AGHS-Contacts');
        SEOMeta::setDescription('VILLAGE BHANO CHAK P/O WAGHA TEHSIL SHALIMAR CANTT LAHORE');
        SEOMeta::setCanonical('https://aghslahore.com/contact');
        return view('pages.contact');
    }

    public function contactStore(Request $request)
    {
        $request->validate([
            'name' => 'required|max:150',
            'email' => 'required|max:150',
            'subject' => 'required|max:150',
        ]);

        $contact = new Contact;
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->subject = $request->subject;
        $contact->message = $request->message;
        $contact->save();

        return redirect()->route('contact')->with(['message',"your message is received"]);
    }

    public function courses()
    {
        return view('pages.courses');
    }

    public function roll_no()
    {
        SEOMeta::setTitle('Roll Number Slips');
        SEOMeta::setDescription('Type your name and select class');
        SEOMeta::setCanonical('https://aghslahore.com/roll_no');
        return view('pages.roll_no')->with('grades',$this->grades);
    }

    public function result()
    {
        SEOMeta::setTitle('Result Cards');
        SEOMeta::setDescription('Type your roll number to get your result');
        SEOMeta::setCanonical('https://aghslahore.com/result');
        return view('pages.result')->with('grades',$this->grades);
    }

    public function getRollNumberSlip(Request $request)
    {
        $student = Student::where(['name'=>$request->full_name,'grade_id'=>$request->class])->first();
        if (!$student->is_active){
            return redirect()->back()->withErrors(['errors'=>"Over Duties please clear your dues first"]);
        }
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
        if (!$student->is_active){
            return redirect()->back()->withErrors(['errors'=>"Over Dues!! please clear your dues first"]);
        }
        if ($student){
            $slip = Slip::with('grade')->where(['grade_id'=>$student->grade_id,'is_active'=>1])->first();
            if (!$slip){
                return redirect()->back()->withErrors(['errors'=>"No Examination Recode Found"]);
            }
            $recode = Recode::with('marks')->where(['grade_id'=>$student->grade_id])->first();
            if (!$recode){
                return redirect()->back()->withErrors(['errors'=>"Result is not published yet"]);
            }
            $recode_marks = StudentRecodeCard::with('subject')->where(['student_id'=>$student->id,'recode_id'=>$recode->id])->get();
            if (!$recode){
                return redirect()->back()->withErrors(['errors'=>"Result is not Added Yet"]);
            }
            return view('pdf.mark_sheet',compact('student','recode','slip','recode_marks'));
        }
        return redirect()->back()->withErrors(['errors'=>"No Recode Found"]);
    }
}
