<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class StudentMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if (!empty(Auth::check())) {
            // if (Auth::user()->role === 3
            // || Auth::user()->role === 2||
            //  Auth::user()->role === 1 ||
            //  ( Auth::user()->role === 4  && $user->parent_id === Auth::user()->id))
                return $next($request);
            // else {
            //     Auth::logout();
            //     return redirect(url(""));
            // }
        } else {
            Auth::logout();
            return redirect(url(""));
        }
    }
}
