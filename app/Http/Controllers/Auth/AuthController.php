<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\RateLimiter;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Carbon;

class AuthController extends Controller
{
  
    // 1. PROSES LOGIN
    public function login(Request $request)
    {
        $authContext = $request->input('auth_context') === 'application'
            ? 'application'
            : 'general';

        $validator = Validator::make($request->all(), [
            'email' => 'required|email|max:255',
            'password' => 'required|string',
        ], [
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.max' => 'Email tidak boleh lebih dari 255 karakter.',
            'password.required' => 'Kata sandi wajib diisi.',
            'password.string' => 'Format kata sandi tidak valid.',
        ]);

        if ($validator->fails()) {
            return redirect()->route('home')
                ->withErrors($validator)
                ->withInput($request->only('email'))
                ->with('open_auth_modal', 'login')
                ->with('auth_context', $authContext);
        }

        $key = 'login:' . strtolower($request->email)
            . '|' . $request->ip();

        if (RateLimiter::tooManyAttempts($key, 3)) {
            $minutes = ceil(RateLimiter::availableIn($key) / 60);

            return redirect()->route('home')
                ->withErrors([
                    'email' => "Terlalu banyak percobaan login. Silakan coba kembali dalam {$minutes} menit."
                ])
                ->withInput($request->only('email'))
                ->with('open_auth_modal', 'login')
                ->with('auth_context', $authContext);
        }

        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];
    
        if (Auth::validate($credentials)) {

            // Ambil data akun tanpa membuat sesi login baru.
            $user = User::where('email', $request->email)->first();

            // Periksa status akun.
            if (!$user->is_active) {
                return redirect()->route('home')
                    ->withErrors([
                        'email' => 'Akun kamu sedang dinonaktifkan. Silakan hubungi administrator.'
                    ])
                    ->withInput($request->only('email'))
                    ->with('open_auth_modal', 'login')
                    ->with('auth_context', $authContext);
            }

            // Periksa apakah akun masih aktif di perangkat lain.
            // Sesi dianggap tidak aktif jika tidak ada aktivitas selama 30 menit.
            $deviceIsActive = $user->active_session_id
                && $user->active_session_id !== $request->session()->getId()
                && $user->active_session_last_activity
                && Carbon::parse($user->active_session_last_activity)
                    ->gt(now()->subMinutes(30));

            if ($deviceIsActive) {
                return redirect()->route('home')
                    ->withErrors([
                        'email' => 'Akun ini sedang aktif di perangkat lain. Silakan logout terlebih dahulu dari perangkat tersebut.'
                    ])
                    ->withInput($request->only('email'))
                    ->with('open_auth_modal', 'login')
                    ->with('auth_context', $authContext);
            }

            // Login hanya jika tidak ada perangkat aktif.
            Auth::login($user, $request->boolean('remember'));

            RateLimiter::clear($key);

            // Regenerasi sesi cukup satu kali.
            $request->session()->regenerate();

            // Simpan ID sesi setelah regenerasi.
            $user->active_session_id = $request->session()->getId();
            $user->active_session_last_activity = now();
            $user->save();

            $user = Auth::user();

            if ($user->role === 'pelamar') {

                if ($authContext === 'application') {
                    return redirect()->intended(route('careers'))
                        ->with('success', 'Selamat datang, ' . $user->name . '!');
                }

                $request->session()->forget('url.intended');

                return redirect()->route('pelamar.dashboard')
                    ->with('success', 'Selamat datang, ' . $user->name . '!');
            }

            if ($user->role === 'hrd') {
                return redirect()->route('hrd.dashboard')
                    ->with('success', 'Selamat datang, ' . $user->name . '!');
            }

            if ($user->role === 'admin') {
                return redirect()->route('admin.dashboard')
                    ->with('success', 'Selamat datang, ' . $user->name . '!');
            }

            $user->active_session_id = null;
            $user->active_session_last_activity = null;
            $user->save();

            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect()->route('home')
                ->withErrors([
                    'email' => 'Role akun belum terdaftar dalam sistem.'
                ])
                ->with('open_auth_modal', 'login')
                ->with('auth_context', $authContext);
        }

        RateLimiter::hit($key, 900);

        if (RateLimiter::tooManyAttempts($key, 3)) {
            return redirect()->route('home')
                ->withErrors([
                    'email' => 'Anda telah salah memasukkan kata sandi sebanyak 3 kali. Login dikunci selama 15 menit.'
                ])
                ->withInput($request->only('email'))
                ->with('open_auth_modal', 'login')
                ->with('auth_context', $authContext);
        }

        return redirect()->route('home')
            ->withErrors([
                'email' => 'Email atau kata sandi tidak sesuai.'
            ])
            ->withInput($request->only('email'))
            ->with('open_auth_modal', 'login')
            ->with('auth_context', $authContext);
    }

    // 2. PROSES REGISTRASI PELAMAR
    public function register(Request $request)
    {
        $authContext = $request->input('auth_context') === 'application'
            ? 'application'
            : 'general';

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'phone' => 'required|string|max:20',
            'password' => 'required|string|min:8|confirmed',
            'agreement' => 'accepted',
        ]);

        if ($validator->fails()) {
            return redirect()->route('home')
                ->withErrors($validator)
                ->withInput($request->only('name', 'email', 'phone'))
                ->with('open_auth_modal', 'register')
                ->with('auth_context', $authContext);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'role' => 'pelamar',
        ]);

        return redirect()->route('home')
            ->with('open_auth_modal', 'login')
            ->with('auth_context', $authContext)
            ->with(
                'success',
                'Registrasi berhasil! Silakan login menggunakan akun yang telah dibuat.'
            );
        }

    // 3. PROSES LOGOUT
    public function logout(Request $request)
    {
        $user = Auth::user();

        // Hapus sesi aktif hanya jika ID sesi cocok.
        if (
            $user &&
            $user->active_session_id &&
            hash_equals(
                $user->active_session_id,
                $request->session()->getId()
            )
        ) {
            $user->active_session_id = null;
            $user->active_session_last_activity = null;
            $user->save();
        }

        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home')
            ->with('success', 'Kamu berhasil logout.');
    }

}