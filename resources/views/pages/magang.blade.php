
@extends('layouts.app')

@section('title', 'Program Magang | PT Equityworld Futures')
@section('meta_description', 'Informasi program magang dan pendaftaran mahasiswa PT Equityworld Futures.')

@section('content')
<div class="ewf-inner">

    <section class="ewf-inner-hero">
        <div class="ewf-inner-container">
            <span class="ewf-inner-kicker">INTERNSHIP PROGRAM</span>
            <h1>Mulai Pengalaman Profesionalmu</h1>
            <p>Kenali program magang, pilihan divisi, persyaratan, dan proses pendaftaran.</p>
            <a href="{{ route('registration') }}" class="ewf-inner-button orange">Informasi Pendaftaran →</a>
        </div>
    </section>

    <section class="ewf-inner-section">
        <div class="ewf-inner-container ewf-inner-split">
            <div>
                <span class="ewf-inner-kicker">TENTANG PROGRAM</span>
                <h2>Program Magang Mahasiswa</h2>
                <p>
                    Program magang memberikan kesempatan bagi mahasiswa
                    untuk mengenal lingkungan kerja, memahami proses bisnis,
                    dan mengembangkan keterampilan profesional.
                </p>
                <p>
                    Pelaksanaan, pilihan divisi, dan periode magang
                    mengikuti ketentuan perusahaan yang berlaku.
                </p>
            </div>

            <div class="ewf-inner-card">
                <div class="ewf-inner-icon">✦</div>
                <h3>Informasi Peserta</h3>
                <ul class="ewf-inner-checklist">
                    <li>Mahasiswa dari institusi pendidikan</li>
                    <li>Memenuhi persyaratan program</li>
                    <li>Menyiapkan dokumen yang diminta</li>
                    <li>Mengikuti prosedur pendaftaran</li>
                </ul>
            </div>
        </div>
    </section>

    <section class="ewf-inner-section muted">
        <div class="ewf-inner-container">
            <div class="ewf-inner-heading">
                <span class="ewf-inner-kicker">INFORMASI MAGANG</span>
                <h2>Hal yang Perlu Dipersiapkan</h2>
            </div>

            <div class="ewf-inner-grid three">
                <article class="ewf-inner-card">
                    <span class="ewf-inner-number">01</span>
                    <h3>Data Mahasiswa</h3>
                    <p>Nama, identitas mahasiswa, perguruan tinggi, dan program studi.</p>
                </article>

                <article class="ewf-inner-card">
                    <span class="ewf-inner-number">02</span>
                    <h3>Divisi & Periode</h3>
                    <p>Pilihan divisi serta rencana waktu pelaksanaan magang.</p>
                </article>

                <article class="ewf-inner-card">
                    <span class="ewf-inner-number">03</span>
                    <h3>Dokumen</h3>
                    <p>CV, surat pengantar, dan dokumen lain sesuai ketentuan.</p>
                </article>
            </div>
        </div>
    </section>

    <section class="ewf-inner-cta">
        <div class="ewf-inner-container ewf-inner-cta-row">
            <div>
                <h2>Tertarik Mengikuti Program Magang?</h2>
                <p>Pelajari informasi pendaftaran yang tersedia.</p>
            </div>
            <a href="{{ route('registration') }}" class="ewf-inner-button orange">Lanjut ke Registrasi →</a>
        </div>
    </section>

</div>
@endsection
