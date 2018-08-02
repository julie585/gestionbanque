<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        switch ($guard) {
            case 'sup':
                if (Auth::guard($guard)->check()) {
                    return redirect()->route('sup.dashboard');
                }
                break;
            case 'doctor':
                if (Auth::guard($guard)->check()) {
                    return redirect()->route('doctor.dashboard');
                }
                break;
            case 'consultant':
                if (Auth::guard($guard)->check()) {
                    return redirect()->route('consultant.dashboard');
                }
                break;
            default:
                if (Auth::guard($guard)->check()) {
                    return redirect('/');
                }
                break;
        }
        return $next($request);
    }
}
