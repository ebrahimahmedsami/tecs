<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CkeckIfBlocked
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
        if (auth()->user()->clinic){
            if(auth()->user()->clinic->is_blocked){
                auth()->logout();
                return back()->with(['error'=>__('dashboard.clinic_blocked')]);
            };
        }
        return $next($request);
    }
}
