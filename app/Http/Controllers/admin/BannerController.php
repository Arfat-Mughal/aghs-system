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
        $banners = Banner::all();
        return view('banners.banners', compact('banners'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'file' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $banner = new Banner;
        $banner->name = $request->title;
        $banner->path = $this->uploadBannerImage($request->file('file'));
        $banner->save();

        Alert::success('Banner Added', 'Success Message');
        return redirect()->route('banners');
    }

    private function uploadBannerImage($imageFile)
    {
        $imageName = Str::slug('banner-' . time()) . '.' . $imageFile->getClientOriginalExtension();
        $uploadPath = 'banners/'; // Creating Sub directory in Public folder to put image
        $imageUrl = $uploadPath . $imageName;
        $imageFile->move($uploadPath, $imageName);

        return $imageUrl; // Return image URL
    }

    public function delete($id)
    {
        $banner = Banner::find($id);
        if ($banner && file_exists(public_path($banner->path))) {
            unlink(public_path($banner->path));
            $banner->delete();
        }else{
            $banner->delete();
        }
        return redirect()->route('banners');
    }
}
