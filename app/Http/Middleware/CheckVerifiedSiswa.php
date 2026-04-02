<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckVerifiedSiswa
{
    /**
    * Handle an incoming request.
    *
    * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
    */
    public function handle($request, Closure $next) {
        if (auth('siswa')->check() && !auth('siswa')->user()->is_verified) {
            return redirect()->route('siswa.verify.show', auth('siswa')->id());
        }

        return $next($request);
    }
}