
@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-slate-50 px-4 py-10">
    <div class="w-full max-w-md rounded-2xl bg-white p-8 shadow-lg">

        <div class="mb-6 text-center">
            <h1 class="text-2xl font-bold text-blue-900">
                Reset Password
            </h1>

            <p class="mt-2 text-sm text-slate-500">
                Buat kata sandi baru untuk mengamankan akun Anda.
            </p>
        </div>

        @if ($errors->any())
            <div class="mb-4 rounded-lg bg-red-50 p-3 text-sm text-red-600">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.reset.update') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $token }}">

            <div class="mb-4">
                <label class="mb-2 block text-sm font-semibold text-slate-700">
                    Alamat Email
                </label>

                <input
                    type="email"
                    name="email"
                    value="{{ old('email', $email) }}"
                    required
                    readonly
                    class="w-full rounded-xl border border-slate-300 bg-slate-50 px-4 py-3 text-slate-600 outline-none"
                >
            </div>

            <div class="mb-4">
                <label class="mb-2 block text-sm font-semibold text-slate-700">
                    Password Baru
                </label>

                <input
                    type="password"
                    name="password"
                    required
                    minlength="8"
                    placeholder="Masukkan password baru"
                    class="w-full rounded-xl border border-slate-300 px-4 py-3 outline-none transition focus:border-blue-600 focus:ring-2 focus:ring-blue-100"
                >
            </div>

            <div class="mb-5">
                <label class="mb-2 block text-sm font-semibold text-slate-700">
                    Konfirmasi Password Baru
                </label>

                <input
                    type="password"
                    name="password_confirmation"
                    required
                    minlength="8"
                    placeholder="Ulangi password baru"
                    class="w-full rounded-xl border border-slate-300 px-4 py-3 outline-none transition focus:border-blue-600 focus:ring-2 focus:ring-blue-100"
                >
            </div>

            <div class="mb-5 rounded-lg bg-blue-50 p-3 text-xs text-blue-800">
                Password minimal 8 karakter. Pastikan konfirmasi password
                sama dengan password baru.
            </div>

            <button
                type="submit"
                class="w-full rounded-xl bg-orange-500 px-4 py-3 font-semibold text-white transition hover:bg-orange-600"
            >
                Simpan Password Baru
            </button>
        </form>

        <div class="mt-5 text-center">
            <a href="{{ route('login') }}"
               class="text-sm font-semibold text-blue-800 hover:text-orange-500">
                Kembali ke Login
            </a>
        </div>

    </div>
</div>
@endsection
