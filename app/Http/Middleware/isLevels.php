<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class isLevels
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
        if (Auth::guard('petugas')->check() && !in_array(Auth::guard('petugas')->user('petugas')->level, $roles)) {
            return back()->with('error', 'Anda tidak memiliki akses halaman ini');
        }
        return $next($request);
    }
}
