
@extends('layouts.applicant')

@section('title', 'Formulir Lamaran | PT Equityworld Futures')

@section('content')

<div class="mx-auto max-w-[1120px] px-3 py-6 sm:px-5 lg:px-7">

    {{-- ==========================================
         PILIHAN PROGRAM
    =========================================== --}}

    <div class="mb-5 flex justify-center">

        <div class="inline-flex items-center gap-1 rounded-full border border-slate-200 bg-white p-1 shadow-sm">

            <button
                type="button"
                data-program="staff_full_time"
                class="program-button rounded-full bg-orange-500 px-5 py-2.5 text-[10px] font-bold text-white shadow-sm transition sm:px-7"
            >

                <span class="mr-1">▣</span>
                Staff Kantor (Full-Time)

            </button>

            <button
                type="button"
                data-program="internship"
                class="program-button rounded-full px-5 py-2.5 text-[10px] font-bold text-slate-600 transition hover:bg-slate-100 sm:px-7"
            >

                <span class="mr-1">▤</span>
                Program Magang (Internship)

            </button>

        </div>

    </div>


    {{-- ==========================================
         FORMULIR LAMARAN
    =========================================== --}}

    <div class="overflow-hidden rounded-lg border border-slate-200 bg-white shadow-sm">

        {{-- HEADER FORMULIR --}}

        <div class="border-b border-slate-100 bg-[#F2F5FC] px-5 py-5 sm:px-7">

            <div class="mb-2 flex flex-wrap items-center gap-2">

                <span class="rounded-sm bg-[#102B4A] px-2 py-1 text-[9px] font-bold tracking-wide text-white">
                    STAFF KANTOR (FULL-TIME)
                </span>

                <span class="rounded-sm bg-blue-100 px-2 py-1 text-[9px] font-semibold text-blue-800">
                    ▣ Cabang Trillium Surabaya
                </span>

            </div>

            <h1 class="text-lg font-extrabold text-[#142943] sm:text-xl">
                Formulir Lamaran
            </h1>

            <p class="mt-1 max-w-2xl text-[11px] leading-5 text-slate-500">
                Lengkapi data diri dan berkas utama Anda untuk proses peninjauan oleh tim Human Capital PT. Equityworld Futures Cabang Trillium Surabaya.
            </p>

        </div>


        {{-- PESAN NOTIFIKASI --}}

        <div class="px-5 pt-4 sm:px-7">

            @if(session('success'))

                <div class="mb-3 rounded-md border border-green-200 bg-green-50 px-4 py-3 text-xs text-green-700">
                    {{ session('success') }}
                </div>

            @endif

            @if($errors->any())

                <div class="mb-3 rounded-md border border-red-200 bg-red-50 px-4 py-3 text-xs text-red-700">

                    <p class="mb-1 font-bold">
                        Terdapat data yang belum sesuai:
                    </p>

                    <ul class="list-inside list-disc space-y-1">

                        @foreach($errors->all() as $error)

                            <li>{{ $error }}</li>

                        @endforeach

                    </ul>

                </div>

            @endif

        </div>


        {{-- FORM DATA --}}

        <form
            action="{{ route('applications.store') }}"
            method="POST"
            enctype="multipart/form-data"
            class="px-5 pb-5 sm:px-7"
        >

            @csrf

            <input
                type="hidden"
                name="application_type"
                id="applicationType"
                value="{{ old('application_type', 'staff_full_time') }}"
            >


            {{-- ==========================================
                 1. DATA DIRI PELAMAR
            =========================================== --}}

            <section class="border-b border-slate-100 py-4">

                <div class="mb-3">

                    <h2 class="text-xs font-extrabold text-[#142943]">
                        <span class="mr-1 text-orange-500">①</span>
                        1. Data Diri Pelamar
                    </h2>

                    <p class="mt-1 text-[10px] text-slate-500">
                        Pastikan kontak aktif agar jadwal interview dapat dikirim via WhatsApp.
                    </p>

                </div>


                <div class="grid grid-cols-1 gap-x-5 gap-y-3 sm:grid-cols-2">

                    {{-- NAMA --}}

                    <div>

                        <label class="mb-1 block text-[10px] font-bold text-[#142943]">
                            Nama Lengkap Sesuai KTP *
                        </label>

                        <input
                            type="text"
                            name="name"
                            value="{{ old('name', $user->name) }}"
                            required
                            placeholder="Masukkan nama lengkap"
                            class="h-9 w-full rounded border border-slate-200 bg-[#F0F3FB] px-3 text-[10px] text-slate-700 outline-none transition focus:border-orange-400 focus:bg-white"
                        >

                    </div>


                    {{-- WHATSAPP --}}

                    <div>

                        <label class="mb-1 block text-[10px] font-bold text-[#142943]">
                            Nomor WhatsApp / HP Aktif *
                        </label>

                        <input
                            type="tel"
                            name="phone"
                            value="{{ old('phone', $user->phone) }}"
                            required
                            placeholder="Contoh: 081234567890"
                            class="h-9 w-full rounded border border-slate-200 bg-[#F0F3FB] px-3 text-[10px] text-slate-700 outline-none transition focus:border-orange-400 focus:bg-white"
                        >

                    </div>


                    {{-- EMAIL --}}

                    <div>

                        <label class="mb-1 block text-[10px] font-bold text-[#142943]">
                            Alamat Email Aktif *
                        </label>

                        <input
                            type="email"
                            name="email"
                            value="{{ old('email', $user->email) }}"
                            required
                            placeholder="nama@email.com"
                            class="h-9 w-full rounded border border-slate-200 bg-[#F0F3FB] px-3 text-[10px] text-slate-700 outline-none transition focus:border-orange-400 focus:bg-white"
                        >

                    </div>


                    {{-- DOMISILI --}}

                    <div>

                        <label class="mb-1 block text-[10px] font-bold text-[#142943]">
                            Kota Domisili Saat Ini *
                        </label>

                        <input
                            type="text"
                            name="domicile"
                            value="{{ old('domicile') }}"
                            required
                            placeholder="Contoh: Surabaya"
                            class="h-9 w-full rounded border border-slate-200 bg-[#F0F3FB] px-3 text-[10px] text-slate-700 outline-none transition focus:border-orange-400 focus:bg-white"
                        >

                    </div>

                </div>

            </section>


            {{-- ==========================================
                 2. POSISI DAN FORMASI
            =========================================== --}}

            <section class="border-b border-slate-100 py-4">

                <div class="mb-3">

                    <h2 class="text-xs font-extrabold text-[#142943]">
                        <span class="mr-1 text-orange-500">②</span>
                        2. Posisi & Formasi Jabatan
                    </h2>

                    <p class="mt-1 text-[10px] text-slate-500">
                        Pilih posisi dan tentukan tipe penempatan kerja di kantor Cabang Trillium Surabaya.
                    </p>

                </div>


                <div class="grid grid-cols-1 gap-x-5 gap-y-3 sm:grid-cols-2">

                    <div>

                        <label class="mb-1 block text-[10px] font-bold text-[#142943]">
                            Posisi yang Dilamar *
                        </label>

                        <input
                            type="text"
                            name="position"
                            value="{{ old('position') }}"
                            required
                            placeholder="Masukkan posisi yang dilamar"
                            class="h-9 w-full rounded border border-slate-200 bg-[#F0F3FB] px-3 text-[10px] text-slate-700 outline-none transition focus:border-orange-400 focus:bg-white"
                        >

                    </div>


                    <div>

                        <label class="mb-1 block text-[10px] font-bold text-[#142943]">
                            Ketersediaan Mulai Bergabung *
                        </label>

                        <select
                            name="availability"
                            required
                            class="h-9 w-full rounded border border-slate-200 bg-[#F0F3FB] px-3 text-[10px] text-slate-700 outline-none transition focus:border-orange-400 focus:bg-white"
                        >

                            <option value="">Pilih ketersediaan</option>

                            <option value="Secepatnya" {{ old('availability') == 'Secepatnya' ? 'selected' : '' }}>
                                Secepatnya / Segera
                            </option>

                            <option value="1-2 minggu" {{ old('availability') == '1-2 minggu' ? 'selected' : '' }}>
                                Dalam 1-2 Minggu
                            </option>

                            <option value="1 bulan" {{ old('availability') == '1 bulan' ? 'selected' : '' }}>
                                Dalam 1 Bulan
                            </option>

                            <option value="Lebih dari 1 bulan" {{ old('availability') == 'Lebih dari 1 bulan' ? 'selected' : '' }}>
                                Lebih dari 1 Bulan
                            </option>

                        </select>

                    </div>

                </div>

            </section>


            {{-- ==========================================
                 3. PENDIDIKAN DAN PENGALAMAN
            =========================================== --}}

            <section class="border-b border-slate-100 py-4">

                <div class="mb-3">

                    <h2 class="text-xs font-extrabold text-[#142943]">
                        <span class="mr-1 text-orange-500">③</span>
                        3. Pendidikan & Pengalaman
                    </h2>

                </div>


                <div class="grid grid-cols-1 gap-x-5 gap-y-3 sm:grid-cols-2">

                    <div>

                        <label class="mb-1 block text-[10px] font-bold text-[#142943]">
                            Pendidikan Terakhir *
                        </label>

                        <select
                            name="education"
                            required
                            class="h-9 w-full rounded border border-slate-200 bg-[#F0F3FB] px-3 text-[10px] text-slate-700 outline-none transition focus:border-orange-400 focus:bg-white"
                        >

                            <option value="">Pilih pendidikan terakhir</option>

                            @foreach(['SMA / SMK','D1','D2','D3','D4','S1','S2','S3'] as $education)

                                <option value="{{ $education }}"
                                    {{ old('education') == $education ? 'selected' : '' }}>
                                    {{ $education }}
                                </option>

                            @endforeach

                        </select>

                    </div>


                    <div>

                        <label class="mb-1 block text-[10px] font-bold text-[#142943]">
                            Nama Kampus / Universitas *
                        </label>

                        <input
                            type="text"
                            name="university"
                            value="{{ old('university') }}"
                            required
                            placeholder="Masukkan nama institusi pendidikan"
                            class="h-9 w-full rounded border border-slate-200 bg-[#F0F3FB] px-3 text-[10px] text-slate-700 outline-none transition focus:border-orange-400 focus:bg-white"
                        >

                    </div>

                </div>

            </section>


            {{-- ==========================================
                 4. KELENGKAPAN BERKAS
            =========================================== --}}

            <section class="py-4">

                <div class="mb-3">

                    <h2 class="text-xs font-extrabold text-[#142943]">
                        <span class="mr-1 text-orange-500">④</span>
                        4. Kelengkapan Berkas (Digital)
                    </h2>

                    <p class="mt-1 text-[10px] text-slate-500">
                        Format PDF atau JPG/PNG maksimal 5MB per file.
                    </p>

                </div>


                <div class="grid grid-cols-1 gap-3 sm:grid-cols-3">

                    {{-- CV --}}

                    <div>

                        <label
                            for="cv"
                            class="flex min-h-[90px] cursor-pointer flex-col items-center justify-center rounded border border-slate-200 bg-[#F5F7FC] p-3 text-center transition hover:border-orange-300 hover:bg-orange-50"
                        >

                            <svg class="mb-2 h-5 w-5 text-orange-500"
                                 fill="none"
                                 stroke="currentColor"
                                 viewBox="0 0 24 24">

                                <path d="M7 3h7l5 5v13H7a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2Z"
                                      stroke-width="1.7"/>

                                <path d="M14 3v5h5M9 13h7M9 17h7"
                                      stroke-width="1.7"
                                      stroke-linecap="round"/>

                            </svg>

                            <span class="text-[10px] font-bold text-[#142943]">
                                Curriculum Vitae (CV) *
                            </span>

                            <span id="cvName" class="mt-1 max-w-full truncate text-[9px] text-slate-500">
                                Pilih file PDF
                            </span>

                            <input
                                type="file"
                                name="cv"
                                id="cv"
                                accept=".pdf"
                                required
                                class="hidden"
                                onchange="showFileName(this, 'cvName')"
                            >

                        </label>

                    </div>


                    {{-- IJAZAH --}}

                    <div>

                        <label
                            for="transcript"
                            class="flex min-h-[90px] cursor-pointer flex-col items-center justify-center rounded border border-slate-200 bg-[#F5F7FC] p-3 text-center transition hover:border-orange-300 hover:bg-orange-50"
                        >

                            <svg class="mb-2 h-5 w-5 text-orange-500"
                                 fill="none"
                                 stroke="currentColor"
                                 viewBox="0 0 24 24">

                                <path d="M7 3h7l5 5v13H7a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2Z"
                                      stroke-width="1.7"/>

                                <path d="M14 3v5h5M9 13h7M9 17h7"
                                      stroke-width="1.7"
                                      stroke-linecap="round"/>

                            </svg>

                            <span class="text-[10px] font-bold text-[#142943]">
                                Ijazah / Transkrip *
                            </span>

                            <span id="transcriptName" class="mt-1 max-w-full truncate text-[9px] text-slate-500">
                                Pilih file PDF
                            </span>

                            <input
                                type="file"
                                name="transcript"
                                id="transcript"
                                accept=".pdf"
                                required
                                class="hidden"
                                onchange="showFileName(this, 'transcriptName')"
                            >

                        </label>

                    </div>


                    {{-- FOTO --}}

                    <div>

                        <label
                            for="photo"
                            class="flex min-h-[90px] cursor-pointer flex-col items-center justify-center rounded border border-slate-200 bg-[#F5F7FC] p-3 text-center transition hover:border-orange-300 hover:bg-orange-50"
                        >

                            <svg class="mb-2 h-5 w-5 text-orange-500"
                                 fill="none"
                                 stroke="currentColor"
                                 viewBox="0 0 24 24">

                                <rect x="3" y="5" width="18" height="15" rx="2"
                                      stroke-width="1.7"/>

                                <circle cx="9" cy="11" r="2"
                                        stroke-width="1.7"/>

                                <path d="m5 18 5-5 3 3 3-4 4 5"
                                      stroke-width="1.7"
                                      stroke-linecap="round"
                                      stroke-linejoin="round"/>

                            </svg>

                            <span class="text-[10px] font-bold text-[#142943]">
                                Pas Foto Formal (4x6) *
                            </span>

                            <span id="photoName" class="mt-1 max-w-full truncate text-[9px] text-slate-500">
                                Pilih JPG / PNG
                            </span>

                            <input
                                type="file"
                                name="photo"
                                id="photo"
                                accept=".jpg,.jpeg,.png"
                                required
                                class="hidden"
                                onchange="showFileName(this, 'photoName')"
                            >

                        </label>

                    </div>

                </div>

            </section>


            {{-- ==========================================
                 PERSETUJUAN
            =========================================== --}}

            <div class="rounded-md border border-blue-100 bg-[#F0F5FF] p-3">

                <label class="flex cursor-pointer items-start gap-2">

                    <input
                        type="checkbox"
                        name="agreement"
                        value="1"
                        required
                        {{ old('agreement') ? 'checked' : '' }}
                        class="mt-0.5 h-3.5 w-3.5 shrink-0 accent-blue-600"
                    >

                    <span class="text-[10px] leading-5 text-slate-600">

                        Saya menyatakan data yang diisi adalah benar dan sah. Saya bersedia mengikuti seleksi paling bertanggung jawab resmi dari PT. Equityworld Futures Cabang Trillium Surabaya tanpa dipungut biaya apa pun (Gratis & Bebas Pungutan).

                    </span>

                </label>

            </div>


            {{-- ==========================================
                 TOMBOL AKSI
            =========================================== --}}

            <div class="mt-5 flex flex-col-reverse items-stretch justify-between gap-3 sm:flex-row sm:items-center">

                <a
                    href="{{ route('careers') }}"
                    class="inline-flex min-h-9 items-center justify-center rounded border border-slate-200 bg-white px-4 py-2 text-[10px] font-bold text-slate-600 transition hover:bg-slate-50"
                >
                    Batal / Kembali ke Katalog
                </a>


                <button
                    type="submit"
                    class="inline-flex min-h-9 items-center justify-center gap-2 rounded bg-[#102B4A] px-5 py-2.5 text-[10px] font-bold text-white shadow-sm transition hover:bg-orange-500"
                >

                    <svg class="h-3.5 w-3.5"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">

                        <path d="M5 12h14m-6-6 6 6-6 6"
                              stroke-width="2"
                              stroke-linecap="round"
                              stroke-linejoin="round"/>

                    </svg>

                    Kirim Lamaran Sekarang

                </button>

            </div>

        </form>

    </div>


    {{-- ==========================================
         STATUS LAMARAN
    =========================================== --}}

    <section id="status-lamaran" class="mt-6 rounded-lg border border-slate-200 bg-white p-5 shadow-sm">

        <h2 class="text-sm font-extrabold text-[#142943]">
            Status Lamaran
        </h2>

        <p class="mt-2 text-[11px] leading-5 text-slate-500">
            Informasi status seleksi dan perkembangan lamaran akan ditampilkan di bagian ini setelah lamaran berhasil dikirim.
        </p>

    </section>

</div>

@endsection


{{-- ==========================================
     JAVASCRIPT
========================================== --}}

@push('scripts')

<script>

// ==========================================
// PILIH PROGRAM LAMARAN
// ==========================================

document.querySelectorAll('.program-button').forEach(function(button) {

    button.addEventListener('click', function() {

        const program = this.dataset.program;

        document.getElementById('applicationType').value = program;

        document.querySelectorAll('.program-button').forEach(function(item) {

            item.classList.remove(
                'bg-orange-500',
                'text-white',
                'shadow-sm'
            );

            item.classList.add(
                'text-slate-600'
            );

        });

        this.classList.add(
            'bg-orange-500',
            'text-white',
            'shadow-sm'
        );

        this.classList.remove(
            'text-slate-600'
        );

        const label = document.querySelector('.form-program-label');

        if (label) {

            label.textContent = program === 'internship'
                ? 'PROGRAM MAGANG (INTERNSHIP)'
                : 'STAFF KANTOR (FULL-TIME)';

        }

    });

});


// ==========================================
// MENAMPILKAN NAMA FILE
// ==========================================

function showFileName(input, targetId) {

    const target = document.getElementById(targetId);

    if (input.files && input.files.length > 0) {

        const file = input.files[0];

        if (file.size > 5 * 1024 * 1024) {

            alert('Ukuran file maksimal 5MB.');

            input.value = '';

            target.textContent = 'Pilih file kembali';

            return;

        }

        target.textContent = file.name;

    }

}

</script>

@endpush