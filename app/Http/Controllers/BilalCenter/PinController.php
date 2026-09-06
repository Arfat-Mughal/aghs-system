<?php

namespace App\Http\Controllers\BilalCenter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PinController extends Controller
{
    protected string $pinFile = 'app/bilal-center/pin.txt';

    public function showForm()
    {
        return view('bilal-center.pin');
    }

    public function verify(Request $request)
    {
        $request->validate([
            'pin' => 'required|string',
        ]);

        if ($request->pin !== $this->currentPin()) {
            return back()->withErrors(['pin' => 'Incorrect PIN.']);
        }

        $request->session()->regenerate();
        $request->session()->put('bilal_center.pin_confirmed_at', time());

        $intended = $request->session()->pull('bilal_center.intended');

        return redirect($intended ?: route('bilal-center.products.index'));
    }

    public function changePin(Request $request)
    {
        $request->validate([
            'current_pin' => 'required|string',
            'new_pin' => 'required|string|min:4|confirmed',
        ]);

        if ($request->current_pin !== $this->currentPin()) {
            return back()->withErrors(['current_pin' => 'Current PIN is incorrect.']);
        }

        $path = storage_path($this->pinFile);
        if (!is_dir(dirname($path))) {
            mkdir(dirname($path), 0755, true);
        }
        file_put_contents($path, $request->new_pin);

        Alert::success('PIN Updated', 'The PIN was changed successfully.');

        return back();
    }

    protected function currentPin(): string
    {
        $path = storage_path($this->pinFile);

        return file_exists($path)
            ? trim(file_get_contents($path))
            : (string) config('bilalcenter.pin');
    }
}
