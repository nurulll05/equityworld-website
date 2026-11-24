
@extends('layouts.app')

@section('content')
<div class="w-full flex items-center justify-center bg-slate-50 px-4 py-10">

    <div class="w-full max-w-md rounded-2xl border border-slate-200 bg-white p-8 shadow-lg">

        <div class="mb-6 text-center">
            <h1 class="text-2xl font-bold text-blue-900">
                Lupa Kata Sandi?
            </h1>

            <p class="mt-2 text-sm leading-relaxed text-slate-500">
                Masukkan email yang terdaftar untuk mendapatkan
                tautan pemulihan kata sandi.
            </p>
        </div>

        @if (session('status'))
            <div class="mb-4 rounded-lg border border-green-200 bg-green-50 p-3 text-sm text-green-700">
                Permintaan reset kata sandi berhasil diproses.
                Silakan periksa email Anda untuk mendapatkan tautan pemulihan.
            </div>
        @endif

        @if ($errors->any())
            <div class="mb-4 rounded-lg border border-red-200 bg-red-50 p-3 text-sm text-red-600">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="mb-5">
                <label class="mb-2 block text-sm font-semibold text-slate-700">
                    Alamat Email
                </label>

                <input
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    required
                    autofocus
                    placeholder="Masukkan email terdaftar"
                    class="w-full rounded-xl border border-solid border-[#aeb9c9] bg-white px-4 py-3 text-slate-700 outline-none transition focus:border-blue-600 focus:ring-2 focus:ring-blue-100"
                >
            </div>

            <button
                type="submit"
                class="w-full rounded-xl border border-orange-600 bg-orange-500 px-4 py-3 font-semibold text-white shadow-none transition hover:bg-orange-600"
            >
                Kirim Link Reset Password
            </button>
        </form>

        <div class="mt-5 text-center">
            <a href="{{ route('login') }}"
               class="text-sm font-semibold text-blue-800 transition hover:text-orange-500">
                Kembali ke Login
            </a>
        </div>

    </div>
</div>
@endsection
