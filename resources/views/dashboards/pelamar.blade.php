
@extends('layouts.app')

@section('title', 'Akun Saya | PT Equityworld Futures')

@section('content')

@php
    $activeTab = request('tab', 'profil');
    $editMode = request('mode') === 'edit';
    $user = auth()->user();
@endphp

<div class="min-h-[600px] bg-slate-50/70">
    <div class="mx-auto max-w-6xl px-4 py-10 sm:px-6 lg:px-8">

        {{-- HEADER --}}
        <div class="mb-8">
            <div class="flex items-center gap-2 text-xs font-bold uppercase tracking-[0.18em] text-orange-500">
                <span class="h-1.5 w-1.5 rounded-full bg-orange-500"></span>
                Portal Karier
            </div>

            <div class="mt-3 flex flex-col justify-between gap-3 sm:flex-row sm:items-end">
                <div>
                    <h1 class="text-3xl font-extrabold tracking-tight text-[#102B4A]">
                        Akun Saya
                    </h1>
                    <p class="mt-2 text-sm text-slate-500">
                        Kelola profil dan pantau perjalanan lamaran Anda.
                    </p>
                </div>

                <div class="text-xs font-medium text-slate-400">
                    PT Equityworld Futures
                </div>
            </div>
        </div>

        {{-- TAB NAVIGATION --}}
        <div class="mb-6 inline-flex w-full gap-1 rounded-xl border border-slate-200 bg-white p-1.5 shadow-sm sm:w-auto">

            <a href="{{ route('pelamar.dashboard', ['tab' => 'profil']) }}"
                class="{{ $activeTab === 'profil' ? 'bg-[#102B4A] text-white shadow-sm' : 'text-slate-500 hover:bg-slate-50 hover:text-[#102B4A]' }} flex flex-1 items-center justify-center gap-2 rounded-lg px-5 py-3 text-sm font-bold transition sm:flex-none">

                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path d="M20 21a8 8 0 0 0-16 0m8-10a4 4 0 1 0 0-8 4 4 0 0 0 0 8Z" stroke-width="1.8" stroke-linecap="round"/>
                </svg>

                Profil Saya
            </a>

            <a href="{{ route('pelamar.dashboard', ['tab' => 'lamaran']) }}"
                class="{{ $activeTab === 'lamaran' ? 'bg-[#102B4A] text-white shadow-sm' : 'text-slate-500 hover:bg-slate-50 hover:text-[#102B4A]' }} flex flex-1 items-center justify-center gap-2 rounded-lg px-5 py-3 text-sm font-bold transition sm:flex-none">

                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path d="M8 7V3m8 4V3M4 11h16M5 5h14a1 1 0 0 1 1 1v14H4V6a1 1 0 0 1 1-1Z" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>

                Status Lamaran
            </a>
        </div>

        {{-- TAB PROFIL --}}
        @if ($activeTab === 'profil')

            <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

                {{-- PROFILE HERO --}}
                <div class="relative overflow-hidden bg-[#102B4A] px-6 py-8 sm:px-8">
                    <div class="absolute -right-10 -top-16 h-52 w-52 rounded-full border-[25px] border-white/5"></div>
                    <div class="absolute -bottom-24 right-36 h-48 w-48 rounded-full bg-orange-500/10"></div>

                    <div class="relative flex flex-col gap-5 sm:flex-row sm:items-center">

                        <div class="flex h-20 w-20 shrink-0 items-center justify-center rounded-2xl border-2 border-white/20 bg-white/10 text-3xl font-extrabold text-white shadow-lg">
                            {{ strtoupper(substr($user->name, 0, 1)) }}
                        </div>

                        <div class="min-w-0">
                            <p class="text-xs font-semibold uppercase tracking-widest text-orange-300">
                                Profil Pelamar
                            </p>

                            <h2 class="mt-2 break-words text-2xl font-extrabold text-white">
                                {{ $user->name }}
                            </h2>

                            <p class="mt-1 break-all text-sm text-blue-100">
                                {{ $user->email }}
                            </p>
                        </div>

                        <div class="sm:ml-auto">
                            <span class="inline-flex items-center gap-2 rounded-full border border-white/15 bg-white/10 px-3 py-2 text-xs font-semibold text-white">
                                <span class="h-2 w-2 rounded-full bg-emerald-400"></span>
                                Akun Aktif
                            </span>
                        </div>

                    </div>
                </div>
                
                {{-- PROFILE DETAILS --}}
                <div class="p-6 sm:p-8">

                    {{-- NOTIFIKASI --}}
                    @if (session('success'))
                        <div class="mb-5 rounded-xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm font-medium text-emerald-700">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="mb-5 rounded-xl border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700">
                            <p class="mb-1 font-bold">Periksa kembali data Anda:</p>
                            <ul class="list-inside list-disc">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if (!$editMode)

                        {{-- MODE LIHAT PROFIL --}}
                        <div class="mb-6 flex flex-col justify-between gap-3 sm:flex-row sm:items-center">
                            <div>
                                <h3 class="text-base font-extrabold text-[#102B4A]">
                                    Informasi Pribadi
                                </h3>
                                <p class="mt-1 text-sm text-slate-500">
                                    Informasi dasar yang terdaftar pada akun Anda.
                                </p>
                            </div>

                            <a href="{{ route('pelamar.dashboard', ['tab' => 'profil', 'mode' => 'edit']) }}"
                                class="inline-flex items-center justify-center gap-2 rounded-lg bg-[#102B4A] px-5 py-3 text-sm font-bold text-white transition hover:bg-orange-500">

                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path d="m16 4 4 4M4 20l4-.8L19 8a2.8 2.8 0 0 0-4-4L4 15v5Z"
                                        stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>

                                Edit Profil
                            </a>
                        </div>

                        <div class="grid gap-4 sm:grid-cols-2">

                            <div class="rounded-xl border border-slate-100 bg-slate-50/80 p-5">
                                <p class="text-xs text-slate-500">Nama Lengkap</p>
                                <p class="mt-2 break-words text-sm font-bold text-[#102B4A]">
                                    {{ $user->name }}
                                </p>
                            </div>

                            <div class="rounded-xl border border-slate-100 bg-slate-50/80 p-5">
                                <p class="text-xs text-slate-500">Alamat Email</p>
                                <p class="mt-2 break-all text-sm font-bold text-[#102B4A]">
                                    {{ $user->email }}
                                </p>
                            </div>

                            <div class="rounded-xl border border-slate-100 bg-slate-50/80 p-5">
                                <p class="text-xs text-slate-500">Nomor WhatsApp</p>
                                <p class="mt-2 text-sm font-bold text-[#102B4A]">
                                    {{ $user->phone ?? '-' }}
                                </p>
                            </div>

                            <div class="rounded-xl border border-slate-100 bg-slate-50/80 p-5">
                                <p class="text-xs text-slate-500">Jenis Akun</p>
                                <p class="mt-2 text-sm font-bold text-[#102B4A]">
                                    Pelamar
                                </p>
                            </div>

                        </div>

                        <div class="mt-6 rounded-xl border border-orange-100 bg-orange-50/60 p-4">
                            <div class="flex items-start gap-3">
                                <span class="text-lg">ℹ️</span>
                                <p class="text-xs leading-relaxed text-slate-600">
                                    Pastikan informasi akun Anda selalu benar dan dapat dihubungi untuk memudahkan proses komunikasi selama seleksi.
                                </p>
                            </div>
                        </div>

                    @else

                        {{-- MODE EDIT PROFIL --}}
                        <div class="mb-6">
                            <h3 class="text-base font-extrabold text-[#102B4A]">
                                Edit Informasi Profil
                            </h3>
                            <p class="mt-1 text-sm text-slate-500">
                                Perbarui informasi pribadi Anda melalui formulir berikut.
                            </p>
                        </div>

                        <form action="{{ route('pelamar.profile.update') }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="grid gap-5 sm:grid-cols-2">

                                <div>
                                    <label for="name" class="mb-2 block text-sm font-semibold text-slate-700">
                                        Nama Lengkap
                                    </label>
                                    <input
                                        type="text"
                                        id="name"
                                        name="name"
                                        value="{{ old('name', $user->name) }}"
                                        required
                                        maxlength="255"
                                        class="block w-full rounded-xl border-2 border-solid border-slate-300 bg-white px-4 py-3 text-sm text-slate-800 shadow-none outline-none ring-0 transition focus:border-orange-400 focus:ring-0"
                                    >
                                    @error('name')
                                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="email" class="mb-2 block text-sm font-semibold text-slate-700">
                                        Alamat Email
                                    </label>
                                    <input
                                        type="email"
                                        id="email"
                                        name="email"
                                        value="{{ old('email', $user->email) }}"
                                        required
                                        maxlength="255"
                                        class="block w-full rounded-xl border-2 border-solid border-slate-300 bg-white px-4 py-3 text-sm text-slate-800 shadow-none outline-none ring-0 transition focus:border-orange-400 focus:ring-0"
                                    >
                                    @error('email')
                                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="sm:col-span-2">
                                    <label for="phone" class="mb-2 block text-sm font-semibold text-slate-700">
                                        Nomor WhatsApp
                                    </label>
                                    <input
                                        type="tel"
                                        id="phone"
                                        name="phone"
                                        value="{{ old('phone', $user->phone) }}"
                                        required
                                        maxlength="20"
                                        class="block w-full rounded-xl border-2 border-solid border-slate-300 bg-white px-4 py-3 text-sm text-slate-800 shadow-none outline-none ring-0 transition focus:border-orange-400 focus:ring-0"
                                    >
                                    @error('phone')
                                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                            </div>

                            <div class="mt-8 flex flex-col-reverse gap-3 border-t border-slate-100 pt-6 sm:flex-row sm:justify-end">

                                <a href="{{ route('pelamar.dashboard', ['tab' => 'profil']) }}"
                                    class="rounded-lg border border-slate-200 px-5 py-3 text-center text-sm font-bold text-slate-600 transition hover:bg-slate-50">
                                    Batal
                                </a>

                                <button type="submit"
                                    class="inline-flex items-center justify-center rounded-lg border border-[#102B4A] bg-[#102B4A] px-6 py-3 text-sm font-bold text-white shadow-none outline-none transition hover:border-orange-500 hover:bg-orange-500 focus:ring-2 focus:ring-orange-200">
                                    Simpan Perubahan
                                </button>

                            </div>
                        </form>

                    @endif

                </div>
            </div>
        
        {{-- KEAMANAN AKUN DAN LOGOUT --}}
        @if (!$editMode)

            {{-- KEAMANAN AKUN --}}
            <div class="mt-6 overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

                <div class="border-b border-slate-100 px-6 py-5 sm:px-8">
                    <div class="flex items-center gap-3">
                        <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-blue-50 text-[#102B4A]">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path d="M12 3 4 7v5c0 5 3.5 8 8 9 4.5-1 8-4 8-9V7l-8-4Z"
                                    stroke-width="1.8" stroke-linejoin="round"/>
                            </svg>
                        </div>

                        <div>
                            <h3 class="text-base font-extrabold text-[#102B4A]">
                                Keamanan Akun
                            </h3>
                            <p class="mt-1 text-sm text-slate-500">
                                Kelola kata sandi untuk menjaga keamanan akun Anda.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="p-6 sm:p-8">

                    <div class="mb-6">
                        <h4 class="text-sm font-bold text-[#102B4A]">
                            Ganti Kata Sandi
                        </h4>
                        <p class="mt-1 text-xs text-slate-500">
                            Gunakan kata sandi yang kuat dan tidak mudah ditebak.
                        </p>
                    </div>

                    <form action="{{ route('pelamar.password.update') }}" method="POST">
                        @csrf
                        @method('PUT')

                        {{-- TIGA KOLOM PASSWORD --}}
                        <div class="grid grid-cols-1 gap-5 md:grid-cols-3">

                            {{-- PASSWORD LAMA --}}
                            <div>
                                <label for="current_password" class="mb-2 block text-sm font-semibold text-slate-700">
                                    Kata Sandi Lama
                                </label>

                                <div class="relative">
                                    <input
                                        type="password"
                                        id="current_password"
                                        name="current_password"
                                        autocomplete="current-password"
                                        required
                                        class="block w-full rounded-xl border-2 border-solid border-slate-300 bg-white px-4 py-3 pr-12 text-sm text-slate-800 outline-none transition focus:border-orange-400 focus:ring-0"
                                        placeholder="Masukkan kata sandi lama"
                                    >

                                    <button
                                        type="button"
                                        onclick="togglePassword('current_password', this)"
                                        class="absolute inset-y-0 right-0 flex items-center justify-center border-0 bg-transparent px-4 text-slate-300 outline-none transition-colors"
                                        aria-label="Tampilkan kata sandi"
                                    >
                                        <svg
                                            class="h-5 w-5"
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24"
                                        >
                                            <path
                                                d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7S2 12 2 12Z"
                                                stroke-width="1.8"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                            />
                                            <circle cx="12" cy="12" r="3" stroke-width="1.8"/>
                                        </svg>
                                    </button>
                                </div>

                                @error('current_password')
                                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                         
                            {{-- PASSWORD BARU --}}
                            <div>
                                <label for="password" class="mb-2 block text-sm font-semibold text-slate-700">
                                    Kata Sandi Baru
                                </label>

                                <div class="relative">
                                    <input
                                        type="password"
                                        id="password"
                                        name="password"
                                        autocomplete="new-password"
                                        minlength="8"
                                        required
                                        class="block w-full rounded-xl border-2 border-solid border-slate-300 bg-white px-4 py-3 pr-12 text-sm text-slate-800 outline-none transition focus:border-orange-400 focus:ring-0"
                                        placeholder="Masukkan kata sandi baru"
                                    >

                                    <button
                                        type="button"
                                        onclick="togglePassword('password', this)"
                                        class="absolute inset-y-0 right-0 flex items-center justify-center border-0 bg-transparent px-4 text-slate-300 outline-none transition-colors"
                                        aria-label="Tampilkan kata sandi"
                                    >
                                        <svg
                                            class="h-5 w-5"
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24"
                                        >
                                            <path
                                                d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7S2 12 2 12Z"
                                                stroke-width="1.8"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                            />
                                            <circle cx="12" cy="12" r="3" stroke-width="1.8"/>
                                        </svg>
                                    </button>
                                </div>

                                {{-- INDIKATOR PASSWORD --}}
                                <div id="passwordGuide" class="mt-3 hidden rounded-lg bg-slate-50 p-3">

                                    <div class="mb-2 flex items-center justify-between">
                                        <span class="text-xs font-semibold text-slate-600">
                                            Kekuatan kata sandi
                                        </span>

                                        <span id="passwordStrength" class="text-xs font-bold text-slate-400">
                                            Belum diisi
                                        </span>
                                    </div>

                                    <div class="mb-3 flex gap-1">
                                        <div id="strength1" class="h-1.5 flex-1 rounded-full bg-slate-200"></div>
                                        <div id="strength2" class="h-1.5 flex-1 rounded-full bg-slate-200"></div>
                                        <div id="strength3" class="h-1.5 flex-1 rounded-full bg-slate-200"></div>
                                        <div id="strength4" class="h-1.5 flex-1 rounded-full bg-slate-200"></div>
                                    </div>

                                    <p class="mb-2 text-xs font-semibold text-slate-600">
                                        Persyaratan kata sandi:
                                    </p>

                                    <ul class="space-y-1 text-xs">
                                        <li id="ruleLength" class="text-slate-400">○ Minimal 8 karakter</li>
                                        <li id="ruleUpper" class="text-slate-400">○ Mengandung huruf besar</li>
                                        <li id="ruleLower" class="text-slate-400">○ Mengandung huruf kecil</li>
                                        <li id="ruleNumber" class="text-slate-400">○ Mengandung angka</li>
                                        <li id="ruleSymbol" class="text-slate-400">○ Mengandung simbol</li>
                                    </ul>
                                </div>

                                @error('password')
                                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        
                            {{-- KONFIRMASI PASSWORD --}}
                            <div>
                                <label for="password_confirmation" class="mb-2 block text-sm font-semibold text-slate-700">
                                    Konfirmasi Kata Sandi Baru
                                </label>

                                <div class="relative">
                                    <input
                                        type="password"
                                        id="password_confirmation"
                                        name="password_confirmation"
                                        autocomplete="new-password"
                                        minlength="8"
                                        required
                                        class="block w-full rounded-xl border-2 border-solid border-slate-300 bg-white px-4 py-3 pr-12 text-sm text-slate-800 outline-none transition focus:border-orange-400 focus:ring-0"
                                        placeholder="Ulangi kata sandi baru"
                                    >

                                    <button
                                        type="button"
                                        onclick="togglePassword('password_confirmation', this)"
                                        class="absolute inset-y-0 right-0 flex items-center justify-center border-0 bg-transparent px-4 text-slate-300 outline-none transition-colors"
                                        aria-label="Tampilkan kata sandi"
                                    >
                                        <svg
                                            class="h-5 w-5"
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24"
                                        >
                                            <path
                                                d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7S2 12 2 12Z"
                                                stroke-width="1.8"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                            />
                                            <circle cx="12" cy="12" r="3" stroke-width="1.8"/>
                                        </svg>
                                    </button>
                                </div>

                                <p id="passwordMatch" class="mt-2 hidden text-xs"></p>
                            </div>

                        </div>

                        {{-- TOMBOL SIMPAN --}}
                        <div class="mt-8 flex justify-center border-t border-slate-100 pt-6">
                            <button
                                type="submit"
                                class="inline-flex items-center justify-center rounded-lg border border-[#102B4A] bg-[#102B4A] px-6 py-3 text-sm font-bold text-white transition hover:border-orange-500 hover:bg-orange-500"
                            >
                                Simpan Kata Sandi Baru
                                
                            </button>
                        </div>

                    </form>

                </div>
            </div>

            {{-- LOGOUT --}}
            <div class="mt-6 flex justify-end rounded-2xl border border-red-100 bg-white p-5 shadow-sm sm:px-8">
                <form action="{{ route('logout') }}" method="POST"
                    onsubmit="return confirm('Apakah Anda yakin ingin keluar dari akun?')">
                    @csrf

                    <button
                        type="submit"
                        class="inline-flex items-center justify-center gap-2 rounded-lg border border-red-200 bg-white px-5 py-3 text-sm font-bold text-red-600 transition hover:border-red-500 hover:bg-red-50"
                    >
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path d="M10 17l5-5-5-5M15 12H3m9-9h7a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-7"
                                stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        Logout
                    </button>
                </form>
            </div>

        @endif

        {{-- TAB STATUS LAMARAN --}}
        @elseif ($activeTab === 'lamaran')

            <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm sm:p-8">

                <div class="mb-7">
                    <p class="text-xs font-bold uppercase tracking-widest text-orange-500">
                        Riwayat Pendaftaran
                    </p>

                    <h2 class="mt-2 text-xl font-extrabold text-[#102B4A]">
                        Status Lamaran Saya
                    </h2>

                    <p class="mt-1 text-sm text-slate-500">
                        Informasi perkembangan proses seleksi lamaran Anda.
                    </p>
                </div>

                <div class="rounded-2xl border border-dashed border-slate-200 bg-slate-50 px-5 py-12 text-center">

                    <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-2xl bg-orange-100 text-orange-600">
                        <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path d="M7 3h7l5 5v13H5V3h2Zm7 0v5h5M8 13h8M8 17h8" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>

                    <h3 class="mt-5 text-base font-extrabold text-[#102B4A]">
                        Belum Ada Lamaran
                    </h3>

                    <p class="mx-auto mt-2 max-w-md text-sm leading-relaxed text-slate-500">
                        Anda belum memiliki riwayat lamaran. Silakan jelajahi lowongan Staff atau program Magang yang tersedia.
                    </p>

                    <a href="{{ route('careers') }}"
                        class="mt-6 inline-flex items-center gap-2 rounded-lg bg-[#102B4A] px-5 py-3 text-sm font-bold text-white shadow-sm transition hover:bg-orange-500">
                        Jelajahi Lowongan
                        <span>→</span>
                    </a>

                </div>

            </div>

        @else

            <script>
                window.location.replace("{{ route('pelamar.dashboard', ['tab' => 'profil']) }}");
            </script>

        @endif

    </div>
</div>


<script>
document.addEventListener('DOMContentLoaded', function () {
    const password = document.getElementById('password');
    const confirmation = document.getElementById('password_confirmation');
    const guide = document.getElementById('passwordGuide');

    if (!password || !guide) return;

    const rules = {
        length: value => value.length >= 8,
        upper: value => /[A-Z]/.test(value),
        lower: value => /[a-z]/.test(value),
        number: value => /[0-9]/.test(value),
        symbol: value => /[^A-Za-z0-9]/.test(value)
    };

    const ruleElements = {
        length: document.getElementById('ruleLength'),
        upper: document.getElementById('ruleUpper'),
        lower: document.getElementById('ruleLower'),
        number: document.getElementById('ruleNumber'),
        symbol: document.getElementById('ruleSymbol')
    };

    const strengthText = document.getElementById('passwordStrength');

    password.addEventListener('focus', function () {
        guide.classList.remove('hidden');
    });

    password.addEventListener('input', function () {
        const value = password.value;

        guide.classList.toggle('hidden', value.length === 0);

        let score = 0;

        Object.keys(rules).forEach(key => {
            const passed = rules[key](value);

            if (passed) score++;

            ruleElements[key].textContent =
                (passed ? '✓ ' : '○ ') +
                ({
                    length: 'Minimal 8 karakter',
                    upper: 'Mengandung huruf besar',
                    lower: 'Mengandung huruf kecil',
                    number: 'Mengandung angka',
                    symbol: 'Mengandung simbol'
                })[key];

            ruleElements[key].className = passed
                ? 'text-green-600'
                : 'text-slate-400';
        });

        const labels = [
            'Lemah',
            'Lemah',
            'Sedang',
            'Kuat',
            'Sangat Kuat',
            'Sangat Kuat'
        ];

        strengthText.textContent = value.length
            ? labels[score]
            : 'Belum diisi';

        strengthText.className = 'text-xs font-bold ' +
            (score <= 2 ? 'text-red-600' :
            score === 3 ? 'text-orange-500' : 'text-green-600');

        for (let i = 1; i <= 4; i++) {
            const bar = document.getElementById('strength' + i);

            bar.className = 'h-1.5 flex-1 rounded-full ' +
                (i <= score
                    ? (score <= 2 ? 'bg-red-500' :
                       score === 3 ? 'bg-orange-400' : 'bg-green-500')
                    : 'bg-slate-200');
        }

        checkPasswordMatch();
    });

    function checkPasswordMatch() {
        if (!confirmation || !confirmation.value) return;

        const match = document.getElementById('passwordMatch');
        match.classList.remove('hidden');

        if (password.value === confirmation.value) {
            match.textContent = '✓ Konfirmasi kata sandi sesuai.';
            match.className = 'mt-2 text-xs text-green-600';
        } else {
            match.textContent = '✕ Konfirmasi kata sandi belum sesuai.';
            match.className = 'mt-2 text-xs text-red-600';
        }
    }

    if (confirmation) {
        confirmation.addEventListener('input', checkPasswordMatch);
    }
});

// TAMBAHKAN FUNGSI TOGGLE PASSWORD DI SINI
function togglePassword(inputId, button) {
    const input = document.getElementById(inputId);

    if (!input) return;

    const isHidden = input.type === 'password';

    // Ubah kondisi password
    input.type = isHidden ? 'text' : 'password';

    // Ubah warna ikon sesuai kondisi password
    button.style.color = isHidden ? '#F97316' : '#CBD5E1';

    // Ubah keterangan aksesibilitas
    button.setAttribute(
        'aria-label',
        isHidden ? 'Sembunyikan kata sandi' : 'Tampilkan kata sandi'
    );
}
</script>

@endsection
