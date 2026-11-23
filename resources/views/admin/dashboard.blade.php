
@extends('layouts.admin')

@section('title', 'Dashboard Admin')
@section('page-title', 'Dashboard Admin')

@section('content')

    <!-- WELCOME BANNER -->
    <section class="mb-6 rounded-xl bg-gradient-to-r from-[#080f20] to-[#142747] p-6 text-white shadow-lg md:p-8">

        <span class="inline-block rounded-full bg-orange-500/20 px-3 py-1 text-[9px] font-bold tracking-wider text-orange-400">
            PT. EQUITYWORLD FUTURES
        </span>

        <h1 class="mt-3 text-2xl font-bold md:text-3xl">
            Selamat Datang, Administrator
        </h1>

        <p class="mt-2 max-w-2xl text-xs leading-relaxed text-slate-300">
            Pusat pemantauan dan pengelolaan sistem website dan rekrutmen
            PT. Equityworld Futures. Pantau pengguna, aktivitas operasional,
            dan kondisi sistem melalui dashboard administrator.
        </p>

    </section>


    <!-- STATISTIK UTAMA -->
    <section class="mb-6 grid grid-cols-1 gap-4 sm:grid-cols-2 xl:grid-cols-3">

        <!-- Total User -->
        <div class="rounded-xl bg-white p-5 shadow-sm">
            <div class="flex items-start justify-between">
                <div>
                    <p class="text-[10px] font-semibold uppercase tracking-wider text-slate-400">
                        Total Akun Terdaftar
                    </p>

                    <h3 class="mt-2 text-2xl font-bold text-slate-800">
                        {{ number_format($statistics['total_users']) }}
                        <span class="text-sm font-medium">Users</span>
                    </h3>

                    <p class="mt-2 text-[10px] text-blue-600">
                        Seluruh akun dalam sistem
                    </p>
                </div>

                <div class="rounded-xl bg-blue-50 p-3 text-blue-600">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="h-6 w-6"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="1.8"
                        stroke-linecap="round"
                        stroke-linejoin="round">
                        <path d="M18 21a8 8 0 0 0-16 0"/>
                        <circle cx="10" cy="8" r="5"/>
                        <path d="M22 20c0-3.37-2-6.5-4-7.5"/>
                        <path d="M16 3.13a5 5 0 0 1 0 9.75"/>
                    </svg>
                </div>
            </div>
        </div>


        <!-- User Hari Ini -->
        <div class="rounded-xl bg-white p-5 shadow-sm">
            <div class="flex items-start justify-between">
                <div>
                    <p class="text-[10px] font-semibold uppercase tracking-wider text-slate-400">
                        Pendaftaran Hari Ini
                    </p>

                    <h3 class="mt-2 text-2xl font-bold text-slate-800">
                        {{ number_format($statistics['today_users']) }}
                        <span class="text-sm font-medium">Users</span>
                    </h3>

                    <p class="mt-2 text-[10px] text-emerald-600">
                        Akun dibuat hari ini
                    </p>
                </div>

                <div class="rounded-xl bg-emerald-50 p-3 text-emerald-600">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="h-6 w-6"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="1.8"
                        stroke-linecap="round"
                        stroke-linejoin="round">
                        <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/>
                        <circle cx="9" cy="7" r="4"/>
                        <path d="M19 8v6"/>
                        <path d="M22 11h-6"/>
                    </svg>
                </div>
            </div>
        </div>

        <!-- User Bulan Ini -->
        <div class="rounded-xl bg-white p-5 shadow-sm">
            <div class="flex items-start justify-between">
                <div>
                    <p class="text-[10px] font-semibold uppercase tracking-wider text-slate-400">
                        Pendaftaran Bulan Ini
                    </p>

                    <h3 class="mt-2 text-2xl font-bold text-slate-800">
                        {{ number_format($statistics['monthly_users']) }}
                        <span class="text-sm font-medium">Users</span>
                    </h3>

                    <p class="mt-2 text-[10px] text-orange-600">
                        Akun bulan berjalan
                    </p>
                </div>

                <div class="rounded-xl bg-orange-50 p-3 text-orange-600">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="h-6 w-6"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="1.8"
                        stroke-linecap="round"
                        stroke-linejoin="round">
                        <path d="M8 2v4"/>
                        <path d="M16 2v4"/>
                        <rect width="18" height="18" x="3" y="4" rx="2"/>
                        <path d="M3 10h18"/>
                        <path d="M8 14h.01"/>
                        <path d="M12 14h.01"/>
                        <path d="M16 14h.01"/>
                        <path d="M8 18h.01"/>
                        <path d="M12 18h.01"/>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Admin -->
        <div class="rounded-xl bg-white p-5 shadow-sm">
            <div class="flex items-start justify-between">
                <div>
                    <p class="text-[10px] font-semibold uppercase tracking-wider text-slate-400">
                        Administrator
                    </p>

                    <h3 class="mt-2 text-2xl font-bold text-slate-800">
                        {{ number_format($statistics['admin_users']) }}
                        <span class="text-sm font-medium">Akun</span>
                    </h3>

                    <p class="mt-2 text-[10px] text-blue-600">
                        Pengelola sistem
                    </p>
                </div>

                <div class="rounded-xl bg-orange-50 p-3 text-orange-600">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="h-6 w-6"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="1.8"
                        stroke-linecap="round"
                        stroke-linejoin="round">
                        <path d="M8 2v4"/>
                        <path d="M16 2v4"/>
                        <rect width="18" height="18" x="3" y="4" rx="2"/>
                        <path d="M3 10h18"/>
                        <path d="M8 14h.01"/>
                        <path d="M12 14h.01"/>
                        <path d="M16 14h.01"/>
                        <path d="M8 18h.01"/>
                        <path d="M12 18h.01"/>
                    </svg>
                </div>
            </div>
        </div>


        <!-- HRD -->
        <div class="rounded-xl bg-white p-5 shadow-sm">
            <div class="flex items-start justify-between">
                <div>
                    <p class="text-[10px] font-semibold uppercase tracking-wider text-slate-400">
                        Akun HRD
                    </p>

                    <h3 class="mt-2 text-2xl font-bold text-slate-800">
                        {{ number_format($statistics['hrd_users']) }}
                        <span class="text-sm font-medium">Akun</span>
                    </h3>

                    <p class="mt-2 text-[10px] text-violet-600">
                        Pengelola rekrutmen
                    </p>
                </div>

                <div class="rounded-xl bg-violet-50 p-3 text-violet-600">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="h-6 w-6"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="1.8"
                        stroke-linecap="round"
                        stroke-linejoin="round">
                        <rect x="2" y="7" width="20" height="14" rx="2"/>
                        <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/>
                        <path d="M2 12h20"/>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Pelamar -->
        <div class="rounded-xl bg-white p-5 shadow-sm">
            <div class="flex items-start justify-between">
                <div>
                    <p class="text-[10px] font-semibold uppercase tracking-wider text-slate-400">
                        Akun Pelamar
                    </p>

                    <h3 class="mt-2 text-2xl font-bold text-slate-800">
                        {{ number_format($statistics['applicant_users']) }}
                        <span class="text-sm font-medium">Akun</span>
                    </h3>

                    <p class="mt-2 text-[10px] text-orange-600">
                        Pengguna pencari kerja
                    </p>
                </div>

                <div class="rounded-xl bg-orange-50 p-3 text-orange-600">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="h-6 w-6"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="1.8"
                        stroke-linecap="round"
                        stroke-linejoin="round">
                        <circle cx="12" cy="8" r="5"/>
                        <path d="M20 21a8 8 0 0 0-16 0"/>
                    </svg>
                </div>
            </div>
        </div>

    </section>

    <!-- GRAFIK DAN RINGKASAN -->
    <section class="mb-6 grid grid-cols-1 gap-5 xl:grid-cols-2">
    
        <!-- Grafik Pertumbuhan Pengguna -->
        <div class="rounded-xl bg-white p-5 shadow-sm">

            <!-- Judul dan Filter Periode -->
            <div class="flex flex-wrap items-start justify-between gap-3">

                <div>
                    <h3 class="text-sm font-bold text-slate-800">
                        Grafik Pertumbuhan Pengguna
                    </h3>

                    <p class="mt-1 text-[10px] text-slate-400">
                        Jumlah akun berdasarkan periode registrasi
                    </p>
                </div>
              
                
<form method="GET" action="{{ url()->current() }}">
    <div class="relative">

        <select
            name="period"
            onchange="this.form.submit()"
            style="
                background-color: {{ $selectedPeriod === '3' ? '#EFF6FF' : ($selectedPeriod === '6' ? '#FFF7ED' : '#142747') }};
                color: {{ $selectedPeriod === 'year' ? '#FFFFFF' : ($selectedPeriod === '3' ? '#1D4ED8' : '#C2410C') }};
            "
            class="appearance-none cursor-pointer rounded-xl border border-slate-200 py-2.5 pl-4 pr-12 text-xs font-semibold outline-none transition-all duration-200 focus:ring-2 focus:ring-offset-1
            {{ $selectedPeriod === '3' ? 'focus:ring-blue-200' : ($selectedPeriod === '6' ? 'focus:ring-orange-200' : 'focus:ring-slate-300') }}">

            <option value="3"
                style="background-color: #FFFFFF; color: #334155;"
                {{ $selectedPeriod === '3' ? 'selected' : '' }}>
                3 Bulan
            </option>

            <option value="6"
                style="background-color: #FFFFFF; color: #334155;"
                {{ $selectedPeriod === '6' ? 'selected' : '' }}>
                6 Bulan
            </option>

            <option value="year"
                style="background-color: #FFFFFF; color: #334155;"
                {{ $selectedPeriod === 'year' ? 'selected' : '' }}>
                Tahun Ini
            </option>

        </select>

        <!-- Ikon Dropdown -->
        <div class="pointer-events-none absolute inset-y-0 right-4 flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg"
                class="h-5 w-5"
                viewBox="0 0 24 24"
                fill="none"
                stroke="{{ $selectedPeriod === 'year' ? '#FFFFFF' : ($selectedPeriod === '3' ? '#1D4ED8' : '#C2410C') }}"
                stroke-width="2"
                stroke-linecap="round"
                stroke-linejoin="round">
                <path d="m6 9 6 6 6-6"/>
            </svg>
        </div>

    </div>
</form>

            </div>

            <!-- Keterangan Grafik -->
            <div class="mt-5 flex items-center gap-2 text-[10px]">
                <span class="h-2.5 w-2.5 rounded-sm bg-orange-500"></span>
                Pendaftaran Akun
            </div>

            @php
                $maxRegistration = max(
                    1,
                    $monthlyRegistrations->max('total') ?? 0
                );
            @endphp

            <!-- Area Grafik -->
            <div class="mt-6 flex h-52 items-end justify-around border-b border-l border-slate-200 px-2">

                @foreach ($monthlyRegistrations as $month)

                    <div class="flex h-full flex-1 flex-col items-center justify-end">

                        <div class="flex h-[85%] w-full items-end justify-center">

                            <div
                                class="w-5 rounded-t-sm bg-orange-500 transition-all duration-300 sm:w-7"
                                style="height: {{ ($month['total'] / $maxRegistration) * 100 }}%">
                            </div>

                        </div>

                        <span class="mt-2 text-[9px] text-slate-400">
                            {{ $month['name'] }}
                        </span>

                    </div>

                @endforeach

            </div>

            <!-- Total Registrasi -->
            <p class="mt-3 text-[10px] text-slate-400">
                Total pendaftaran:

                <span class="font-semibold text-slate-700">
                    {{ number_format($monthlyRegistrations->sum('total')) }} akun
                </span>
            </p>

        </div>

        <!-- Ringkasan Sistem -->
        <div class="rounded-xl bg-white p-5 shadow-sm">

            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-sm font-bold text-slate-800">
                        Ringkasan Sistem
                    </h3>

                    <p class="mt-1 text-[10px] text-slate-400">
                        Informasi aktual dari database pengguna
                    </p>
                </div>

                <span class="rounded-lg bg-emerald-50 px-3 py-2 text-[9px] font-bold text-emerald-600">
                    SYSTEM OVERVIEW
                </span>
            </div>

            <div class="mt-6 space-y-5">

                <!-- Database -->
                <div class="flex items-center justify-between border-b border-slate-100 pb-4">
                    <div>
                        <p class="text-[11px] font-medium text-slate-600">
                            Koneksi Database
                        </p>

                        <p class="mt-1 text-[10px] text-slate-400">
                            Status koneksi database Laravel
                        </p>
                    </div>

                    <span class="text-[11px] font-bold
                        {{ $statistics['database_status'] === 'Connected' ? 'text-emerald-600' : 'text-red-600' }}">
                        {{ $statistics['database_status'] }}
                    </span>
                </div>

                <!-- Pembagian Role -->
                <div class="flex items-center justify-between border-b border-slate-100 pb-4">
                    <div>
                        <p class="text-[11px] font-medium text-slate-600">
                            Pembagian Role
                        </p>

                        <p class="mt-1 text-[10px] text-slate-400">
                            Admin, HRD, dan Pelamar
                        </p>
                    </div>

                    <div class="text-right text-[10px] font-semibold text-slate-700">
                        <p>Admin: {{ number_format($statistics['admin_users']) }}</p>
                        <p>HRD: {{ number_format($statistics['hrd_users']) }}</p>
                        <p>Pelamar: {{ number_format($statistics['applicant_users']) }}</p>
                    </div>
                </div>

                <!-- Pengguna Terbaru -->
                <div class="flex items-start justify-between">
                    <div>
                        <p class="text-[11px] font-medium text-slate-600">
                            Registrasi Terakhir
                        </p>

                        <p class="mt-1 text-[10px] text-slate-400">
                            Pengguna terbaru dalam database
                        </p>
                    </div>

                    <div class="text-right">
                        @if ($latestUsers->isNotEmpty())
                            <p class="text-[11px] font-bold text-slate-800">
                                {{ $latestUsers->first()->name }}
                            </p>

                            <p class="mt-1 text-[10px] text-slate-400">
                                {{ $latestUsers->first()->created_at?->timezone('Asia/Jakarta')->format('d/m/Y H:i') }}
                        @else
                            <p class="text-[11px] text-slate-400">
                                Belum ada pengguna
                            </p>
                        @endif
                    </div>
                </div>

            </div>

        </div>

    </section>

    <!-- PENGGUNA TERBARU -->
    <section class="mb-6 rounded-xl bg-white p-5 shadow-sm">

        <div class="mb-5 flex flex-wrap items-center justify-between gap-2">
            <div>
                <h3 class="text-sm font-bold text-slate-800">
                    Pengguna Terbaru
                </h3>

                <p class="mt-1 text-[10px] text-slate-400">
                    Lima akun terakhir yang terdaftar dalam sistem
                </p>
            </div>

            <span class="rounded-lg bg-blue-50 px-3 py-2 text-[9px] font-bold text-blue-600">
                USER MANAGEMENT
            </span>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full min-w-[500px] text-left text-xs">

                <thead>
                    <tr class="border-b border-slate-100 text-[10px] uppercase tracking-wider text-slate-400">
                        <th class="px-3 py-3 font-semibold">Nama Pengguna</th>
                        <th class="px-3 py-3 font-semibold">Email</th>
                        <th class="px-3 py-3 font-semibold">Role</th>
                        <th class="px-3 py-3 font-semibold">Tanggal Registrasi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($latestUsers as $user)
                        <tr class="border-b border-slate-50 last:border-0">

                            <td class="px-3 py-4 font-semibold text-slate-700">
                                {{ $user->name }}
                            </td>

                            <td class="px-3 py-4 text-slate-500">
                                {{ $user->email }}
                            </td>

                            <td class="px-3 py-4">
                                @php
                                    $roleStyles = [
                                        'admin' => 'bg-blue-50 text-blue-600',
                                        'hrd' => 'bg-violet-50 text-violet-600',
                                        'pelamar' => 'bg-orange-50 text-orange-600',
                                    ];

                                    $roleName = [
                                        'admin' => 'Admin',
                                        'hrd' => 'HRD',
                                        'pelamar' => 'Pelamar',
                                    ];
                                @endphp

                                <span class="rounded-full px-2.5 py-1 text-[10px] font-semibold
                                    {{ $roleStyles[$user->role] ?? 'bg-slate-100 text-slate-600' }}">
                                    {{ $roleName[$user->role] ?? ucfirst($user->role ?? 'Tidak diketahui') }}
                                </span>
                            </td>

                            <td class="px-3 py-4 text-slate-500">
                                {{ $user->created_at?->timezone('Asia/Jakarta')->format('d/m/Y H:i') ?? '-' }} WIB
                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-3 py-8 text-center text-slate-400">
                                Belum ada pengguna terdaftar.
                            </td>
                        </tr>
                    @endforelse
                </tbody>

            </table>
        </div>

    </section>

@endsection
