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
        $students = Student::with('grade')->select(
            'id',
            'path',
            'addmission_no',
            'name',
            'father_name',
            'b_form',
            'cell',
            'grade_id',
            'is_active'
        )->paginate(10);
        $grades = Grade::whereHas('students')->get();
        return view('admin.students', compact('students','grades'));
    }

    public function promoteNextClass($id)
    {
        $have_next_class = $id + 1;
        $grades = Grade::pluck('id')->toArray();
        if (in_array($have_next_class, $grades)) {
            $students = Student::where(['grade_id'=>$id,'is_active'=> true])->select('id','grade_id')->get();
            if ($students->count() === 0){
                Alert::error('No Student Found in this Class', 'No Record');
                return redirect()->route('students');
            }else {
                $students = Student::where(['grade_id' => $id, 'is_active' => true])->select('id', 'grade_id')->get();
                foreach ($students as $student) {
                    $array = Student::where('grade_id', $have_next_class)->pluck('addmission_no')->toArray();
                    if(!empty($array)){
                        $addmission_no = end($array) + 1;
                    }else{
                        switch ($have_next_class){
                            case ($have_next_class == 4):
                                $addmission_no = 786101;
                                break;
                            case ($have_next_class == 5):
                                $addmission_no = 786201;
                                break;
                            case ($have_next_class == 6):
                                $addmission_no = 786301;
                                break;
                            case ($have_next_class == 7):
                                $addmission_no = 786401;
                                break;
                            case ($have_next_class == 8):
                                $addmission_no = 786501;
                                break;
                            case ($have_next_class == 9):
                                $addmission_no = 786601;
                                break;
                            case ($have_next_class == 10):
                                $addmission_no = 786701;
                                break;
                            case ($have_next_class == 11):
                                $addmission_no = 786801;
                                break;
                            case ($have_next_class == 12):
                            case ($have_next_class == 13):
                            case ($have_next_class == 14):
                                $addmission_no = 786901;
                                break;
                            case ($have_next_class == 15):
                                $addmission_no = 787000;
                                break;
                            default:
                                $addmission_no = 786000;
                        }
                    }
                    $student->addmission_no = $addmission_no;
                    $student->grade_id = $have_next_class;
                    $student->save();
                }
                Alert::success('Students of selected class promote to next class', 'Success Message');
                return redirect()->route('students');
            }
        }
        Alert::error('You did not have next class to promote these students', 'No Next Class');
        return redirect()->route('students');
    }

    public function addStudentPositions(Request $request)
    {
        $students = Student::where('grade_id',$request->grade)->select('id','o_marks','position')->orderBy('o_marks', 'DESC')->get();
        if ($students){
            foreach ($students as $key => $student){
                $position = $key+1;
                $rank = $position;
                if ($position === 1){
                    $rank = $position."st";
                }elseif ($position === 2){
                    $rank = $position."nd";
                }elseif ($position === 3){
                    $rank = $position."rd";
                }else{
                    $rank = $position."th";
                }
                $student->position = $rank;
                $student->save();
            }
            Alert::success('Class Position Updated', 'Success Message');
            return redirect()->route('students');
        }
        Alert::error('No Class Found', 'No Record');
        return redirect()->route('students');
    }

    public function searchStudent(Request $request)
    {
        $students = Student::query()
            ->where('name','like',$request->search.'%')
            ->orWhere('addmission_no','like',$request->search.'%')
            ->orWhere('father_name','like',$request->search.'%')
            ->orWhereHas('grade',function ($q) use ($request){
                $q->where('name','like',$request->search.'%');
            })
            ->orWhere('b_form','like',$request->search.'%')->with('grade')->paginate(10);
        $grades = Grade::whereHas('students')->get();
        return view('admin.students', compact('students','grades'));
    }

    public function create()
    {
        $grades = Grade::all('id', 'name');
        return view('admin.student_add', compact('grades'));
    }

    public function update($student_id)
    {
        $grades = Grade::all('id', 'name');
        $student = Student::where('id', $student_id)->first();
        return view('admin.student_update', compact('grades', 'student_id', 'student'));
    }

    public function view($id)
    {
        $student = Student::with('grade')->find($id);
        return view('admin.student_view', compact('student'));
    }

    public function destroy(Request $request)
    {
        $student = Student::where('id', $request->id)->first();
        if (count($student->studentRecodeCards) > 0) {
            foreach ($student->studentRecodeCards as $studentCard) {
                $studentCard->delete();
            }
        }
        unlink($student->path);
        $student->delete();
        Alert::success('Student Deleted', 'Success Message');
        return redirect()->route('students');
    }

    public function changeStudentStatus($id)
    {
        $student = Student::find($id);
        if($student->is_active){
            $student->is_active = 0;
        }else{
            $student->is_active = 1;
        }
        $student->save();
        Alert::success('Student status updated', 'Success Message');
        return redirect()->route('students');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'father_name' => 'required',
            'image' => 'required|max:2048',
            'roll_no' => 'required|unique:students,addmission_no',
            'dob' => 'required',
            'cnic' => 'required',
            'religion' => 'required',
            'gender' => 'required',
            'address' => 'required',
            'grade_id' => 'required',
            'email' => 'unique:students,email'
        ]);

        $student = new Student;
        $student->addmission_no = $request->roll_no;
        $student->name = $request->name;
        $student->father_name = $request->father_name;
        $student->dob = $request->dob;
        $student->religion = $request->religion;
        $student->gender = $request->gender;
        $student->quran = $request->quran ?? 0;
        $student->address = $request->address;
        $student->occupation = $request->occupation;
        $student->email = $request->email;
        $student->b_form = $request->b_form;
        $student->cnic = $request->cnic;
        $student->phone = $request->phone;
        $student->cell = $request->cell;
        $student->grade_id = $request->grade_id;
        $student->date = $request->date;
        $student->position = $request->position;
        $student->path = $this->UserImageUpload($request->file('image'));
        $student->save();
        Alert::success('Student Added', 'Success Message');
        return redirect()->route('students');
    }

    public function update_store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'father_name' => 'required',
            'dob' => 'required',
            'cnic' => 'required',
            'religion' => 'required',
            'gender' => 'required',
            'address' => 'required',
            'grade_id' => 'required',
        ]);

        $student = Student::where('id', $request->id)->first();
        $student->addmission_no = $request->roll_no;
        $student->name = $request->name;
        $student->father_name = $request->father_name;
        $student->dob = $request->dob;
        $student->religion = $request->religion;
        $student->gender = $request->gender;
        $student->quran = $request->quran ?? 0;
        $student->address = $request->address;
        $student->occupation = $request->occupation;
        $student->email = $request->email;
        $student->b_form = $request->b_form;
        $student->cnic = $request->cnic;
        $student->phone = $request->phone;
        $student->cell = $request->cell;
        $student->grade_id = $request->grade_id;
        $student->date = $request->date;
        $student->position = $request->position;
        if ($request->hasFile('image')) {
//            unlink("student_profile/".$student->path);
            $student->path = $this->UserImageUpload($request->file('image'));
        }
        $student->save();

        Alert::success('Student Recode Updated', 'Success Message');
        return redirect()->route('students');
    }

    private function UserImageUpload($query) // Taking input image as parameter
    {
        $image_name = Str::random(25);
        $ext = strtolower($query->getClientOriginalExtension()); // You can use also getClientOriginalName()
        $image_full_name = $image_name . '.' . $ext;
        $upload_path = 'student_profile/';    //Creating Sub directory in Public folder to put image
        $image_url = $upload_path . $image_full_name;
        $query->move($upload_path, $image_full_name);

        return $image_url; // Just return image
    }

    public function getStudentsViewByClasses($id)
    {
        $students = Student::where('grade_id',$id)->get();
        return view('admin.studentPdfByClass',compact('students'));
    }

    public function updateAllStatus($action)
    {
        if ($action){
            Student::where('is_active',false)->update(['is_active' => true]);
        }else{
            Student::where('is_active',true)->update(['is_active' => false]);
        }
        Alert::success('All Students Status Updated', 'Success Message');
        return redirect()->route('students');
    }

    public function changeUserStatus(Request $request)
    {
        if($request->ajax()){
            $student = Student::find($request->id);
            if ($student){
                $student->update([
                    'is_active' => filter_var($request->is_active, FILTER_VALIDATE_BOOLEAN) ? 1:0
                ]);
                return response()->json(['success'=>'Student status updated']);
            }else{
                return response()->json(['error'=>'Student status not updated error']);
            }
        }
        return response()->json(['error'=>'Invalid Request']);

    }
}
