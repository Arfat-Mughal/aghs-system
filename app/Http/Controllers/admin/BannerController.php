<?php

namespace App\Http\Controllers\admin;

use App\Models\Banner;
use App\Services\ImageService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:15360',
        ]);

        $banner = new Banner;
        $banner->name = $request->title;
        $banner->path = app(ImageService::class)->compressToPublic($request->file('file'), 'banners', 'banner');
        $banner->save();

        Alert::success('Banner Added', 'Success Message');
        return redirect()->route('banners');
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
