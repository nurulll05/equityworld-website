@extends('layouts.app')

@section('title', 'Beranda | PT Equityworld Futures')

@section('meta_description', 'Informasi profil, legalitas, peluang karier, dan berita PT Equityworld Futures.')

@section('content')

<div class="ewf-home">

{{-- HERO SECTION --}}
<section class="relative isolate flex min-h-[540px] items-center overflow-hidden bg-[#08132d] py-10 lg:min-h-[560px] lg:py-12">

    {{-- BACKGROUND GEDUNG SISI KANAN --}}
    <img
        src="{{ asset('images/gedung.jpeg') }}"
        alt=""
        aria-hidden="true"
        class="pointer-events-none absolute right-0 top-0 -z-20 h-full w-full object-cover object-right opacity-80 lg:w-[75%]"
    >

    {{-- GRADIENT MENYATUKAN GEDUNG DENGAN NAVY --}}
    <div class="pointer-events-none absolute inset-0 -z-10 bg-gradient-to-r from-[#08132d] from-10% via-[#08132d]/75 via-45% to-[#08132d]/10"></div>
    {{-- GRADIENT BAWAH --}}
    <div class="pointer-events-none absolute inset-0 -z-10 bg-gradient-to-t from-[#08132d]/90 via-transparent to-[#08132d]/20"></div>

    {{-- AKSEN CAHAYA --}}
    <div class="pointer-events-none absolute -right-32 bottom-0 -z-10 h-80 w-80 rounded-full bg-orange-500/10 blur-[100px]"></div>

    <div class="mx-auto grid w-full max-w-[1540px] grid-cols-1 items-center gap-9 px-6 md:px-10 lg:grid-cols-[1.15fr_0.85fr] lg:gap-10 lg:px-14">

        {{-- KONTEN KIRI --}}
        <div class="relative z-10 text-white">

            {{-- STATUS KONEKSI --}}
            <span class="mb-6 inline-flex items-center gap-3 rounded-full border border-white/10 bg-white/[0.08] px-4 py-2.5 text-[10px] font-semibold tracking-wider text-blue-100 sm:text-[11px]">

                <span
                    id="connection-indicator"
                    class="h-2 w-2 shrink-0 rounded-full bg-emerald-400 animate-pulse shadow-[0_0_12px_rgba(52,211,153,0.8)]"
                    aria-label="Status koneksi"
                    title="Memeriksa koneksi"
                ></span>

                PERUSAHAAN PERDAGANGAN BERJANGKA TERPERCAYA

            </span>

            {{-- JUDUL --}}
            <h1 class="max-w-3xl font-['Manrope'] text-4xl font-extrabold leading-[1.1] tracking-tight sm:text-5xl lg:text-[48px] xl:text-[54px]">

                Membangun Masa
                <br>
                Depan Finansial
                <br>
                Bersama <span class="text-orange-500">Equityworld</span>

            </h1>

            {{-- DESKRIPSI --}}
            <p class="mt-5 max-w-xl text-sm leading-7 text-blue-100 sm:text-[15px]">
                Penyedia layanan transaksi perdagangan berjangka
                profesional dan transparan di Indonesia. Didukung
                oleh regulasi resmi dan tenaga ahli berpengalaman.
            </p>

            {{-- TOMBOL --}}
            <div class="mt-6 flex flex-wrap gap-3">

                <a
                    href="{{ route('about') }}"
                    class="inline-flex items-center gap-3 rounded-lg bg-blue-600 px-5 py-3 text-xs font-bold text-white shadow-lg shadow-blue-600/20 transition duration-300 hover:-translate-y-1 hover:bg-blue-500 sm:px-6 sm:py-3.5 sm:text-sm"
                >
                    Tentang Perusahaan
                    <span aria-hidden="true">→</span>
                </a>

                <a
                    href="{{ route('careers') }}"
                    class="inline-flex items-center gap-3 rounded-lg bg-orange-500 px-5 py-3 text-xs font-bold text-white shadow-lg shadow-orange-500/20 transition duration-300 hover:-translate-y-1 hover:bg-orange-400 sm:px-6 sm:py-3.5 sm:text-sm"
                >
                    <svg
                        class="h-4 w-4 shrink-0"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="1.8"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        aria-hidden="true"
                    >
                        <rect x="3" y="7" width="18" height="14" rx="2"/>
                        <path d="M8 7V5a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/>
                        <path d="M3 12h18"/>
                        <path d="M10 12v2h4v-2"/>
                    </svg>

                    Gabung Karier &amp; Magang
                </a>
            </div>

            {{-- STATISTIK --}}
            <div class="mt-7 grid max-w-xl grid-cols-3 gap-4 border-t border-white/15 pt-5 sm:gap-6">

                <div>
                    <strong class="block text-2xl font-extrabold text-white">
                        100%
                    </strong>
                    <span class="mt-1 block text-[10px] leading-5 text-blue-200 sm:text-xs">
                        Terdaftar BAPPEBTI*
                    </span>
                </div>

                <div>
                    <strong class="block text-2xl font-extrabold text-white">
                        10+
                    </strong>
                    <span class="mt-1 block text-[10px] leading-5 text-blue-200 sm:text-xs">
                        Tahun Pengalaman*
                    </span>
                </div>

                <div>
                    <strong class="block text-2xl font-extrabold text-white">
                        100%
                    </strong>
                    <span class="mt-1 block text-[10px] leading-5 text-blue-200 sm:text-xs">
                        Harga Live*
                    </span>
                </div>

            </div>

        </div>

        {{-- PANEL INFORMASI KANAN --}}
        <div class="relative z-10 rounded-2xl border border-white/15 bg-[#101e3b]/85 p-4 shadow-2xl shadow-black/30 backdrop-blur-md sm:p-5">

            {{-- TRADING CENTER --}}
            <div class="mb-3 flex items-center gap-3 rounded-xl border border-white/10 bg-[#0d1a35]/90 p-3 sm:p-4">

                <span class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-orange-500/15 text-orange-400">
                    <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="1.8"
                        stroke-linecap="round" stroke-linejoin="round"
                        aria-hidden="true">
                        <path d="M3 17l6-6 4 4 8-9"/>
                        <path d="M15 6h6v6"/>
                        <path d="M4 21h16"/>
                    </svg>
                </span>

                <div class="min-w-0 flex-1">
                    <strong class="block text-xs text-white sm:text-sm">
                        Trading Center
                    </strong>
                    <small class="mt-1 block text-[10px] text-slate-400 sm:text-xs">
                        Komoditi &amp; Multilateral
                    </small>
                </div>

                <span class="whitespace-nowrap rounded-md bg-emerald-500/15 px-2 py-1.5 text-[9px] font-semibold text-emerald-300 sm:text-[10px]">
                    Resmi &amp; Aman
                </span>

            </div>

            {{-- KEAMANAN DANA --}}
            <div class="mb-3 flex items-center gap-3 rounded-xl border border-white/10 bg-[#0d1a35]/90 p-3 sm:p-4">

                <span class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-blue-500/15 text-blue-300">
                    <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="1.8"
                        stroke-linecap="round" stroke-linejoin="round"
                        aria-hidden="true">
                        <path d="M12 22s8-4 8-11V5l-8-3-8 3v6c0 7 8 11 8 11Z"/>
                        <path d="m9 12 2 2 4-4"/>
                    </svg>
                </span>

                <div class="min-w-0 flex-1">
                    <strong class="block text-xs text-white sm:text-sm">
                        Keamanan Dana Nasabah
                    </strong>
                    <small class="mt-1 block text-[10px] text-slate-400 sm:text-xs">
                        Pemisahan Dana Transaksi
                    </small>
                </div>

                <span class="whitespace-nowrap rounded-md bg-emerald-500/15 px-2 py-1.5 text-[9px] font-semibold text-emerald-300 sm:text-[10px]">
                    Segregated Account
                </span>

            </div>

            {{-- DUKUNGAN PROFESIONAL --}}
            <div class="flex items-center gap-3 rounded-xl border border-white/10 bg-[#0d1a35]/90 p-3 sm:p-4">

                <span class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-amber-500/15 text-amber-300">
                    <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="1.8"
                        stroke-linecap="round" stroke-linejoin="round"
                        aria-hidden="true">
                        <path d="M16 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                        <circle cx="10" cy="7" r="4"/>
                        <path d="M20 21v-2a4 4 0 0 0-3-3.87"/>
                        <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
                    </svg>
                </span>

                <div class="min-w-0 flex-1">
                    <strong class="block text-xs text-white sm:text-sm">
                        Dukungan Profesional
                    </strong>
                    <small class="mt-1 block text-[10px] text-slate-400 sm:text-xs">
                        Tim Riset &amp; Edukasi
                    </small>
                </div>

                <span class="whitespace-nowrap rounded-md bg-slate-500/20 px-2 py-1.5 text-[9px] font-semibold text-slate-300 sm:text-[10px]">
                    24/7 Konsultasi
                </span>

            </div>

            {{-- TAGLINE --}}
            <div class="mt-4 border-t border-white/10 pt-4 text-center text-[9px] font-bold tracking-[0.2em] text-blue-100 sm:pt-5 sm:text-[10px]">

                AMAN
                <span class="text-orange-400">•</span>
                NYAMAN
                <span class="text-orange-400">•</span>
                UNTUNG

            </div>

        </div>

    </div>
</section>


{{-- PROFIL PERUSAHAAN --}}
<section class="bg-[#f7f9fc] px-6 pt-6 pb-8 sm:px-8 lg:px-10 lg:pt-8 lg:pb-10">

    <div class="mx-auto max-w-[1200px]">

        {{-- JUDUL SECTION --}}
        <div class="mb-9 text-center">

            <span class="text-[10px] font-extrabold tracking-[0.12em] text-orange-500">
                PROFIL PERUSAHAAN
            </span>

            <h2 class="mt-2 font-['Manrope'] text-2xl font-extrabold tracking-tight text-[#172033] sm:text-3xl">
                Mengenal PT Equityworld Futures
            </h2>

            <div class="mx-auto mt-3 h-[3px] w-11 rounded-full bg-orange-500"></div>

            <p class="mx-auto mt-3 max-w-2xl text-xs leading-6 text-slate-500 sm:text-sm">
                PT Equityworld Futures adalah anggota Bursa Berjangka
                yang diawasi langsung oleh BAPPEBTI.
            </p>

        </div>

        {{-- GRID KARTU --}}
        <div class="grid grid-cols-1 items-start gap-6 lg:grid-cols-2">

            {{-- KARTU VISI DAN MISI --}}
            <article class="rounded-2xl border border-slate-200 bg-white p-6 shadow-[0_8px_25px_rgba(15,23,42,0.07)] ring-1 ring-slate-900/[0.02] transition duration-300 hover:-translate-y-1 hover:shadow-[0_14px_32px_rgba(15,23,42,0.10)] sm:p-7">

                {{-- JUDUL KARTU --}}
                <div class="mb-5 flex items-center gap-3">

                    <span class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg bg-blue-50 text-blue-600">
                                                <svg class="h-6 w-6" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" aria-hidden="true">
                            <circle cx="12" cy="12" r="9"/>
                            <circle cx="12" cy="12" r="5"/>
                            <circle cx="12" cy="12" r="1.5"/>
                            <path d="m14 10 7-7"/>
                            <path d="M16 3h5v5"/>
                        </svg>
                    </span>

                    <h3 class="font-['Manrope'] text-sm font-extrabold text-[#172033]">
                        Visi &amp; Misi
                    </h3>

                </div>

                {{-- VISI --}}
                <div class="mb-5">

                    <h4 class="mb-2 text-[11px] font-bold text-[#172033]">
                        Visi:
                    </h4>

                    <p class="text-[11px] leading-[1.8] text-slate-500 sm:text-xs">
                        Menjadi perusahaan pialang berjangka yang unggul
                        dan terpercaya, dengan standar operasional yang
                        modern, transparan, serta memberikan nilai
                        strategis bagi perkembangan industri dan
                        perekonomian nasional.
                    </p>

                </div>

                {{-- MISI --}}
                <div>

                    <h4 class="mb-2 text-[11px] font-bold text-[#172033]">
                        Misi:
                    </h4>

                    <ul class="list-disc space-y-1 pl-4 text-[11px] leading-[1.65] text-slate-500 sm:text-xs">

                        <li>
                            Menyediakan layanan perdagangan berjangka
                            yang profesional, aman, dan berintegritas tinggi.
                        </li>

                        <li>
                            Mengembangkan kualitas sumber daya manusia
                            untuk menghadirkan layanan yang kompeten
                            dan berdaya saing.
                        </li>

                        <li>
                            Mengimplementasikan tata kelola perusahaan
                            yang transparan dan akuntabel.
                        </li>

                        <li>
                            Memperluas akses edukasi serta literasi
                            perdagangan berjangka kepada masyarakat.
                        </li>

                    </ul>

                </div>

            </article>

            {{-- KARTU MENGAPA MEMILIH EQUITYWORLD --}}
            <article class="rounded-2xl border border-slate-200 bg-white p-6 shadow-[0_8px_25px_rgba(15,23,42,0.07)] ring-1 ring-slate-900/[0.02] transition duration-300 hover:-translate-y-1 hover:shadow-[0_14px_32px_rgba(15,23,42,0.10)] sm:p-7">
                <h3 class="mb-6 font-['Manrope'] text-sm font-extrabold text-[#172033]">
                    Mengapa Memilih Equityworld?
                </h3>

                <div class="space-y-5">

                    {{-- KEUNGGULAN 1 --}}
                    <div class="flex items-start gap-3">

                        <span class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg bg-orange-100 text-orange-500">
                            <svg class="h-6 w-6" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" aria-hidden="true">
                                <path d="M12 22s8-4 8-11V5l-8-3-8 3v6c0 7 8 11 8 11Z"/>
                                <path d="m9 12 2 2 4-4"/>
                            </svg>
                        </span>

                        <div class="min-w-0 pt-0.5">

                            <h4 class="text-[11px] font-bold text-[#172033]">
                                Legalitas &amp; Regulasi Jelas
                            </h4>

                            <p class="mt-1 text-[10px] leading-[1.7] text-slate-500 sm:text-[11px]">
                                Beroperasi di bawah lisensi dan pengawasan
                                otoritas terkait.
                            </p>

                        </div>

                    </div>

                    {{-- KEUNGGULAN 2 --}}
                    <div class="flex items-start gap-3">

                        <span class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg bg-blue-100 text-blue-500">
                            <svg class="h-6 w-6" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" aria-hidden="true">
                                <path d="M3 3v18h18"/>
                                <path d="m7 14 4-4 4 4 6-7"/>
                                <path d="M17 7h4v4"/>
                            </svg>
                        </span>

                        <div class="min-w-0 pt-0.5">

                            <h4 class="text-[11px] font-bold text-[#172033]">
                                Teknologi Transaksi Modern
                            </h4>

                            <p class="mt-1 text-[10px] leading-[1.7] text-slate-500 sm:text-[11px]">
                                Sistem transaksi yang cepat, stabil,
                                dan transparan secara real-time.
                            </p>

                        </div>

                    </div>

                    {{-- KEUNGGULAN 3 --}}
                    <div class="flex items-start gap-3">

                        <span class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg bg-amber-100 text-amber-500">
                            <svg class="h-6 w-6" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" aria-hidden="true">
                                <path d="M16 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                                <circle cx="10" cy="7" r="4"/>
                                <path d="M20 21v-2a4 4 0 0 0-3-3.87"/>
                                <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
                            </svg>
                        </span>

                        <div class="min-w-0 pt-0.5">

                            <h4 class="text-[11px] font-bold text-[#172033]">
                                Pengembangan Karier Optimal
                            </h4>

                            <p class="mt-1 text-[10px] leading-[1.7] text-slate-500 sm:text-[11px]">
                                Pelatihan komprehensif untuk staf dan
                                magang guna meningkatkan profesionalitas.
                            </p>

                        </div>

                    </div>

                </div>

            </article>

        </div>

    </div>

</section>


{{-- LEGALITAS --}}
<section class="bg-[#f1f5f9] px-6 pt-8 pb-10 sm:px-8 lg:px-10 lg:pt-10 lg:pb-12">

    <div class="mx-auto max-w-[1400px]">

        {{-- JUDUL SECTION --}}
        <div class="mb-8 text-center">

            <span class="text-[10px] font-extrabold tracking-[0.12em] text-orange-500">
                LISENSI &amp; REGULASI
            </span>

            <h2 class="mt-2 font-['Manrope'] text-2xl font-extrabold tracking-tight text-[#172033] sm:text-3xl">
                Legalitas Resmi Perusahaan
            </h2>

            <div class="mx-auto mt-3 h-[3px] w-11 rounded-full bg-orange-500"></div>

            <p class="mx-auto mt-3 max-w-2xl text-xs leading-6 text-slate-500 sm:text-sm">
                PT Equityworld Futures beroperasi secara resmi di bawah
                naungan regulasi pemerintah Republik Indonesia dan
                lembaga pengawas resmi terkait.
            </p>

        </div>

        {{-- KARTU LEGALITAS --}}
        <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3">

            {{-- BAPPEBTI --}}
            <article class="group rounded-xl border border-slate-200 bg-white p-5 shadow-[0_4px_14px_rgba(15,23,42,0.04)] transition duration-300 hover:-translate-y-1 hover:border-blue-200 hover:shadow-lg">

                <div class="mb-4 flex items-center justify-between">

                    <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-blue-50 text-blue-600">

                        <svg class="h-5 w-5" viewBox="0 0 24 24"
                             fill="none" stroke="currentColor"
                             stroke-width="1.8" stroke-linecap="round"
                             stroke-linejoin="round" aria-hidden="true">
                            <rect x="4" y="3" width="16" height="18" rx="2"/>
                            <path d="M9 21v-4h6v4"/>
                            <path d="M9 7h1"/>
                            <path d="M14 7h1"/>
                            <path d="M9 11h1"/>
                            <path d="M14 11h1"/>
                        </svg>

                    </span>

                    <span class="inline-flex items-center gap-1 rounded-full border border-emerald-200 bg-emerald-50 px-2.5 py-1 text-[9px] font-bold text-emerald-600">
                        <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span>
                        Terverifikasi*
                    </span>

                </div>

                <h3 class="font-['Manrope'] text-sm font-extrabold text-[#172033]">
                    BAPPEBTI
                </h3>

                <p class="mt-1 text-[10px] font-semibold text-slate-500">
                    Izin Usaha Pialang Berjangka
                </p>

                <p class="mt-3 text-[11px] leading-[1.7] text-slate-500">
                    Badan Pengawas Perdagangan Berjangka Komoditi
                    di bawah Kementerian Perdagangan Republik Indonesia.
                </p>

            </article>

            {{-- BURSA BERJANGKA JAKARTA --}}
            <article class="group rounded-xl border border-slate-200 bg-white p-5 shadow-[0_4px_14px_rgba(15,23,42,0.04)] transition duration-300 hover:-translate-y-1 hover:border-orange-200 hover:shadow-lg">

                <div class="mb-4 flex items-center justify-between">

                    <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-orange-50 text-orange-500">

                        <svg class="h-5 w-5" viewBox="0 0 24 24"
                             fill="none" stroke="currentColor"
                             stroke-width="1.8" stroke-linecap="round"
                             stroke-linejoin="round" aria-hidden="true">
                            <path d="M3 5h18l-2 12H5L3 5Z"/>
                            <path d="M7 21h10"/>
                            <path d="M12 17v4"/>
                            <path d="m7 9 3 3 3-4 4 4"/>
                        </svg>

                    </span>

                    <span class="inline-flex items-center gap-1 rounded-full border border-emerald-200 bg-emerald-50 px-2.5 py-1 text-[9px] font-bold text-emerald-600">
                        <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span>
                        Anggota Resmi*
                    </span>

                </div>

                <h3 class="font-['Manrope'] text-sm font-extrabold text-[#172033]">
                    BBJ (Bursa Berjangka Jakarta)
                </h3>

                <p class="mt-1 text-[10px] font-semibold text-slate-500">
                    Bursa Berjangka Komoditi pertama di Indonesia
                </p>

                <p class="mt-3 text-[11px] leading-[1.7] text-slate-500">
                    Sebagai sarana jual beli kontrak berjangka komoditi
                    secara transparan.
                </p>

            </article>

            {{-- KBI --}}
            <article class="group rounded-xl border border-slate-200 bg-white p-5 shadow-[0_4px_14px_rgba(15,23,42,0.04)] transition duration-300 hover:-translate-y-1 hover:border-blue-200 hover:shadow-lg sm:col-span-2 lg:col-span-1">

                <div class="mb-4 flex items-center justify-between">

                    <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-blue-50 text-blue-600">

                        <svg class="h-5 w-5" viewBox="0 0 24 24"
                             fill="none" stroke="currentColor"
                             stroke-width="1.8" stroke-linecap="round"
                             stroke-linejoin="round" aria-hidden="true">
                            <path d="M7 3h7l5 5v13H7a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2Z"/>
                            <path d="M14 3v5h5"/>
                            <path d="M9 14h6"/>
                            <path d="M9 17h6"/>
                        </svg>

                    </span>

                    <span class="inline-flex items-center gap-1 rounded-full border border-emerald-200 bg-emerald-50 px-2.5 py-1 text-[9px] font-bold text-emerald-600">
                        <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span>
                        Terdaftar*
                    </span>

                </div>

                <h3 class="font-['Manrope'] text-sm font-extrabold text-[#172033]">
                    KBI (Kliring Berjangka)
                </h3>

                <p class="mt-1 text-[10px] font-semibold text-slate-500">
                    PT Kliring Berjangka Indonesia
                </p>

                <p class="mt-3 text-[11px] leading-[1.7] text-slate-500">
                    Lembaga yang bertugas menyelesaikan dan
                    mengkompensasi transaksi perdagangan berjangka
                    di Indonesia.
                </p>

            </article>

        </div>

        {{-- BANNER REKENING TERPISAH --}}
        <div class="mt-5 flex flex-col gap-4 rounded-xl border border-slate-800 bg-[#101a30] p-4 shadow-lg sm:flex-row sm:items-center sm:justify-between sm:px-5 sm:py-4">

            <div class="flex items-center gap-3">

                <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-orange-500 text-white">

                    <svg class="h-5 w-5" viewBox="0 0 24 24"
                         fill="none" stroke="currentColor"
                         stroke-width="1.8" stroke-linecap="round"
                         stroke-linejoin="round" aria-hidden="true">
                        <rect x="3" y="10" width="18" height="11" rx="2"/>
                        <path d="M7 10V7a5 5 0 0 1 10 0v3"/>
                        <path d="m10 15 1.5 1.5L15 13"/>
                    </svg>

                </span>

                <div>

                    <h3 class="text-xs font-extrabold text-white sm:text-sm">
                        Rekening Terpisah (Segregated Account)
                    </h3>

                    <p class="mt-1 text-[10px] leading-relaxed text-slate-400 sm:text-[11px]">
                        Seluruh dana nasabah disimpan dalam rekening terpisah
                        di bank yang ditunjuk oleh BAPPEBTI.
                    </p>

                </div>

            </div>

            <a
                href="{{ route('legality') }}"
                class="inline-flex shrink-0 items-center justify-center gap-2 rounded-lg border border-slate-600 bg-slate-700/50 px-4 py-2.5 text-[10px] font-bold text-slate-200 transition hover:border-orange-400 hover:bg-orange-500 hover:text-white"
            >
                Terverifikasi
            </a>

        </div>
    </div>

</section>



{{-- KARIER --}}
<section class="bg-[#f7f9fc] px-6 pt-10 pb-6 sm:px-8 lg:px-10 lg:pt-12 lg:pb-6">
    <div class="mx-auto max-w-[1400px]">

        {{-- JUDUL --}}
        <div class="text-center">
            <span class="text-[10px] font-extrabold tracking-[0.12em] text-orange-500">
                PELUANG KARIER &amp; PENGEMBANGAN
            </span>

            <h2 class="mt-2 font-['Manrope'] text-2xl font-extrabold tracking-tight text-[#172033] sm:text-3xl">
                Bergabung Bersama Tim Equityworld
            </h2>

            <div class="mx-auto mt-3 h-[3px] w-11 rounded-full bg-orange-500"></div>

            <p class="mx-auto mt-3 max-w-2xl text-xs leading-6 text-slate-500 sm:text-sm">
                Kembangkan potensi dan karier Anda di industri jasa keuangan
                profesional. Kami membuka kesempatan untuk Staff Profesional
                dan Program Magang Mahasiswa/Lulusan Baru.
            </p>
        </div>

        {{-- TAB KATEGORI --}}
        <div class="mt-7 flex justify-center px-2">
            <div
                class="relative isolate grid w-full max-w-[560px] grid-cols-2 rounded-xl border border-slate-300 bg-white p-1.5 shadow-[0_2px_8px_rgba(15,23,42,0.08)]"
                role="tablist"
                aria-label="Kategori peluang karier"
            >

                {{-- INDIKATOR AKTIF --}}
                <span
                    id="career-tab-indicator"
                    class="pointer-events-none absolute left-1.5 top-1.5 bottom-1.5 z-0 w-[calc(50%-0.375rem)] rounded-lg bg-[#101a30] shadow-md transition-transform duration-300 ease-in-out"
                ></span>

                {{-- STAFF --}}
                <button
                    type="button"
                    role="tab"
                    id="tab-staff"
                    data-career-tab="staff"
                    aria-selected="true"
                    aria-controls="career-staff-panel"
                    class="relative z-10 flex min-h-[44px] appearance-none items-center justify-center gap-2 rounded-lg border-0 bg-transparent px-2 py-2 text-center text-xs font-bold text-white outline-none sm:text-sm"
                >
                    <svg class="h-4 w-4 shrink-0" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="1.8"
                        stroke-linecap="round" stroke-linejoin="round"
                        aria-hidden="true">
                        <rect x="3" y="7" width="18" height="14" rx="2"/>
                        <path d="M8 7V5a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/>
                        <path d="M3 12h18"/>
                    </svg>
                    Staff Kantor (Full-Time)
                </button>

                {{-- MAGANG --}}
                <button
                    type="button"
                    role="tab"
                    id="tab-internship"
                    data-career-tab="internship"
                    aria-selected="false"
                    aria-controls="career-internship-panel"
                    class="relative z-10 flex min-h-[44px] appearance-none items-center justify-center gap-2 rounded-lg border-0 bg-transparent px-2 py-2 text-center text-xs font-semibold text-slate-600 outline-none sm:text-sm"
                >
                    <svg class="h-4 w-4 shrink-0" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="1.8"
                        stroke-linecap="round" stroke-linejoin="round"
                        aria-hidden="true">
                        <path d="m2 10 10-5 10 5-10 5-10-5Z"/>
                        <path d="M6 12v5c3 3 9 3 12 0v-5"/>
                        <path d="M22 10v6"/>
                    </svg>
                    Program Magang
                </button>

            </div>
        </div>

        {{-- PANEL STAFF --}}
        <div
            id="career-staff-panel"
            class="mt-8 grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3 [&[hidden]]:!hidden"
            role="tabpanel"
            aria-labelledby="tab-staff"
        >

            {{-- STAFF KANTOR --}}
            <article class="flex h-full flex-col rounded-xl border border-slate-200 bg-white p-5 shadow-sm transition hover:-translate-y-1 hover:shadow-lg">
                <span class="w-fit rounded-full bg-blue-50 px-2.5 py-1 text-[9px] font-bold text-blue-600">
                    Full-time
                </span>

                <h3 class="mt-4 font-['Manrope'] text-sm font-extrabold text-[#172033]">
                    Staff Kantor
                </h3>

                <p class="mt-3 text-[10px] leading-[1.7] text-slate-500">
                    Membangun hubungan profesional dengan calon nasabah,
                    memberikan konsultasi strategi transaksi, serta
                    analisis pasar komoditi.
                </p>

                <div class="mt-4 flex-1">
                    <h4 class="mb-2 text-[9px] font-extrabold text-[#172033]">
                        KUALIFIKASI UTAMA:
                    </h4>

                    <ul class="space-y-2 text-[10px] leading-relaxed text-slate-600">
                        <li> Pendidikan minimal SMA</li>
                        <li> Memiliki komunikasi yang baik</li>
                        <li> Berorientasi pada target</li>
                    </ul>
                </div>

                <a href="{{ route('careers') }}"
                   class="mt-5 flex items-center justify-center rounded-lg bg-blue-50 px-4 py-2.5 text-[10px] font-bold text-blue-600 transition hover:bg-blue-600 hover:text-white">
                    Lamar Posisi Ini <span class="ml-2">→</span>
                </a>
            </article>

            {{-- BUSINESS CONSULTANT --}}
            <article class="flex h-full flex-col rounded-xl border border-slate-200 bg-white p-5 shadow-sm transition hover:-translate-y-1 hover:shadow-lg">
                <span class="w-fit rounded-full bg-blue-50 px-2.5 py-1 text-[9px] font-bold text-blue-600">
                    Full-time
                </span>

                <h3 class="mt-4 font-['Manrope'] text-sm font-extrabold text-[#172033]">
                    Business Consultant
                </h3>

                <p class="mt-3 text-[10px] leading-[1.7] text-slate-500">
                    Program pengembangan profesional untuk membangun
                    kemampuan konsultasi, komunikasi bisnis, dan
                    pengembangan hubungan dengan nasabah.
                </p>

                <div class="mt-4 flex-1">
                    <h4 class="mb-2 text-[9px] font-extrabold text-[#172033]">
                        KUALIFIKASI UTAMA:
                    </h4>

                    <ul class="space-y-2 text-[10px] leading-relaxed text-slate-600">
                        <li> Fresh graduate dipersilakan</li>
                        <li> Disiplin dan jujur</li>
                        <li> Memiliki kemampuan komunikasi</li>
                    </ul>
                </div>

                <a href="{{ route('careers') }}"
                   class="mt-5 flex items-center justify-center rounded-lg bg-blue-50 px-4 py-2.5 text-[10px] font-bold text-blue-600 transition hover:bg-blue-600 hover:text-white">
                    Lamar Posisi Ini <span class="ml-2">→</span>
                </a>
            </article>

            {{-- DRIVER --}}
            <article class="flex h-full flex-col rounded-xl border border-slate-200 bg-white p-5 shadow-sm transition hover:-translate-y-1 hover:shadow-lg sm:col-span-2 lg:col-span-1">
                <span class="w-fit rounded-full bg-blue-50 px-2.5 py-1 text-[9px] font-bold text-blue-600">
                    Full-time
                </span>

                <h3 class="mt-4 font-['Manrope'] text-sm font-extrabold text-[#172033]">
                    Driver
                </h3>

                <p class="mt-3 text-[10px] leading-[1.7] text-slate-500">
                    Mendukung kebutuhan transportasi dan operasional
                    perusahaan dengan mengutamakan keselamatan,
                    ketepatan waktu, serta pelayanan profesional.
                </p>

                <div class="mt-4 flex-1">
                    <h4 class="mb-2 text-[9px] font-extrabold text-[#172033]">
                        KUALIFIKASI UTAMA:
                    </h4>

                    <ul class="space-y-2 text-[10px] leading-relaxed text-slate-600">
                        <li> Memiliki SIM A aktif</li>
                        <li> Teliti dan bertanggung jawab</li>
                        <li> Memiliki pengalaman mengemudi</li>
                    </ul>
                </div>

                <a href="{{ route('careers') }}"
                   class="mt-5 flex items-center justify-center rounded-lg bg-blue-50 px-4 py-2.5 text-[10px] font-bold text-blue-600 transition hover:bg-blue-600 hover:text-white">
                    Lamar Posisi Ini <span class="ml-2">→</span>
                </a>
            </article>

        </div>

        {{-- PANEL MAGANG --}}
        <div
            id="career-internship-panel"
            class="mt-8 grid grid-cols-1 gap-5 sm:grid-cols-2 lg:mx-auto lg:max-w-[950px] [&[hidden]]:!hidden"
            role="tabpanel"
            aria-labelledby="tab-internship"
            hidden
        >

            {{-- MAGANG SMA/SMK --}}
            <article class="flex h-full flex-col rounded-xl border border-slate-200 bg-white p-5 shadow-sm transition hover:-translate-y-1 hover:shadow-lg">
                <span class="w-fit rounded-full bg-orange-50 px-3 py-1 text-[10px] font-bold text-orange-600">
                    Program Magang
                </span>

                <h3 class="mt-4 font-['Manrope'] text-sm font-extrabold text-[#172033]">
                    Magang SMA/SMK
                </h3>

                <p class="mt-3 text-[10px] leading-[1.7] text-slate-500">
                    Kesempatan bagi siswa SMA/SMK untuk memperoleh
                    pengalaman kerja secara langsung, mengenal
                    lingkungan profesional, serta mengembangkan
                    keterampilan dan kedisiplinan.
                </p>

                <div class="mt-4 flex-1">
                    <h4 class="mb-2 text-[9px] font-extrabold text-[#172033]">
                        KUALIFIKASI UMUM:
                    </h4>

                    <ul class="space-y-2 text-[10px] leading-relaxed text-slate-600">
                        <li> Siswa aktif SMA/SMK atau sederajat</li>
                        <li> Memiliki kemauan belajar</li>
                        <li>  Disiplin dan bertanggung jawab</li>
                    </ul>
                </div>

                <a href="{{ route('internship') }}"
                   class="mt-5 flex items-center justify-center gap-2 rounded-lg bg-orange-50 px-4 py-2.5 text-[10px] font-bold text-orange-600 transition hover:bg-orange-500 hover:text-white">
                    Informasi &amp; Pendaftaran <span>→</span>
                </a>
            </article>

            {{-- MAGANG MAHASISWA --}}
            <article class="flex h-full flex-col rounded-xl border border-slate-200 bg-white p-5 shadow-sm transition hover:-translate-y-1 hover:shadow-lg">
                <span class="w-fit rounded-full bg-blue-50 px-3 py-1 text-[10px] font-bold text-blue-600">
                    Program Magang
                </span>

                <h3 class="mt-4 font-['Manrope'] text-sm font-extrabold text-[#172033]">
                    Magang Mahasiswa
                </h3>

                <p class="mt-2 text-[10px] leading-[1.7] text-slate-500">
                    Program pengembangan mahasiswa untuk memperoleh
                    pengalaman profesional, menerapkan ilmu
                    perkuliahan, serta memahami proses kerja
                    di lingkungan industri jasa keuangan.
                </p>

                <div class="mt-4 flex-1">
                    <h4 class="mb-2 text-[9px] font-extrabold text-[#172033]">
                        KUALIFIKASI UMUM:
                    </h4>

                    <ul class="space-y-2 text-[10px] leading-relaxed text-slate-600">
                        <li> Mahasiswa aktif perguruan tinggi</li>
                        <li> Memiliki minat untuk belajar</li>
                        <li>  Mampu bekerja sama dan bertanggung jawab</li>
                    </ul>
                </div>

                <a href="{{ route('internship') }}"
                   class="mt-5 flex items-center justify-center gap-2 rounded-lg bg-blue-50 px-4 py-2.5 text-[10px] font-bold text-blue-600 transition hover:bg-blue-600 hover:text-white">
                    Informasi &amp; Pendaftaran <span>→</span>
                </a>
            </article>

        </div>

    </div>
</section>

    {{-- BERITA DAN EDUKASI --}}
    <section class="bg-[#f7f9fc] px-6 pt-6 pb-[60px] sm:px-8 lg:px-10 max-[640px]:pt-6 max-[640px]:pb-[42px]">
        <div class="mx-auto w-full max-w-[1180px]">

            {{-- JUDUL BERITA --}}
            <div class="mb-7 flex items-end justify-between gap-6 max-[640px]:flex-col max-[640px]:items-start max-[640px]:gap-3">
                <div class="min-w-0">
                    <span class="mb-2 block text-[10px] font-extrabold tracking-[0.08em] text-orange-500">
                        INFORMASI &amp; WAWASAN
                    </span>

                    <h2 class="font-['Manrope'] text-[clamp(25px,3vw,34px)] font-extrabold leading-[1.3] tracking-tight text-[#101b34]">
                        Berita, Analisis &amp; Edukasi
                    </h2>
                </div>

                <a href="{{ url('/berita') }}"
                class="mb-1 inline-flex shrink-0 items-center gap-2 text-[11px] font-bold text-blue-600 transition hover:text-orange-500">
                    Lihat Semua Artikel →
                </a>
            </div>

            {{-- GRID BERITA --}}
            <div class="grid grid-cols-3 items-stretch gap-5 max-[900px]:grid-cols-2 max-[640px]:grid-cols-1 max-[640px]:gap-[17px]">

                @forelse($news as $item)

                    <article class="flex min-w-0 flex-col overflow-hidden rounded-[10px] border border-[#e4eaf2] bg-white shadow-[0_5px_18px_rgba(16,42,67,0.035)] transition duration-200 hover:-translate-y-1 hover:shadow-[0_14px_28px_rgba(16,42,67,0.09)]">
                         
                        {{-- GAMBAR BERITA --}}
                        <a href="{{ $item['link'] }}"
                        target="_blank"
                        rel="noopener noreferrer"
                        aria-label="Baca berita"
                        class="relative isolate flex h-[165px] items-start overflow-hidden bg-[radial-gradient(circle_at_80%_15%,rgba(40,104,244,0.24),transparent_45%),linear-gradient(135deg,#152d59,#0b142b)] p-[15px] max-[640px]:h-[190px]">

                            <img
                                src="{{ $item['image'] ?: 'https://placehold.co/900x500/eaf0f8/17345f?text=Equityworld+Futures' }}"
                                alt="{{ $item['title'] }}"
                                loading="lazy"
                                class="absolute inset-0 h-full w-full object-cover"
                                onerror="this.onerror=null;this.src='https://placehold.co/900x500/eaf0f8/17345f?text=Equityworld+Futures';"
                            >

                        </a>

                        {{-- ISI BERITA --}}
                        <div class="flex flex-1 flex-col items-start p-[17px]">

                            <time class="mb-2 block text-[9px] text-[#8793a6]">
                                {{ $item['date'] }}
                            </time>

                            <h3 class="mb-[9px] font-['Manrope'] text-sm font-extrabold leading-[1.6] text-[#172238]">
                                {{ $item['title'] }}
                            </h3>

                            <p class="mb-4 text-[10px] leading-[1.9] text-[#68758a]">
                                {{ $item['excerpt'] }}
                            </p>

                            <a href="{{ $item['link'] }}"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="mt-auto inline-flex items-center gap-1.5 text-[10px] font-bold text-[#f07818] transition hover:text-[#b94f00]">
                                Baca Selengkapnya ›
                            </a>

                        </div>
                    </article>

                @empty

                    <div class="col-span-full rounded-xl border border-slate-200 bg-white p-8 text-center">
                        <h3 class="font-bold text-slate-700">
                            Berita Belum Tersedia
                        </h3>

                        <p class="mt-2 text-sm text-slate-500">
                            Berita terbaru belum dapat dimuat. Silakan coba kembali nanti.
                        </p>
                    </div>

                @endforelse

            </div>
        </div>
    </section>

</div>

@endsection