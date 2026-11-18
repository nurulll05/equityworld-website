
@extends('layouts.applicant')

@section('title', 'Formulir Lamaran | Equityworld Futures')

@section('content')

<div class="mx-auto max-w-6xl">

    {{-- PILIHAN JENIS LOWONGAN --}}

    <div class="mb-6 flex justify-center">

        <div class="inline-flex rounded-full bg-white p-1.5 shadow-md ring-1 ring-slate-200">

            <span class="rounded-full px-5 py-3 text-xs font-bold
                {{ $type === 'staff' ? 'bg-orange-500 text-white' : 'text-slate-600' }}">

                Staff Kantor (Full-Time)

            </span>

            <span class="rounded-full px-5 py-3 text-xs font-bold
                {{ $type === 'internship' ? 'bg-orange-500 text-white' : 'text-slate-600' }}">

                Program Magang (Internship)

            </span>

        </div>

    </div>


    {{-- FORM UTAMA --}}

    <form
        action="{{ route('applications.store') }}"
        method="POST"
        enctype="multipart/form-data"
        class="overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm"
    >

        @csrf

        <input type="hidden" name="job_type" value="{{ $type }}">


        {{-- HEADER FORM --}}

        <div class="bg-indigo-50/70 px-6 py-7">

            <div class="mb-3 flex flex-wrap gap-2">

                <span class="rounded bg-[#101D35] px-3 py-1 text-[10px] font-bold text-white">

                    {{ $type === 'staff' ? 'STAFF KANTOR (FULL-TIME)' : 'PROGRAM MAGANG (INTERNSHIP)' }}

                </span>

                <span class="rounded bg-blue-100 px-3 py-1 text-[10px] font-bold text-blue-800">

                    {{ $branch }}

                </span>

            </div>

            <h1 class="text-xl font-extrabold text-[#101D35]">

                Formulir Lamaran

            </h1>

            <p class="mt-2 max-w-2xl text-xs leading-5 text-slate-600">

                Lengkapi data diri dan berkas utama Anda untuk proses peninjauan
                oleh tim Human Capital PT. Equityworld Futures Cabang Trillium Surabaya.

            </p>

        </div>


        <div class="space-y-7 p-5 sm:p-7">


            {{-- 1. DATA DIRI --}}

            <section>

                <div class="mb-4">

                    <h2 class="text-sm font-extrabold text-[#101D35]">

                        1. Data Diri Pelamar

                    </h2>

                    <p class="mt-1 text-xs text-slate-500">

                        Pastikan kontak aktif agar jadwal interview dapat dikirim melalui WhatsApp.

                    </p>

                </div>


                <div class="grid gap-4 md:grid-cols-2">

                    <div>

                        <label class="mb-2 block text-xs font-bold text-[#101D35]">

                            Nama Lengkap Sesuai KTP *

                        </label>

                        <input
                            type="text"
                            name="full_name"
                            value="{{ old('full_name', $user->name) }}"
                            required
                            class="w-full rounded-md border border-slate-200 bg-indigo-50/70 px-3 py-3 text-xs outline-none focus:border-orange-400"
                        >

                        @error('full_name')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                        @enderror

                    </div>


                    <div>

                        <label class="mb-2 block text-xs font-bold text-[#101D35]">

                            Nomor WhatsApp / HP Aktif *

                        </label>

                        <input
                            type="tel"
                            name="phone"
                            value="{{ old('phone', $user->phone) }}"
                            required
                            class="w-full rounded-md border border-slate-200 bg-indigo-50/70 px-3 py-3 text-xs outline-none focus:border-orange-400"
                        >

                        @error('phone')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                        @enderror

                    </div>


                    <div>

                        <label class="mb-2 block text-xs font-bold text-[#101D35]">

                            Alamat Email Aktif *

                        </label>

                        <input
                            type="email"
                            name="email"
                            value="{{ old('email', $user->email) }}"
                            required
                            class="w-full rounded-md border border-slate-200 bg-indigo-50/70 px-3 py-3 text-xs outline-none focus:border-orange-400"
                        >

                        @error('email')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                        @enderror

                    </div>


                    <div>

                        <label class="mb-2 block text-xs font-bold text-[#101D35]">

                            Kota Domisili Saat Ini *

                        </label>

                        <input
                            type="text"
                            name="domicile"
                            value="{{ old('domicile') }}"
                            placeholder="Contoh: Surabaya"
                            required
                            class="w-full rounded-md border border-slate-200 bg-indigo-50/70 px-3 py-3 text-xs outline-none focus:border-orange-400"
                        >

                        @error('domicile')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                        @enderror

                    </div>

                </div>

            </section>


            <hr class="border-slate-100">


            {{-- 2. POSISI DAN FORMASI --}}

            <section>

                <div class="mb-4">

                    <h2 class="text-sm font-extrabold text-[#101D35]">

                        2. Posisi & Formasi Jabatan

                    </h2>

                    <p class="mt-1 text-xs text-slate-500">

                        Pilih posisi dan tipe penempatan kerja di kantor cabang.

                    </p>

                </div>


                <div class="grid gap-4 md:grid-cols-2">

                    <div>

                        <label class="mb-2 block text-xs font-bold text-[#101D35]">

                            Posisi yang Dilamar *

                        </label>

                        <input
                            type="text"
                            name="position"
                            value="{{ old('position', $position) }}"
                            required
                            readonly
                            class="w-full rounded-md border border-slate-200 bg-indigo-50/70 px-3 py-3 text-xs text-slate-700 outline-none"
                        >

                        @error('position')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                        @enderror

                    </div>


                    <div>

                        <label class="mb-2 block text-xs font-bold text-[#101D35]">

                            Ketersediaan Mulai Bergabung *

                        </label>

                        <select
                            name="availability"
                            required
                            class="w-full rounded-md border border-slate-200 bg-indigo-50/70 px-3 py-3 text-xs outline-none focus:border-orange-400"
                        >

                            <option value="">Pilih ketersediaan</option>

                            <option value="Segera / 1-2 Minggu"
                                {{ old('availability') === 'Segera / 1-2 Minggu' ? 'selected' : '' }}>
                                Secepatnya / Segera (Dalam 1-2 Minggu)
                            </option>

                            <option value="2-4 Minggu"
                                {{ old('availability') === '2-4 Minggu' ? 'selected' : '' }}>
                                Dalam 2-4 Minggu
                            </option>

                            <option value="1 Bulan"
                                {{ old('availability') === '1 Bulan' ? 'selected' : '' }}>
                                Dalam 1 Bulan
                            </option>

                        </select>

                        @error('availability')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                        @enderror

                    </div>


                    <div>

                        <label class="mb-2 block text-xs font-bold text-[#101D35]">

                            Cabang Penempatan *

                        </label>

                        <input
                            type="text"
                            name="branch"
                            value="{{ old('branch', $branch) }}"
                            required
                            readonly
                            class="w-full rounded-md border border-slate-200 bg-indigo-50/70 px-3 py-3 text-xs outline-none"
                        >

                        @error('branch')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                        @enderror

                    </div>

                </div>

            </section>


            <hr class="border-slate-100">


            {{-- 3. PENDIDIKAN --}}

            <section>

                <div class="mb-4">

                    <h2 class="text-sm font-extrabold text-[#101D35]">

                        3. Pendidikan & Pengalaman

                    </h2>

                </div>


                <div class="grid gap-4 md:grid-cols-2">

                    <div>

                        <label class="mb-2 block text-xs font-bold text-[#101D35]">

                            Pendidikan Terakhir *

                        </label>

                        <select
                            name="education"
                            required
                            class="w-full rounded-md border border-slate-200 bg-indigo-50/70 px-3 py-3 text-xs outline-none"
                        >

                            <option value="">Pilih pendidikan</option>

                            @foreach(['SMA/SMK','D1','D2','D3','D4','S1','S2','S3'] as $level)

                                <option value="{{ $level }}"
                                    {{ old('education') === $level ? 'selected' : '' }}>

                                    {{ $level }}

                                </option>

                            @endforeach

                        </select>

                        @error('education')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                        @enderror

                    </div>


                    <div>

                        <label class="mb-2 block text-xs font-bold text-[#101D35]">

                            Nama Kampus / Universitas *

                        </label>

                        <input
                            type="text"
                            name="university"
                            value="{{ old('university') }}"
                            placeholder="Nama sekolah atau universitas"
                            required
                            class="w-full rounded-md border border-slate-200 bg-indigo-50/70 px-3 py-3 text-xs outline-none"
                        >

                        @error('university')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                        @enderror

                    </div>

                </div>

            </section>


            <hr class="border-slate-100">


            {{-- 4. DOKUMEN DIGITAL --}}

            <section>

                <div class="mb-4">

                    <h2 class="text-sm font-extrabold text-[#101D35]">

                        4. Kelengkapan Berkas (Digital)

                    </h2>

                    <p class="mt-1 text-xs text-slate-500">

                        Format PDF atau JPG/PNG maksimal 5MB per file.

                    </p>

                </div>


                <div class="grid gap-4 md:grid-cols-3">


                    {{-- CV --}}

                    <div>

                        <label class="mb-2 block text-xs font-bold text-[#101D35]">

                            Curriculum Vitae (CV) *

                        </label>

                        <input
                            type="file"
                            name="cv"
                            accept=".pdf,.jpg,.jpeg,.png"
                            required
                            class="block w-full rounded-lg border border-slate-200 bg-indigo-50/50 p-3 text-xs file:mr-2 file:rounded file:border-0 file:bg-[#101D35] file:px-3 file:py-2 file:text-xs file:font-bold file:text-white"
                        >

                        @error('cv')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                        @enderror

                    </div>


                    {{-- IJAZAH / TRANSKRIP --}}

                    <div>

                        <label class="mb-2 block text-xs font-bold text-[#101D35]">

                            Ijazah / Transkrip *

                        </label>

                        <input
                            type="file"
                            name="transcript"
                            accept=".pdf,.jpg,.jpeg,.png"
                            required
                            class="block w-full rounded-lg border border-slate-200 bg-indigo-50/50 p-3 text-xs file:mr-2 file:rounded file:border-0 file:bg-[#101D35] file:px-3 file:py-2 file:text-xs file:font-bold file:text-white"
                        >

                        @error('transcript')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                        @enderror

                    </div>


                    {{-- FOTO --}}

                    <div>

                        <label class="mb-2 block text-xs font-bold text-[#101D35]">

                            Pas Foto Formal (4x6) *

                        </label>

                        <input
                            type="file"
                            name="photo"
                            accept=".jpg,.jpeg,.png"
                            required
                            class="block w-full rounded-lg border border-slate-200 bg-indigo-50/50 p-3 text-xs file:mr-2 file:rounded file:border-0 file:bg-[#101D35] file:px-3 file:py-2 file:text-xs file:font-bold file:text-white"
                        >

                        @error('photo')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                        @enderror

                    </div>

                </div>

            </section>


            {{-- PERSETUJUAN --}}

            <div class="rounded-lg bg-indigo-50 p-4">

                <label class="flex cursor-pointer items-start gap-3">

                    <input
                        type="checkbox"
                        name="agreement"
                        value="1"
                        required
                        class="mt-1 h-4 w-4 accent-blue-600"
                    >

                    <span class="text-xs leading-6 text-slate-600">

                        Saya menyatakan data yang diisi adalah benar dan sah.
                        Saya bersedia mengikuti seleksi paling berjangka resmi
                        di PT. Equityworld Futures Cabang Trillium Surabaya
                        tanpa dipungut biaya apa pun.

                    </span>

                </label>

                @error('agreement')
                    <p class="mt-2 text-xs text-red-500">{{ $message }}</p>
                @enderror

            </div>


            {{-- TOMBOL --}}

            <div class="flex flex-col-reverse justify-between gap-3 border-t border-slate-100 pt-5 sm:flex-row">

                <a
                    href="{{ route('careers') }}"
                    class="rounded-lg border border-slate-200 px-5 py-3 text-center text-xs font-bold text-slate-600 hover:bg-slate-50"
                >

                    Batal / Kembali ke Katalog

                </a>


                <button
                    type="submit"
                    class="rounded-lg bg-[#101D35] px-7 py-3 text-xs font-bold text-white shadow-md transition hover:bg-orange-500"
                >

                    Kirim Lamaran Sekarang

                </button>

            </div>

        </div>

    </form>

</div>

@endsection