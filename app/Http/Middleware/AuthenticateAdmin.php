<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthenticateAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // 1. Periksa apakah pengguna sudah login menggunakan guard 'admin'
        if (! Auth::guard('admin')->check()) {
            // 2. Jika tidak, alihkan (redirect) ke halaman login admin
            return redirect()->route('admin.login');
        }

        // 3. Jika sudah login, lanjutkan request ke tujuan berikutnya
        return $next($request);
    }
}
