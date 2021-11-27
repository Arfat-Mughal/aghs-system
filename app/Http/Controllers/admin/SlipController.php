<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Grade;
use App\Models\Slip;
use App\Models\Subject;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class SlipController extends Controller
{
    public function index()
    {
        $slips = Slip::with('grade')->get();
        return view('admin.slips',compact('slips'));
    }

    public function create()
    {
        $grades = Grade::all('id','name');
        $subjects = Subject::all('id','name');
        return view('admin.slip_add',compact('grades','subjects'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'grade_id' => 'required',
            'term' => 'required',
            'current_session' => 'required',
        ]);

        $slip = new Slip;
        $slip->grade_id = $request->grade_id;
        $slip->term = $request->term;
        $slip->session = $request->current_session;
        $slip->save();

        foreach ($request->subject_id as $grade) {
            $slip->datesheets()->create([
                'subject_id'=> $grade['subject_id'],
                'date'=> $grade['date'],
                'reporting'=> $grade['reporting'],
                'start_time'=> $grade['start_time'],
                'end_time'=> $grade['end_time'],
            ]);
        }
        Alert::success('Datesheets Added', 'Success Message');
        return redirect()->route('slips');
    }

    public function changeSlipStatus($id)
    {
        $slip = Slip::find($id);
        if ($slip->is_active){
            $slip->is_active = false;
        }else{
            $slip->is_active = true;
        }
            $slip->save();
        return redirect()->back();
    }

    public function deleteSlip($id)
    {
        $slips = Slip::find($id);
        if ($slips->datesheets){
            foreach ($slips->datesheets as $slip){
                $slip->delete();
            }
        }
        $slips->delete();
        Alert::success('Deleted', 'Success Message');
        return redirect()->route('slips');
    }
}
