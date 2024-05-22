<?php

namespace App\Http\Middleware;

use Closure;
use Carbon\Carbon;
use App\Models\PaymentModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckSubscription
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        $user = Auth::user();

        if ($user && $user->subscription_expires_at && Carbon::now()->gte($user->subscription_expires_at)) {;
          Auth::logout();
            return redirect()->route('pricing')->with('error', 'Your subscription has expired. Please renew your subscription to continue accessing our services..');
        }

        return $next($request);
    }
}
