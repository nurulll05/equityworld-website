
@extends('layouts.app')

@section('title', 'Beranda | PT Equityworld Futures')

@section('meta_description', 'Informasi profil, legalitas, peluang karier, dan berita PT Equityworld Futures.')

@section('content')

<div class="ewf-home">

    {{-- HERO SECTION --}}
    <section class="ewf-hero">
        <div class="ewf-container ewf-hero-grid">

            <div class="ewf-hero-copy">
                <span class="ewf-pill">
                    <i></i>
                    PERUSAHAAN PERDAGANGAN BERJANGKA TERPERCAYA
                </span>

                <h1>
                    Membangun Masa<br>
                    Depan Finansial<br>
                    Bersama <span>Equityworld</span>
                </h1>

                <p>
                    Penyedia layanan transaksi perdagangan berjangka
                    profesional dan transparan di Indonesia. Didukung
                    oleh regulasi resmi dan tenaga ahli berpengalaman.
                </p>

                <div class="ewf-actions">
                    <a href="{{ url('/tentang-kami') }}"
                       class="ewf-btn ewf-btn-primary">
                        Pelajari Lebih Lanjut <span>→</span>
                    </a>

                    <a href="{{ url('/karier') }}"
                       class="ewf-btn ewf-btn-orange">
                        <span>♙</span>
                        Gabung Karier &amp; Magang
                    </a>
                </div>

                <div class="ewf-stats">
                    <div>
                        <strong>100%</strong>
                        <span>Terdaftar BAPPEBTI*</span>
                    </div>

                    <div>
                        <strong>10+</strong>
                        <span>Tahun Pengalaman*</span>
                    </div>

                    <div>
                        <strong>100%</strong>
                        <span>Harga Live*</span>
                    </div>
                </div>
            </div>

            <div class="ewf-hero-panel"
                 aria-label="Ringkasan layanan">

                <div class="ewf-service-row">
                    <span class="ewf-service-icon orange">↗</span>

                    <div>
                        <strong>Trading Center</strong>
                        <small>Komoditi &amp; Multilateral</small>
                    </div>

                    <span class="ewf-status">Resmi &amp; Aman</span>
                </div>

                <div class="ewf-service-row">
                    <span class="ewf-service-icon blue">♢</span>

                    <div>
                        <strong>Keamanan Dana Nasabah</strong>
                        <small>Pemisahan Dana Transaksi</small>
                    </div>

                    <span class="ewf-status">
                        Segregated Account
                    </span>
                </div>

                <div class="ewf-service-row">
                    <span class="ewf-service-icon gold">♙</span>

                    <div>
                        <strong>Dukungan Profesional</strong>
                        <small>Tim ahli &amp; edukasi</small>
                    </div>

                    <span class="ewf-status">Layanan</span>
                </div>

                <div class="ewf-panel-caption">
                    AMAN <b>•</b> NYAMAN <b>•</b> UNTUNG
                </div>
            </div>

        </div>
    </section>


    {{-- PROFIL PERUSAHAAN --}}
    <section class="ewf-section ewf-profile">
        <div class="ewf-container">

            <div class="ewf-section-title">
                <span class="ewf-kicker">PROFIL PERUSAHAAN</span>

                <h2>Mengenal PT Equityworld Futures</h2>

                <p>
                    PT Equityworld Futures adalah anggota Bursa Berjangka
                    yang diawasi langsung oleh BAPPEBTI.
                </p>
            </div>

            <div class="ewf-profile-grid">

                <article class="ewf-card ewf-vision-card">
                    <div class="ewf-card-heading">
                        <span class="ewf-soft-icon">◎</span>
                        <h3>Visi &amp; Misi</h3>
                    </div>

                    <h4>Visi:</h4>

                    <p>
                        Menjadi perusahaan pialang berjangka yang unggul
                        dan terpercaya, dengan standar operasional yang
                        modern, transparan, serta memberikan nilai
                        strategis bagi perkembangan industri dan
                        perekonomian nasional.
                    </p>

                    <h4>Misi:</h4>

                    <ul>
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
                </article>


                <article class="ewf-card ewf-reasons-card">
                    <h3>Mengapa Memilih Equityworld?</h3>

                    <div class="ewf-reason">
                        <span class="ewf-soft-icon orange">♡</span>

                        <div>
                            <strong>Legalitas &amp; Regulasi Jelas</strong>

                            <p>
                                Beroperasi di bawah lisensi dan pengawasan
                                otoritas terkait.
                            </p>
                        </div>
                    </div>

                    <div class="ewf-reason">
                        <span class="ewf-soft-icon blue">◷</span>

                        <div>
                            <strong>Teknologi Transaksi Modern</strong>

                            <p>
                                Sistem transaksi yang cepat, stabil,
                                dan transparan secara real-time.
                            </p>
                        </div>
                    </div>

                    <div class="ewf-reason">
                        <span class="ewf-soft-icon gold">⚡</span>

                        <div>
                            <strong>Pengembangan Karier Optimal</strong>

                            <p>
                                Pelatihan komprehensif untuk staf dan
                                magang guna meningkatkan profesionalitas.
                            </p>
                        </div>
                    </div>
                </article>

            </div>
        </div>
    </section>


    {{-- LEGALITAS --}}
    <section class="ewf-section ewf-legal-section">
        <div class="ewf-container">

            <div class="ewf-section-title">
                <span class="ewf-kicker">LISENSI &amp; REGULASI</span>

                <h2>Legalitas Resmi Perusahaan</h2>

                <p>
                    PT Equityworld Futures beroperasi secara resmi
                    di bawah kerangka regulasi pemerintah Republik
                    Indonesia dan lembaga pengawas terkait.
                </p>
            </div>

            <div class="ewf-legal-grid">

                <article class="ewf-legal-card">
                    <div class="ewf-legal-top">
                        <span class="ewf-soft-icon">♙</span>
                        <span class="ewf-verified">
                            ● Terverifikasi*
                        </span>
                    </div>

                    <h3>BAPPEBTI</h3>

                    <small>Izin Usaha Pialang Berjangka</small>

                    <p>
                        Badan Pengawas Perdagangan Berjangka Komoditi
                        di bawah Kementerian Perdagangan Republik Indonesia.
                    </p>
                </article>


                <article class="ewf-legal-card">
                    <div class="ewf-legal-top">
                        <span class="ewf-soft-icon orange">▣</span>
                        <span class="ewf-verified">
                            ● Anggota Resmi*
                        </span>
                    </div>

                    <h3>BBJ (Bursa Berjangka Jakarta)</h3>

                    <small>
                        Bursa Berjangka Komoditi pertama di Indonesia
                    </small>

                    <p>
                        Sebagai sarana jual beli kontrak berjangka
                        komoditi secara transparan.
                    </p>
                </article>


                <article class="ewf-legal-card">
                    <div class="ewf-legal-top">
                        <span class="ewf-soft-icon blue">▤</span>
                        <span class="ewf-verified">
                            ● Terdaftar*
                        </span>
                    </div>

                    <h3>KBI (Kliring Berjangka)</h3>

                    <small>PT Kliring Berjangka Indonesia</small>

                    <p>
                        Lembaga yang bertugas menyelesaikan dan menjamin
                        transaksi perdagangan berjangka di Indonesia.
                    </p>
                </article>

            </div>

            <div class="ewf-segregated">
                <span class="ewf-lock">♙</span>

                <div>
                    <strong>
                        Rekening Terpisah (Segregated Account)
                    </strong>

                    <p>
                        Seluruh dana nasabah disimpan dalam rekening
                        terpisah di bank yang ditunjuk oleh Bappebti.
                    </p>
                </div>

                <a href="{{ url('/legalitas') }}">
                    Verifikasi Keamanan <span>→</span>
                </a>
            </div>

            <p class="ewf-disclaimer">
                *Pastikan seluruh informasi legalitas, angka, dan
                status terkini diverifikasi kembali melalui kanal
                resmi perusahaan dan regulator sebelum dipublikasikan.
            </p>

        </div>
    </section>


    {{-- KARIER --}}
    <section class="ewf-section ewf-career-section">
        <div class="ewf-container">

            <div class="ewf-section-title">
                <span class="ewf-kicker">
                    PELUANG KARIER &amp; PENGEMBANGAN
                </span>

                <h2>Bergabung Bersama Tim Equityworld</h2>

                <p>
                    Kembangkan potensi dan karier Anda di industri
                    jasa keuangan profesional. Kami membuka kesempatan
                    untuk staf profesional dan program magang
                    mahasiswa/lulusan baru.
                </p>
            </div>

            <div class="ewf-career-tabs">
                <a class="active" href="{{ url('/karier') }}">
                    ♙ Staff Kantor (Full-Time)
                </a>

                <a href="{{ url('/magang') }}">
                    ☆ Program Magang (Internship)
                </a>
            </div>

            <div class="ewf-career-grid">

                <article class="ewf-career-card">
                    <div class="ewf-card-meta">
                        <span>Full-time</span>
                        <small>◉ Lokasi kantor</small>
                    </div>

                    <h3>Staff Kantor</h3>

                    <p>
                        Membangun hubungan profesional dengan nasabah,
                        memberikan layanan staf administrasi, serta
                        analisis pasar komoditi.
                    </p>

                    <h4>KUALIFIKASI UTAMA:</h4>

                    <ul>
                        <li>Pendidikan minimal D3/S1 semua jurusan</li>
                        <li>Memiliki komunikasi yang baik &amp; percaya diri</li>
                        <li>Berorientasi pada target &amp; pengembangan karier</li>
                    </ul>

                    <a href="{{ url('/karier') }}"
                       class="ewf-position-link">
                        Lamar Posisi Ini <span>→</span>
                    </a>
                </article>


                <article class="ewf-career-card">
                    <div class="ewf-card-meta">
                        <span>Full-time</span>
                        <small>◉ Lokasi kantor</small>
                    </div>

                    <h3>Business Consultant</h3>

                    <p>
                        Program akselerasi kepemimpinan untuk mencetak
                        manajerial dan peluang jenjang profesional
                        dalam kurun waktu cepat.
                    </p>

                    <h4>KUALIFIKASI UTAMA:</h4>

                    <ul>
                        <li>Fresh graduate / Pengalaman max 2 tahun</li>
                        <li>Kemampuan analisis &amp; leadership kuat</li>
                        <li>IPK minimal 3.00</li>
                    </ul>

                    <a href="{{ url('/karier') }}"
                       class="ewf-position-link">
                        Lamar Posisi Ini <span>→</span>
                    </a>
                </article>


                <article class="ewf-career-card">
                    <div class="ewf-card-meta">
                        <span>Full-time</span>
                        <small>◉ Lokasi kantor</small>
                    </div>

                    <h3>Driver</h3>

                    <p>
                        Mengelola verifikasi administrasi transaksi
                        nasabah, operasional sistem kliring, dan
                        kepatuhan prosedur operasional.
                    </p>

                    <h4>KUALIFIKASI UTAMA:</h4>

                    <ul>
                        <li>SIM A aktif / pengalaman</li>
                        <li>Teliti, jujur, dan memahami laporan keuangan</li>
                        <li>Menguasai Microsoft Excel</li>
                    </ul>

                    <a href="{{ url('/karier') }}"
                       class="ewf-position-link">
                        Lamar Posisi Ini <span>→</span>
                    </a>
                </article>

            </div>
        </div>
    </section>


    {{-- BERITA DAN EDUKASI --}}
    <section class="ewf-section ewf-news-section">
        <div class="ewf-container">

            <div class="ewf-news-heading">
                <div>
                    <span class="ewf-kicker">KABAR &amp; INFORMASI</span>
                    <h2>Berita &amp; Edukasi Keuangan</h2>
                </div>

                <a href="{{ url('/berita') }}"
                   class="ewf-all-news">
                    Lihat Semua Artikel →
                </a>
            </div>

            <div class="ewf-news-grid">

                <article class="ewf-news-card">
                    <a href="{{ url('/berita') }}"
                       class="ewf-news-art ewf-art-chart"
                       aria-label="Baca artikel edukasi pasar komoditi">

                        <span>EDUKASI</span>

                        <svg viewBox="0 0 360 130" aria-hidden="true">
                            <polyline points="10,90 65,63 100,80 155,35 205,68 260,20 315,50 350,25"/>
                        </svg>
                    </a>

                    <div class="ewf-news-body">
                        <time>22 Oktober 2026</time>

                        <h3>
                            Mengenal Peluang Investasi Perdagangan
                            Berjangka Komoditi
                        </h3>

                        <p>
                            Perdagangan berjangka menawarkan fleksibilitas
                            transaksi dan dua arah (two-way opportunity).
                            Simak dasar-dasar mekanisme di sini.
                        </p>

                        <a href="{{ url('/berita') }}">
                            Baca Selengkapnya ›
                        </a>
                    </div>
                </article>


                <article class="ewf-news-card">
                    <a href="{{ url('/berita') }}"
                       class="ewf-news-art ewf-art-market"
                       aria-label="Baca artikel prospek pasar">

                        <span>PASAR MODAL</span>

                        <svg viewBox="0 0 360 130" aria-hidden="true">
                            <polyline points="8,80 70,95 120,55 175,70 230,30 280,40 350,10"/>
                        </svg>
                    </a>

                    <div class="ewf-news-body">
                        <time>18 Oktober 2026</time>

                        <h3>
                            Prospek Emas &amp; Komoditi Utama
                            di Kuartal Akhir
                        </h3>

                        <p>
                            Analisis pergerakan harga emas dunia dan
                            dampaknya terhadap portofolio perdagangan
                            instrumen komoditi secara global.
                        </p>

                        <a href="{{ url('/berita') }}">
                            Baca Selengkapnya ›
                        </a>
                    </div>
                </article>


                <article class="ewf-news-card">
                    <a href="{{ url('/berita') }}"
                       class="ewf-news-art ewf-art-building"
                       aria-label="Baca informasi program magang">

                        <span>KEGIATAN PERUSAHAAN</span>

                        <div class="ewf-building-icon">▥</div>
                    </a>

                    <div class="ewf-news-body">
                        <time>10 Oktober 2026</time>

                        <h3>
                            Program Internship Equityworld Cetak
                            Talenta Muda Finansial
                        </h3>

                        <p>
                            Komitmen PT Equityworld Futures dalam
                            melatih dan membina para mahasiswa untuk
                            siap terjun di dunia karier keuangan.
                        </p>

                        <a href="{{ url('/berita') }}">
                            Baca Selengkapnya ›
                        </a>
                    </div>
                </article>

            </div>
        </div>
    </section>

</div>

@endsection