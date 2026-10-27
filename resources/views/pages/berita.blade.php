
@extends('layouts.app')

@section('title', 'Berita dan Informasi | PT Equityworld Futures')

@section('meta_description', 'Informasi ekonomi, pasar keuangan, regulasi, dan perdagangan dari sumber resmi dan tepercaya.')

@section('content')

<style>
    /* ==============================
       NEWS PAGE - EQUITYWORLD FUTURES
    ============================== */

    .ew-news {
        --ew-navy: #102b52;
        --ew-blue: #1556a0;
        --ew-light-blue: #eaf2fc;
        --ew-text: #263b59;
        --ew-muted: #64748b;

        background: #f5f8fc;
        color: var(--ew-text);
        padding-bottom: 48px;
        font-family: inherit;
    }

    .ew-news *,
    .ew-news *::before,
    .ew-news *::after {
        box-sizing: border-box;
    }

    .ew-news a {
        text-decoration: none;
    }

    .ew-news-hero {
        position: relative;
        overflow: hidden;
        min-height: 300px;
        display: flex;
        align-items: center;
        background:
            linear-gradient(
                90deg,
                rgba(235, 244, 255, .99) 0%,
                rgba(235, 244, 255, .96) 40%,
                rgba(235, 244, 255, .15) 100%
            ),
            url('https://images.unsplash.com/photo-1460925895917-afdad827c52f?auto=format&fit=crop&w=1800&q=85')
            center 48% / cover no-repeat;
        border-bottom: 1px solid #dce7f5;
    }

    .ew-news-hero::after {
        content: "";
        position: absolute;
        top: 0;
        right: 25%;
        width: 100px;
        height: 100%;
        background: rgba(56, 119, 190, .12);
        transform: skewX(-23deg);
        pointer-events: none;
    }

    .ew-news-hero-inner {
        position: relative;
        z-index: 1;
        width: 100%;
        max-width: 1240px;
        margin: 0 auto;
        padding: 55px 28px 60px;
    }

    .ew-news-eyebrow {
        display: inline-flex;
        align-items: center;
        gap: 12px;
        color: var(--ew-blue);
        font-size: 12px;
        font-weight: 800;
        letter-spacing: 1.8px;
        text-transform: uppercase;
    }

    .ew-news-eyebrow::after {
        content: "";
        display: block;
        width: 36px;
        height: 2px;
        background: #72a8e8;
    }

    .ew-news-hero h1 {
        max-width: 600px;
        margin: 18px 0 14px;
        color: var(--ew-navy);
        font-size: clamp(32px, 4.5vw, 48px);
        line-height: 1.15;
        font-weight: 800;
        letter-spacing: -1.2px;
    }

    .ew-news-hero p {
        max-width: 520px;
        margin: 0;
        color: #4e6687;
        font-size: 15px;
        line-height: 1.85;
    }

    .ew-news-container {
        max-width: 1240px;
        margin: 0 auto;
        padding: 40px 28px 0;
    }

    /* Section heading */

    .ew-news-section-head {
        display: flex;
        justify-content: space-between;
        align-items: flex-end;
        gap: 24px;
        margin-bottom: 25px;
    }

    .ew-news-section-head h2 {
        margin: 0 0 8px;
        color: var(--ew-navy);
        font-size: 28px;
        font-weight: 800;
        letter-spacing: -.5px;
    }

    .ew-news-section-head p {
        max-width: 510px;
        margin: 0;
        color: var(--ew-muted);
        font-size: 14px;
        line-height: 1.8;
    }

    /* Category filters */

    .ew-news-filters {
        display: flex;
        flex-wrap: wrap;
        justify-content: flex-end;
        gap: 8px;
    }

    .ew-news-filter {
        border: 1px solid #dce6f3;
        border-radius: 30px;
        background: #fff;
        color: #49617f;
        padding: 10px 17px;
        font-family: inherit;
        font-size: 12px;
        font-weight: 600;
        cursor: pointer;
        transition: .2s ease;
    }

    .ew-news-filter:hover,
    .ew-news-filter.active {
        border-color: var(--ew-blue);
        background: var(--ew-blue);
        color: #fff;
    }

    .ew-news-filter:focus-visible,
    .ew-news-link:focus-visible {
        outline: 3px solid #8abcf5;
        outline-offset: 3px;
    }

    .ew-news-filter:focus:not(:focus-visible) {
        outline: none;
    }

    /* News cards */

    .ew-news-grid {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 22px;
    }

    .ew-news-card {
        min-width: 0;
        overflow: hidden;
        display: flex;
        flex-direction: column;
        background: #fff;
        border: 1px solid #e5ebf3;
        border-radius: 13px;
        box-shadow: 0 5px 18px rgba(16, 43, 82, .045);
        transition: transform .25s ease, box-shadow .25s ease;
    }

    /*
       PENTING:
       CSS display:flex di atas bisa mengalahkan
       aturan default browser untuk atribut hidden.
       Aturan ini memastikan kartu benar-benar hilang.
    */
    .ew-news-card[hidden] {
        display: none !important;
    }

    .ew-news-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 14px 30px rgba(16, 43, 82, .10);
    }

    .ew-news-image {
        position: relative;
        height: 170px;
        overflow: hidden;
        background: #dce8f7;
    }

    .ew-news-image img {
        display: block;
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform .4s ease;
    }

    .ew-news-card:hover .ew-news-image img {
        transform: scale(1.045);
    }

    .ew-news-card-body {
        flex: 1;
        display: flex;
        flex-direction: column;
        padding: 20px;
    }

    .ew-news-category {
        align-self: flex-start;
        display: inline-block;
        margin-bottom: 13px;
        padding: 6px 10px;
        border-radius: 5px;
        background: #e9f2ff;
        color: #1556a0;
        font-size: 11px;
        font-weight: 750;
    }

    .ew-news-category.green {
        background: #e1f6f0;
        color: #147c69;
    }

    .ew-news-category.purple {
        background: #f0eaff;
        color: #7047bc;
    }

    .ew-news-category.orange {
        background: #fff0df;
        color: #a65d11;
    }

    .ew-news-card h3 {
        margin: 0 0 11px;
        color: var(--ew-navy);
        font-size: 17px;
        font-weight: 750;
        line-height: 1.55;
    }

    .ew-news-card p {
        margin: 0 0 18px;
        color: var(--ew-muted);
        font-size: 13px;
        line-height: 1.8;
    }

    .ew-news-meta {
        display: flex;
        align-items: flex-start;
        gap: 9px;
        margin-top: auto;
        padding-top: 14px;
        border-top: 1px solid #edf1f6;
        color: #61738d;
        font-size: 12px;
        line-height: 1.6;
    }

    .ew-news-meta-icon {
        flex-shrink: 0;
        color: #3975bd;
        font-size: 15px;
    }

    .ew-news-link {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 10px;
        margin-top: 16px;
        padding: 12px 15px;
        border: 1px solid #e0ebfa;
        border-radius: 30px;
        background: #eff5ff;
        color: #1556a0;
        font-size: 12px;
        font-weight: 750;
        transition: .2s ease;
    }

    .ew-news-link:hover {
        background: var(--ew-blue);
        border-color: var(--ew-blue);
        color: #fff;
    }

    .ew-news-link span:last-child {
        font-size: 17px;
    }

    .ew-news-empty {
        padding: 40px 20px;
        text-align: center;
        color: var(--ew-muted);
    }

    .ew-news-empty[hidden] {
        display: none !important;
    }

    /* Information note */

    .ew-news-note {
        position: relative;
        display: flex;
        align-items: flex-start;
        gap: 16px;
        margin-top: 30px;
        padding: 22px 24px;
        overflow: hidden;
        border: 1px solid #c8def9;
        border-radius: 12px;
        background: linear-gradient(110deg, #eaf3ff, #f7faff);
    }

    .ew-news-note-icon {
        flex-shrink: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        width: 34px;
        height: 34px;
        border-radius: 50%;
        background: #2b70ca;
        color: #fff;
        font-size: 19px;
        font-weight: 800;
    }

    .ew-news-note h3 {
        margin: 0 0 6px;
        color: var(--ew-navy);
        font-size: 14px;
        font-weight: 800;
    }

    .ew-news-note p {
        margin: 0;
        color: #526b8c;
        font-size: 12px;
        line-height: 1.8;
    }

    /* Responsive */

    @media (max-width: 1000px) {
        .ew-news-section-head {
            align-items: flex-start;
            flex-direction: column;
        }

        .ew-news-filters {
            justify-content: flex-start;
        }

        .ew-news-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }
    }

    @media (max-width: 600px) {
        .ew-news-hero {
            min-height: auto;
            background:
                linear-gradient(
                    90deg,
                    rgba(235, 244, 255, .97),
                    rgba(235, 244, 255, .83)
                ),
                url('https://images.unsplash.com/photo-1460925895917-afdad827c52f?auto=format&fit=crop&w=900&q=80')
                center / cover no-repeat;
        }

        .ew-news-hero-inner {
            padding: 45px 20px;
        }

        .ew-news-hero h1 {
            font-size: 34px;
        }

        .ew-news-container {
            padding: 30px 16px 0;
        }

        .ew-news-section-head h2 {
            font-size: 24px;
        }

        .ew-news-filters {
            justify-content: flex-start;
            gap: 7px;
        }

        .ew-news-filter {
            padding: 9px 12px;
            font-size: 11px;
        }

        .ew-news-grid {
            grid-template-columns: 1fr;
            gap: 18px;
        }

        .ew-news-image {
            height: 195px;
        }

        .ew-news-card-body {
            padding: 19px;
        }

        .ew-news-note {
            padding: 18px;
        }
    }

    @media (prefers-reduced-motion: reduce) {
        .ew-news-card,
        .ew-news-image img,
        .ew-news-link,
        .ew-news-filter {
            transition: none;
        }

        .ew-news-card:hover {
            transform: none;
        }

        .ew-news-card:hover .ew-news-image img {
            transform: none;
        }
    }
</style>

<div class="ew-news">

    {{-- HERO --}}
    <section class="ew-news-hero">
        <div class="ew-news-hero-inner">
            <div class="ew-news-eyebrow">
                Berita &amp; Informasi
            </div>

            <h1>Berita Ekonomi &amp;<br>Pasar Keuangan</h1>

            <p>
                Ikuti perkembangan ekonomi, pasar keuangan, dan
                regulasi melalui publikasi dari lembaga resmi
                dan sumber informasi tepercaya.
            </p>
        </div>
    </section>

    <main class="ew-news-container">

        {{-- SECTION HEADING --}}
        <section aria-labelledby="ew-news-title">

            <div class="ew-news-section-head">
                <div>
                    <h2 id="ew-news-title">
                        Sumber Berita &amp; Informasi
                    </h2>

                    <p>
                        Pilih kategori untuk menemukan sumber informasi
                        yang relevan. Buka publikasi aslinya melalui
                        tautan yang tersedia pada setiap kartu.
                    </p>
                </div>

                {{-- FILTER KATEGORI --}}
                <div
                    class="ew-news-filters"
                    role="group"
                    aria-label="Filter kategori berita">

                    <button
                        type="button"
                        class="ew-news-filter active"
                        data-filter="all"
                        aria-pressed="true">
                        Semua
                    </button>

                    <button
                        type="button"
                        class="ew-news-filter"
                        data-filter="moneter"
                        aria-pressed="false">
                        Kebijakan Moneter
                    </button>

                    <button
                        type="button"
                        class="ew-news-filter"
                        data-filter="keuangan"
                        aria-pressed="false">
                        Sektor Keuangan
                    </button>

                    <button
                        type="button"
                        class="ew-news-filter"
                        data-filter="pasar"
                        aria-pressed="false">
                        Analisis Pasar
                    </button>
                </div>
            </div>

            {{-- DAFTAR KARTU BERITA --}}
            <div class="ew-news-grid">

                {{-- BANK INDONESIA --}}
                <article
                    class="ew-news-card"
                    data-category="moneter">

                    <div class="ew-news-image">
                        <img
                            src="https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&w=900&q=80"
                            alt="Gedung perkantoran"
                            loading="lazy">
                    </div>

                    <div class="ew-news-card-body">

                        <span class="ew-news-category">
                            Kebijakan Moneter
                        </span>

                        <h3>
                            Informasi Kebijakan Moneter dan Suku Bunga
                        </h3>

                        <p>
                            Ikuti pengumuman suku bunga, kebijakan
                            moneter, inflasi, dan perkembangan ekonomi
                            Indonesia melalui publikasi resmi Bank
                            Indonesia.
                        </p>

                        <div class="ew-news-meta">
                            <span
                                class="ew-news-meta-icon"
                                aria-hidden="true">◉</span>

                            <span>
                                <strong>Bank Indonesia</strong><br>
                                Publikasi dan siaran pers resmi
                            </span>
                        </div>

                        <a
                            href="https://www.bi.go.id/id/Publikasi/Ruang-Media/news-release/Default.aspx"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="ew-news-link">

                            <span>Baca di Bank Indonesia</span>
                            <span aria-hidden="true">↗</span>
                        </a>

                    </div>
                </article>

                {{-- OJK --}}
                <article
                    class="ew-news-card"
                    data-category="keuangan">

                    <div class="ew-news-image">
                        <img
                            src="https://images.unsplash.com/photo-1497366754035-f200968a6e72?auto=format&fit=crop&w=900&q=80"
                            alt="Gedung dan lingkungan perkantoran"
                            loading="lazy">
                    </div>

                    <div class="ew-news-card-body">

                        <span class="ew-news-category purple">
                            Sektor Keuangan
                        </span>

                        <h3>
                            Perkembangan Sektor Jasa Keuangan
                        </h3>

                        <p>
                            Baca informasi tentang pengawasan sektor
                            jasa keuangan, stabilitas sistem keuangan,
                            perlindungan konsumen, dan regulasi melalui
                            publikasi OJK.
                        </p>

                        <div class="ew-news-meta">
                            <span
                                class="ew-news-meta-icon"
                                aria-hidden="true">◉</span>

                            <span>
                                <strong>Otoritas Jasa Keuangan</strong><br>
                                Siaran pers dan informasi resmi
                            </span>
                        </div>

                        <a
                            href="https://ojk.go.id/id/berita-dan-kegiatan/siaran-pers/Default.aspx"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="ew-news-link">

                            <span>Baca di situs OJK</span>
                            <span aria-hidden="true">↗</span>
                        </a>

                    </div>
                </article>

                {{-- KEMENKO PEREKONOMIAN --}}
                <article
                    class="ew-news-card"
                    data-category="pasar">

                    <div class="ew-news-image">
                        <img
                            src="https://images.unsplash.com/photo-1611974789855-9c2a0a7236a3?auto=format&fit=crop&w=900&q=80"
                            alt="Grafik pergerakan pasar keuangan"
                            loading="lazy">
                    </div>

                    <div class="ew-news-card-body">

                        <span class="ew-news-category green">
                            Analisis Pasar
                        </span>

                        <h3>
                            Informasi Pasar dan Perkembangan Ekonomi
                        </h3>

                        <p>
                            Telusuri publikasi dan laporan ekonomi
                            yang diterbitkan Kementerian Koordinator
                            Bidang Perekonomian untuk memahami kondisi
                            ekonomi dan pasar.
                        </p>

                        <div class="ew-news-meta">
                            <span
                                class="ew-news-meta-icon"
                                aria-hidden="true">◉</span>

                            <span>
                                <strong>Kemenko Perekonomian</strong><br>
                                Publikasi ekonomi dan pasar
                            </span>
                        </div>

                        <a
                            href="https://www.ekon.go.id/publikasi"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="ew-news-link">

                            <span>Lihat publikasi</span>
                            <span aria-hidden="true">↗</span>
                        </a>

                    </div>
                </article>

                {{-- BPS --}}
                <article
                    class="ew-news-card"
                    data-category="pasar">

                    <div class="ew-news-image">
                        <img
                            src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?auto=format&fit=crop&w=900&q=80"
                            alt="Visualisasi data dan statistik"
                            loading="lazy">
                    </div>

                    <div class="ew-news-card-body">

                        <span class="ew-news-category orange">
                            Data Ekonomi
                        </span>

                        <h3>
                            Statistik dan Indikator Ekonomi Indonesia
                        </h3>

                        <p>
                            Akses data inflasi, perdagangan, pertumbuhan
                            ekonomi, dan indikator statistik lain untuk
                            memperoleh gambaran kondisi perekonomian
                            Indonesia.
                        </p>

                        <div class="ew-news-meta">
                            <span
                                class="ew-news-meta-icon"
                                aria-hidden="true">◉</span>

                            <span>
                                <strong>Badan Pusat Statistik</strong><br>
                                Berita resmi dan publikasi statistik
                            </span>
                        </div>

                        <a
                            href="https://www.bps.go.id/id/pressrelease"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="ew-news-link">

                            <span>Baca berita BPS</span>
                            <span aria-hidden="true">↗</span>
                        </a>

                    </div>
                </article>

                {{-- ANTARA --}}
                <article
                    class="ew-news-card"
                    data-category="pasar">

                    <div class="ew-news-image">
                        <img
                            src="https://images.unsplash.com/photo-1526304640581-d334cdbbf45e?auto=format&fit=crop&w=900&q=80"
                            alt="Uang dan kegiatan ekonomi"
                            loading="lazy">
                    </div>

                    <div class="ew-news-card-body">

                        <span class="ew-news-category">
                            Berita Ekonomi
                        </span>

                        <h3>
                            Berita Ekonomi dan Bisnis Terkini
                        </h3>

                        <p>
                            Ikuti laporan jurnalistik tentang
                            perkembangan ekonomi nasional, bisnis,
                            kebijakan pemerintah, dan dinamika
                            perdagangan melalui kantor berita Antara.
                        </p>

                        <div class="ew-news-meta">
                            <span
                                class="ew-news-meta-icon"
                                aria-hidden="true">◉</span>

                            <span>
                                <strong>ANTARA News</strong><br>
                                Berita ekonomi dan bisnis
                            </span>
                        </div>

                        <a
                            href="https://www.antaranews.com/ekonomi"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="ew-news-link">

                            <span>Baca berita ekonomi</span>
                            <span aria-hidden="true">↗</span>
                        </a>

                    </div>
                </article>

                {{-- REUTERS --}}
                <article
                    class="ew-news-card"
                    data-category="pasar">

                    <div class="ew-news-image">
                        <img
                            src="https://images.unsplash.com/photo-1504711434969-e33886168f5c?auto=format&fit=crop&w=900&q=80"
                            alt="Informasi dan berita"
                            loading="lazy">
                    </div>

                    <div class="ew-news-card-body">

                        <span class="ew-news-category purple">
                            Pasar Global
                        </span>

                        <h3>
                            Perkembangan Pasar Keuangan Internasional
                        </h3>

                        <p>
                            Baca laporan internasional mengenai pasar
                            saham, mata uang, komoditas, dan perkembangan
                            ekonomi global melalui kanal pasar Reuters.
                        </p>

                        <div class="ew-news-meta">
                            <span
                                class="ew-news-meta-icon"
                                aria-hidden="true">◉</span>

                            <span>
                                <strong>Reuters</strong><br>
                                Berita pasar internasional
                            </span>
                        </div>

                        <a
                            href="https://www.reuters.com/markets/"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="ew-news-link">

                            <span>Baca berita pasar global</span>
                            <span aria-hidden="true">↗</span>
                        </a>

                    </div>
                </article>

            </div>

            {{-- PESAN JIKA TIDAK ADA BERITA --}}
            <div
                class="ew-news-empty"
                role="status"
                aria-live="polite"
                hidden>

                Tidak ada sumber berita dalam kategori ini.
            </div>

        </section>

        {{-- CATATAN INFORMASI --}}
        <aside class="ew-news-note">

            <div
                class="ew-news-note-icon"
                aria-hidden="true">i</div>

            <div>
                <h3>Catatan Informasi</h3>

                <p>
                    Halaman ini menyediakan tautan menuju sumber berita
                    dan publikasi eksternal. Judul kartu merupakan
                    deskripsi kategori informasi, bukan klaim berita
                    terbaru tertentu. Tanggal dan isi publikasi perlu
                    diperiksa pada situs sumber masing-masing.
                    Informasi ini ditujukan untuk edukasi dan bukan
                    merupakan rekomendasi transaksi atau nasihat investasi.
                </p>
            </div>

        </aside>

    </main>
</div>

<script>
(function () {
    function initNewsFilter() {
        const newsRoot = document.querySelector('.ew-news');

        if (!newsRoot) {
            return;
        }

        // Hindari memasang event listener berulang
        // apabila inisialisasi dipanggil lebih dari sekali.
        if (newsRoot.dataset.filterInitialized === 'true') {
            return;
        }

        newsRoot.dataset.filterInitialized = 'true';

        const filterButtons = newsRoot.querySelectorAll(
            '.ew-news-filter'
        );

        const cards = newsRoot.querySelectorAll(
            '.ew-news-card'
        );

        const emptyMessage = newsRoot.querySelector(
            '.ew-news-empty'
        );

        function applyFilter(selectedCategory, activeButton) {
            let visibleCount = 0;

            // Perbarui status tombol filter
            filterButtons.forEach(function (button) {
                const isActive = button === activeButton;

                button.classList.toggle('active', isActive);
                button.setAttribute(
                    'aria-pressed',
                    String(isActive)
                );
            });

            // Tampilkan kartu sesuai kategori
            cards.forEach(function (card) {
                const cardCategory = card.dataset.category;

                const matches =
                    selectedCategory === 'all' ||
                    cardCategory === selectedCategory;

                card.hidden = !matches;

                if (matches) {
                    visibleCount++;
                }
            });

            // Tampilkan pesan jika tidak ada kartu yang cocok
            if (emptyMessage) {
                emptyMessage.hidden = visibleCount > 0;
            }
        }

        filterButtons.forEach(function (button) {
            button.addEventListener('click', function () {
                applyFilter(button.dataset.filter, button);
            });
        });

        // Terapkan filter awal berdasarkan tombol aktif.
        const activeButton =
            newsRoot.querySelector('.ew-news-filter.active') ||
            filterButtons[0];

        if (activeButton) {
            applyFilter(activeButton.dataset.filter, activeButton);
        }
    }

    // Berjalan baik ketika script dimuat sebelum maupun
    // setelah DOM selesai diproses oleh browser.
    if (document.readyState === 'loading') {
        document.addEventListener(
            'DOMContentLoaded',
            initNewsFilter,
            { once: true }
        );
    } else {
        initNewsFilter();
    }
})();
</script>

@endsection
