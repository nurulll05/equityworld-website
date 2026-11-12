@extends('layouts.app')

@section('title', 'Legalitas | PT Equityworld Futures')

@section('meta_description', 'Informasi legalitas, regulator, keanggotaan bursa, struktur kelembagaan, dan rekening terpisah PT Equityworld Futures.')

@section('content')

{{-- HERO --}}
<section class="relative overflow-hidden bg-gradient-to-r from-[#102747] to-[#1c3e79] px-5 py-12 text-center md:py-16">
    <div class="relative mx-auto max-w-5xl">
        <span class="text-xs font-bold uppercase tracking-widest text-orange-400">
            Regulasi & Keamanan
        </span>

        <h1 class="mt-3 text-3xl font-extrabold text-white md:text-5xl">
            Legalitas Resmi & Transparansi
        </h1>

        <p class="mx-auto mt-4 max-w-2xl text-sm leading-relaxed text-blue-100">
            Seluruh kegiatan operasional PT Equityworld Futures berlandaskan
            hukum Republik Indonesia dan diawasi oleh regulator terkait.
        </p>
    </div>
</section>

{{-- REGULATOR DAN LEMBAGA --}}
<section class="relative z-10 px-5">
    <div class="mx-auto -mt-6 grid max-w-6xl gap-5 md:grid-cols-3">

        {{-- BAPPEBTI --}}
        <article class="rounded-xl border border-slate-100 bg-white p-5 shadow-md transition-all duration-300 hover:-translate-y-2 hover:shadow-xl">
            <div class="mb-4 flex h-12 w-12 items-center justify-center rounded-xl bg-blue-50 text-blue-600">
                <svg class="h-7 w-7" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor"
                    stroke-width="1.8" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path d="M3 9h18L12 3 3 9Z"/>
                    <path d="M5 10v8M9.5 10v8M14.5 10v8M19 10v8"/>
                    <path d="M3 19h18M2 22h20"/>
                </svg>
            </div>

            <h2 class="text-base font-bold text-[#142b59]">
                BAPPEBTI
            </h2>

            <p class="mt-1 text-xs font-semibold text-orange-600">
                Izin Pialang Berjangka
            </p>

            <p class="mt-3 text-xs leading-relaxed text-slate-500">
                Regulator yang mengatur, membina, dan mengawasi kegiatan
                perdagangan berjangka komoditi di Indonesia.
            </p>
        </article>

        {{-- JFX --}}
        <article class="rounded-xl border border-slate-100 bg-white p-5 shadow-md transition-all duration-300 hover:-translate-y-2 hover:shadow-xl">
            <div class="mb-4 flex h-12 w-12 items-center justify-center rounded-xl bg-orange-50 text-orange-500">
                <svg class="h-7 w-7" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor"
                    stroke-width="1.8" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path d="M3 3v18h18"/>
                    <path d="m6 15 4-4 3 2 6-7"/>
                    <path d="M14 6h5v5"/>
                </svg>
            </div>

            <h2 class="text-base font-bold text-[#142b59]">
                JFX
            </h2>

            <p class="mt-1 text-xs font-semibold text-blue-600">
                Bursa Berjangka Komoditi
            </p>

            <p class="mt-3 text-xs leading-relaxed text-slate-500">
                Anggota resmi PT Bursa Berjangka Jakarta (Jakarta Futures Exchange).
            </p>
        </article>

        {{-- KBI --}}
        <article class="rounded-xl border border-slate-100 bg-white p-5 shadow-md transition-all duration-300 hover:-translate-y-2 hover:shadow-xl">
            <div class="mb-4 flex h-12 w-12 items-center justify-center rounded-xl bg-blue-50 text-blue-600">
                <svg class="h-7 w-7" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor"
                    stroke-width="1.8" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path d="M12 22s8-4 8-11V5l-8-3-8 3v6c0 7 8 11 8 11Z"/>
                    <path d="m8.5 12 2.3 2.3 4.8-4.8"/>
                </svg>
            </div>

            <h2 class="text-base font-bold text-[#142b59]">
                KBI (Kliring Berjangka)
            </h2>

            <p class="mt-1 text-xs font-semibold text-orange-600">
                Lembaga Kliring & Penjaminan
            </p>

            <p class="mt-3 text-xs leading-relaxed text-slate-500">
                Lembaga kliring yang berperan dalam penyelesaian dan
                penjaminan transaksi perdagangan berjangka.
            </p>
        </article>

    </div>
</section>

{{-- STRUKTUR LEGALITAS --}}
<section class="bg-white px-5 pb-10 pt-10 md:pb-14">
    <div class="mx-auto max-w-6xl">

        <h2 class="mb-5 font-serif text-2xl font-bold text-[#15385e]">
            Struktur Legalitas
        </h2>

        <div class="mx-auto max-w-3xl overflow-hidden rounded-xl border border-blue-300 bg-slate-50 p-3 shadow-sm md:p-5">
            <img
                src="{{ asset('images/bagan.jpg') }}"
                alt="Bagan Struktur Legalitas PT Equityworld Futures"
                class="mx-auto h-auto w-full object-contain"
                loading="lazy"
            >
        </div>

    </div>
</section>

{{-- SEJARAH DAN PERJALANAN --}}
<section class="bg-[#f3f7fd] px-5 py-10 md:py-14">
    <div class="mx-auto max-w-6xl rounded-xl border border-blue-100 bg-white p-5 shadow-sm md:p-8">

        <div class="grid gap-8 md:grid-cols-2 md:gap-10">

            {{-- PENGANTAR SEJARAH --}}
            <div>
                <span class="inline-block rounded-full bg-orange-50 px-3 py-1 text-[10px] font-bold uppercase tracking-wider text-orange-600">
                    Sejarah & Perjalanan
                </span>

                <h2 class="mt-4 text-2xl font-extrabold leading-tight text-[#142b59] md:text-3xl">
                    Dedikasi Lebih Dari Dua Dekade
                </h2>

                <p class="mt-5 text-justify text-sm leading-relaxed text-slate-600">
                    Didirikan sebagai perusahaan pialang berjangka,
                    PT Equityworld Futures terus tumbuh menjadi salah satu
                    perusahaan yang dikenal di Indonesia. Dengan komitmen
                    mengedepankan kepuasan nasabah, kami terus berupaya
                    memperluas jaringan layanan dan mengadopsi teknologi
                    terintegrasi.
                </p>
            </div>

            {{-- TIMELINE KOLOM PERTAMA --}}
            <div class="relative space-y-7 pl-7
                before:content-[''] before:absolute before:bottom-2
                before:left-[5px] before:top-2 before:w-0.5
                before:bg-slate-200">

                <div class="relative">
                    <span class="absolute -left-[27px] top-1 h-3 w-3 rounded-full bg-orange-500 ring-4 ring-white"></span>
                    <h3 class="text-sm font-bold text-[#142b59]">
                        Akta Pendirian Perseroan Terbatas
                    </h3>
                    <p class="mt-1 text-xs leading-relaxed text-slate-500">
                        Diresmikan melalui Akta Nomor 01 tanggal 2 Juli 2005
                        oleh Notaris Tan Susy, S.H., dengan nama awal
                        PT Goldmany Futures.
                    </p>
                </div>

                <div class="relative">
                    <span class="absolute -left-[27px] top-1 h-3 w-3 rounded-full bg-[#142b59] ring-4 ring-white"></span>
                    <h3 class="text-sm font-bold text-[#142b59]">
                        Akta Perubahan Nama
                    </h3>
                    <p class="mt-1 text-xs leading-relaxed text-slate-500">
                        Perusahaan resmi berganti nama menjadi
                        PT Equityworld Futures berdasarkan Akta Nomor 11
                        tanggal 4 November 2008.
                    </p>
                </div>

                <div class="relative">
                    <span class="absolute -left-[27px] top-1 h-3 w-3 rounded-full bg-orange-500 ring-4 ring-white"></span>
                    <h3 class="text-sm font-bold text-[#142b59]">
                        Surat Persetujuan Anggota Bursa (SPAB)
                    </h3>
                    <p class="mt-1 text-xs leading-relaxed text-slate-500">
                        Terdaftar sebagai Anggota Bursa Berjangka Jakarta
                        dengan Nomor SPAB-143/BBJ/09/05.
                    </p>
                </div>

                <div class="relative">
                    <span class="absolute -left-[27px] top-1 h-3 w-3 rounded-full bg-[#142b59] ring-4 ring-white"></span>
                    <h3 class="text-sm font-bold text-[#142b59]">
                        Keanggotaan Lembaga Kliring Berjangka Indonesia
                    </h3>
                    <p class="mt-1 text-xs leading-relaxed text-slate-500">
                        Terdaftar sebagai anggota Kliring Berjangka
                        Indonesia sesuai dokumen keanggotaan perusahaan.
                    </p>
                </div>

            </div>
        </div>

        {{-- TIMELINE DUA KOLOM --}}
        <div class="mt-9 grid gap-8 border-t border-slate-200 pt-8 md:grid-cols-2 md:gap-10">

            {{-- KOLOM KIRI --}}
            <div class="relative space-y-7 pl-7
                before:content-[''] before:absolute before:bottom-2
                before:left-[5px] before:top-2 before:w-0.5
                before:bg-slate-200">

                <div class="relative">
                    <span class="absolute -left-[27px] top-1 h-3 w-3 rounded-full bg-orange-500 ring-4 ring-white"></span>
                    <h3 class="text-sm font-bold text-[#142b59]">
                        Izin Usaha Pialang Berjangka
                    </h3>
                    <p class="mt-1 text-xs leading-relaxed text-slate-500">
                        Izin usaha berdasarkan keputusan regulator
                        perdagangan berjangka sesuai dokumen perizinan.
                    </p>
                </div>

                <div class="relative">
                    <span class="absolute -left-[27px] top-1 h-3 w-3 rounded-full bg-[#142b59] ring-4 ring-white"></span>
                    <h3 class="text-sm font-bold text-[#142b59]">
                        Perjanjian Kerja Sama Sistem Perdagangan Alternatif
                    </h3>
                    <p class="mt-1 text-xs leading-relaxed text-slate-500">
                        Kerja sama operasional dengan penyelenggara
                        Sistem Perdagangan Alternatif.
                    </p>
                </div>

                <div class="relative">
                    <span class="absolute -left-[27px] top-1 h-3 w-3 rounded-full bg-orange-500 ring-4 ring-white"></span>
                    <h3 class="text-sm font-bold text-[#142b59]">
                        SK BAPPEBTI Perubahan Nama
                    </h3>
                    <p class="mt-1 text-xs leading-relaxed text-slate-500">
                        Persetujuan perubahan nama perusahaan berdasarkan
                        keputusan BAPPEBTI.
                    </p>
                </div>

                <div class="relative">
                    <span class="absolute -left-[27px] top-1 h-3 w-3 rounded-full bg-[#142b59] ring-4 ring-white"></span>
                    <h3 class="text-sm font-bold text-[#142b59]">
                        Persetujuan Prinsip OJK Derivatif Keuangan
                    </h3>
                    <p class="mt-1 text-xs leading-relaxed text-slate-500">
                        Persetujuan prinsip sesuai ketentuan dan dokumen
                        regulator yang berlaku.
                    </p>
                </div>

            </div>

            {{-- KOLOM KANAN --}}
            <div class="relative space-y-7 pl-7
                before:content-[''] before:absolute before:bottom-2
                before:left-[5px] before:top-2 before:w-0.5
                before:bg-slate-200">

                <div class="relative">
                    <span class="absolute -left-[27px] top-1 h-3 w-3 rounded-full bg-orange-500 ring-4 ring-white"></span>
                    <h3 class="text-sm font-bold text-[#142b59]">
                        SK BAPPEBTI Peserta SPA
                    </h3>
                    <p class="mt-1 text-xs leading-relaxed text-slate-500">
                        Persetujuan sebagai peserta Sistem Perdagangan
                        Alternatif berdasarkan dokumen regulator.
                    </p>
                </div>

                <div class="relative">
                    <span class="absolute -left-[27px] top-1 h-3 w-3 rounded-full bg-[#142b59] ring-4 ring-white"></span>
                    <h3 class="text-sm font-bold text-[#142b59]">
                        Pialang Berjangka Online
                    </h3>
                    <p class="mt-1 text-xs leading-relaxed text-slate-500">
                        Penerapan layanan pendaftaran nasabah secara
                        elektronik sesuai ketentuan yang berlaku.
                    </p>
                </div>

                <div class="relative">
                    <span class="absolute -left-[27px] top-1 h-3 w-3 rounded-full bg-orange-500 ring-4 ring-white"></span>
                    <h3 class="text-sm font-bold text-[#142b59]">
                        Pialang Berjangka Peserta SPA Derivatif PUVA
                    </h3>
                    <p class="mt-1 text-xs leading-relaxed text-slate-500">
                        Keikutsertaan dalam Sistem Perdagangan Alternatif
                        Derivatif PUVA sesuai persetujuan yang berlaku.
                    </p>
                </div>

                <div class="relative">
                    <span class="absolute -left-[27px] top-1 h-3 w-3 rounded-full bg-[#142b59] ring-4 ring-white"></span>
                    <h3 class="text-sm font-bold text-[#142b59]">
                        Pengesahan Departemen Hukum dan HAM
                    </h3>
                    <p class="mt-1 text-xs leading-relaxed text-slate-500">
                        Pengesahan perubahan data perseroan oleh
                        instansi berwenang.
                    </p>
                </div>

                <div class="relative">
                    <span class="absolute -left-[27px] top-1 h-3 w-3 rounded-full bg-orange-500 ring-4 ring-white"></span>
                    <h3 class="text-sm font-bold text-[#142b59]">
                        Pengesahan Kementerian Hukum dan HAM
                    </h3>
                    <p class="mt-1 text-xs leading-relaxed text-slate-500">
                        Pengesahan sesuai keputusan Kementerian
                        Hukum dan HAM.
                    </p>
                </div>

            </div>
        </div>
    </div>
</section>

{{-- REKENING TERPISAH --}}
<section class="px-5 py-5 md:py-7">
    <div class="mx-auto max-w-6xl rounded-xl border border-slate-100 bg-white px-5 py-5 shadow-md md:px-8 md:py-7">

        <div class="text-center">
            <span class="inline-block rounded-full bg-green-100 px-3 py-1 text-[10px] font-bold uppercase tracking-wider text-green-700">
                Keamanan Dana 100%
            </span>

            <h2 class="mt-2 text-2xl font-extrabold text-[#142b59]">
                Rekening Terpisah (Segregated Account)
            </h2>

            <p class="mx-auto mt-2 max-w-5xl text-sm leading-relaxed text-slate-500">
                Dana nasabah disimpan secara terpisah dari dana operasional perusahaan pada bank yang ditunjuk sesuai ketentuan regulator.
            </p>
        </div>

        <div class="mt-7 grid grid-cols-2 gap-3 sm:grid-cols-3 lg:grid-cols-5">

            @foreach ([
                ['name' => 'Bank BCA', 'logo' => 'bca.webp'],
                ['name' => 'Bank BRI', 'logo' => 'bri.webp'],
                ['name' => 'Bank BNI', 'logo' => 'bni.webp'],
                ['name' => 'Bank Mandiri', 'logo' => 'mandiri.webp'],
                ['name' => 'CIMB Niaga', 'logo' => 'cimb-niaga.webp'],
            ] as $bank)
                <div class="flex flex-col items-center justify-center rounded-xl border border-slate-300 bg-[#e8eff6] px-3 py-5 text-center transition-all duration-300 hover:-translate-y-1 hover:shadow-md">

                    <div class="flex h-14 w-full items-center justify-center">
                        <img
                            src="{{ asset('images/banks/' . $bank['logo']) }}"
                            alt="Logo {{ $bank['name'] }}"
                            class="max-h-12 max-w-full object-contain"
                            loading="lazy"
                        >
                    </div>

                    <h3 class="mt-3 text-sm font-bold text-[#142b59]">
                        {{ $bank['name'] }}
                    </h3>
                </div>
            @endforeach

        </div>
    </div>
</section>

{{-- PERINGATAN --}}
<section class="px-5 pb-4">
    <div class="mx-auto flex max-w-6xl gap-4 rounded-xl border border-orange-300 bg-[#ffd17d] p-5 shadow-sm md:p-7">

        <div class="shrink-0 text-orange-700">
            <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <rect x="5" y="10" width="14" height="11" rx="2"/>
                <path d="M8 10V7a4 4 0 1 1 8 0v3"/>
                <path d="M12 14v3"/>
            </svg>
        </div>

        <div>
            <h2 class="text-base font-extrabold uppercase text-[#142b59]">
                Perhatian
            </h2>

            <p class="mt-2 text-xs leading-relaxed text-[#59401b]">
                PT Equityworld Futures mengingatkan masyarakat untuk selalu
                waspada terhadap penipuan yang mengatasnamakan perusahaan
                melalui media apa pun. Pastikan seluruh transaksi dan setoran
                dana hanya dilakukan ke rekening terpisah (Segregated Account)
                resmi atas nama PT Equityworld Futures, bukan rekening
                perorangan.
            </p>
        </div>
    </div>
</section>

@endsection
