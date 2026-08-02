<?php

namespace App\Http\Controllers\BilalCenter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PinController extends Controller
{
    public function showForm()
    {
        return view('bilal-center.pin');
    }

    public function verify(Request $request)
    {
        $request->validate([
            'pin' => 'required|string',
        ]);

        if ($request->pin !== (string) config('bilalcenter.pin')) {
            return back()->withErrors(['pin' => 'Incorrect PIN.']);
        }

        $request->session()->regenerate();
        $request->session()->put('bilal_center.pin_confirmed_at', time());

        $intended = $request->session()->pull('bilal_center.intended');

        return redirect($intended ?: route('bilal-center.products.index'));
    }
}
