
@extends('layouts.admin')

@section('title', 'User Management')
@section('page-title', 'User Management')

@section('content')

    <div class="space-y-6">

    @if (session('success'))
        <div class="rounded-lg border border-green-200 bg-green-50 px-4 py-3 text-xs text-green-700">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="rounded-lg border border-red-200 bg-red-50 px-4 py-3 text-xs text-red-700">
            {{ session('error') }}
        </div>
    @endif

    <!-- HEADER -->
    <div class="flex flex-col justify-between gap-3 sm:flex-row sm:items-center">
        <div>
            <h1 class="text-xl font-bold text-slate-800">
                Manajemen Pengguna
            </h1>
            <p class="mt-1 text-xs text-slate-500">
                Kelola seluruh akun pengguna website Equityworld Futures.
            </p>
        </div>
    </div>
 
    <!-- STATISTIK -->
    <div class="grid grid-cols-2 gap-4 mb-7 lg:grid-cols-4">

        <!-- Total Pengguna -->
        <div class="rounded-xl border-2 border-blue-200 bg-[#E3EEFF] p-4 shadow-sm transition hover:shadow-md">
            <div class="flex items-center justify-between">
                <p class="text-xs font-semibold text-slate-600">
                    Total Pengguna
                </p>
                <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-white text-blue-600 shadow-sm">
                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="1.8"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path d="M16 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                        <circle cx="10" cy="7" r="4"/>
                        <path d="M20 21v-2a4 4 0 0 0-3-3.87"/>
                        <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
                    </svg>
                </div>
            </div>
            <h2 class="mt-3 text-2xl font-bold text-slate-800">
                {{ number_format($statistics['total']) }}
            </h2>
            <p class="mt-1 text-[11px] text-slate-500">
                Seluruh akun terdaftar
            </p>
        </div>

        <!-- Administrator -->
        <div class="rounded-xl border-2 border-orange-200 bg-white p-4 shadow-sm transition hover:shadow-md">
            <div class="flex items-center justify-between">
                <p class="text-xs font-semibold text-slate-600">
                    Administrator
                </p>
                <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-orange-50 text-orange-600">
                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="1.8"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 3l2.1 4.3 4.7.7-3.4 3.3.8 4.7-4.2-2.2-4.2 2.2.8-4.7-3.4-3.3 4.7-.7L12 3Z"/>
                        <path d="M7 19h10M9 22h6"/>
                    </svg>
                </div>
            </div>
            <h2 class="mt-3 text-2xl font-bold text-slate-800">
                {{ number_format($statistics['admin']) }}
            </h2>
            <p class="mt-1 text-[11px] text-slate-500">
                Akun administrator
            </p>
        </div>

        <!-- HRD -->
        <div class="rounded-xl border-2 border-purple-200 bg-white p-4 shadow-sm transition hover:shadow-md">
            <div class="flex items-center justify-between">
                <p class="text-xs font-semibold text-slate-600">
                    HRD
                </p>
                <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-purple-50 text-purple-600">
                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="1.8"
                        stroke-linecap="round" stroke-linejoin="round">
                        <rect x="3" y="7" width="18" height="13" rx="2"/>
                        <path d="M8 7V5a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/>
                        <path d="M3 12h18M10 12v2h4v-2"/>
                    </svg>
                </div>
            </div>
            <h2 class="mt-3 text-2xl font-bold text-slate-800">
                {{ number_format($statistics['hrd']) }}
            </h2>
            <p class="mt-1 text-[11px] text-slate-500">
                Akun bagian HRD
            </p>
        </div>

        <!-- Pelamar -->
        <div class="rounded-xl border-2 border-green-200 bg-white p-4 shadow-sm transition hover:shadow-md">
            <div class="flex items-center justify-between">
                <p class="text-xs font-semibold text-slate-600">
                    Pelamar
                </p>
                <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-green-50 text-green-600">
                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="1.8"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path d="M16 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                        <circle cx="10" cy="7" r="4"/>
                        <path d="M19 8v6M16 11h6"/>
                    </svg>
                </div>
            </div>
            <h2 class="mt-3 text-2xl font-bold text-slate-800">
                {{ number_format($statistics['pelamar']) }}
            </h2>
            <p class="mt-1 text-[11px] text-slate-500">
                Akun pencari kerja
            </p>
        </div>

    </div>

    <!-- TABEL PENGGUNA -->
    <div class="overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm">

        <!-- HEADER TABEL -->
        <div class="border-b border-slate-100 p-5">

            <!-- JUDUL DAN TOMBOL TAMBAH USER -->
            <div class="flex flex-col justify-between gap-3 sm:flex-row sm:items-start">

                <div>
                    <h2 class="text-sm font-bold text-slate-800">
                        Daftar Pengguna
                    </h2>
                    <p class="mt-1 text-[11px] text-slate-500">
                        Informasi akun yang terdaftar dalam sistem.
                    </p>
                </div>

                <!-- TOMBOL TAMBAH USER -->
                <a href="{{ Route::has('admin.users.create') ? route('admin.users.create') : '#' }}"
                    class="inline-flex shrink-0 items-center justify-center gap-2 rounded-lg bg-orange-600 px-4 py-2.5 text-xs font-semibold text-white shadow-sm transition hover:bg-orange-700">

                    <svg class="h-4 w-4" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 5v14M5 12h14"/>
                    </svg>

                    Tambah User Baru
                </a>

            </div>

            <!-- PENCARIAN DAN FILTER -->
            <form id="users-filter-form"
                action="{{ route('admin.users.index') }}"
                method="GET"
                class="mt-5 flex flex-col gap-2 sm:flex-row sm:items-center">

                <!-- PENCARIAN -->
                <div class="relative">
                    <input type="text"
                        id="user-search"
                        name="search"
                        value="{{ request('search') }}"
                        placeholder="Cari nama atau email..."
                        autocomplete="off"
                        class="w-full rounded-xl border border-slate-300 bg-white px-3 py-2 text-xs text-slate-700 outline-none transition focus:border-blue-400 focus:ring-1 focus:ring-blue-100 sm:w-60"
                        style="border: 1px solid #cbd5e1 !important; border-image: none !important;">
                </div>

                <!-- FILTER STATUS -->
                <div class="relative inline-block">
                    <select name="status"
                        id="user-status"
                        class="appearance-none rounded-xl border border-slate-300 bg-white py-2.5 pl-4 pr-9 text-xs text-slate-600 outline-none transition focus:border-blue-400 focus:ring-1 focus:ring-blue-100">

                        <option value="">Semua Status Akun</option>
                        <option value="active" {{ request('status') === 'active' ? 'selected' : '' }}>
                            Aktif
                        </option>
                        <option value="inactive" {{ request('status') === 'inactive' ? 'selected' : '' }}>
                            Nonaktif
                        </option>
                    </select>

                    <svg class="pointer-events-none absolute right-3 top-1/2 h-4 w-4 -translate-y-1/2 text-slate-500"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                        <path d="m6 9 6 6 6-6"/>
                    </svg>
                </div>

                <!-- FILTER ROLE -->
                <div class="relative inline-block">
                    <select name="role"
                        id="user-role"
                        class="appearance-none rounded-xl border border-slate-300 bg-white py-2.5 pl-4 pr-9 text-xs text-slate-600 outline-none transition focus:border-blue-400 focus:ring-1 focus:ring-blue-100">

                        <option value="">Semua Role</option>
                        <option value="admin" {{ request('role') === 'admin' ? 'selected' : '' }}>
                            Administrator
                        </option>
                        <option value="hrd" {{ request('role') === 'hrd' ? 'selected' : '' }}>
                            HRD
                        </option>
                        <option value="pelamar" {{ request('role') === 'pelamar' ? 'selected' : '' }}>
                            Pelamar
                        </option>
                    </select>

                    <svg class="pointer-events-none absolute right-3 top-1/2 h-4 w-4 -translate-y-1/2 text-slate-500"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                        <path d="m6 9 6 6 6-6"/>
                    </svg>
                </div>

                <!-- RESET FILTER -->
                <a href="{{ route('admin.users.index') }}"
                    title="Reset Filter"
                    aria-label="Reset Filter"
                    class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl text-slate-500 transition hover:bg-slate-100 hover:text-slate-800">

                    <svg class="h-4 w-4" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24"
                        stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M3 12a9 9 0 1 0 3-6.7L3 8"/>
                        <path d="M3 3v5h5"/>
                    </svg>
                </a>

            </form>

        </div>

        <!-- ISI TABEL -->
        <div class="overflow-x-auto">
            <table class="w-full min-w-[900px] text-left">

                <thead class="bg-slate-50">
                    <tr>
                        <th class="px-5 py-4 text-[10px] font-bold uppercase tracking-wider text-slate-500">
                            No.
                        </th>
                        <th class="px-5 py-4 text-[10px] font-bold uppercase tracking-wider text-slate-500">
                            Nama Pengguna
                        </th>
                        <th class="px-5 py-4 text-[10px] font-bold uppercase tracking-wider text-slate-500">
                            Email
                        </th>
                        <th class="px-5 py-4 text-[10px] font-bold uppercase tracking-wider text-slate-500">
                            Nomor Telepon
                        </th>
                        <th class="px-5 py-4 text-[10px] font-bold uppercase tracking-wider text-slate-500">
                            Role
                        </th>
                        <th class="px-5 py-4 text-[10px] font-bold uppercase tracking-wider text-slate-500">
                            Tanggal Registrasi
                        </th>
                        <th class="px-5 py-4 text-[10px] font-bold uppercase tracking-wider text-slate-500">
                            Status Akun
                        </th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-slate-100">

                    @forelse ($users as $index => $user)

                        <tr class="transition hover:bg-slate-50">

                            <td class="px-5 py-4 text-xs text-slate-500">
                                {{ $users->firstItem() + $index }}
                            </td>

                            <td class="px-5 py-4">
                                <div class="flex items-center gap-3">
                                    <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-blue-50 text-xs font-bold uppercase text-blue-700">
                                        {{ strtoupper(substr($user->name, 0, 1)) }}
                                    </div>
                                    <span class="text-xs font-semibold text-slate-700">
                                        {{ $user->name }}
                                    </span>
                                </div>
                            </td>

                            <td class="px-5 py-4 text-xs text-slate-600">
                                {{ $user->email }}
                            </td>

                            <td class="px-5 py-4 text-xs text-slate-600">
                                {{ $user->phone ?: '-' }}
                            </td>

                            <td class="px-5 py-4">
                                @if ($user->role === 'admin')
                                    <span class="rounded-full bg-orange-50 px-3 py-1 text-[10px] font-semibold text-orange-700">
                                        Administrator
                                    </span>
                                @elseif ($user->role === 'hrd')
                                    <span class="rounded-full bg-purple-50 px-3 py-1 text-[10px] font-semibold text-purple-700">
                                        HRD
                                    </span>
                                @else
                                    <span class="rounded-full bg-blue-50 px-3 py-1 text-[10px] font-semibold text-blue-700">
                                        Pelamar
                                    </span>
                                @endif
                            </td>

                            <td class="px-5 py-4 text-xs text-slate-500">
                                {{ $user->created_at?->timezone('Asia/Jakarta')->format('d/m/Y') ?? '-' }}
                            </td>

                            <td class="px-5 py-4">                
                                <form action="{{ route('admin.users.update-status', $user->id) }}"
                                    method="POST"
                                    onsubmit="return confirm('Apakah kamu yakin ingin {{ $user->is_active ? 'menonaktifkan' : 'mengaktifkan' }} akun ini?')">

                                    @csrf
                                    @method('PATCH')

                                    <input type="hidden"
                                        name="is_active"
                                        value="{{ $user->is_active ? 0 : 1 }}">

                                    <button type="submit"
                                            @disabled($user->id === auth()->id() && $user->is_active)
                                            class="inline-flex appearance-none items-center gap-2 rounded-full border-0 bg-transparent px-2 py-1 text-[10px] font-semibold shadow-none outline-none transition focus:ring-2 focus:ring-green-100
                                            {{ $user->is_active ? 'text-green-700' : 'text-slate-600' }}
                                            {{ $user->id === auth()->id() && $user->is_active ? 'cursor-not-allowed opacity-60' : 'cursor-pointer' }}">

                                        <span class="relative inline-flex h-4 w-7 shrink-0 items-center rounded-full border transition-colors duration-200
                                            {{ $user->is_active
                                                ? 'border-green-600/40 bg-green-500'
                                                : 'border-slate-400 bg-slate-400' }}">

                                            <span class="absolute top-1/2 h-3 w-3 -translate-y-1/2 rounded-full bg-white shadow-sm transition-all duration-200
                                                {{ $user->is_active ? 'left-3.5' : 'left-0.5' }}">
                                            </span>

                                        </span>

                                        {{ $user->is_active ? 'Aktif' : 'Nonaktif' }}

                                    </button>
                                </form>
                            </td>
                        </tr>

                    @empty

                        <tr>
                            <td colspan="7" class="px-5 py-12 text-center">
                                <div class="flex flex-col items-center">
                                    <svg class="mb-3 h-10 w-10 text-slate-300"
                                         fill="none" stroke="currentColor"
                                         viewBox="0 0 24 24" stroke-width="1.5">
                                        <circle cx="11" cy="11" r="8"/>
                                        <path d="m21 21-4.35-4.35"/>
                                    </svg>

                                    <p class="text-sm font-semibold text-slate-600">
                                        Data pengguna tidak ditemukan
                                    </p>
                                    <p class="mt-1 text-xs text-slate-400">
                                        Coba ubah kata kunci atau filter pencarian.
                                    </p>
                                </div>
                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>
        </div>

        <!-- PAGINATION -->
        @if ($users->hasPages())
            <div class="border-t border-slate-100 px-5 py-4">
                {{ $users->links() }}
            </div>
        @endif

        <div class="border-t border-slate-100 px-5 py-3">
            <p class="text-[10px] text-slate-400">
                Menampilkan {{ $users->firstItem() ?? 0 }}
                sampai {{ $users->lastItem() ?? 0 }}
                dari {{ $users->total() }} pengguna.
            </p>
        </div>

    </div>

</div>


<script>
document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('users-filter-form');
    const search = document.getElementById('user-search');
    const status = document.getElementById('user-status');
    const role = document.getElementById('user-role');

    let searchTimer;

    // Pencarian otomatis setelah berhenti mengetik
    search.addEventListener('input', function () {
        clearTimeout(searchTimer);

        searchTimer = setTimeout(function () {
            form.requestSubmit();
        }, 400);
    });

    // Filter langsung saat pilihan berubah
    status.addEventListener('change', function () {
        form.requestSubmit();
    });

    role.addEventListener('change', function () {
        form.requestSubmit();
    });
});
</script>

@endsection
