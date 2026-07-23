<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class BilalPinGate
{
    public function handle(Request $request, Closure $next)
    {
        $confirmedAt = $request->session()->get('bilal_center.pin_confirmed_at', 0);

        if (time() - $confirmedAt >= config('bilalcenter.pin_timeout')) {
            if ($request->isMethod('get')) {
                $request->session()->put('bilal_center.intended', $request->fullUrl());
            }

            return redirect()->route('bilal-center.pin.form');
        }

        return $next($request);
    }
}
