@extends('layouts.app')

@section('title', 'Berita, Analisis & Edukasi | PT Equityworld Futures')

@section('meta_description', 'Update perkembangan pasar keuangan, komoditas, dan berita ekonomi terkini.')

@section('content')

<style>
    #newsSearch {
        box-sizing: border-box !important;
        border: 1px solid #cbd5e1 !important;
        border-radius: 12px !important;
        outline: none;
        box-shadow: none;
        background-clip: padding-box;
    }

    #newsSearch:focus {
        border: 1px solid #3b82f6 !important;
        outline: none;
        box-shadow: 0 0 0 2px rgba(59, 130, 246, 0.12) !important;
    }

    /* GARIS DAN BAYANGAN CARD BERITA */
    [data-news-card] {
        border: 1px solid #dce3ed !important;
        border-radius: 18px;
        box-shadow: 0 2px 9px rgba(15, 35, 65, 0.07) !important;
        background-color: #ffffff;
        transition: transform 0.3s ease,
                    border-color 0.3s ease,
                    box-shadow 0.3s ease;
    }

    [data-news-card]:hover {
        border-color: #c5d1e0 !important;
        box-shadow: 0 12px 24px rgba(15, 35, 65, 0.12) !important;
        transform: translateY(-4px);
    }
</style>

@php
    $categories = [
        'Semua',
        'Forex',
        'Analisis Pasar',
        'Komoditas',
    ];
@endphp

<div class="min-h-screen bg-white">

    {{-- HERO --}}
    <section class="relative overflow-hidden bg-gradient-to-br from-[#102746] via-[#142f5b] to-[#1d4385]">

        <div class="absolute inset-0 opacity-10"
             style="background-image: radial-gradient(#ffffff 1px, transparent 1px); background-size: 25px 25px;">
        </div>

        <div class="relative mx-auto max-w-7xl px-5 py-9 text-center sm:py-12">

            <span class="inline-flex rounded-full border border-orange-400/30 bg-orange-500/10 px-4 py-1.5 text-xs font-bold uppercase tracking-widest text-orange-400">
                Informasi & Wawasan
            </span>

            <h1 class="mt-4 text-3xl font-extrabold tracking-tight text-white sm:text-4xl md:text-5xl">
                Berita, Analisis & Edukasi
            </h1>

            <p class="mx-auto mt-3 max-w-2xl text-sm leading-7 text-blue-100 sm:text-base">
                Update perkembangan pasar keuangan, komoditas berjangka,
                dan berita menarik lainnya.
            </p>

        </div>

    </section>


    {{-- SEARCH DAN FILTER --}}
    <section class="relative z-10 mx-auto -mt-7 max-w-6xl px-5">

        <div class="flex flex-col gap-4 rounded-2xl border border-slate-200 bg-white p-4 shadow-lg md:flex-row md:items-center md:justify-between">

            {{-- LIVE SEARCH --}}
            <div class="relative w-full md:max-w-sm">

                <svg
                    class="pointer-events-none absolute left-4 top-1/2 h-5 w-5 -translate-y-1/2 text-slate-400"
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                >
                    <circle cx="11" cy="11" r="7"/>
                    <path d="m16 16 4 4"/>
                </svg>

                <input
                    id="newsSearch"
                    type="text"
                    value="{{ $search ?? '' }}"
                    autocomplete="off"
                    placeholder="Cari judul atau kata kunci..."
                    aria-label="Cari berita"
                    class="!block !h-12 !w-full !appearance-none !rounded-xl !border !border-solid !border-slate-300 !bg-slate-50 !py-0 !pl-11 !pr-4 !text-sm !leading-normal !text-slate-700 !outline-none !shadow-none transition placeholder:!text-slate-400 focus:!border-blue-500 focus:!bg-white focus:!ring-2 focus:!ring-blue-100"
                >

                <button
                    type="button"
                    id="clearNewsSearch"
                    aria-label="Hapus pencarian"
                    class="absolute right-3 top-1/2 hidden h-7 w-7 -translate-y-1/2 items-center justify-center rounded-full text-lg text-slate-400 transition hover:bg-slate-200 hover:text-slate-700"
                >
                    &times;
                </button>

            </div>


            {{-- FILTER KATEGORI --}}
            <div class="flex flex-wrap items-center gap-2">

                @foreach($categories as $category)

                    <a
                        href="{{ route('news', array_filter([
                            'category' => $category !== 'Semua' ? $category : null,
                        ])) }}"
                        class="rounded-xl px-4 py-2.5 text-xs font-semibold transition
                        {{ $selectedCategory === $category
                            ? 'bg-[#102b52] text-white shadow-sm'
                            : 'bg-slate-100 text-slate-600 hover:bg-blue-50 hover:text-blue-700' }}"
                    >
                        {{ $category }}
                    </a>

                @endforeach

            </div>

        </div>

    </section>


    {{-- DAFTAR BERITA --}}
    <section class="mx-auto max-w-7xl px-5 pb-16 pt-12">

        {{-- JUDUL SECTION --}}
        <div class="mb-7 flex flex-col justify-between gap-3 sm:flex-row sm:items-end">

            <div>

                <p class="text-xs font-bold uppercase tracking-widest text-orange-500">
                    Informasi Terkini
                </p>

                <h2 class="mt-2 text-2xl font-extrabold text-[#102b52] sm:text-3xl">
                    Berita Terbaru
                </h2>

                <p class="mt-2 text-sm text-slate-500">
                    Temukan informasi dan wawasan seputar dunia keuangan.
                </p>

            </div>

            <p class="text-sm text-slate-500">
                Total
                <strong class="text-[#102b52]">
                    {{ $news->total() }}
                </strong>
                berita tersedia
            </p>

        </div>


        {{-- GRID BERITA --}}
        @if($news->count() > 0)

            <div
                id="newsGrid"
                class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3"
            >

                @foreach($news as $item)

                    <article
                        data-news-card
                        data-category="{{ $item['category'] }}"
                        class="group flex h-full flex-col overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-[0_2px_8px_rgba(15,23,42,0.06)] transition duration-300 hover:-translate-y-1 hover:border-slate-300 hover:shadow-xl"
                    >

                        {{-- GAMBAR --}}
                        <div class="relative h-52 overflow-hidden bg-slate-100">

                            <img
                                src="{{ $item['image'] ?: 'https://placehold.co/900x500/eaf0f8/17345f?text=Equityworld+Futures' }}"
                                alt="{{ $item['title'] }}"
                                loading="lazy"
                                class="h-full w-full object-cover transition duration-500 group-hover:scale-105"
                                onerror="this.onerror=null;this.src='https://placehold.co/900x500/eaf0f8/17345f?text=Equityworld+Futures';"
                            >

                            <span class="absolute left-4 top-4 rounded-md bg-[#0879bd] px-3 py-1.5 text-xs font-bold text-white shadow">
                                {{ $item['category'] }}
                            </span>

                        </div>


                        {{-- KONTEN KARTU --}}
                        <div class="flex flex-1 flex-col p-5">

                            {{-- TANGGAL --}}
                            <div class="mb-3 flex items-center gap-2 text-xs text-slate-400">

                                <svg
                                    class="h-4 w-4 shrink-0"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <rect x="3" y="5" width="18" height="16" rx="2" stroke-width="1.7"/>
                                    <path d="M16 3v4M8 3v4M3 10h18" stroke-width="1.7"/>
                                </svg>

                                {{ \Carbon\Carbon::parse($item['date'])->translatedFormat('d F Y') }}

                            </div>


                            {{-- JUDUL --}}
                            <h3 class="text-base font-bold leading-snug text-[#102b52] transition group-hover:text-blue-700">
                                {{ $item['title'] }}
                            </h3>


                            {{-- RINGKASAN --}}
                            <p class="mt-3 line-clamp-3 text-sm leading-6 text-slate-500">
                                {{ $item['excerpt'] }}
                            </p>


                            {{-- SUMBER DAN LINK --}}
                            <div class="mt-auto border-t border-slate-100 pt-4">

                                <p class="text-xs text-slate-400">
                                    Sumber berita
                                </p>

                                <p class="mt-1 text-sm font-bold text-slate-700">
                                    {{ $item['source'] }}
                                </p>

                                <a
                                    href="{{ $item['url'] }}"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                    class="mt-4 inline-flex items-center gap-2 text-sm font-bold text-orange-600 transition hover:text-orange-700"
                                >
                                    Baca Selengkapnya

                                    <svg
                                        class="h-4 w-4 transition group-hover:translate-x-1"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            d="M5 12h14m-6-6 6 6-6 6"
                                            stroke-width="2"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                        />
                                    </svg>

                                </a>

                            </div>

                        </div>

                    </article>

                @endforeach

            </div>

        @else

            {{-- PESAN JIKA BERITA TIDAK DITEMUKAN --}}
            <div class="rounded-2xl border border-slate-200 bg-slate-50 px-5 py-16 text-center">

                <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-full bg-blue-100 text-blue-700">

                    <svg
                        class="h-8 w-8"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <circle cx="11" cy="11" r="7" stroke-width="2"/>
                        <path d="m16 16 4 4" stroke-width="2" stroke-linecap="round"/>
                    </svg>

                </div>

                <h3 class="mt-5 text-lg font-bold text-[#102b52]">
                    {{ !empty($search) ? 'Berita tidak ditemukan' : 'Belum ada berita' }}
                </h3>

                <p class="mt-2 text-sm text-slate-500">
                    {{ !empty($search)
                        ? 'Tidak ada berita yang mengandung kata pencarian tersebut. Silakan coba kata kunci lainnya.'
                        : 'Berita belum tersedia pada kategori ini.' }}
                </p>

            </div>

        @endif


        {{-- PAGINATION --}}
        @if($news->hasPages())

            <div id="newsPagination" class="mt-12">

                <div class="flex items-center justify-center gap-2">

                    {{-- PANAH SEBELUMNYA --}}
                    @if($news->onFirstPage())

                        <span class="flex h-10 w-10 items-center justify-center rounded-xl border border-slate-200 text-slate-300 cursor-not-allowed">
                            &lsaquo;
                        </span>

                    @else

                        <a
                            href="{{ $news->previousPageUrl() }}"
                            class="flex h-10 w-10 items-center justify-center rounded-xl border border-slate-300 text-[#102b52] transition hover:bg-blue-50"
                        >
                            &lsaquo;
                        </a>

                    @endif


                    {{-- MAKSIMAL 3 NOMOR HALAMAN --}}
                    @php
                        $current = $news->currentPage();
                        $last = $news->lastPage();

                        $start = max(1, min($current - 1, $last - 2));
                        $end = min($last, $start + 2);
                    @endphp

                    @foreach($news->getUrlRange($start, $end) as $page => $url)

                        <a
                            href="{{ $url }}"
                            class="flex h-10 min-w-10 items-center justify-center rounded-xl border px-3 text-sm font-semibold transition
                            {{ $current == $page
                                ? 'border-[#102b52] bg-[#102b52] text-white shadow-sm'
                                : 'border-slate-300 bg-white text-[#102b52] hover:border-blue-400 hover:bg-blue-50' }}"
                        >
                            {{ $page }}
                        </a>

                    @endforeach


                    {{-- PANAH SELANJUTNYA --}}
                    @if($news->hasMorePages())

                        <a
                            href="{{ $news->nextPageUrl() }}"
                            class="flex h-10 w-10 items-center justify-center rounded-xl border border-slate-300 text-[#102b52] transition hover:bg-blue-50"
                        >
                            &rsaquo;
                        </a>

                    @else

                        <span class="flex h-10 w-10 items-center justify-center rounded-xl border border-slate-200 text-slate-300 cursor-not-allowed">
                            &rsaquo;
                        </span>

                    @endif

                </div>

            </div>

        @endif


        {{-- CATATAN INFORMASI --}}
        <div class="mt-10 rounded-2xl border border-blue-100 bg-[#f1f6ff] px-5 py-4 sm:px-6">

            <div class="flex items-start gap-4">

                {{-- IKON INFORMASI --}}
                <div class="flex h-8 w-8 shrink-0 items-center justify-center rounded-xl border border-blue-200 bg-blue-50 text-blue-700">

                    <svg
                        class="h-4 w-4"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="1.8"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        aria-hidden="true"
                    >
                        <circle cx="12" cy="12" r="9"/>
                        <path d="M12 11v5"/>
                        <path d="M12 8h.01"/>
                    </svg>

                </div>


                {{-- TEKS INFORMASI --}}
                <div class="min-w-0">

                    <h3 class="text-sm font-bold text-[#102b52] sm:text-base">
                        Catatan Informasi
                    </h3>

                    <p class="mt-2 text-sm leading-6 text-slate-600">
                        Informasi ini disajikan untuk edukasi dan wawasan, bukan sebagai rekomendasi transaksi atau nasihat investasi.
                    </p>

                </div>

            </div>

        </div>

    </section>

</div>


{{-- LIVE SEARCH JAVASCRIPT --}}
<script>

document.addEventListener('DOMContentLoaded', function () {

    const searchInput = document.getElementById('newsSearch');
    const clearButton = document.getElementById('clearNewsSearch');

    if (!searchInput || !clearButton) return;

    let searchTimer;

    function updateClearButton() {
        const hasText = searchInput.value.trim().length > 0;

        clearButton.classList.toggle('hidden', !hasText);
        clearButton.classList.toggle('flex', hasText);
    }

    searchInput.addEventListener('input', function () {

        updateClearButton();
        clearTimeout(searchTimer);

        searchTimer = setTimeout(function () {

            const url = new URL(window.location.href);
            const keyword = searchInput.value.trim();

            url.searchParams.delete('page');

            if (keyword) {
                url.searchParams.set('search', keyword);
            } else {
                url.searchParams.delete('search');
            }

            window.location.href = url.toString();

        }, 400);
    });

    clearButton.addEventListener('click', function () {

        clearTimeout(searchTimer);

        searchInput.value = '';
        updateClearButton();

        const url = new URL(window.location.href);

        url.searchParams.delete('search');
        url.searchParams.delete('page');

        window.location.href = url.toString();
    });

    updateClearButton();

});
</script>

@endsection
