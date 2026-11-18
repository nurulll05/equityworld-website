<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class AuthController extends Controller
{
    // ==========================================
    // 1. PROSES LOGIN
    // ==========================================

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->route('home')
                ->withErrors($validator)
                ->withInput($request->only('email'))
                ->with('open_auth_modal', 'login');
        }

        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt(
            $credentials,
            $request->boolean('remember')
        )) {

            $request->session()->regenerate();

            $user = Auth::user();

            // ==========================================
            // REDIRECT BERDASARKAN ROLE
            // ==========================================

            // ROLE PELAMAR
            if ($user->role === 'pelamar') {

                return redirect()->route('pelamar.dashboard')
                    ->with('success', 'Selamat datang, ' . $user->name . '!');

            }

            // ROLE HRD
            if ($user->role === 'hrd') {

                return redirect()->route('hrd.dashboard')
                    ->with('success', 'Selamat datang, ' . $user->name . '!');

            }

            // ROLE ADMIN
            if ($user->role === 'admin') {

                return redirect()->route('admin.dashboard')
                    ->with('success', 'Selamat datang, ' . $user->name . '!');

            }

            // ==========================================
            // ROLE TIDAK DIKENALI
            // ==========================================

            Auth::logout();

            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect()->route('home')
                ->withErrors([
                    'email' => 'Role akun belum terdaftar dalam sistem.'
                ])
                ->with('open_auth_modal', 'login');
        }

        // ==========================================
        // EMAIL ATAU PASSWORD SALAH
        // ==========================================

        return redirect()->route('home')
            ->withErrors([
                'email' => 'Email atau kata sandi tidak sesuai.',
            ])
            ->withInput($request->only('email'))
            ->with('open_auth_modal', 'login');
    }


    // ==========================================
    // 2. PROSES REGISTRASI PELAMAR
    // ==========================================

    public function register(Request $request)
    {
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
                ->with('open_auth_modal', 'register');
        }

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'role' => 'pelamar',
        ]);

        // Tidak login otomatis setelah registrasi

        return redirect()->route('home')
            ->with('open_auth_modal', 'login')
            ->with(
                'success',
                'Registrasi berhasil! Silakan login menggunakan akun yang baru dibuat.'
            );
    }


    // ==========================================
    // 3. PROSES LOGOUT
    // ==========================================

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('home')
            ->with('success', 'Kamu berhasil logout.');
    }
}