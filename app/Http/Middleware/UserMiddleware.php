<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserMiddleware
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->role == 'user') {
            if (Auth::check() && Auth::user()->role === 'user') {
                return $next($request);
            }

            return redirect('login')->with('error', 'You do not have user access.');
        }

        return redirect('login');
    }
}
