
@extends('layouts.admin')

@section('title', 'Tambah Role')

@section('page-title', 'Tambah Role')

@section('content')

<div class="space-y-6">

    {{-- HEADER --}}
    <div>
        <h1 class="text-xl font-bold text-slate-800">
            Tambah Role Baru
        </h1>
        <p class="mt-1 text-xs text-slate-500">
            Buat role baru dan tentukan hak akses yang dimilikinya.
        </p>
    </div>

    {{-- ERROR VALIDASI --}}
    @if ($errors->any())
        <div class="rounded-lg border border-red-200 bg-red-50 px-4 py-3 text-xs text-red-700">
            <p class="mb-2 font-semibold">Terdapat kesalahan:</p>
            <ul class="list-inside list-disc space-y-1">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- FORM --}}
    <form action="{{ route('admin.roles.store') }}" method="POST"
        class="space-y-6">

        @csrf

        {{-- INFORMASI ROLE --}}
        <div class="rounded-xl border border-slate-200 bg-white p-5 shadow-sm">

            <h2 class="text-sm font-bold text-slate-800">
                Informasi Role
            </h2>

            <p class="mt-1 text-[11px] text-slate-500">
                Masukkan informasi dasar role yang akan dibuat.
            </p>

            <div class="mt-5 flex w-full flex-col gap-5 md:flex-row">

                {{-- NAMA ROLE --}}
                <div
                    style="flex: 0 0 260px; width: 260px; max-width: 260px;"
                    class="min-w-0">

                    <label for="name"
                        class="mb-2 block text-xs font-semibold text-slate-700">
                        Nama Role <span class="text-red-500">*</span>
                    </label>

                    <input type="text"
                        id="name"
                        name="name"
                        value="{{ old('name') }}"
                        placeholder="Contoh: Supervisor"
                        required
                        style="width: 100%; height: 44px; box-sizing: border-box; border: 1px solid #94a3b8; border-radius: 8px;"
                        class="bg-white px-4 text-xs text-slate-700 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100">
                </div>

                {{-- DESKRIPSI ROLE --}}
                <div
                    style="flex: 1 1 0%; min-width: 0;"
                    class="min-w-0">

                    <label for="description"
                        class="mb-2 block text-xs font-semibold text-slate-700">
                        Deskripsi Role
                    </label>

                    <textarea id="description"
                        name="description"
                        rows="1"
                        placeholder="Jelaskan tanggung jawab role ini..."
                        style="width: 100%; height: 44px; box-sizing: border-box; border: 1px solid #94a3b8; border-radius: 8px;"
                        class="resize-none bg-white px-4 py-3 text-xs text-slate-700 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100">{{ old('description') }}</textarea>
                </div>

            </div>
        </div>
      
        {{-- PENGATURAN PERMISSION --}}
        <div class="overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm">

            <div class="border-b border-slate-100 p-5">
                <h2 class="text-sm font-bold text-slate-800">
                    Pengaturan Hak Akses
                </h2>

                <p class="mt-1 text-[11px] text-slate-500">
                    Pilih fitur yang boleh diakses oleh role ini.
                </p>
            </div>

            <div class="grid grid-cols-1 gap-2.5 p-5 md:grid-cols-2">

                @forelse ($permissions as $permission)

                    <label class="flex min-w-0 cursor-pointer items-center gap-3 rounded-lg border border-slate-200 px-3 py-2.5 transition hover:border-blue-300 hover:bg-blue-50/50">

                        <input type="checkbox"
                            name="permissions[]"
                            value="{{ $permission->id }}"
                            {{ in_array($permission->id, old('permissions', [])) ? 'checked' : '' }}
                            class="h-4 w-4 shrink-0 rounded border-slate-300 text-blue-600 focus:ring-blue-500">

                        <span class="text-xs font-semibold text-slate-700">
                            {{ $permission->name }}
                        </span>

                    </label>

                @empty

                    <div class="col-span-full py-8 text-center">
                        <p class="text-xs text-slate-500">
                            Belum ada permission tersedia.
                        </p>
                    </div>

                @endforelse

            </div>
        </div>

        {{-- TOMBOL --}}
        <div class="flex flex-col-reverse justify-end gap-3 sm:flex-row">

            <a href="{{ route('admin.roles.index') }}"
                style="border: 1px solid #cbd5e1; border-radius: 10px;"
                class="inline-flex items-center justify-center bg-white px-7 py-3 text-xs font-semibold text-slate-600 transition hover:bg-slate-50">
                Batal
            </a>

            <button type="submit"
                style="border: 1px solid #ea580c; border-radius: 10px;"
                class="inline-flex items-center justify-center bg-orange-600 px-7 py-3 text-xs font-semibold text-white shadow-sm transition hover:bg-orange-700">
                Simpan Role
            </button>

        </div>

    </form>

</div>

@endsection
