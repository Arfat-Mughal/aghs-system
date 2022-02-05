<?php

namespace App\Http\Controllers\admin;

use App\Models\Banner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class BannerController extends Controller
{
    public function index()
    {
        $notifications = Banner::all();
        return view('banners.banners',compact('notifications'));
    }

    public function store(Request $request)
    {
        $notifications = new Banner;
        $notifications->name = $request->title;
        $notifications->path = $this->UserImageUpload($request->file('file'));
        $notifications->save();
        Alert::success('Banners Added', 'Success Message');
        return redirect()->route('banners');
    }

    private function UserImageUpload($query) // Taking input image as parameter
    {
        $image_name = Str::random(25);
        $ext = strtolower($query->getClientOriginalExtension()); // You can use also getClientOriginalName()
        $image_full_name = $image_name . '.' . $ext;
        $upload_path = 'public/banners/';    //Creating Sub directory in Public folder to put image
        $image_url = $upload_path . $image_full_name;
        $query->move($upload_path, $image_full_name);

        return $image_url; // Just return image
    }

    public function delete($id)
    {
        $notifications = Banner::find($id);
        if ($notifications){
            unlink($notifications->path);
            $notifications->delete();
            return redirect()->route('banners');
        }
    }
}
