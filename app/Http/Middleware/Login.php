<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Login
{
    public function handle($request, Closure $next)
    {
        // Jika belum login
        if (!Auth::check()) {
            return redirect('/login')->with('error', 'Silakan login terlebih dahulu.');
        }

        // Jika bukan admin
        if (Auth::user()->role !== 'admin') {
            return redirect('/')->with('error', 'Akses ditolak! Anda bukan admin.');
        }

        // Jika admin, lanjut
        return $next($request);
    }
}
