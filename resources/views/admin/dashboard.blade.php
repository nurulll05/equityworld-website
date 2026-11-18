
@extends('layouts.admin')

@section('title', 'Dashboard Admin')
@section('page-title', 'Dashboard Admin')

@section('content')

    <!-- Welcome Banner -->
    <section class="mb-6 rounded-xl bg-gradient-to-r from-[#080f20] to-[#142747] p-6 text-white shadow-lg md:p-8">

        <span class="inline-block rounded-full bg-orange-500/20 px-3 py-1 text-[9px] font-bold tracking-wider text-orange-400">
            PT. EQUITYWORLD FUTURES
        </span>

        <h1 class="mt-3 text-2xl font-bold md:text-3xl">
            Selamat Datang, Administrator
        </h1>

        <p class="mt-2 max-w-2xl text-xs leading-relaxed text-slate-300">
            Sistem pengelolaan website dan rekrutmen PT. Equityworld Futures.
            Pantau aktivitas operasional, data pelamar, dan keamanan sistem
            melalui dashboard administrator.
        </p>

    </section>


    <!-- STATISTICS -->
    <section class="mb-6 grid grid-cols-1 gap-4 sm:grid-cols-2 xl:grid-cols-3">

        <!-- Total User -->
        <div class="rounded-xl bg-white p-5 shadow-sm">
            <div class="flex items-start justify-between">
                <div>
                    <p class="text-[10px] font-semibold uppercase tracking-wider text-slate-400">
                        Total User Aktif
                    </p>

                    <h3 class="mt-2 text-2xl font-bold text-slate-800">
                        {{ $statistics['total_users'] }}
                        <span class="text-sm font-medium">Users</span>
                    </h3>

                    <p class="mt-2 text-[10px] text-emerald-600">
                        Sistem pengguna
                    </p>
                </div>

                <div class="rounded-lg bg-blue-50 p-3 text-lg text-blue-600">
                    ♟
                </div>
            </div>
        </div>


        <!-- Artikel Berita -->
        <div class="rounded-xl bg-white p-5 shadow-sm">
            <div class="flex items-start justify-between">
                <div>
                    <p class="text-[10px] font-semibold uppercase tracking-wider text-slate-400">
                        Artikel Berita
                    </p>

                    <h3 class="mt-2 text-2xl font-bold text-slate-800">
                        {{ $statistics['total_news'] }}
                        <span class="text-sm font-medium">Konten</span>
                    </h3>

                    <p class="mt-2 text-[10px] text-slate-500">
                        Konten website utama
                    </p>
                </div>

                <div class="rounded-lg bg-purple-50 p-3 text-lg text-purple-600">
                    ▤
                </div>
            </div>
        </div>


        <!-- Submisi Pelamar -->
        <div class="rounded-xl bg-white p-5 shadow-sm">
            <div class="flex items-start justify-between">
                <div>
                    <p class="text-[10px] font-semibold uppercase tracking-wider text-slate-400">
                        Submisi Pelamar
                    </p>

                    <h3 class="mt-2 text-2xl font-bold text-slate-800">
                        {{ $statistics['total_applicants'] }}
                        <span class="text-sm font-medium">Berkas</span>
                    </h3>

                    <p class="mt-2 text-[10px] text-blue-600">
                        Staff & Magang
                    </p>
                </div>

                <div class="rounded-lg bg-orange-50 p-3 text-lg text-orange-600">
                    ▣
                </div>
            </div>
        </div>


        <!-- Keamanan -->
        <div class="rounded-xl bg-white p-5 shadow-sm">
            <div class="flex items-start justify-between">
                <div>
                    <p class="text-[10px] font-semibold uppercase tracking-wider text-slate-400">
                        Status Keamanan
                    </p>

                    <h3 class="mt-2 text-2xl font-bold text-emerald-600">
                        {{ $statistics['security_status'] }}
                    </h3>

                    <p class="mt-2 text-[10px] text-slate-500">
                        Monitoring sistem
                    </p>
                </div>

                <div class="rounded-lg bg-emerald-50 p-3 text-lg text-emerald-600">
                    ♢
                </div>
            </div>
        </div>


        <!-- Login -->
        <div class="rounded-xl bg-white p-5 shadow-sm">
            <div class="flex items-start justify-between">
                <div>
                    <p class="text-[10px] font-semibold uppercase tracking-wider text-slate-400">
                        Log Akses Hari Ini
                    </p>

                    <h3 class="mt-2 text-2xl font-bold text-slate-800">
                        {{ $statistics['total_sessions'] }}
                        <span class="text-sm font-medium">Sesi</span>
                    </h3>

                    <p class="mt-2 text-[10px] text-slate-500">
                        Aktivitas akses sistem
                    </p>
                </div>

                <div class="rounded-lg bg-blue-50 p-3 text-lg text-blue-600">
                    ↗
                </div>
            </div>
        </div>


        <!-- Database -->
        <div class="rounded-xl bg-white p-5 shadow-sm">
            <div class="flex items-start justify-between">
                <div>
                    <p class="text-[10px] font-semibold uppercase tracking-wider text-slate-400">
                        Status Database
                    </p>

                    <h3 class="mt-2 text-xl font-bold text-emerald-600">
                        {{ $statistics['database_status'] }}
                    </h3>

                    <p class="mt-2 text-[10px] text-slate-500">
                        Status contoh tampilan
                    </p>
                </div>

                <div class="rounded-lg bg-emerald-50 p-3 text-lg text-emerald-600">
                    ▤
                </div>
            </div>
        </div>

    </section>


    <!-- GRAFIK DAN INFORMASI -->
    <section class="grid grid-cols-1 gap-5 xl:grid-cols-2">

        <!-- Grafik Pendaftaran -->
        <div class="rounded-xl bg-white p-5 shadow-sm">

            <h3 class="text-sm font-bold text-slate-800">
                Grafik Tren Pendaftaran
            </h3>

            <p class="mt-1 text-[10px] text-slate-400">
                Perbandingan Staff dan Magang
            </p>

            <div class="mt-5 flex items-center gap-4 text-[10px]">
                <span class="flex items-center gap-2">
                    <span class="h-2.5 w-2.5 rounded-sm bg-orange-500"></span>
                    Magang
                </span>

                <span class="flex items-center gap-2">
                    <span class="h-2.5 w-2.5 rounded-sm bg-[#102b50]"></span>
                    Staff
                </span>
            </div>

            @php
                $months = [
                    ['name' => 'Jan', 'magang' => 65, 'staff' => 40],
                    ['name' => 'Feb', 'magang' => 82, 'staff' => 55],
                    ['name' => 'Mar', 'magang' => 70, 'staff' => 48],
                    ['name' => 'Apr', 'magang' => 95, 'staff' => 62],
                    ['name' => 'Mei', 'magang' => 85, 'staff' => 72],
                    ['name' => 'Jun', 'magang' => 110, 'staff' => 80],
                ];
            @endphp

            <div class="mt-6 flex h-52 items-end justify-around border-b border-l border-slate-200 px-2">

                @foreach ($months as $month)
                    <div class="flex h-full flex-col items-center justify-end">

                        <div class="flex h-[85%] items-end gap-1.5">

                            <div class="w-3 rounded-t-sm bg-orange-500 sm:w-5"
                                 style="height: {{ $month['magang'] / 120 * 100 }}%">
                            </div>

                            <div class="w-3 rounded-t-sm bg-[#102b50] sm:w-5"
                                 style="height: {{ $month['staff'] / 120 * 100 }}%">
                            </div>

                        </div>

                        <span class="mt-2 text-[9px] text-slate-400">
                            {{ $month['name'] }}
                        </span>

                    </div>
                @endforeach

            </div>

        </div>


        <!-- Informasi Sistem -->
        <div class="rounded-xl bg-white p-5 shadow-sm">

            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-sm font-bold text-slate-800">
                        Aktivitas Sistem
                    </h3>

                    <p class="mt-1 text-[10px] text-slate-400">
                        Ringkasan modul administrasi
                    </p>
                </div>

                <span class="rounded-lg bg-emerald-50 px-3 py-2 text-[9px] font-bold text-emerald-600">
                    SYSTEM
                </span>
            </div>


            <div class="mt-6 space-y-5">

                <div>
                    <div class="mb-2 flex justify-between text-[11px]">
                        <span class="font-medium text-slate-600">
                            Pengelolaan Konten
                        </span>

                        <span class="font-bold text-slate-800">
                            Aktif
                        </span>
                    </div>

                    <div class="h-2 overflow-hidden rounded-full bg-slate-100">
                        <div class="h-full w-[85%] rounded-full bg-blue-500"></div>
                    </div>
                </div>


                <div>
                    <div class="mb-2 flex justify-between text-[11px]">
                        <span class="font-medium text-slate-600">
                            Modul Rekrutmen
                        </span>

                        <span class="font-bold text-slate-800">
                            Aktif
                        </span>
                    </div>

                    <div class="h-2 overflow-hidden rounded-full bg-slate-100">
                        <div class="h-full w-[75%] rounded-full bg-orange-500"></div>
                    </div>
                </div>


                <div>
                    <div class="mb-2 flex justify-between text-[11px]">
                        <span class="font-medium text-slate-600">
                            Pengelolaan Database
                        </span>

                        <span class="font-bold text-emerald-600">
                            Connected*
                        </span>
                    </div>

                    <div class="h-2 overflow-hidden rounded-full bg-slate-100">
                        <div class="h-full w-[95%] rounded-full bg-emerald-500"></div>
                    </div>
                </div>

            </div>


            <div class="mt-7 rounded-lg bg-slate-50 p-4">
                <p class="text-[11px] font-semibold text-slate-700">
                    Informasi Administrator
                </p>

                <p class="mt-2 text-[10px] leading-relaxed text-slate-500">
                    Dashboard ini merupakan tampilan awal pengelolaan
                    website PT. Equityworld Futures.
                </p>
            </div>

        </div>

    </section>

@endsection
