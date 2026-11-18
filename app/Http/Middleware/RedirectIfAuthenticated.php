<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {

            if (Auth::guard($guard)->check()) {

                $user = Auth::guard($guard)->user();

                // ==========================================
                // ROLE PELAMAR
                // ==========================================

                if ($user->role === 'pelamar') {
                    return redirect()->route('pelamar.dashboard');
                }

                // ==========================================
                // ROLE HRD
                // ==========================================

                if ($user->role === 'hrd') {
                    return redirect()->route('hrd.dashboard');
                }

                // ==========================================
                // ROLE ADMIN
                // ==========================================

                if ($user->role === 'admin') {
                    return redirect()->route('admin.dashboard');
                }

                // ROLE TIDAK DIKENALI
                return redirect()->route('home');
            }
        }

        return $next($request);
    }
}