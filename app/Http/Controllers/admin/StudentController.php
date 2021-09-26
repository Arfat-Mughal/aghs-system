<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Grade;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::with('grade')->get();
        return view('admin.students',compact('students'));
    }

    public function create()
    {
        $grades = Grade::all('id','name');
        return view('admin.student_add',compact('grades'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'father_name' => 'required',
            'image'  =>  'required|max:2048',
            'roll_no' => 'required|unique:students,addmission_no',
            'dob' => 'required',
            'cnic' => 'required',
            'religion' => 'required',
            'gender' => 'required',
            'address' => 'required',
            'grade_id' => 'required',
            'email' => 'unique:students,email'
        ]);

        if ($request->addmission_no){
            $student = Student::find($request->roll_no);
            if ($request->has('image')){
                unlink("student_profile/".$student->path);
            }
        }else{
            $student = new Student;
        }
        $student->addmission_no =  $request->roll_no;
        $student->name          =  $request->name;
        $student->father_name   =  $request->father_name;
        $student->dob           =  $request->dob;
        $student->religion      =  $request->religion;
        $student->gender        =  $request->gender;
        $student->quran         =  $request->quran ?? 0;
        $student->address       =  $request->address;
        $student->occupation    =  $request->occupation;
        $student->email         =  $request->email ? $student->email:null;
        $student->b_form        =  $request->b_form;
        $student->cnic          =  $request->cnic;
        $student->phone         =  $request->phone;
        $student->cell          =  $request->cell;
        $student->grade_id      =  $request->grade_id;
        $student->date          =  $request->date;
        $student->path          =  $this->UserImageUpload($request->file('image'));
        $student->save();
        Alert::success('Student Added', 'Success Message');
        return redirect()->route('students');
    }

    private function UserImageUpload($query) // Taking input image as parameter
    {
        $image_name = Str::random(20);
        $ext = strtolower($query->getClientOriginalExtension()); // You can use also getClientOriginalName()
        $image_full_name = $image_name.'.'.$ext;
        $upload_path = 'student_profile/';    //Creating Sub directory in Public folder to put image
        $image_url = $upload_path.$image_full_name;
        $query->move($upload_path,$image_full_name);

        return $image_url; // Just return image
    }
}
