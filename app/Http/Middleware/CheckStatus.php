<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if( ((auth()->user()->type != "admin" || auth()->user()->type != "writer" || auth()->user()->type != "superadmin") && auth()->user()->status != "active") ){
            //dd(5);
            Auth::logout();
            return redirect()->route('login');
        }
        return $next($request);
    }
}
