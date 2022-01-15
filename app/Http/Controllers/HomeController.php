<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Datesheet;
use App\Models\Grade;
use App\Models\Recode;
use App\Models\RecodeMark;
use App\Models\Slip;
use App\Models\Student;
use App\Models\StudentRecodeCard;
use Illuminate\Http\Request;
use Artesaos\SEOTools\Facades\SEOMeta;
use NumberFormatter;
use NumberToWords\NumberToWords;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->grades = Grade::all('id','name');
    }

    public function home()
    {
        SEOMeta::setTitle('AGHS-LAHORE | Home');
        SEOMeta::setTitleDefault('AL-FALAH GRAMMAR HIGH SCHOOL & ACADEMY');
        SEOMeta::setDescription('Home page');
        SEOMeta::setCanonical('https://aghslahore.com');
        return view('main');
    }

    public function contact()
    {
        SEOMeta::setTitle('AGHS-LAHORE | Contacts');
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
        SEOMeta::setTitle('AGHS-LAHORE | Roll Number Slips');
        SEOMeta::setDescription('Type your name and select class');
        SEOMeta::setCanonical('https://aghslahore.com/roll_no');
        return view('pages.roll_no')->with('grades',$this->grades);
    }

    public function notice()
    {
        SEOMeta::setTitle('AGHS-LAHORE | Notifications');
        SEOMeta::setDescription('See All upcoming notifications');
        SEOMeta::setCanonical('https://aghslahore.com/notice');
        return view('pages.notic');
    }

    public function result()
    {
        SEOMeta::setTitle('AGHS-LAHORE | Result Cards');
        SEOMeta::setDescription('Type your roll number to get your result');
        SEOMeta::setCanonical('https://aghslahore.com/result');
        return view('pages.result')->with('grades',$this->grades);
    }

    public function about()
    {
        SEOMeta::setTitle('AGHS-LAHORE | About Us');
        SEOMeta::setDescription('Message from the Head of School');
        SEOMeta::setCanonical('https://aghslahore.com/result');
        return view('pages.about');
    }

    public function getRollNumberSlip(Request $request)
    {
        $student = Student::where(['name'=>$request->full_name,'grade_id'=>$request->class])->first();
        if ($student){
            if (!$student->is_active){
                return redirect()->back()->withErrors(['errors'=>"Over Dues!! please clear your dues first"]);
            }
            $slip = Slip::with('grade')->where('grade_id',$student->grade_id)->first();
            $dataSheets = Datesheet::with('subject')->whereIn('slip_id',[$slip->id])->get();
            if (!$slip || !$dataSheets || !$slip->is_active){
                return redirect()->back()->withErrors(['errors'=>"Roll No Slip is not published yet"]);
            }
            return view('pdf.roll_no_slip',compact('student','slip','dataSheets'));
        }
        return redirect()->back()->withErrors(['errors'=>"No Recode Found"]);
    }

    public function getMaksSheet(Request $request)
    {
        $array = [];
        $passOrFail = "";
        $student = Student::where('addmission_no',$request->roll_no)->first();
        if ($student){
            if (!$student->is_active){
                return redirect()->back()->withErrors(['errors'=>"Over Dues!! please clear your dues first to view your result"]);
            }
            $slip = Slip::with('grade')->where(['grade_id'=>$student->grade_id,'is_active'=>1])->first();
            if (!$slip){
                return redirect()->back()->withErrors(['errors'=>"No Examination Recode Found"]);
            }
            $recode = Recode::with('marks')->where(['grade_id'=>$student->grade_id])->first();
            if (!$recode){
                return redirect()->back()->withErrors(['errors'=>"Result is not published yet"]);
            }
            $recode_marks = StudentRecodeCard::with('subject','recode')->where(['student_id'=>$student->id,'recode_id'=>$recode->id])->get();
            foreach ($recode_marks as $status){
                $array[] =  $status->remarks;
            }

            $vals = array_count_values($array);
            if (empty($recode_marks)){
                return redirect()->back()->withErrors(['errors'=>"Result is not Added Yet"]);
            }
            $obtainMarks = $recode_marks->sum('o_marks');
            $numberToWords = new NumberToWords();
            $numberTransformer = $numberToWords->getNumberTransformer('en');
            $numberToWord = $numberTransformer->toWords($obtainMarks);
            $totalMarks = $recode->marks->sum('t_marks');
            return view('pdf.mark_sheet',compact('student','recode','slip','recode_marks','totalMarks','obtainMarks','numberToWord','vals'));
        }
        return redirect()->back()->withErrors(['errors'=>"No Recode Found"]);
    }

    private function getT_marks($recode_id, $subject_id)
    {
        $marks =  RecodeMark::where(['recode_id',$recode_id,'subject_id'=>$subject_id])->first();
        return $marks->t_marks;
    }

}
