
@extends('layouts.app')

@section('title', 'Karier | PT Equityworld Futures')

@section('meta_description', 'Informasi lowongan kerja dan program magang PT Equityworld Futures.')

@section('content')

{{-- HERO KARIER --}}
<section class="relative bg-gradient-to-r from-[#1c3e79] to-[#0b1733] px-5 pb-[72px] pt-12 text-center md:pt-14">
    <div class="mx-auto max-w-5xl">
        <span class="text-xs font-bold uppercase tracking-widest text-orange-400">
            Peluang Karier
        </span>

        <h1 class="mt-3 text-3xl font-extrabold leading-tight text-white md:text-5xl">
            Gabung Bersama Equityworld
        </h1>

        <p class="mx-auto mt-5 max-w-2xl text-sm leading-relaxed text-blue-100 md:text-base">
            Membangun karier impian Anda di industri keuangan.
            Kami menyediakan jalur Staff Profesional (Full-Time)
            dan Program Magang (Internship) bersertifikat.
        </p>
    </div>

   {{-- TAB STAFF DAN MAGANG --}}
    <div class="absolute bottom-0 left-1/2 z-20 w-full -translate-x-1/2 translate-y-1/2 px-5">
        <div
            class="mx-auto grid w-full max-w-[560px] grid-cols-2 gap-1 rounded-full border border-slate-200 bg-white p-2 shadow-[0_5px_15px_rgba(15,23,42,0.15)]"
            role="tablist"
            aria-label="Kategori peluang karier"
        >
            {{-- STAFF --}}
            <button
                type="button"
                id="tab-staff"
                data-career-tab="staff"
                role="tab"
                aria-selected="true"
                aria-controls="career-staff-panel"
                class="career-tab !border-0 !outline-none !ring-0 flex min-h-[50px] items-center justify-center gap-2 rounded-full bg-[#101a30] px-3 py-2 text-center text-xs font-bold text-white shadow-sm transition-all duration-300 md:text-sm"
            >
                <span>💼</span>
                Staff Kantor (Full-Time)
            </button>

            {{-- MAGANG --}}
            <button
                type="button"
                id="tab-internship"
                data-career-tab="internship"
                role="tab"
                aria-selected="false"
                aria-controls="career-internship-panel"
                class="career-tab !border-0 !outline-none !ring-0 flex min-h-[50px] items-center justify-center gap-2 rounded-full bg-transparent px-3 py-2 text-center text-xs font-semibold text-slate-600 shadow-none transition-all duration-300 md:text-sm"
            >
                <span>🎓</span>
                Program Magang
            </button>
        </div>
    </div>
</section>

{{-- KONTEN KARIER --}}
<section class="relative bg-slate-50 px-5 pb-12 pt-12 md:px-8 md:pt-14">
    <div class="mx-auto max-w-[1800px]">
     
        {{-- PANEL STAFF --}}
        <div
            id="career-staff-panel"
            class="mt-2"
            role="tabpanel"
            aria-labelledby="tab-staff"
        >
            <div class="mb-7">
                <span class="text-[10px] font-extrabold uppercase tracking-widest text-blue-600">
                    Staff Profesional
                </span>

                <h2 class="mt-2 text-xl font-extrabold text-[#142b59] md:text-2xl">
                    Lowongan Staff Kantor
                </h2>

                <p class="mt-2 text-sm text-slate-500">
                    Temukan peluang karier dan posisi yang sesuai dengan kemampuan Anda.
                </p>
            </div>

    {{-- GRID CARD STAFF --}}
    <div class="grid grid-cols-1 items-stretch gap-6 md:grid-cols-2 lg:grid-cols-3">

        {{-- CARD STAFF KANTOR --}}
        <article class="flex h-full min-w-0 flex-col rounded-2xl border border-slate-200 bg-white p-6 shadow-sm transition duration-300 hover:-translate-y-1 hover:border-slate-300 hover:shadow-md">
            <span class="inline-flex w-fit rounded-full bg-blue-50 px-4 py-2 text-xs font-bold text-blue-600">
                Full-time
            </span>

            <h3 class="mt-6 text-lg font-extrabold text-slate-900">
                Staff Kantor
            </h3>

            <p class="mt-3 text-xs leading-relaxed text-justify text-slate-500">
                Membangun hubungan profesional dengan calon nasabah,
                memberikan konsultasi strategi transaksi, serta analisis
                pasar komoditi.
            </p>

            <h4 class="mt-7 text-xs font-extrabold uppercase text-slate-900">
                Kualifikasi Utama:
            </h4>

            <ul class="mt-3 space-y-2 text-xs leading-relaxed text-slate-600">
                <li> Pendidikan minimal SMA</li>
                <li> Memiliki komunikasi yang baik</li>
                <li> Berorientasi pada target</li>
            </ul>

            <a href="{{ route('persyaratan', [
                'jenis' => 'staff',
                'posisi' => 'Staff Kantor'
                ]) }}"
                class="mt-6 flex min-h-[42px] items-center justify-center gap-2 rounded-lg bg-blue-50 px-3 py-2 text-xs font-bold text-blue-600 shadow-sm transition-all duration-300 hover:-translate-y-1 hover:bg-blue-600 hover:text-white hover:shadow-lg hover:shadow-blue-600/30">
                Lamar Posisi Ini
                <span aria-hidden="true">→</span>
            </a>
        </article>

        {{-- CARD BUSINESS CONSULTANT --}}
        <article class="flex h-full min-w-0 flex-col rounded-2xl border border-slate-200 bg-white p-6 shadow-sm transition duration-300 hover:-translate-y-1 hover:border-slate-300 hover:shadow-md">
            <span class="inline-flex w-fit rounded-full bg-blue-50 px-4 py-2 text-xs font-bold text-blue-600">
                Full-time
            </span>

            <h3 class="mt-6 text-lg font-extrabold text-slate-900">
                Business Consultant
            </h3>

            <p class="mt-3 text-xs leading-relaxed text-justify text-slate-500">
                Program pengembangan profesional untuk membangun kemampuan
                konsultasi, komunikasi bisnis, dan pengembangan hubungan
                dengan nasabah.
            </p>

            <h4 class="mt-7 text-xs font-extrabold uppercase text-slate-900">
                Kualifikasi Utama:
            </h4>

            <ul class="mt-3 space-y-2 text-xs leading-relaxed text-slate-600">
                <li> Fresh graduate dipersilakan</li>
                <li> Disiplin dan jujur</li>
                <li> Memiliki kemampuan komunikasi</li>
            </ul>

            <a href="{{ route('persyaratan', [
                    'jenis' => 'staff',
                    'posisi' => 'Business Consultant'
                ]) }}"
                class="mt-6 flex min-h-[42px] items-center justify-center gap-2 rounded-lg bg-blue-50 px-3 py-2 text-xs font-bold text-blue-600 shadow-sm transition-all duration-300 hover:-translate-y-1 hover:bg-blue-600 hover:text-white hover:shadow-lg hover:shadow-blue-600/30">
                Lamar Posisi Ini
                <span aria-hidden="true">→</span>
            </a>
        </article>

        {{-- CARD DRIVER --}}
        <article class="flex h-full min-w-0 flex-col rounded-2xl border border-slate-200 bg-white p-6 shadow-sm transition duration-300 hover:-translate-y-1 hover:border-slate-300 hover:shadow-md">
            <span class="inline-flex w-fit rounded-full bg-blue-50 px-4 py-2 text-xs font-bold text-blue-600">
                Full-time
            </span>

            <h3 class="mt-6 text-lg font-extrabold text-slate-900">
                Driver
            </h3>

            <p class="mt-3 text-xs leading-relaxed text-justify text-slate-500">
                Mendukung kebutuhan transportasi dan operasional perusahaan
                dengan mengutamakan keselamatan, ketepatan waktu, serta
                pelayanan profesional.
            </p>

            <h4 class="mt-7 text-xs font-extrabold uppercase text-slate-900">
                Kualifikasi Utama:
            </h4>

            <ul class="mt-3 space-y-2 text-xs leading-relaxed text-slate-600">
                <li> Memiliki SIM A aktif</li>
                <li> Teliti dan bertanggung jawab</li>
                <li> Memiliki pengalaman mengemudi</li>
            </ul>

            <a href="{{ route('persyaratan', [
                    'jenis' => 'staff',
                    'posisi' => 'Driver'
                ]) }}"
                class="mt-6 flex min-h-[42px] items-center justify-center gap-2 rounded-lg bg-blue-50 px-3 py-2 text-xs font-bold text-blue-600 shadow-sm transition-all duration-300 hover:-translate-y-1 hover:bg-blue-600 hover:text-white hover:shadow-lg hover:shadow-blue-600/30">
                Lamar Posisi Ini
                <span aria-hidden="true">→</span>
            </a>
        </article>

    </div>
</div>
        
        {{-- PANEL MAGANG --}}
        <div
            id="career-internship-panel"
            class="mt-2"
            role="tabpanel"
            aria-labelledby="tab-internship"
            hidden
        >
            {{-- GRID CARD MAGANG --}}
            <div class="mx-auto grid max-w-[1450px] grid-cols-1 items-stretch gap-6 md:grid-cols-2">

                {{-- CARD MAGANG SMA/SMK --}}
                <article class="flex h-full min-w-0 flex-col rounded-2xl border border-slate-200 bg-white p-6 shadow-sm transition-all duration-300 hover:-translate-y-1 hover:border-orange-200 hover:shadow-lg">

                    <span class="inline-flex w-fit rounded-full bg-orange-50 px-4 py-2 text-xs font-bold text-orange-600">
                        Program Magang
                    </span>

                    <h3 class="mt-6 text-lg font-extrabold text-slate-900">
                        Magang SMA/SMK
                    </h3>

                    <p class="mt-3 text-sm leading-relaxed text-slate-500">
                        Kesempatan bagi siswa SMA/SMK untuk memperoleh pengalaman
                        kerja secara langsung, mengenal lingkungan profesional,
                        serta mengembangkan keterampilan dan kedisiplinan.
                    </p>

                    <h4 class="mt-7 text-xs font-extrabold uppercase text-slate-900">
                        Kualifikasi Umum:
                    </h4>

                    <ul class="mt-4 list-disc space-y-3 pl-4 text-xs leading-relaxed text-slate-600">
                        <li>Siswa aktif SMA/SMK atau sederajat</li>
                        <li>Memiliki kemauan belajar</li>
                        <li>Disiplin dan bertanggung jawab</li>
                    </ul>

                    <a
                        href="{{ route('persyaratan', [
                            'jenis' => 'magang',
                            'kategori' => 'Magang SMA/SMK'
                        ]) }}"
                        class="mt-8 flex min-h-[40px] items-center justify-center gap-2 rounded-lg bg-orange-50 px-3 py-2 text-xs font-bold text-orange-600 shadow-sm transition-all duration-300 hover:-translate-y-1 hover:bg-orange-500 hover:text-white hover:shadow-lg hover:shadow-orange-500/30"
                    >
                        Daftar Sekarang
                        <span aria-hidden="true">→</span>
                    </a>
                </article>

                {{-- CARD MAGANG MAHASISWA --}}
                <article class="flex h-full min-w-0 flex-col rounded-2xl border border-slate-200 bg-white p-6 shadow-sm transition-all duration-300 hover:-translate-y-1 hover:border-blue-200 hover:shadow-lg">

                    <span class="inline-flex w-fit rounded-full bg-blue-50 px-4 py-2 text-xs font-bold text-blue-600">
                        Program Magang
                    </span>

                    <h3 class="mt-6 text-lg font-extrabold text-slate-900">
                        Magang Mahasiswa
                    </h3>

                    <p class="mt-3 text-sm leading-relaxed text-slate-500">
                        Program pengembangan mahasiswa untuk memperoleh pengalaman
                        profesional, menerapkan ilmu perkuliahan, serta memahami
                        proses kerja di lingkungan industri jasa keuangan.
                    </p>

                    <h4 class="mt-7 text-xs font-extrabold uppercase text-slate-900">
                        Kualifikasi Umum:
                    </h4>

                    <ul class="mt-4 list-disc space-y-3 pl-4 text-xs leading-relaxed text-slate-600">
                        <li>Mahasiswa aktif perguruan tinggi</li>
                        <li>Memiliki minat untuk belajar</li>
                        <li>Mampu bekerja sama dan bertanggung jawab</li>
                    </ul>

                    <a
                        href="{{ route('persyaratan', [
                            'jenis' => 'magang',
                            'kategori' => 'Magang Mahasiswa'
                        ]) }}"
                        class="mt-8 flex min-h-[40px] items-center justify-center gap-2 rounded-lg bg-blue-50 px-3 py-2 text-xs font-bold text-blue-600 shadow-sm transition-all duration-300 hover:-translate-y-1 hover:bg-blue-600 hover:text-white hover:shadow-lg hover:shadow-blue-600/30"
                    >
                        Daftar Sekarang
                        <span aria-hidden="true">→</span>
                    </a>
                </article>

            </div>
        </div>

    </div>
</section>

@endsection
