<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class ProfileController extends Controller
{
    // UPDATE PROFIL PELAMAR
    public function update(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
            ],

            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('users', 'email')->ignore($user->id),
            ],

            'phone' => [
                'required',
                'string',
                'max:20',
            ],
        ], [
            'name.required' => 'Nama lengkap wajib diisi.',
            'name.max' => 'Nama maksimal 255 karakter.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah digunakan akun lain.',
            'phone.required' => 'Nomor WhatsApp wajib diisi.',
            'phone.max' => 'Nomor WhatsApp maksimal 20 karakter.',
        ]);

        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->phone = $validated['phone'];

        $user->save();

        return redirect()
            ->route('pelamar.dashboard', ['tab' => 'profil'])
            ->with('success', 'Profil berhasil diperbarui.');
    }


    // UPDATE PASSWORD PELAMAR
    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => [
                'required',
                'current_password',
            ],

            'password' => [
                'required',
                'string',
                'min:8',
                'confirmed',
            ],
        ], [
            'current_password.required' => 'Password lama wajib diisi.',
            'current_password.current_password' => 'Password lama tidak sesuai.',
            'password.required' => 'Password baru wajib diisi.',
            'password.min' => 'Password baru minimal 8 karakter.',
            'password.confirmed' => 'Konfirmasi password baru tidak cocok.',
        ]);

        $user = Auth::user();

        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()
            ->route('pelamar.dashboard', ['tab' => 'profil'])
            ->with('success', 'Password berhasil diperbarui.');
    }
 
    // MENAMPILKAN INFORMASI AKUN ADMIN
    public function adminProfile()
    {
        return view('admin.profile.index', [
            'user' => Auth::user()
        ]);
    }

    // MENAMPILKAN HALAMAN GANTI PASSWORD ADMIN
    public function adminPassword()
    {
        return view('admin.profile.password');
    }

    // PROSES GANTI PASSWORD ADMIN
    public function updateAdminPassword(Request $request)
    {
        $validated = $request->validate([
            'current_password' => [
                'required',
                'current_password',
            ],

            'password' => [
                'required',
                'confirmed',
                Password::min(8)
                    ->mixedCase()
                    ->numbers()
                    ->symbols(),
            ],
        ], [
            'current_password.required' => 'Password lama wajib diisi.',
            'current_password.current_password' => 'Password lama tidak sesuai.',
            'password.required' => 'Password baru wajib diisi.',
            'password.confirmed' => 'Konfirmasi password baru tidak cocok.',
            'password.min' => 'Password minimal 8 karakter.',
            'password.mixed' => 'Password harus memiliki huruf besar dan kecil.',
            'password.numbers' => 'Password harus memiliki angka.',
            'password.symbols' => 'Password harus memiliki simbol.',
        ]);

        $user = Auth::user();

        $user->password = Hash::make($validated['password']);
        $user->save();

        return redirect()
            ->route('admin.password')
            ->with('success', 'Password berhasil diperbarui.');
    }
}
