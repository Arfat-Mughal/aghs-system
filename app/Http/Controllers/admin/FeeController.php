<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Fee;
use App\Models\Grade;
use App\Models\Payment;
use App\Models\Student;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class FeeController extends Controller
{
    public function index()
    {
        $fees = Fee::with('payments', 'student')->get();
        $grades = Grade::all('id','name');
        return view('fee.fees', compact('fees','grades'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'grade_id' => 'numeric|required',
            'issue_date' => 'required',
            'last_date' => 'required'
        ]);

        $students = Student::where('grade_id', $request->grade_id)->get();
        if (!$students) {
            Alert::error('No Student Found For Select Class', 'No Student');
            return redirect()->route('fees');
        }

        foreach ($students as $student) {
            $fee = new Fee;
            $fee->grade_id = $request->grade_id;
            $fee->student_id = $student->id;
            $fee->issue_date = $request->issue_date;
            $fee->last_date = $request->last_date;
            $fee->save();

            foreach ($request->fees as $data) {
                $fee->payments()->create([
                    'student_id'=> $student->id,
                    'detail' => $data['detail'],
                    'fee' => $data['fee']
                ]);
            }
        }
        Alert::success('Students Fee Cards Added', 'Success Message');
        return redirect()->route('fees');
    }

    public function create()
    {
        $grades = Grade::all('id', 'name');
        return view('fee.fee_create', compact('grades'));
    }

    public function view($id)
    {
        $fee_details = Fee::with('student','payments')->find($id);
        if ($fee_details){
            $details = $fee_details;
            return view('fee.view_fee',compact('details'));
        }
    }

    public function all_fee_view($grade_id)
    {
        $fee_details = Fee::with('student','payments')->where('grade_id',$grade_id)->get();
        if (count($fee_details) > 0){
            return view('fee.view_fees_by_class',compact('fee_details'));
        }else{
            Alert::error('No Fee Found For Select Class', 'Opss');
            return redirect()->route('fees');
        }
    }

    public function destroyFee(Request $request)
    {
        $fee = Fee::find($request->id);
        if ($fee){
            $payments = Payment::where('fee_id',$fee->id)->get();
            if ($payments){
                foreach ($payments as $payment){
                    $payment->fee_id = 0;
                    $payment->save();
                }
            }
            $fee->delete();
            Alert::success('Fee Cards Deleted', 'Success Message');
            return redirect()->route('fees');
        }
        Alert::error('No Fee Found', 'Opss');
        return redirect()->route('fees');
    }
}
