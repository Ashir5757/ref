<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckLogout
{
    public function handle($request, Closure $next)
    {

        if (!Auth::user()) {
            return redirect('/login');
        }

        return $next($request);
    }
}
