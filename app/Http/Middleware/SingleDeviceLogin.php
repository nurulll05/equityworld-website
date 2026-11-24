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

            // Jika akun dinonaktifkan oleh Admin, paksa logout.
            if (!$user->is_active) {
                Auth::logout();

                $request->session()->invalidate();
                $request->session()->regenerateToken();

                return redirect()->route('home')
                    ->with('error', 'Akun kamu telah dinonaktifkan. Silakan hubungi administrator.');
            }

            // Pastikan ID sesi tersedia dan cocok.
            if (
                !$user->active_session_id ||
                !hash_equals($user->active_session_id, $sessionId)
            ) {
                Auth::logout();

                $request->session()->invalidate();
                $request->session()->regenerateToken();

                return redirect()->route('home')
                    ->with('error', 'Akun Anda sedang aktif di perangkat lain atau sesi telah berakhir. Silakan login kembali.');
            }

            // Periksa batas tidak aktif selama 30 menit.
            $lastActivity = $user->active_session_last_activity;

            if (
                !$lastActivity ||
                $lastActivity->lte(now()->subMinutes(30))
            ) {

                // Hapus sesi aktif hanya jika masih milik perangkat ini.
                if ($user->active_session_id === $sessionId) {
                    $user->active_session_id = null;
                    $user->active_session_last_activity = null;
                    $user->save();
                }

                Auth::logout();

                $request->session()->invalidate();
                $request->session()->regenerateToken();

                return redirect()->route('home')
                    ->with('error', 'Sesi kamu telah berakhir karena tidak ada aktivitas selama 30 menit. Silakan login kembali.');
            }

            // Jika sesi masih aktif, perbarui waktu aktivitas.
            $user->active_session_last_activity = now();
            $user->save();
        }

        return $next($request);
    }
}
