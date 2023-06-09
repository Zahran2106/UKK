<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class isPetugas
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::guard('petugas')->check() && Auth::guard('petugas')->user()->level == 'Petugas') {
            return $next($request);
        }
        return back();
    }
}
