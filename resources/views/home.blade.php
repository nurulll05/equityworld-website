@extends('layouts.app')

@section('title', 'Beranda | PT Equityworld Futures')

@section('meta_description', 'Kenali PT Equityworld Futures, informasi perusahaan, layanan, dan peluang karier.')

@section('content')

    {{-- HERO SECTION --}}
    <section class="hero-section">
        <div class="container hero-grid">

            <div class="hero-content">
                <span class="eyebrow">
                    MENGENAL EQUITYWORLD FUTURES
                </span>

                <h1>
                    Bersama Membangun
                    <span>Nilai untuk Masa Depan</span>
                </h1>

                <p class="hero-description">
                    Mengenal perusahaan kami, layanan yang tersedia,
                    dan kesempatan untuk tumbuh serta berkembang
                    bersama PT Equityworld Futures.
                </p>

                <div class="hero-actions">
                    <a href="{{ url('/tentang-kami') }}" class="button button-primary">
                        Tentang Kami
                        <span aria-hidden="true">→</span>
                    </a>

                    <a href="{{ url('/karier') }}" class="button button-outline">
                        Jelajahi Karier
                    </a>
                </div>

                <div class="hero-note">
                    <span class="note-line"></span>
                    Informasi perusahaan dan peluang untuk berkembang.
                </div>
            </div>

            <div class="hero-visual">
                <div class="hero-image-frame">
                    <img
                        src="{{ asset('images/gedung-ewf.jpg') }}"
                        alt="Gedung kantor PT Equityworld Futures"
                        class="hero-image"
                        onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';"
                    >

                    <div class="image-placeholder">
                        <span class="placeholder-icon">EWF</span>
                        <strong>Foto Gedung Perusahaan</strong>
                        <span>Tambahkan gambar pada public/images/gedung-ewf.jpg</span>
                    </div>
                </div>

                <div class="hero-accent hero-accent-top"></div>
                <div class="hero-accent hero-accent-bottom"></div>

                <div class="floating-card">
                    <span class="floating-icon">✦</span>
                    <div>
                        <strong>Professional</strong>
                        <span>Berorientasi pada layanan</span>
                    </div>
                </div>
            </div>

        </div>
    </section>

    {{-- RINGKASAN PERUSAHAAN --}}
    <section class="company-highlights">
        <div class="container highlights-grid">

            <div class="highlight-intro">
                <span class="eyebrow">EQUITYWORLD FUTURES</span>
                <h2>Mengenal perusahaan kami lebih dekat.</h2>
            </div>

            <div class="highlight-item">
                <span class="highlight-number">01</span>
                <h3>Profil Perusahaan</h3>
                <p>Informasi tentang perusahaan dan perjalanan bisnisnya.</p>
            </div>

            <div class="highlight-item">
                <span class="highlight-number">02</span>
                <h3>Layanan</h3>
                <p>Kenali informasi layanan yang disediakan perusahaan.</p>
            </div>

            <div class="highlight-item">
                <span class="highlight-number">03</span>
                <h3>Peluang Karier</h3>
                <p>Jelajahi kesempatan kerja dan program magang.</p>
            </div>

        </div>
    </section>

    {{-- TENTANG KAMI --}}
    <section class="about-section section-padding">
        <div class="container about-grid">

            <div class="about-visual">
                <div class="about-image-placeholder">
                    <span>OUR COMPANY</span>
                    <p>Tambahkan foto kantor atau aktivitas perusahaan.</p>
                </div>

                <div class="about-label">
                    <span class="about-label-mark"></span>
                    Mengenal EWF
                </div>
            </div>

            <div class="about-content">
                <span class="eyebrow">TENTANG KAMI</span>

                <h2>
                    Mengenal Lebih Dekat
                    <span>Equityworld Futures</span>
                </h2>

                <p>
                    Kenali profil, visi, misi, dan informasi perusahaan
                    melalui halaman resmi PT Equityworld Futures.
                    Bagian ini nantinya dapat diisi dengan profil perusahaan
                    yang telah diverifikasi.
                </p>

                <a href="{{ url('/tentang-kami') }}" class="text-link">
                    Pelajari Selengkapnya
                    <span aria-hidden="true">→</span>
                </a>
            </div>

        </div>
    </section>

    {{-- KARIER --}}
    <section class="career-section section-padding">
        <div class="container">

            <div class="section-heading">
                <div>
                    <span class="eyebrow">GROW WITH US</span>
                    <h2>Temukan Peluangmu Bersama Kami</h2>
                    <p>
                        Jelajahi peluang untuk membangun pengalaman
                        dan mengembangkan kemampuan profesional.
                    </p>
                </div>
            </div>

            <div class="career-grid">

                <article class="career-card">
                    <div class="career-card-icon">↗</div>
                    <span class="card-label">PELUANG KARIER</span>
                    <h3>Kesempatan Bergabung sebagai Staff</h3>
                    <p>
                        Lihat informasi posisi yang tersedia dan
                        persiapkan diri untuk bergabung bersama tim.
                    </p>
                    <a href="{{ url('/karier') }}" class="text-link">
                        Lihat Lowongan <span aria-hidden="true">→</span>
                    </a>
                </article>

                <article class="career-card career-card-featured">
                    <div class="career-card-icon">✦</div>
                    <span class="card-label">PROGRAM MAGANG</span>
                    <h3>Mulai Perjalanan Profesionalmu</h3>
                    <p>
                        Kenali program magang dan kesempatan memperoleh
                        pengalaman di lingkungan kerja profesional.
                    </p>
                    <a href="{{ url('/magang') }}" class="text-link">
                        Informasi Magang <span aria-hidden="true">→</span>
                    </a>
                </article>

            </div>
        </div>
    </section>

    {{-- BERITA --}}
    <section class="news-section section-padding">
        <div class="container">

            <div class="section-heading section-heading-row">
                <div>
                    <span class="eyebrow">INFORMASI TERKINI</span>
                    <h2>Berita dan Publikasi</h2>
                    <p>
                        Temukan informasi dan pembaruan seputar perusahaan.
                    </p>
                </div>

                <a href="{{ url('/berita') }}" class="button button-outline">
                    Semua Berita <span aria-hidden="true">→</span>
                </a>
            </div>

            <div class="news-grid">

                @foreach ([
                    ['category' => 'PERUSAHAAN', 'title' => 'Informasi dan Pembaruan Perusahaan', 'number' => '01'],
                    ['category' => 'KEGIATAN', 'title' => 'Kegiatan dan Aktivitas Perusahaan', 'number' => '02'],
                    ['category' => 'PENGUMUMAN', 'title' => 'Informasi dan Pengumuman Terbaru', 'number' => '03'],
                ] as $news)

                    <article class="news-card">
                        <div class="news-image-placeholder">
                            <span>{{ $news['number'] }}</span>
                            <small>NEWS &amp; UPDATES</small>
                        </div>

                        <div class="news-card-body">
                            <span class="card-label">{{ $news['category'] }}</span>
                            <h3>{{ $news['title'] }}</h3>
                            <a href="{{ url('/berita') }}" class="text-link">
                                Baca Selengkapnya <span aria-hidden="true">→</span>
                            </a>
                        </div>
                    </article>

                @endforeach

            </div>
        </div>
    </section>

    {{-- CTA --}}
    <section class="closing-section">
        <div class="container closing-content">
            <div>
                <span class="eyebrow">MARI TERHUBUNG</span>
                <h2>Ingin mengetahui lebih lanjut tentang EWF?</h2>
                <p>Jelajahi informasi perusahaan dan hubungi tim kami.</p>
            </div>

            <a href="{{ url('/kontak') }}" class="button button-light">
                Hubungi Kami <span aria-hidden="true">→</span>
            </a>
        </div>
    </section>

@endsection