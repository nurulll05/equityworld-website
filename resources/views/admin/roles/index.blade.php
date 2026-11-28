
@extends('layouts.admin')

@section('title', 'Role Management')

@section('page-title', 'Role Management')

@section('content')

<div class="space-y-6">

    {{-- NOTIFIKASI --}}
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

    {{-- HEADER --}}
    <div class="flex flex-col justify-between gap-3 sm:flex-row sm:items-center">
        <div>
            <h1 class="text-xl font-bold text-slate-800">
                Manajemen Role
            </h1>
            <p class="mt-1 text-xs text-slate-500">
                Kelola role dan hak akses pengguna website Equityworld Futures.
            </p>
        </div>

        @if(auth()->user()->hasPermission('roles.manage'))
            <a href="{{ route('admin.roles.create') }}"
                class="inline-flex items-center justify-center gap-2 rounded-lg bg-orange-600 px-4 py-2.5 text-xs font-semibold text-white shadow-sm transition hover:bg-orange-700">

                <svg class="h-4 w-4" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path d="M12 5v14M5 12h14"/>
                </svg>

                Tambah Role
            </a>
        @endif
    </div>

    {{-- STATISTIK --}}
    <div class="grid grid-cols-2 gap-4 lg:grid-cols-3">

        <div class="rounded-xl border-2 border-blue-200 bg-[#E3EEFF] p-4 shadow-sm">
            <p class="text-xs font-semibold text-slate-600">
                Total Role
            </p>

            <h2 class="mt-3 text-2xl font-bold text-slate-800">
                {{ $roles->count() }}
            </h2>

            <p class="mt-1 text-[11px] text-slate-500">
                Role terdaftar dalam sistem
            </p>
        </div>

        <div class="rounded-xl border-2 border-orange-200 bg-white p-4 shadow-sm">
            <p class="text-xs font-semibold text-slate-600">
                Total Pengguna
            </p>

            <h2 class="mt-3 text-2xl font-bold text-slate-800">
                {{ $roles->sum('users_count') }}
            </h2>

            <p class="mt-1 text-[11px] text-slate-500">
                Pengguna yang memiliki role
            </p>
        </div>

        <div class="col-span-2 rounded-xl border-2 border-purple-200 bg-white p-4 shadow-sm lg:col-span-1">
            <p class="text-xs font-semibold text-slate-600">
                Total Permission
            </p>

            <h2 class="mt-3 text-2xl font-bold text-slate-800">
                {{ \App\Models\Permission::count() }}
            </h2>

            <p class="mt-1 text-[11px] text-slate-500">
                Hak akses tersedia dalam sistem
            </p>
        </div>

    </div>

    {{-- TABEL ROLE --}}
    <div class="overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm">

        <div class="border-b border-slate-100 p-5">
            <h2 class="text-sm font-bold text-slate-800">
                Daftar Role
            </h2>

            <p class="mt-1 text-[11px] text-slate-500">
                Informasi role dan hak akses yang dimiliki.
            </p>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full min-w-[800px] text-left">

                <thead class="bg-slate-50">
                    <tr>
                        <th class="px-5 py-4 text-[10px] font-bold uppercase tracking-wider text-slate-500">
                            No.
                        </th>

                        <th class="px-5 py-4 text-[10px] font-bold uppercase tracking-wider text-slate-500">
                            Nama Role
                        </th>

                        <th class="px-5 py-4 text-[10px] font-bold uppercase tracking-wider text-slate-500">
                            Deskripsi
                        </th>

                        <th class="px-5 py-4 text-[10px] font-bold uppercase tracking-wider text-slate-500">
                            Jumlah Pengguna
                        </th>

                        <th class="px-5 py-4 text-[10px] font-bold uppercase tracking-wider text-slate-500">
                            Permission
                        </th>

                        <th class="px-5 py-4 text-[10px] font-bold uppercase tracking-wider text-slate-500">
                            Aksi
                        </th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-slate-100">

                    @forelse ($roles as $index => $role)

                        <tr class="transition hover:bg-slate-50">

                            <td class="px-5 py-4 text-xs text-slate-500">
                                {{ $index + 1 }}
                            </td>

                            <td class="px-5 py-4">
                                <div class="flex flex-col gap-1">

                                    <span class="text-xs font-semibold text-slate-700">
                                        {{ $role->name }}
                                    </span>

                                    <span class="text-[10px] text-slate-400">
                                        {{ $role->slug }}
                                    </span>

                                </div>
                            </td>

                            <td class="max-w-xs px-5 py-4 text-xs text-slate-600">
                                {{ $role->description ?: '-' }}
                            </td>

                            <td class="px-5 py-4">
                                <span class="rounded-full bg-blue-50 px-3 py-1 text-[10px] font-semibold text-blue-700">
                                    {{ $role->users_count }} Pengguna
                                </span>
                            </td>

                            <td class="px-5 py-4">
                                <span class="rounded-full bg-purple-50 px-3 py-1 text-[10px] font-semibold text-purple-700">
                                    {{ $role->permissions->count() }} Permission
                                </span>
                            </td>

                            <td class="px-5 py-4">
                                @if(auth()->user()->hasPermission('roles.manage'))
                                    <a href="{{ route('admin.roles.edit', $role->id) }}"
                                        class="inline-flex items-center gap-2 rounded-lg border border-slate-200 px-3 py-2 text-[10px] font-semibold text-slate-600 transition hover:border-orange-300 hover:bg-orange-50 hover:text-orange-700">

                                        <svg class="h-3.5 w-3.5" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24"
                                            stroke-width="1.8" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path d="m16 4 4 4M4 20l4-.8L19 8a2.1 2.1 0 0 0-3-3L5 16l-1 4Z"/>
                                        </svg>

                                        Atur Akses
                                    </a>
                                @endif
                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="6" class="px-5 py-12 text-center">
                                <p class="text-sm font-semibold text-slate-600">
                                    Belum ada role tersedia
                                </p>

                                <p class="mt-1 text-xs text-slate-400">
                                    Data role belum ditemukan dalam sistem.
                                </p>
                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>
        </div>

        <div class="border-t border-slate-100 px-5 py-3">
            <p class="text-[10px] text-slate-400">
                Menampilkan {{ $roles->count() }} role dalam sistem.
            </p>
        </div>

    </div>

</div>

@endsection
