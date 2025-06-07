<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // <-- TAMBAHKAN INI
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // UBAH BARIS INI
        if (Auth::check() && Auth::user()->role === 'admin') {
            return $next($request);
        }
        // Jika bukan admin, arahkan ke dashboard biasa atau tampilkan error
        return redirect('/dashboard')->with('error', 'Anda tidak memiliki akses admin.');
    }
}
