<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Certificate;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class CertificateController extends Controller
{
    public function index()
    {
        $certificates = Certificate::all();
        return view('certificates.certificates',compact('certificates'));
    }

    public function create()
    {
        return view('certificates.add_merit_data');
    }

    public function store(Request $request)
    {
        $certificate = Certificate::create([
            'ref_no'=>$request->ref_no,
            'date'=>$request->date,
            'registration_code'=>$request->registration_code,
            'weeks'=>$request->weeks,
            'name'=>$request->name,
            'type'=>"merit certificate",
            'father_name'=>$request->father_name,
            'is_active'=>1,
        ]);

        foreach ($request->rows as $row){
            $certificate->contents()->create([
                'name'=>  $row,
                'certificate_id' => $certificate->id
            ]);
        }
        Alert::success('Added Successfully', 'Success Message');
        return redirect()->route('certificates');
    }

    public function destroy($id)
    {
        $certificate = Certificate::find($id);
        if ($certificate){
            $certificate->contents()->delete();
            $certificate->delete();
            Alert::success('Certificate Deleted', 'Success Message');
            return redirect()->route('certificates');
        }
        Alert::error('No Certificate Found', 'Ops!!');
        return redirect()->route('certificates');
    }

    public function changeCertificateStatus(Request $request)
    {
        $student = Certificate::find($request->id);
        if($student->is_active){
            $student->is_active = 0;
        }else{
            $student->is_active = 1;
        }
        $student->save();
        Alert::success('Certificate status updated', 'Success Message');
        return redirect()->route('certificates');

    }

    public function updateAllCertificateStatus($action)
    {
        if ($action){
            Certificate::where('is_active',false)->update(['is_active' => true]);
        }else{
            Certificate::where('is_active',true)->update(['is_active' => false]);
        }
        Alert::success('Certificates Status Updated', 'Success Message');
        return redirect()->route('certificates');
    }
}
