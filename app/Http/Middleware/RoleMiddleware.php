<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        // PASTIKAN PENGGUNA SUDAH LOGIN

        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // AMBIL ROLE PENGGUNA

        $userRole = Auth::user()->role;

        // PERIKSA HAK AKSES

        if (!in_array($userRole, $roles)) {
            abort(403, 'Anda tidak memiliki akses ke halaman ini.');
        }

        return $next($request);
    }
}