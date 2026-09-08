<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Notifications;
use App\Services\ImageService;
use Illuminate\Http\Request;
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
        $notifications->path = app(ImageService::class)->compressToPublic($request->file('file'), 'notifications');
        $notifications->save();
        Alert::success('Notifications Added', 'Success Message');
        return redirect()->route('notifications');
    }

    public function delete($id)
    {
        $notification = Notifications::find($id);

        if ($notification) {
            if ($notification->path && file_exists(public_path($notification->path))) {
                unlink(public_path($notification->path));
            }
    
            $notification->delete();
    
            return redirect()->route('notifications');
        }
    }
}
