<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SingleDeviceLogin
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {

            $user = Auth::user();
            $sessionId = $request->session()->getId();

            // Jika sesi tidak tercatat, wajib login kembali.
            if (!$user->active_session_id) {

                Auth::logout();

                $request->session()->invalidate();
                $request->session()->regenerateToken();

                return redirect()->route('home')
                    ->with('error',
                        'Sesi Anda tidak valid. Silakan login kembali.'
                    );
            }

            // Jika ID sesi berbeda, tolak perangkat tersebut.
            if (!hash_equals(
                $user->active_session_id,
                $sessionId
            )) {

                Auth::logout();

                $request->session()->invalidate();
                $request->session()->regenerateToken();

                return redirect()->route('home')
                    ->with('error',
                        'Akun Anda sedang aktif di perangkat lain. Silakan logout terlebih dahulu dari perangkat tersebut.'
                    );
            }

            // Jika ID sesi cocok, perbarui aktivitas.
            $user->active_session_last_activity = now();
            $user->save();
        }

        return $next($request);
    }
}
