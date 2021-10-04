<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Grade;
use App\Models\Recode;
use App\Models\RecodeMark;
use App\Models\Student;
use App\Models\StudentRecodeCard;
use App\Models\Subject;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ResultController extends Controller
{
    public function index()
    {
        $results = Recode::with('marks','grade')->get();
        return view('admin.results',compact('results'));
    }

    public function create()
    {
        $grades = Grade::all('id','name');
        $subjects = Subject::all('id','name');
        return view('admin.results_add',compact('grades','subjects'));
    }

    public function store(Request $request)
    {
        $recodes = new Recode;
        $recodes->grade_id = $request->grade_id;
        $recodes->save();
        foreach ($request->subject_id as $subject){
            $recodes->marks()->create([
                'subject_id'=>  $subject['subject_id'],
                't_marks'=> $subject['marks']
            ]);
        }
        Alert::success('Added Successfully', 'Success Message');
        return redirect()->route('results');
    }

    public function addResultMarks($id)
    {
        $students = Student::whereHas('grade',function ($q) use ($id){
            $q->where('id',$id);
        })->get();
        $recode = Recode::whereHas('marks')->where('grade_id',$id)->first();
        $subjects = RecodeMark::with('subject')->where('recode_id',$recode->id)->get();
        return view('admin.results_marks_add',compact('students','recode','subjects','id'));
    }

    public function storeResultMarks(Request $request)
    {
        foreach ($request->students as $recodes){
            foreach ($recodes as $recode){
                $studentCard = new StudentRecodeCard;
                $studentCard->student_id = $recode['student_id'];
                $studentCard->subject_id = $recode['subject_id'];
                $studentCard->recode_id = $request->recode_id;
                $studentCard->o_marks = $recode['marks'];
                $studentCard->remarks = $recode['remarks'];
                $studentCard->save();
            }
        }
        Alert::success('Added Successfully', 'Success Message');
        return redirect()->route('results');

    }
}
