<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Notifications;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class NotificationController extends Controller
{
    public function index()
    {
        $notifications = Notifications::all();
        return view('notifications.notifications',compact('notifications'));
    }

    public function store(Request $request)
    {
        $notifications = new Notifications;
        $notifications->name = $request->title;
        $notifications->path = $this->UserImageUpload($request->file('file'));
        $notifications->save();
        Alert::success('Notifications Added', 'Success Message');
        return redirect()->route('notifications');
    }

    private function UserImageUpload($query) // Taking input image as parameter
    {
        $image_name = Str::random(25);
        $ext = strtolower($query->getClientOriginalExtension()); // You can use also getClientOriginalName()
        $image_full_name = $image_name . '.' . $ext;
        $upload_path = 'notifications/';    //Creating Sub directory in Public folder to put image
        $image_url = $upload_path . $image_full_name;
        $query->move($upload_path, $image_full_name);

        return $image_url; // Just return image
    }

    public function delete($id)
    {
        $notifications = Notifications::find($id);
        if ($notifications){
            unlink($notifications->path);
            $notifications->delete();
            return redirect()->route('notifications');
        }
    }
}
