
@extends('layouts.app')

@section('title', 'Karier | PT Equityworld Futures')
@section('meta_description', 'Informasi karier, peluang kerja, dan program magang PT Equityworld Futures.')

@section('content')
<div class="ewf-inner">

    <section class="ewf-inner-hero">
        <div class="ewf-inner-container">
            <span class="ewf-inner-kicker">CAREER OPPORTUNITIES</span>
            <h1>Gabung Bersama Equityworld</h1>
            <p>Bangun pengalaman dan kembangkan kemampuan profesional bersama kami.</p>
        </div>
    </section>

    <section class="ewf-inner-section">
        <div class="ewf-inner-container">
            <div class="ewf-inner-heading">
                <span class="ewf-inner-kicker">PELUANG BERKEMBANG</span>
                <h2>Temukan Peluangmu</h2>
                <p>Jelajahi informasi kerja dan program magang perusahaan.</p>
            </div>

            <div class="ewf-inner-grid two">
                <article class="ewf-inner-card ewf-career-option">
                    <div class="ewf-inner-icon">↗</div>
                    <span class="ewf-inner-tag">KARIER PROFESIONAL</span>
                    <h3>Kesempatan Bergabung sebagai Staff</h3>
                    <p>Pelajari informasi posisi kerja, persyaratan, dan proses seleksi karyawan.</p>

                    <ul class="ewf-inner-checklist">
                        <li>Informasi lowongan kerja</li>
                        <li>Kualifikasi dan persyaratan</li>
                        <li>Informasi proses rekrutmen</li>
                    </ul>

                    <a href="{{ route('registration') }}" class="ewf-inner-button navy">
                        Informasi Pendaftaran →
                    </a>
                </article>

                <article class="ewf-inner-card ewf-career-option featured">
                    <div class="ewf-inner-icon">✦</div>
                    <span class="ewf-inner-tag">PROGRAM MAGANG</span>
                    <h3>Program Internship Mahasiswa</h3>
                    <p>Kenali program magang untuk memperoleh pengalaman di lingkungan kerja profesional.</p>

                    <ul class="ewf-inner-checklist">
                        <li>Informasi divisi magang</li>
                        <li>Persyaratan peserta magang</li>
                        <li>Periode dan ketentuan program</li>
                    </ul>

                    <a href="{{ route('internship') }}" class="ewf-inner-button orange">
                        Lihat Program Magang →
                    </a>
                </article>
            </div>
        </div>
    </section>

    <section class="ewf-inner-section muted">
        <div class="ewf-inner-container">
            <div class="ewf-inner-heading">
                <span class="ewf-inner-kicker">PROSES PENDAFTARAN</span>
                <h2>Bagaimana Cara Bergabung?</h2>
                <p>Persiapkan diri melalui tahapan informasi berikut.</p>
            </div>

            <div class="ewf-inner-grid three">
                <article class="ewf-inner-card">
                    <span class="ewf-inner-number">01</span>
                    <h3>Pilih Program</h3>
                    <p>Tentukan jalur karier atau magang yang ingin diikuti.</p>
                </article>

                <article class="ewf-inner-card">
                    <span class="ewf-inner-number">02</span>
                    <h3>Siapkan Dokumen</h3>
                    <p>Persiapkan data diri, CV, dan dokumen sesuai persyaratan.</p>
                </article>

                <article class="ewf-inner-card">
                    <span class="ewf-inner-number">03</span>
                    <h3>Ikuti Seleksi</h3>
                    <p>Ikuti proses sesuai ketentuan dan pengumuman perusahaan.</p>
                </article>
            </div>
        </div>
    </section>

    <section class="ewf-inner-cta">
        <div class="ewf-inner-container ewf-inner-cta-row">
            <div>
                <h2>Siap Mengembangkan Potensimu?</h2>
                <p>Mulai dengan mempelajari informasi pendaftaran.</p>
            </div>
            <a href="{{ route('registration') }}" class="ewf-inner-button orange">Lihat Pendaftaran →</a>
        </div>
    </section>

</div>
@endsection
