
@extends('layouts.app')

@section('title', 'Tentang Kami | PT Equityworld Futures')

@section('meta_description', 'Kenali profil, visi, misi, dan nilai-nilai PT Equityworld Futures.')

@section('content')

<style>
    /* ========================================
       ABOUT PAGE - EQUITYWORLD FUTURES
    ======================================== */

    .about-page {
        --about-navy: #15395b;
        --about-blue: #24577e;
        --about-gold: #c79b55;
        --about-orange: #e6a66c;
        --about-text: #536477;
        --about-muted: #77869a;
        --about-bg: #f6f8fb;
        --about-border: #e8edf3;

        color: var(--about-text);
        background: #ffffff;
        overflow: hidden;
    }

    .about-page * {
        box-sizing: border-box;
    }

    .about-page .container {
        width: min(1120px, calc(100% - 40px));
        margin-inline: auto;
    }

    .about-page h1,
    .about-page h2,
    .about-page h3,
    .about-page p {
        margin-top: 0;
    }

    .about-page h1,
    .about-page h2,
    .about-page h3 {
        color: var(--about-navy);
        line-height: 1.3;
    }

    .about-page p {
        line-height: 1.85;
    }

    .about-page a {
        text-decoration: none;
    }

    /* HERO */

    .about-hero {
        position: relative;
        padding: 66px 0 72px;
        background:
            radial-gradient(
                circle at 90% 20%,
                rgba(199, 155, 85, 0.12),
                transparent 30%
            ),
            linear-gradient(135deg, #ffffff 0%, #f3f7fb 100%);
    }

    .about-hero::after {
        content: "";
        position: absolute;
        width: 230px;
        height: 230px;
        border: 1px solid rgba(199, 155, 85, 0.18);
        border-radius: 50%;
        right: -100px;
        bottom: -130px;
        pointer-events: none;
    }

    .about-breadcrumb {
        display: flex;
        align-items: center;
        flex-wrap: wrap;
        gap: 9px;
        margin-bottom: 30px;
        color: var(--about-muted);
        font-size: 12px;
    }

    .about-breadcrumb a {
        color: var(--about-blue);
    }

    .about-breadcrumb span {
        color: var(--about-gold);
    }

    .about-eyebrow {
        display: inline-flex;
        align-items: center;
        gap: 9px;
        margin-bottom: 16px;
        color: #a77b39;
        font-size: 11px;
        font-weight: 800;
        letter-spacing: 2px;
        text-transform: uppercase;
    }

    .about-eyebrow::before {
        content: "";
        width: 25px;
        height: 2px;
        background: var(--about-gold);
    }

    .about-hero h1 {
        max-width: 680px;
        margin-bottom: 20px;
        font-size: clamp(32px, 4.5vw, 49px);
        font-weight: 750;
        letter-spacing: -1.5px;
    }

    .about-hero h1 span {
        display: block;
        color: var(--about-gold);
        font-family: Georgia, "Times New Roman", serif;
        font-weight: 400;
        font-style: italic;
        letter-spacing: -0.8px;
    }

    .about-hero-description {
        max-width: 620px;
        margin-bottom: 27px;
        font-size: 14px;
        color: var(--about-text);
    }

    .about-button {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        padding: 13px 21px;
        border-radius: 5px;
        background: var(--about-navy);
        color: #ffffff !important;
        font-size: 13px;
        font-weight: 600;
        transition: background 0.25s, transform 0.25s;
    }

    .about-button:hover {
        background: var(--about-blue);
        transform: translateY(-2px);
    }

    .about-button-outline {
        background: transparent;
        color: var(--about-navy) !important;
        border: 1px solid #cbd6e1;
    }

    .about-button-outline:hover {
        color: #ffffff !important;
    }

    /* SECTION COMMON */

    .about-section {
        padding: 70px 0;
    }

    .about-section-muted {
        background: var(--about-bg);
    }

    .about-section-heading {
        margin-bottom: 35px;
        text-align: center;
    }

    .about-section-heading .about-eyebrow {
        justify-content: center;
    }

    .about-section-heading h2 {
        margin-bottom: 12px;
        font-size: clamp(25px, 3vw, 34px);
        font-weight: 750;
        letter-spacing: -0.7px;
    }

    .about-section-heading p {
        max-width: 620px;
        margin: 0 auto;
        color: var(--about-muted);
        font-size: 13px;
    }

    /* COMPANY PROFILE */

    .about-profile-grid {
        display: grid;
        grid-template-columns: 0.95fr 1.05fr;
        align-items: center;
        gap: 48px;
    }

    .about-profile-image {
        position: relative;
        min-width: 0;
    }

    .about-profile-image img {
        display: block;
        width: 100%;
        aspect-ratio: 4 / 3;
        object-fit: cover;
        border-radius: 10px;
        box-shadow: 0 15px 40px rgba(21, 57, 91, 0.12);
    }

    .about-image-caption {
        position: absolute;
        left: 16px;
        right: 16px;
        bottom: 16px;
        padding: 13px 16px;
        border: 1px solid rgba(255, 255, 255, 0.6);
        border-radius: 7px;
        background: rgba(255, 255, 255, 0.94);
        backdrop-filter: blur(8px);
    }

    .about-image-caption strong {
        display: block;
        margin-bottom: 3px;
        color: var(--about-navy);
        font-size: 13px;
    }

    .about-image-caption span {
        color: var(--about-muted);
        font-size: 11px;
    }

    .about-profile-content h2 {
        margin-bottom: 17px;
        font-size: clamp(25px, 3vw, 32px);
        letter-spacing: -0.7px;
    }

    .about-profile-content > p {
        margin-bottom: 15px;
        font-size: 13px;
        text-align: justify;
    }

    .about-profile-points {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 12px;
        margin-top: 25px;
    }

    .about-profile-point {
        display: flex;
        align-items: flex-start;
        gap: 10px;
        padding: 13px;
        border: 1px solid var(--about-border);
        border-radius: 7px;
        background: #ffffff;
    }

    .about-check {
        display: inline-flex;
        flex: 0 0 25px;
        align-items: center;
        justify-content: center;
        width: 25px;
        height: 25px;
        border-radius: 50%;
        background: #edf4f9;
        color: var(--about-blue);
        font-size: 13px;
        font-weight: 800;
    }

    .about-profile-point strong {
        display: block;
        margin-bottom: 4px;
        color: var(--about-navy);
        font-size: 12px;
    }

    .about-profile-point small {
        display: block;
        color: var(--about-muted);
        font-size: 11px;
        line-height: 1.6;
    }

    /* VISION & MISSION */

    .about-vm-grid {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 22px;
    }

    .about-vm-card {
        position: relative;
        padding: 30px;
        overflow: hidden;
        border: 1px solid var(--about-border);
        border-radius: 11px;
        background: #ffffff;
        box-shadow: 0 8px 26px rgba(21, 57, 91, 0.035);
        transition: transform 0.25s, box-shadow 0.25s;
    }

    .about-vm-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 14px 35px rgba(21, 57, 91, 0.08);
    }

    .about-vm-card::after {
        content: "";
        position: absolute;
        top: -42px;
        right: -42px;
        width: 110px;
        height: 110px;
        border-radius: 50%;
        background: rgba(199, 155, 85, 0.08);
    }

    .about-vm-icon {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 47px;
        height: 47px;
        margin-bottom: 20px;
        border-radius: 10px;
        background: #edf4f9;
        color: var(--about-blue);
        font-size: 23px;
    }

    .about-vm-card h3 {
        margin-bottom: 12px;
        font-size: 22px;
    }

    .about-vm-card p {
        margin-bottom: 0;
        font-size: 13px;
    }

    .about-mission-list {
        display: grid;
        gap: 11px;
        margin: 0;
        padding: 0;
        list-style: none;
    }

    .about-mission-list li {
        position: relative;
        padding-left: 22px;
        color: var(--about-text);
        font-size: 12px;
        line-height: 1.75;
    }

    .about-mission-list li::before {
        content: "✓";
        position: absolute;
        top: 0;
        left: 0;
        color: var(--about-gold);
        font-weight: 800;
    }

    /* COMPANY VALUES */

    .about-values-grid {
        display: grid;
        grid-template-columns: repeat(4, minmax(0, 1fr));
        gap: 17px;
    }

    .about-value-card {
        padding: 24px 18px;
        border: 1px solid var(--about-border);
        border-radius: 9px;
        background: #ffffff;
        text-align: center;
        transition: transform 0.25s, border-color 0.25s;
    }

    .about-value-card:hover {
        transform: translateY(-4px);
        border-color: #d6bd91;
    }

    .about-value-icon {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 51px;
        height: 51px;
        margin: 0 auto 17px;
        border-radius: 12px;
        background: #fbf4e9;
        color: #a77b39;
        font-size: 23px;
    }

    .about-value-card h3 {
        margin-bottom: 10px;
        font-size: 14px;
    }

    .about-value-card p {
        margin-bottom: 0;
        color: var(--about-muted);
        font-size: 12px;
        line-height: 1.75;
    }

    /* CALL TO ACTION */

    .about-cta {
        padding: 45px 0;
        background: var(--about-navy);
    }

    .about-cta-inner {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 25px;
    }

    .about-cta h2 {
        margin-bottom: 8px;
        color: #ffffff;
        font-size: 25px;
    }

    .about-cta p {
        margin-bottom: 0;
        color: #d2deea;
        font-size: 13px;
    }

    .about-cta .about-button {
        flex-shrink: 0;
        background: #e6b875;
        color: #173651 !important;
    }

    .about-cta .about-button:hover {
        background: #f0c98e;
    }

    /* RESPONSIVE */

    @media (max-width: 900px) {
        .about-profile-grid {
            gap: 30px;
        }

        .about-values-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }
    }

    @media (max-width: 640px) {
        .about-page .container {
            width: min(100% - 32px, 520px);
        }

        .about-hero {
            padding: 42px 0 50px;
        }

        .about-breadcrumb {
            margin-bottom: 24px;
        }

        .about-hero h1 {
            font-size: 34px;
        }

        .about-section {
            padding: 48px 0;
        }

        .about-section-heading {
            margin-bottom: 27px;
        }

        .about-profile-grid,
        .about-vm-grid {
            grid-template-columns: 1fr;
            gap: 25px;
        }

        .about-profile-content h2 {
            font-size: 27px;
        }

        .about-profile-points {
            grid-template-columns: 1fr;
        }

        .about-vm-card {
            padding: 24px;
        }

        .about-values-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 12px;
        }

        .about-value-card {
            padding: 19px 12px;
        }

        .about-value-card h3 {
            font-size: 13px;
        }

        .about-value-card p {
            font-size: 11px;
        }

        .about-cta-inner {
            align-items: flex-start;
            flex-direction: column;
        }

        .about-cta h2 {
            font-size: 22px;
        }
    }

    @media (prefers-reduced-motion: reduce) {
        .about-page *,
        .about-page *::before,
        .about-page *::after {
            transition: none !important;
            scroll-behavior: auto !important;
        }
    }
</style>

<div class="about-page">

    {{-- HERO --}}
    <section class="about-hero">
        <div class="container">

            <nav class="about-breadcrumb" aria-label="Breadcrumb">
                <a href="{{ url('/') }}">Beranda</a>
                <span>/</span>
                <span>Tentang Kami</span>
            </nav>

            <span class="about-eyebrow">Tentang Kami</span>

            <h1>
                Mengenal Lebih Dekat
                <span>PT Equityworld Futures</span>
            </h1>

            <p class="about-hero-description">
                Kenali profil perusahaan, nilai-nilai yang dijunjung,
                serta komitmen PT Equityworld Futures dalam menjalankan
                kegiatan usaha secara profesional, transparan, dan
                bertanggung jawab.
            </p>

            <a href="{{ route('contact') }}" class="about-button">
                Hubungi Kami <span aria-hidden="true">→</span>
            </a>

        </div>
    </section>


    {{-- PROFIL PERUSAHAAN --}}
    <section class="about-section">
        <div class="container">

            <div class="about-profile-grid">

                <div class="about-profile-image">

                    {{-- Ganti gambar dengan foto resmi perusahaan --}}
                    <img
                        src="{{ asset('images/about-company.jpg') }}"
                        alt="Gedung atau kantor PT Equityworld Futures"
                        loading="lazy"
                        onerror="this.onerror=null;this.src='https://placehold.co/800x600/f0f3f6/15395b?text=PT+Equityworld+Futures';"
                    >

                    <div class="about-image-caption">
                        <strong>PT Equityworld Futures</strong>
                        <span>Profil dan informasi perusahaan</span>
                    </div>

                </div>

                <div class="about-profile-content">

                    <span class="about-eyebrow">
                        Profil Perusahaan
                    </span>

                    <h2>Tentang PT Equityworld Futures</h2>

                    <p>
                        PT Equityworld Futures merupakan perusahaan yang
                        bergerak di bidang perdagangan berjangka.
                        Halaman ini menyajikan informasi mengenai profil
                        perusahaan, kegiatan usaha, serta prinsip yang
                        menjadi landasan dalam menjalankan aktivitasnya.
                    </p>

                    <p>
                        Melalui penyampaian informasi yang jelas dan
                        mudah dipahami, perusahaan diharapkan dapat
                        membantu masyarakat mengenal kegiatan
                        perdagangan berjangka, memahami karakteristik
                        produknya, serta mempertimbangkan risiko yang
                        menyertainya.
                    </p>

                    <div class="about-profile-points">

                        <div class="about-profile-point">
                            <span class="about-check">✓</span>
                            <div>
                                <strong>Profesionalisme</strong>
                                <small>
                                    Mengutamakan standar kerja dan
                                    pelayanan yang profesional.
                                </small>
                            </div>
                        </div>

                        <div class="about-profile-point">
                            <span class="about-check">✓</span>
                            <div>
                                <strong>Transparansi</strong>
                                <small>
                                    Mendorong penyampaian informasi
                                    yang jelas dan mudah dipahami.
                                </small>
                            </div>
                        </div>

                    </div>

                </div>

            </div>

        </div>
    </section>


    {{-- VISI DAN MISI --}}
    <section class="about-section about-section-muted">
        <div class="container">

            <div class="about-section-heading">
                <span class="about-eyebrow">Arah Perusahaan</span>

                <h2>Visi &amp; Misi</h2>

                <p>
                    Prinsip dan arah yang menjadi pedoman dalam
                    menjalankan kegiatan perusahaan.
                </p>
            </div>

            <div class="about-vm-grid">

                {{-- VISI --}}
                <article class="about-vm-card">

                    <div class="about-vm-icon" aria-hidden="true">
                        ◎
                    </div>

                    <h3>Visi</h3>

                    <p>
                        Menjadi perusahaan yang terus mengembangkan
                        kualitas layanan dan profesionalisme dalam
                        industri perdagangan berjangka, dengan
                        mengedepankan kepercayaan dan tanggung jawab.
                    </p>

                </article>


                {{-- MISI --}}
                <article class="about-vm-card">

                    <div class="about-vm-icon" aria-hidden="true">
                        ↗
                    </div>

                    <h3>Misi</h3>

                    <ul class="about-mission-list">
                        <li>
                            Memberikan pelayanan yang profesional
                            kepada pelanggan.
                        </li>

                        <li>
                            Menyampaikan informasi produk dan risiko
                            perdagangan secara jelas.
                        </li>

                        <li>
                            Mendorong pemahaman masyarakat mengenai
                            perdagangan berjangka.
                        </li>

                        <li>
                            Menjunjung prinsip kepatuhan, integritas,
                            dan tanggung jawab dalam kegiatan usaha.
                        </li>
                    </ul>

                </article>

            </div>

        </div>
    </section>


    {{-- NILAI-NILAI PERUSAHAAN --}}
    <section class="about-section">
        <div class="container">

            <div class="about-section-heading">
                <span class="about-eyebrow">Prinsip Kami</span>

                <h2>Nilai-Nilai Perusahaan</h2>

                <p>
                    Nilai yang menjadi dasar dalam membangun hubungan
                    profesional dan memberikan pelayanan kepada pelanggan.
                </p>
            </div>

            <div class="about-values-grid">

                <article class="about-value-card">
                    <div class="about-value-icon" aria-hidden="true">
                        ◈
                    </div>

                    <h3>Integritas</h3>

                    <p>
                        Menjunjung kejujuran dan tanggung jawab
                        dalam setiap kegiatan.
                    </p>
                </article>


                <article class="about-value-card">
                    <div class="about-value-icon" aria-hidden="true">
                        ◎
                    </div>

                    <h3>Profesional</h3>

                    <p>
                        Mengutamakan kompetensi, kualitas kerja,
                        dan pelayanan.
                    </p>
                </article>


                <article class="about-value-card">
                    <div class="about-value-icon" aria-hidden="true">
                        ◉
                    </div>

                    <h3>Transparansi</h3>

                    <p>
                        Menyampaikan informasi secara jelas,
                        terbuka, dan mudah dipahami.
                    </p>
                </article>


                <article class="about-value-card">
                    <div class="about-value-icon" aria-hidden="true">
                        ♧
                    </div>

                    <h3>Berkelanjutan</h3>

                    <p>
                        Mendorong perbaikan kualitas dan
                        pengembangan layanan secara berkelanjutan.
                    </p>
                </article>

            </div>

        </div>
    </section>


    {{-- CTA --}}
    <section class="about-cta">
        <div class="container">

            <div class="about-cta-inner">

                <div>
                    <h2>Ingin Mengenal Kami Lebih Dekat?</h2>

                    <p>
                        Hubungi tim kami untuk memperoleh informasi
                        lebih lanjut mengenai perusahaan.
                    </p>
                </div>

                <a href="{{ route('contact') }}" class="about-button">
                    Hubungi Kami <span aria-hidden="true">→</span>
                </a>

            </div>

        </div>
    </section>

</div>

@endsection
