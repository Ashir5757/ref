<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckLogin
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::user() && Auth::user()->subscription_expires_at && Auth::user()->subscription_expires_at < now()) {


                return redirect('/');
            

        }

        return $next($request);
    }
}
