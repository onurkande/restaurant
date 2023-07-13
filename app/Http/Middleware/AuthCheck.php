<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AuthCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::check())
        {
            if(Auth::user()->role_as == '0')
            {
                return $next($request);
            }
            else
            {
                return redirect('/dashboard-login-user')->with('status','Access Denied! as you are not as user');
            }
        }
        else
        {
            return redirect('/dashboard-login-user')->with('status','Please Login First');
        }
    }
}
