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
        $results = Recode::with('marks','grade','studentsRecodeCards')->get();
        return view('admin.results',compact('results'));
    }

    public function changeResultsStatus($id)
    {
        $student = Recode::find($id);
        if($student->is_active){
            $student->is_active = 0;
        }else{
            $student->is_active = 1;
        }
        $student->save();
        Alert::success('Result status updated', 'Success Message');
        return redirect()->route('results');
    }

    public function updateAllResultsStatus($action)
    {
        if ($action){
            Recode::where('is_active',false)->update(['is_active' => true]);
        }else{
            Recode::where('is_active',true)->update(['is_active' => false]);
        }
        Alert::success('All Results Status Updated', 'Success Message');
        return redirect()->route('results');
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
        $recode = Recode::whereHas('marks')->with('marks')->where('grade_id',$id)->first();
        $subjects = RecodeMark::with('subject')->where('recode_id',$recode->id)->get();
        return view('admin.results_marks_add',compact('students','recode','subjects','id'));
    }

    public function updateResultMarks($id)
    {
        $students = Student::whereHas('grade',function ($q) use ($id){
            $q->where('id',$id);
        })->pluck('id')->Toarray();
        $recode = StudentRecodeCard::with('students','subject')->whereIn('student_id',$students)->get();
        return view('admin.results_marks_update',compact('recode','id'));
    }

    public function storeUpdateResultMarks(Request $request)
    {
        foreach ($request->students as $recode)
        {
            StudentRecodeCard::where([
                 'student_id'=>$recode['student_id'],
                 'subject_id'=>$recode['subject_id']
             ])->updateOrCreate([
                ['student_id'=>$recode['student_id'],
                'subject_id'=>$recode['subject_id']],
                ['o_marks'=>$recode['marks'],
                'remarks'=>$recode['remarks']]
            ]);
        }
        foreach ($request->students as $recode){
            $found = StudentRecodeCard::where(['student_id'=>$recode['student_id']])->sum('o_marks');
            Student::where('id',$recode['student_id'])->update(['o_marks'=>$found]);
        }

        Alert::success('DateSheet Updated Successfully', 'Success Message');
        return redirect()->route('results');
    }

    public function storeResultMarks(Request $request)
    {
        foreach ($request->students as $recodes){
            foreach ($recodes as $recode){
                $studentCard = new StudentRecodeCard;
                $studentCard->student_id = $recode['student_id'];
                $studentCard->subject_id = $recode['subject_id'];
                $studentCard->total_marks = $recode['total_marks'];
                $studentCard->recode_id = $request->recode_id;
                $studentCard->o_marks = $recode['marks'] ?? 0;
                $studentCard->remarks = $recode['remarks'] ?? 'Fail';
                $studentCard->save();
            }
        }
        Alert::success('Added Successfully', 'Success Message');
        return redirect()->route('results');
    }

    public function deleteResultMarks($id)
    {
        $recode = Recode::find($id);
        if ($recode->marks){
            foreach ($recode->marks as $mark){
                $mark->delete();
            }
        }
        if ($recode->studentsRecodeCards){
            foreach ($recode->studentsRecodeCards as $card){
                $card->delete();
            }
        }
        $recode->delete();
        Alert::success('Deleted Successfully', 'Success Message');
        return redirect()->route('results');
    }
}
