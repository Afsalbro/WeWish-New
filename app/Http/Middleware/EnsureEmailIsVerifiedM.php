<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class EnsureEmailIsVerifiedM
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(!isset(Auth::user()->id)){
            return redirect()->intended('login')->with('error','oops! your session expired plaese login to countinue!');
        }
        if(!isset(Auth::user()->email_verified_at)){
            return redirect()->intended('/')->with('error','Please check your email to verify your account as you are not yet verified.');
        }
        return $next($request);
    }
}
