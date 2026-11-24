
@extends('layouts.admin')

@section('title', 'Informasi Akun')
@section('page-title', 'Informasi Akun')

@section('content')

<div class="mx-auto max-w-4xl space-y-6">

    {{-- HEADER HALAMAN --}}
    <div>
        <h3 class="text-lg font-bold text-slate-800">
            Informasi Akun
        </h3>
        <p class="mt-1 text-sm text-slate-500">
            Informasi identitas akun yang sedang digunakan.
        </p>
    </div>

    {{-- NOTIFIKASI --}}
    @if(session('success'))
        <div class="rounded-xl border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-700">
            {{ session('success') }}
        </div>
    @endif

    {{-- KARTU PROFIL --}}
    <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

        {{-- BAGIAN ATAS --}}
        <div class="bg-gradient-to-r from-blue-700 to-blue-600 px-6 py-7">
            <div class="flex flex-col items-center gap-4 sm:flex-row">

                {{-- AVATAR --}}
                <div class="flex h-20 w-20 items-center justify-center rounded-2xl border-2 border-white/30 bg-white/20 text-2xl font-bold text-white">
                    {{ strtoupper(substr($user->name, 0, 2)) }}
                </div>

                {{-- NAMA DAN ROLE --}}
                <div class="text-center sm:text-left">
                    <h4 class="text-xl font-bold text-white">
                        {{ $user->name }}
                    </h4>

                    <p class="mt-1 text-sm text-blue-100">
                        {{ $user->is_super_admin ? 'Super Administrator' : strtoupper($user->role) }}
                    </p>
                </div>

            </div>
        </div>

        {{-- INFORMASI AKUN --}}
        <div class="p-6">

            <div class="mb-5">
                <h4 class="text-sm font-bold text-slate-800">
                    Detail Informasi
                </h4>
                <p class="mt-1 text-xs text-slate-500">
                    Informasi akun ini hanya dapat dilihat.
                </p>
            </div>

            <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">

                {{-- NAMA --}}
                <div class="rounded-xl border border-slate-200 bg-slate-50 p-4">
                    <p class="text-xs font-medium text-slate-500">
                        Nama Pengguna
                    </p>
                    <p class="mt-2 break-words text-sm font-semibold text-slate-800">
                        {{ $user->name }}
                    </p>
                </div>

                {{-- EMAIL --}}
                <div class="rounded-xl border border-slate-200 bg-slate-50 p-4">
                    <p class="text-xs font-medium text-slate-500">
                        Alamat Email
                    </p>
                    <p class="mt-2 break-words text-sm font-semibold text-slate-800">
                        {{ $user->email }}
                    </p>
                </div>

                {{-- NOMOR TELEPON --}}
                <div class="rounded-xl border border-slate-200 bg-slate-50 p-4">
                    <p class="text-xs font-medium text-slate-500">
                        Nomor Telepon
                    </p>
                    <p class="mt-2 text-sm font-semibold text-slate-800">
                        {{ $user->phone ?: '-' }}
                    </p>
                </div>

                {{-- ROLE --}}
                <div class="rounded-xl border border-slate-200 bg-slate-50 p-4">
                    <p class="text-xs font-medium text-slate-500">
                        Hak Akses
                    </p>
                    <p class="mt-2 text-sm font-semibold text-slate-800">
                        {{ $user->is_super_admin ? 'Super Administrator' : strtoupper($user->role) }}
                    </p>
                </div>

                {{-- STATUS AKUN --}}
                <div class="rounded-xl border border-slate-200 bg-slate-50 p-4">
                    <p class="text-xs font-medium text-slate-500">
                        Status Akun
                    </p>
                    <div class="mt-2">
                        @if($user->is_active)
                            <span class="inline-flex items-center gap-2 rounded-full bg-green-100 px-3 py-1 text-xs font-semibold text-green-700">
                                <span class="h-2 w-2 rounded-full bg-green-500"></span>
                                Aktif
                            </span>
                        @else
                            <span class="inline-flex items-center gap-2 rounded-full bg-red-100 px-3 py-1 text-xs font-semibold text-red-700">
                                <span class="h-2 w-2 rounded-full bg-red-500"></span>
                                Nonaktif
                            </span>
                        @endif
                    </div>
                </div>

                {{-- TANGGAL REGISTRASI --}}
                <div class="rounded-xl border border-slate-200 bg-slate-50 p-4">
                    <p class="text-xs font-medium text-slate-500">
                        Tanggal Registrasi
                    </p>
                    <p class="mt-2 text-sm font-semibold text-slate-800">
                        {{ $user->created_at ? $user->created_at->format('d F Y') : '-' }}
                    </p>
                </div>

            </div>

            {{-- TOMBOL GANTI PASSWORD --}}
            <div class="mt-7 flex flex-col gap-3 border-t border-slate-200 pt-6 sm:flex-row sm:items-center sm:justify-between">

                <div>
                    <p class="text-sm font-semibold text-slate-800">
                        Keamanan Akun
                    </p>
                    <p class="mt-1 text-xs text-slate-500">
                        Perbarui password untuk menjaga keamanan akun.
                    </p>
                </div>

                <a href="{{ route('admin.password') }}"
                   class="inline-flex items-center justify-center gap-2 rounded-xl bg-orange-500 px-5 py-3 text-sm font-semibold text-white transition hover:bg-orange-600">

                    <svg class="h-4 w-4" viewBox="0 0 24 24"
                         fill="none" stroke="currentColor"
                         stroke-width="2" stroke-linecap="round"
                         stroke-linejoin="round">
                        <rect x="3" y="11" width="18" height="11" rx="2"/>
                        <path d="M7 11V7a5 5 0 0 1 10 0v4"/>
                    </svg>

                    Ganti Password
                </a>

            </div>

            {{-- TOMBOL KEMBALI KE DASHBOARD --}}
            <div class="mt-6 border-t border-slate-200 pt-5">

                <a href="{{ route('admin.dashboard') }}"
                   class="inline-flex items-center justify-center gap-2 rounded-xl border-t border-r border-b border-l border-solid border-[#aeb9c9] bg-white px-5 py-3 text-sm font-semibold text-slate-600 shadow-none transition hover:bg-slate-50">

                    <svg class="h-4 w-4"
                         viewBox="0 0 24 24"
                         fill="none"
                         stroke="currentColor"
                         stroke-width="2"
                         stroke-linecap="round"
                         stroke-linejoin="round">
                        <path d="m15 18-6-6 6-6"/>
                    </svg>

                    Kembali ke Dashboard
                </a>

            </div>

        </div>
    </div>

</div>

@endsection
