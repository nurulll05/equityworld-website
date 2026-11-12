@extends('layouts.app')

@section('title', 'Tentang Kami | PT Equityworld Futures')

@section('meta_description', 'Profil, sejarah, visi, misi, nilai perusahaan, dan jaringan kantor PT Equityworld Futures.')

@section('content')

{{-- HERO --}}
<section class="bg-gradient-to-r from-[#102747] to-[#1c3e79] px-5 py-12 md:py-16 text-center">
    <div class="mx-auto max-w-5xl">
        <span class="mb-3 block text-xs font-bold uppercase tracking-widest text-orange-400">
            Profil Perusahaan
        </span>

        <h1 class="text-3xl font-extrabold text-white md:text-5xl">
            Tentang PT Equityworld Futures
        </h1>

        <p class="mt-3 text-sm text-blue-100 md:text-base">
            Mengenal lebih dekat perjalanan PT Equityworld Futures di Indonesia.
        </p>
    </div>
</section>

{{-- PROFIL PERUSAHAAN --}}
<section class="bg-[#e7f0f8] px-5 py-10 md:py-12">
    <div class="mx-auto grid max-w-6xl items-center gap-8 md:grid-cols-2 md:gap-10">

        {{-- FOTO LOBI --}}
        <div class="overflow-hidden rounded-xl shadow-lg">
            <img
                src="{{ asset('images/lobi.jpeg') }}"
                alt="Lobi kantor PT Equityworld Futures"
                class="h-64 w-full object-cover md:h-80"
                loading="lazy"
            >
        </div>

        {{-- DESKRIPSI --}}
        <div>
            <span class="text-xs font-bold uppercase tracking-wider text-orange-500">
                Tentang Perusahaan
            </span>

            <h2 class="mt-2 font-serif text-2xl font-bold text-[#15385e] md:text-3xl">
                PT Equityworld Futures
            </h2>

            <p class="mt-1 font-serif text-sm italic text-orange-500">
                Profesional, Transparan, dan Berkelanjutan.
            </p>

            <p class="mt-4 text-justify text-sm leading-relaxed text-slate-600">
                PT Equityworld Futures (EWF) hadir sebagai mitra investasi
                yang mengutamakan kepercayaan dan profesionalisme di industri
                perdagangan berjangka. Dengan fokus pada kualitas layanan
                dan edukasi berkelanjutan, EWF membantu nasabah memahami
                peluang pasar secara lebih terarah dan aman.
            </p>

            <p class="mt-4 text-justify text-sm leading-relaxed text-slate-600">
                Sejak mulai beroperasi pada tahun 2005, EWF terus tumbuh
                dan memperluas jangkauan layanan hingga memiliki tujuh
                kantor operasional di Jakarta, Surabaya, Semarang, Manado,
                dan Cirebon. Kegiatan perusahaan dijalankan dengan
                memperhatikan ketentuan dan regulasi yang berlaku.
            </p>
        </div>
    </div>
</section>

{{-- VISI DAN MISI --}}
<section class="bg-white px-5 py-10 md:py-12">
    <div class="mx-auto grid max-w-6xl gap-5 md:grid-cols-2">

        {{-- VISI --}}
        <article class="rounded-xl border border-slate-100 bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:shadow-lg md:p-8">
            <div class="mb-5 flex h-14 w-14 items-center justify-center rounded-2xl bg-blue-50 text-[#142b59]">
                <svg xmlns="http://www.w3.org/2000/svg"
                    class="h-7 w-7"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="1.8"
                    stroke-linecap="round"
                    stroke-linejoin="round">
                    <circle cx="12" cy="12" r="10"/>
                    <circle cx="12" cy="12" r="6"/>
                    <circle cx="12" cy="12" r="2"/>
                </svg>
            </div>

            <h3 class="text-lg font-bold text-[#142b59]">
                Visi Perusahaan
            </h3>

            <p class="mt-3 text-base leading-relaxed text-slate-600 text-justify">
                Menjadi perusahaan pialang berjangka yang unggul dan
                terpercaya, dengan standar operasional yang modern,
                transparan, serta memberikan nilai strategis bagi
                perkembangan industri dan perekonomian nasional.
            </p>
        </article>

        {{-- MISI --}}
        <article class="rounded-xl border border-slate-100 bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:shadow-lg md:p-8">
            <div class="mb-5 flex h-14 w-14 items-center justify-center rounded-2xl bg-orange-50 text-orange-500">
                <svg xmlns="http://www.w3.org/2000/svg"
                    class="h-7 w-7"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="1.8"
                    stroke-linecap="round"
                    stroke-linejoin="round">
                    <rect x="4" y="3" width="16" height="18" rx="2"/>
                    <path d="M9 3.5h6"/>
                    <path d="m8 12 2.5 2.5L16 9"/>
                    <path d="M8 18h8"/>
                </svg>
            </div>

            <h3 class="text-lg font-bold text-[#142b59]">
                Misi Perusahaan
            </h3>

            <ul class="mt-3 space-y-2.5 text-sm leading-relaxed text-slate-500">
                <li class="flex gap-2 text-justify">
                    <span class="font-bold text-orange-500">✓</span>
                    Menyediakan layanan perdagangan berjangka yang profesional,
                    aman, dan berintegritas tinggi.
                </li>
                <li class="flex gap-2 text-justify">
                    <span class="font-bold text-orange-500">✓</span>
                    Mengembangkan kualitas sumber daya manusia untuk
                    menghadirkan layanan yang kompeten.
                </li>
                <li class="flex gap-2 text-justify">
                    <span class="font-bold text-orange-500">✓</span>
                    Mengimplementasikan tata kelola perusahaan yang transparan
                    dan akuntabel.
                </li>
                <li class="flex gap-2 text-justify">
                    <span class="font-bold text-orange-500">✓</span>
                    Memperluas akses edukasi serta literasi perdagangan
                    berjangka kepada masyarakat.
                </li>
                <li class="flex gap-2 text-justify">
                    <span class="font-bold text-orange-500">✓</span>
                    Mengoptimalkan teknologi untuk mendukung operasional
                    dan pengalaman nasabah secara efisien.
                </li>
            </ul>
        </article>

    </div>
</section>

{{-- NILAI-NILAI PERUSAHAAN --}}
<section class="bg-[#e7f0f8] px-5 py-10 md:py-12">
    <div class="mx-auto max-w-6xl rounded-sm bg-[#142b59] px-5 py-8 md:px-8 md:py-10">

        <div class="mb-7 text-center">
            <h2 class="text-2xl font-bold text-white md:text-3xl">
                Nilai-Nilai Perusahaan
            </h2>

            <div class="mx-auto mt-3 h-1 w-20 rounded bg-orange-500"></div>
        </div>

        <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-4">

            {{-- INTEGRITAS --}}
            <article class="rounded-xl border border-slate-200 bg-white p-5 text-center shadow-sm transition-all duration-300 hover:-translate-y-1 hover:shadow-xl">
                <div class="mx-auto mb-4 flex h-14 w-14 items-center justify-center rounded-2xl bg-indigo-50 text-indigo-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 22s8-4 8-11V5l-8-3-8 3v6c0 7 8 11 8 11z"/>
                        <path d="m9 12 2 2 4-4"/>
                    </svg>
                </div>

                <h3 class="text-sm font-bold text-[#142b59]">
                    Integritas Profesional
                </h3>

                <p class="mt-2 text-xs leading-relaxed text-slate-500">
                    Menegakkan standar etika yang tinggi serta menjaga
                    konsistensi tindakan dan keputusan dalam setiap
                    aktivitas perusahaan.
                </p>
            </article>

            {{-- FOKUS NASABAH --}}
            <article class="rounded-xl border border-slate-200 bg-white p-5 text-center shadow-sm transition-all duration-300 hover:-translate-y-1 hover:shadow-xl">
                <div class="mx-auto mb-4 flex h-14 w-14 items-center justify-center rounded-2xl bg-rose-50 text-rose-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/>
                        <circle cx="9" cy="7" r="4"/>
                        <path d="M22 21v-2a4 4 0 0 0-3-3.87"/>
                        <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
                    </svg>
                </div>

                <h3 class="text-sm font-bold text-[#142b59]">
                    Fokus pada Nasabah
                </h3>

                <p class="mt-2 text-xs leading-relaxed text-slate-500">
                    Mengutamakan kebutuhan dan tujuan investasi nasabah
                    melalui layanan yang responsif, akurat, dan transparan.
                </p>
            </article>

            {{-- KEPATUHAN --}}
            <article class="rounded-xl border border-slate-200 bg-white p-5 text-center shadow-sm transition-all duration-300 hover:-translate-y-1 hover:shadow-xl">
                <div class="mx-auto mb-4 flex h-14 w-14 items-center justify-center rounded-2xl bg-orange-50 text-orange-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 3v18"/>
                        <path d="M3 7h18"/>
                        <path d="m5 7-3 7h6L5 7z"/>
                        <path d="m19 7-3 7h6l-3-7z"/>
                        <path d="M7 21h10"/>
                    </svg>
                </div>

                <h3 class="text-sm font-bold text-[#142b59]">
                    Disiplin Kepatuhan
                </h3>

                <p class="mt-2 text-xs leading-relaxed text-slate-500">
                    Menjalankan seluruh proses bisnis sesuai kerangka
                    regulasi dengan kontrol internal yang kuat
                    dan berkelanjutan.
                </p>
            </article>

            {{-- INOVASI --}}
            <article class="rounded-xl border border-slate-200 bg-white p-5 text-center shadow-sm transition-all duration-300 hover:-translate-y-1 hover:shadow-xl">
                <div class="mx-auto mb-4 flex h-14 w-14 items-center justify-center rounded-2xl bg-sky-50 text-sky-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M9 18h6"/>
                        <path d="M10 22h4"/>
                        <path d="M15.5 14.5a7 7 0 1 0-7 0c.8.6 1.2 1.5 1.2 2.5h4.6c0-1 .4-1.9 1.2-2.5z"/>
                        <path d="M12 2v2"/>
                        <path d="m4.93 4.93 1.42 1.42"/>
                        <path d="M19.07 4.93l-1.42 1.42"/>
                    </svg>
                </div>

                <h3 class="text-sm font-bold text-[#142b59]">
                    Inovasi Berkelanjutan
                </h3>

                <p class="mt-2 text-xs leading-relaxed text-slate-500">
                    Mendorong pengembangan teknologi, produk, dan proses
                    kerja untuk menghadirkan pengalaman transaksi
                    yang semakin efisien dan kompetitif.
                </p>
            </article>

        </div>
    </div>
</section>

{{-- JARINGAN KANTOR CABANG --}}
<section class="bg-[#f5f8fc] px-5 py-12 md:py-14">
    <div class="mx-auto max-w-6xl">

        <div class="mb-8 text-center">
            <span class="text-xs font-bold uppercase tracking-widest text-orange-500">
                Jaringan Operasional
            </span>

            <h2 class="mt-2 text-2xl font-extrabold text-[#142b59] md:text-3xl">
                Jaringan Kantor Cabang
            </h2>

            <p class="mt-2 text-sm text-slate-500">
                Hadir di pusat-pusat bisnis utama di Indonesia untuk melayani
                nasabah secara dekat.
            </p>
        </div>

        <div class="grid gap-5 sm:grid-cols-2 lg:grid-cols-3">

            {{-- JAKARTA SSC --}}
            <article class="rounded-xl border border-slate-100 bg-white p-5 shadow-md transition-all duration-300 hover:-translate-y-2 hover:shadow-xl">
                <span class="inline-block rounded-md bg-slate-200 px-2.5 py-1 text-[11px] font-semibold text-slate-700">
                    Kantor Pusat
                </span>

                <h3 class="mt-3 text-sm font-bold text-[#142b59]">
                    Jakarta - SSC (Head Office)
                </h3>

                <p class="mt-2 text-xs leading-relaxed text-slate-600">
                    Sahid Sudirman Center Lantai 9 (Unit C, D, G, H) dan
                    Lantai 21 (Unit A), Jl. Jend. Sudirman No. 86,
                    Karet Tengsin, Tanah Abang, Jakarta Pusat.
                </p>

                <a href="tel:+622127889277"
                   class="mt-4 inline-flex items-center gap-2 text-xs font-bold text-orange-600 hover:text-orange-700">
                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                        <path d="M6.62 10.79a15.05 15.05 0 0 0 6.59 6.59l2.2-2.2a1 1 0 0 1 1.01-.24c1.12.37 2.33.56 3.58.56a1 1 0 0 1 1 1V20a1 1 0 0 1-1 1C10.61 21 3 13.39 3 4a1 1 0 0 1 1-1h3.5a1 1 0 0 1 1 1c0 1.25.19 2.46.56 3.58a1 1 0 0 1-.25 1.01z"/>
                    </svg>
                    +62 21 2788 9277
                </a>
            </article>

            {{-- SURABAYA TRILLIUM --}}
            <article class="rounded-xl border border-slate-100 bg-white p-5 shadow-md transition-all duration-300 hover:-translate-y-2 hover:shadow-xl">
                <span class="inline-block rounded-md bg-slate-200 px-2.5 py-1 text-[11px] font-semibold text-slate-700">
                    Kantor Cabang
                </span>

                <h3 class="mt-3 text-sm font-bold text-[#142b59]">
                    Surabaya - Trillium
                </h3>

                <p class="mt-2 text-xs leading-relaxed text-slate-600">
                    Trillium Office & Residence, Lt. 2 & 3,
                    Jl. Pemuda No. 108-116, Surabaya.
                </p>

                <a href="tel:+62315311200"
                   class="mt-4 inline-flex items-center gap-2 text-xs font-bold text-orange-600 hover:text-orange-700">
                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="currentColor"><path d="M6.62 10.79a15.05 15.05 0 0 0 6.59 6.59l2.2-2.2a1 1 0 0 1 1.01-.24c1.12.37 2.33.56 3.58.56a1 1 0 0 1 1 1V20a1 1 0 0 1-1 1C10.61 21 3 13.39 3 4a1 1 0 0 1 1-1h3.5a1 1 0 0 1 1 1c0 1.25.19 2.46.56 3.58a1 1 0 0 1-.25 1.01z"/></svg>
                    (031) 5311-200
                </a>
            </article>

            {{-- MANADO --}}
            <article class="rounded-xl border border-slate-100 bg-white p-5 shadow-md transition-all duration-300 hover:-translate-y-2 hover:shadow-xl">
                <span class="inline-block rounded-md bg-slate-200 px-2.5 py-1 text-[11px] font-semibold text-slate-700">
                    Kantor Cabang
                </span>

                <h3 class="mt-3 text-sm font-bold text-[#142b59]">Manado</h3>

                <p class="mt-2 text-xs leading-relaxed text-slate-600">
                    Komplek Ruko Mega Mas Blok 1 D1 No. 24-25,
                    Jl. Pierre Tendean, Manado.
                </p>

                <a href="tel:+624614578900"
                   class="mt-4 inline-flex items-center gap-2 text-xs font-bold text-orange-600 hover:text-orange-700">
                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="currentColor"><path d="M6.62 10.79a15.05 15.05 0 0 0 6.59 6.59l2.2-2.2a1 1 0 0 1 1.01-.24c1.12.37 2.33.56 3.58.56a1 1 0 0 1 1 1V20a1 1 0 0 1-1 1C10.61 21 3 13.39 3 4a1 1 0 0 1 1-1h3.5a1 1 0 0 1 1 1c0 1.25.19 2.46.56 3.58a1 1 0 0 1-.25 1.01z"/></svg>
                    (0461) 4578-900
                </a>
            </article>

            {{-- JAKARTA --}}
            <article class="rounded-xl border border-slate-100 bg-white p-5 shadow-md transition-all duration-300 hover:-translate-y-2 hover:shadow-xl">
                <span class="inline-block rounded-md bg-slate-200 px-2.5 py-1 text-[11px] font-semibold text-slate-700">
                    Kantor Cabang
                </span>

                <h3 class="mt-3 text-sm font-bold text-[#142b59]">Jakarta</h3>

                <p class="mt-2 text-xs leading-relaxed text-slate-600">
                    Gedung Cyber 2 Lt. 19, Jl. HR. Rasuna Said,
                    Jakarta Selatan.
                </p>

                <a href="tel:+62248456700"
                   class="mt-4 inline-flex items-center gap-2 text-xs font-bold text-orange-600 hover:text-orange-700">
                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="currentColor"><path d="M6.62 10.79a15.05 15.05 0 0 0 6.59 6.59l2.2-2.2a1 1 0 0 1 1.01-.24c1.12.37 2.33.56 3.58.56a1 1 0 0 1 1 1V20a1 1 0 0 1-1 1C10.61 21 3 13.39 3 4a1 1 0 0 1 1-1h3.5a1 1 0 0 1 1 1c0 1.25.19 2.46.56 3.58a1 1 0 0 1-.25 1.01z"/></svg>
                    (024) 8456-700
                </a>
            </article>

            {{-- SURABAYA PRAXIS --}}
            <article class="rounded-xl border border-slate-100 bg-white p-5 shadow-md transition-all duration-300 hover:-translate-y-2 hover:shadow-xl">
                <span class="inline-block rounded-md bg-slate-200 px-2.5 py-1 text-[11px] font-semibold text-slate-700">
                    Kantor Cabang
                </span>

                <h3 class="mt-3 text-sm font-bold text-[#142b59]">
                    Surabaya - Praxis
                </h3>

                <p class="mt-2 text-xs leading-relaxed text-slate-600">
                    Gedung Praxis Lt. 5 Unit No. 5.33,
                    Jl. Sono Kembang, Surabaya.
                </p>

                <a href="tel:+62224231800"
                   class="mt-4 inline-flex items-center gap-2 text-xs font-bold text-orange-600 hover:text-orange-700">
                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="currentColor"><path d="M6.62 10.79a15.05 15.05 0 0 0 6.59 6.59l2.2-2.2a1 1 0 0 1 1.01-.24c1.12.37 2.33.56 3.58.56a1 1 0 0 1 1 1V20a1 1 0 0 1-1 1C10.61 21 3 13.39 3 4a1 1 0 0 1 1-1h3.5a1 1 0 0 1 1 1c0 1.25.19 2.46.56 3.58a1 1 0 0 1-.25 1.01z"/></svg>
                    (022) 4231-800
                </a>
            </article>

            {{-- SEMARANG --}}
            <article class="rounded-xl border border-slate-100 bg-white p-5 shadow-md transition-all duration-300 hover:-translate-y-2 hover:shadow-xl">
                <span class="inline-block rounded-md bg-slate-200 px-2.5 py-1 text-[11px] font-semibold text-slate-700">
                    Kantor Cabang
                </span>

                <h3 class="mt-3 text-sm font-bold text-[#142b59]">Semarang</h3>

                <p class="mt-2 text-xs leading-relaxed text-slate-600">
                    Rukan Pemuda Mas, Blok A Kav. 12-13,
                    Jl. Pemuda, Semarang.
                </p>

                <a href="tel:+62361224500"
                   class="mt-4 inline-flex items-center gap-2 text-xs font-bold text-orange-600 hover:text-orange-700">
                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="currentColor"><path d="M6.62 10.79a15.05 15.05 0 0 0 6.59 6.59l2.2-2.2a1 1 0 0 1 1.01-.24c1.12.37 2.33.56 3.58.56a1 1 0 0 1 1 1V20a1 1 0 0 1-1 1C10.61 21 3 13.39 3 4a1 1 0 0 1 1-1h3.5a1 1 0 0 1 1 1c0 1.25.19 2.46.56 3.58a1 1 0 0 1-.25 1.01z"/></svg>
                    (0361) 224-500
                </a>
            </article>

            {{-- CIREBON --}}
            <article class="rounded-xl border border-slate-100 bg-white p-5 shadow-md transition-all duration-300 hover:-translate-y-2 hover:shadow-xl sm:col-span-2 lg:col-span-1 lg:col-start-2">
                <span class="inline-block rounded-md bg-slate-200 px-2.5 py-1 text-[11px] font-semibold text-slate-700">
                    Kantor Cabang
                </span>

                <h3 class="mt-3 text-sm font-bold text-[#142b59]">Cirebon</h3>

                <p class="mt-2 text-xs leading-relaxed text-slate-600">
                    Perkantoran CSB Mall, Yellow Ribbon 15-18,
                    Jl. DR. Cipto Mangunkusumo, Cirebon.
                </p>

                <a href="tel:+62341224500"
                   class="mt-4 inline-flex items-center gap-2 text-xs font-bold text-orange-600 hover:text-orange-700">
                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="currentColor"><path d="M6.62 10.79a15.05 15.05 0 0 0 6.59 6.59l2.2-2.2a1 1 0 0 1 1.01-.24c1.12.37 2.33.56 3.58.56a1 1 0 0 1 1 1V20a1 1 0 0 1-1 1C10.61 21 3 13.39 3 4a1 1 0 0 1 1-1h3.5a1 1 0 0 1 1 1c0 1.25.19 2.46.56 3.58a1 1 0 0 1-.25 1.01z"/></svg>
                    (0341) 224-500
                </a>
            </article>

        </div>
    </div>
</section>

@endsection
