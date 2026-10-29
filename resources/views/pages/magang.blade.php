
@extends('layouts.app')

@section('title', 'Program Magang | PT Equityworld Futures')
@section('meta_description', 'Informasi program magang, pilihan divisi, persyaratan, alur seleksi, dan pendaftaran mahasiswa PT Equityworld Futures.')

@section('content')
<div class="ewf-inner">

    <!-- HERO -->
    <section class="ewf-inner-hero">
        <div class="ewf-inner-container">
            <span class="ewf-inner-kicker">INTERNSHIP PROGRAM</span>

            <h1>Mulai Pengalaman Profesionalmu</h1>

            <p>
                Kembangkan keterampilan, kenali dunia kerja profesional,
                dan dapatkan pengalaman melalui program magang
                di PT Equityworld Futures.
            </p>

            @auth
                <a href="{{ route('magang.form') }}"
                   class="ewf-inner-button orange">
                    Daftar Magang →
                </a>
            @else
                <a href="{{ route('login', ['redirect' => 'karier']) }}"
                   class="ewf-inner-button orange">
                    Login untuk Daftar Magang →
                </a>
            @endauth
        </div>
    </section>

    <!-- TENTANG PROGRAM -->
    <section class="ewf-inner-section">
        <div class="ewf-inner-container ewf-inner-split">

            <div>
                <span class="ewf-inner-kicker">TENTANG PROGRAM</span>

                <h2>Program Magang Mahasiswa</h2>

                <p>
                    Program magang memberikan kesempatan bagi mahasiswa
                    untuk memperoleh pengalaman kerja, memahami proses
                    bisnis perusahaan, dan mengembangkan keterampilan
                    yang relevan dengan bidang studinya.
                </p>

                <p>
                    Melalui program ini, mahasiswa diharapkan dapat
                    meningkatkan kemampuan komunikasi, kerja sama tim,
                    kedisiplinan, serta pemecahan masalah dalam
                    lingkungan profesional.
                </p>

                <p>
                    Pelaksanaan program, pilihan divisi, dan periode
                    magang menyesuaikan kebutuhan serta ketentuan
                    perusahaan yang berlaku.
                </p>
            </div>

            <div class="ewf-inner-card">
                <div class="ewf-inner-icon">✦</div>

                <h3>Tujuan Program</h3>

                <ul class="ewf-inner-checklist">
                    <li>Mengenal lingkungan kerja profesional</li>
                    <li>Menerapkan pengetahuan dari perkuliahan</li>
                    <li>Mengembangkan keterampilan teknis dan nonteknis</li>
                    <li>Memahami proses bisnis perusahaan</li>
                    <li>Meningkatkan kesiapan memasuki dunia kerja</li>
                </ul>
            </div>

        </div>
    </section>

    <!-- PILIHAN DIVISI -->
    <section class="ewf-inner-section muted">
        <div class="ewf-inner-container">

            <div class="ewf-inner-heading">
                <span class="ewf-inner-kicker">BIDANG PENEMPATAN</span>

                <h2>Pilihan Divisi Magang</h2>

                <p>
                    Penempatan peserta disesuaikan dengan bidang keahlian,
                    kebutuhan perusahaan, dan ketersediaan posisi magang.
                </p>
            </div>

            <div class="ewf-inner-grid three">

                <article class="ewf-inner-card">
                    <span class="ewf-inner-number">01</span>

                    <h3>Information Technology</h3>

                    <p>
                        Mendukung pengembangan sistem informasi,
                        pengelolaan aplikasi, dokumentasi teknis,
                        serta kebutuhan teknologi perusahaan.
                    </p>
                </article>

                <article class="ewf-inner-card">
                    <span class="ewf-inner-number">02</span>

                    <h3>Administrasi</h3>

                    <p>
                        Membantu pengelolaan dokumen, pengarsipan,
                        pengolahan data, dan kegiatan administrasi
                        operasional perusahaan.
                    </p>
                </article>

                <article class="ewf-inner-card">
                    <span class="ewf-inner-number">03</span>

                    <h3>Marketing</h3>

                    <p>
                        Mempelajari kegiatan pemasaran, komunikasi
                        bisnis, penyusunan materi promosi, dan aktivitas
                        pendukung pemasaran.
                    </p>
                </article>

            </div>

            <p style="margin-top:20px; font-size:14px; opacity:.75;">
                * Pilihan divisi merupakan ilustrasi dan perlu
                disesuaikan dengan ketentuan resmi perusahaan.
            </p>

        </div>
    </section>

    <!-- PERSYARATAN -->
    <section class="ewf-inner-section">
        <div class="ewf-inner-container">

            <div class="ewf-inner-heading">
                <span class="ewf-inner-kicker">PERSIAPAN MAGANG</span>

                <h2>Persyaratan dan Dokumen</h2>

                <p>
                    Persiapkan informasi berikut sebelum mengajukan
                    permohonan magang.
                </p>
            </div>

            <div class="ewf-inner-grid three">

                <article class="ewf-inner-card">
                    <span class="ewf-inner-number">01</span>

                    <h3>Data Mahasiswa</h3>

                    <ul class="ewf-inner-checklist">
                        <li>Nama lengkap</li>
                        <li>Nomor Induk Mahasiswa</li>
                        <li>Asal perguruan tinggi</li>
                        <li>Program studi</li>
                        <li>Email dan nomor telepon</li>
                    </ul>
                </article>

                <article class="ewf-inner-card">
                    <span class="ewf-inner-number">02</span>

                    <h3>Rencana Magang</h3>

                    <ul class="ewf-inner-checklist">
                        <li>Pilihan divisi</li>
                        <li>Rencana tanggal mulai</li>
                        <li>Rencana tanggal selesai</li>
                        <li>Tujuan pelaksanaan magang</li>
                    </ul>
                </article>

                <article class="ewf-inner-card">
                    <span class="ewf-inner-number">03</span>

                    <h3>Dokumen Pendukung</h3>

                    <ul class="ewf-inner-checklist">
                        <li>Curriculum Vitae (CV)</li>
                        <li>Surat pengantar kampus</li>
                        <li>Proposal magang jika diperlukan</li>
                        <li>Dokumen tambahan sesuai ketentuan</li>
                    </ul>
                </article>

            </div>
        </div>
    </section>

    <!-- ALUR PENDAFTARAN -->
    <section class="ewf-inner-section muted">
        <div class="ewf-inner-container">

            <div class="ewf-inner-heading">
                <span class="ewf-inner-kicker">PROSES PENDAFTARAN</span>

                <h2>Alur Pendaftaran Magang</h2>

                <p>
                    Ikuti tahapan pendaftaran program magang
                    melalui website.
                </p>
            </div>

            <div class="ewf-inner-grid three">

                <article class="ewf-inner-card">
                    <span class="ewf-inner-number">01</span>
                    <h3>Registrasi Akun</h3>
                    <p>
                        Buat akun peserta menggunakan email dan password
                        untuk mengakses sistem pendaftaran.
                    </p>
                </article>

                <article class="ewf-inner-card">
                    <span class="ewf-inner-number">02</span>
                    <h3>Login Peserta</h3>
                    <p>
                        Masuk melalui halaman login khusus peserta
                        menggunakan akun yang telah dibuat.
                    </p>
                </article>

                <article class="ewf-inner-card">
                    <span class="ewf-inner-number">03</span>
                    <h3>Lengkapi Formulir</h3>
                    <p>
                        Isi data mahasiswa, informasi akademik,
                        pilihan divisi, dan periode magang.
                    </p>
                </article>

                <article class="ewf-inner-card">
                    <span class="ewf-inner-number">04</span>
                    <h3>Unggah Dokumen</h3>
                    <p>
                        Lengkapi dokumen pendukung sesuai
                        persyaratan program magang.
                    </p>
                </article>

                <article class="ewf-inner-card">
                    <span class="ewf-inner-number">05</span>
                    <h3>Proses Seleksi</h3>
                    <p>
                        Admin memeriksa data dan dokumen
                        yang telah dikirimkan peserta.
                    </p>
                </article>

                <article class="ewf-inner-card">
                    <span class="ewf-inner-number">06</span>
                    <h3>Pantau Status</h3>
                    <p>
                        Peserta dapat memantau perkembangan
                        permohonan melalui sistem yang tersedia.
                    </p>
                </article>

            </div>
        </div>
    </section>

    <!-- FAQ -->
    <section class="ewf-inner-section">
        <div class="ewf-inner-container">

            <div class="ewf-inner-heading">
                <span class="ewf-inner-kicker">PERTANYAAN UMUM</span>

                <h2>FAQ Program Magang</h2>
            </div>

            <div style="max-width:850px; margin:auto;">

                <details class="ewf-inner-card" style="margin-bottom:14px;">
                    <summary style="cursor:pointer; font-weight:600;">
                        Siapa yang dapat mendaftar program magang?
                    </summary>

                    <p style="margin-top:12px;">
                        Mahasiswa yang memenuhi persyaratan program
                        dan ketentuan perusahaan dapat mengajukan
                        pendaftaran magang.
                    </p>
                </details>

                <details class="ewf-inner-card" style="margin-bottom:14px;">
                    <summary style="cursor:pointer; font-weight:600;">
                        Apakah peserta harus memiliki akun?
                    </summary>

                    <p style="margin-top:12px;">
                        Peserta perlu membuat akun dan login terlebih
                        dahulu sebelum mengakses formulir pendaftaran
                        magang.
                    </p>
                </details>

                <details class="ewf-inner-card" style="margin-bottom:14px;">
                    <summary style="cursor:pointer; font-weight:600;">
                        Bagaimana mengetahui status pendaftaran?
                    </summary>

                    <p style="margin-top:12px;">
                        Setelah fitur akun dan pendaftaran terintegrasi,
                        peserta dapat memantau status melalui sistem
                        pendaftaran yang disediakan.
                    </p>
                </details>

                <details class="ewf-inner-card">
                    <summary style="cursor:pointer; font-weight:600;">
                        Apakah pendaftaran menjamin diterima magang?
                    </summary>

                    <p style="margin-top:12px;">
                        Tidak. Setiap permohonan mengikuti proses
                        pemeriksaan dan seleksi sesuai ketentuan
                        perusahaan.
                    </p>
                </details>

            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="ewf-inner-cta">
        <div class="ewf-inner-container ewf-inner-cta-row">

            <div>
                <h2>Siap Memulai Pengalaman Magang?</h2>

                <p>
                    Masuk ke akunmu untuk melanjutkan
                    proses pendaftaran program magang.
                </p>
            </div>

            @auth
                <a href="{{ route('magang.form') }}"
                   class="ewf-inner-button orange">
                    Daftar Magang →
                </a>
            @else
                <a href="{{ route('login', ['redirect' => 'karier']) }}"
                   class="ewf-inner-button orange">
                    Login untuk Daftar →
                </a>
            @endauth

        </div>
    </section>

</div>
@endsection
