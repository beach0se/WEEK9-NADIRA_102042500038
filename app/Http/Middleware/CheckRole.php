<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    public function handle(Request $request, Closure $next, string ...$roles): Response
    {
        // 1. Pastikan pengguna sudah login
        if (!$request->user()) {
            return redirect()->route('login');
        }

        // 2 dan 3. Bandingkan role dengan daftar yang diizinkan, tolak jika tidak cocok
        if (!in_array($request->user()->role, $roles, true)) {
            abort(403, 'Anda tidak memiliki hak akses!');
        }

        // 4. Lolos, teruskan request
        return $next($request);
    }
}