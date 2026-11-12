
@extends('layouts.app')

@section('title', 'Informasi Persyaratan | PT Equityworld Futures')

@section('content')

@php
    // Mengambil kategori dari halaman karier
    $jenis = request('jenis', 'staff');

    $posisi = request('posisi', 'Staff Kantor');

    $kategoriMagang = request('kategori', 'Magang Mahasiswa');

    // Membatasi pilihan posisi agar tidak menerima input sembarangan
    $daftarPosisi = [
        'Staff Kantor',
        'Business Consultant',
        'Driver',
    ];

    if (!in_array($posisi, $daftarPosisi)) {
        $posisi = 'Staff Kantor';
    }

    // Membatasi kategori magang
    if (!in_array($kategoriMagang, [
        'Magang SMA/SMK',
        'Magang Mahasiswa'
    ])) {
        $kategoriMagang = 'Magang Mahasiswa';
    }

    $isStaff = $jenis === 'staff';

    // Persyaratan berdasarkan formulir yang sudah dibuat
    $dokumenStaff = [
        [
            'nama' => 'Curriculum Vitae (CV)',
            'keterangan' => 'CV terbaru yang memuat informasi diri dan riwayat pendidikan.',
            'wajib' => true,
        ],
        [
            'nama' => 'Kartu Tanda Penduduk (KTP)',
            'keterangan' => 'Foto atau hasil scan KTP yang masih berlaku.',
            'wajib' => true,
        ],
        [
            'nama' => 'Ijazah Terakhir / Surat Keterangan Lulus',
            'keterangan' => 'Lulusan baru dapat menggunakan Surat Keterangan Lulus (SKL).',
            'wajib' => true,
        ],
        [
            'nama' => 'Pas Foto Terbaru',
            'keterangan' => 'Gunakan format JPG, JPEG, atau PNG.',
            'wajib' => true,
        ],
        [
            'nama' => 'Dokumen Pendukung Lainnya',
            'keterangan' => 'Contohnya sertifikat, piagam, atau dokumen pendukung lainnya.',
            'wajib' => false,
        ],
    ];

    $dokumenMagang = [
        [
            'nama' => 'Curriculum Vitae (CV)',
            'keterangan' => 'CV terbaru yang memuat informasi diri dan pendidikan.',
            'wajib' => true,
        ],
        [
            'nama' => 'Surat Pengantar Sekolah / Kampus',
            'keterangan' => 'Surat pengantar atau surat rekomendasi dari sekolah atau perguruan tinggi.',
            'wajib' => true,
        ],
        [
            'nama' => 'Identitas Diri',
            'keterangan' => 'Mahasiswa dapat menggunakan KTP atau KTM. Siswa dapat menggunakan KTP atau kartu pelajar.',
            'wajib' => true,
        ],
        [
            'nama' => 'Pas Foto Terbaru',
            'keterangan' => 'Gunakan format JPG, JPEG, atau PNG.',
            'wajib' => true,
        ],
        [
            'nama' => 'Dokumen Pendukung Lainnya',
            'keterangan' => 'Contohnya sertifikat, piagam, atau dokumen pendukung lainnya.',
            'wajib' => false,
        ],
    ];

    $dokumen = $isStaff ? $dokumenStaff : $dokumenMagang;

    $judul = $isStaff
        ? 'Persyaratan Lamaran Staff'
        : 'Persyaratan Pendaftaran Magang';

    $subjudul = $isStaff
        ? $posisi
        : $kategoriMagang;
@endphp

{{-- HERO INFORMASI --}}
<section class="relative overflow-hidden bg-gradient-to-r from-[#102A43] via-[#173F68] to-[#245A91] px-5 py-10 md:py-12">
    <div class="relative mx-auto max-w-5xl text-center">

        <span class="text-xs font-bold uppercase tracking-[0.2em] text-orange-400">
            Informasi Pendaftaran
        </span>

        <h1 class="mt-4 text-3xl font-extrabold leading-tight text-white md:text-4xl">
            {{ $judul }}
        </h1>

        <p class="mx-auto mt-4 max-w-2xl text-sm leading-relaxed text-blue-100 md:text-base">
            Persiapkan dokumen yang diperlukan dan pahami tahapan seleksi
            sebelum melanjutkan proses pendaftaran di PT Equityworld Futures.
        </p>

    </div>
</section>

{{-- KONTEN UTAMA --}}
<section class="bg-slate-50 px-5 py-6 md:px-8 md:py-8">

    <div class="mx-auto max-w-5.5xl">
               
        {{-- INFORMASI KATEGORI --}}
        <div class="mb-7 w-full rounded-xl px-6 py-5 shadow-sm"
            style="border: 1px solid #B8CFF2; background-color: #EFF6FF;">

            <div class="flex w-full items-center gap-2.5">

                {{-- IKON --}}
                <div class="shrink-0 text-blue-700">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        width="22" height="22"
                        viewBox="0 0 24 24"
                        fill="none" stroke="currentColor"
                        stroke-width="1.8"
                        stroke-linecap="round"
                        stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10"/>
                        <path d="M12 16v-4"/>
                        <path d="M12 8h.01"/>
                    </svg>
                </div>

                {{-- JUDUL --}}
                <h2 class="shrink-0 whitespace-nowrap text-sm font-bold text-blue-900">
                    Informasi Pendaftaran
                </h2>

                {{-- GARIS PEMISAH --}}
                <div class="h-6 w-px shrink-0 bg-blue-300 mx-1"></div>

                {{-- PENJELASAN --}}
                <p class="flex-1 text-[13.5px] leading-relaxed text-blue-800 whitespace-nowrap">
                    Anda sedang melihat persyaratan untuk
                    <strong>{{ $subjudul }}</strong>.
                    Pastikan seluruh dokumen telah dipersiapkan sebelum mengisi formulir pendaftaran.
                </p>

            </div>
        </div>

        {{-- DOKUMEN PERSYARATAN --}}
        <div class="rounded-2xl bg-white p-6 shadow-sm md:p-8"
            style="border: 1px solid #D5DFEC;">

            {{-- HEADER --}}
            <div class="mb-4 border-b border-slate-200 pb-4">

                <span class="text-xs font-bold uppercase tracking-widest text-blue-600">
                    Persyaratan Dokumen
                </span>

                <h2 class="mt-2 text-xl font-extrabold text-[#142b59] md:text-2xl">
                    Dokumen yang Harus Disiapkan
                </h2>

                <p class="mt-2 text-sm leading-relaxed text-slate-500">
                    Berikut daftar dokumen yang harus diunggah saat mengisi formulir pendaftaran.
                </p>

            </div>

            {{-- GRID DOKUMEN DAN KETENTUAN --}}
            <div class="grid grid-cols-1 gap-5 md:grid-cols-[1.6fr_0.9fr]">

                {{-- KOLOM KIRI: DAFTAR DOKUMEN --}}
                <div class="space-y-3">

                    @foreach ($dokumen as $index => $item)

                        <div class="flex items-start gap-3 rounded-xl p-2 transition hover:bg-slate-50">

                            {{-- IKON DOKUMEN --}}
                            <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-blue-50 text-blue-700">

                                <svg xmlns="http://www.w3.org/2000/svg"
                                    width="21" height="21"
                                    viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor"
                                    stroke-width="1.8"
                                    stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                                    <path d="M14 2v6h6"/>
                                    <path d="M8 13h8"/>
                                    <path d="M8 17h8"/>
                                </svg>

                            </div>

                            {{-- INFORMASI DOKUMEN --}}
                            <div class="min-w-0 flex-1">

                                <div class="flex flex-wrap items-center gap-2">

                                    <h3 class="text-sm font-bold text-slate-800">
                                        {{ $index + 1 }}. {{ $item['nama'] }}
                                    </h3>

                                    @if ($item['wajib'])
                                        <span class="rounded-full bg-red-50 px-2.5 py-1 text-[10px] font-bold text-red-600">
                                            Wajib
                                        </span>
                                    @else
                                        <span class="rounded-full bg-slate-100 px-2.5 py-1 text-[10px] font-bold text-slate-500">
                                            Opsional
                                        </span>
                                    @endif

                                </div>

                                <p class="mt-1 text-xs leading-relaxed text-slate-500 md:text-sm">
                                    {{ $item['keterangan'] }}
                                </p>

                            </div>

                        </div>

                    @endforeach

                </div>

                {{-- KOLOM KANAN: KETENTUAN UNGGAH --}}
                <div class="h-fit rounded-xl p-5"
                    style="border: 1px solid #C9D9F2; background-color: #F1F6FF;">

                    <h3 class="flex items-center gap-2 text-sm font-bold text-blue-900">

                        <svg xmlns="http://www.w3.org/2000/svg"
                            width="20" height="20"
                            viewBox="0 0 24 24"
                            fill="none" stroke="currentColor"
                            stroke-width="1.8"
                            stroke-linecap="round"
                            stroke-linejoin="round">
                            <circle cx="12" cy="12" r="10"/>
                            <path d="M12 16v-4"/>
                            <path d="M12 8h.01"/>
                        </svg>

                        Ketentuan Unggah Dokumen

                    </h3>

                    <ul class="mt-4 space-y-3 text-xs leading-relaxed text-blue-800 md:text-sm">

                        <li class="flex items-start gap-2">
                            <span class="font-bold">•</span>
                            <span>Format file yang diterima: PDF, JPG, JPEG, dan PNG.</span>
                        </li>

                        <li class="flex items-start gap-2">
                            <span class="font-bold">•</span>
                            <span>Ukuran maksimal setiap file adalah 5 MB.</span>
                        </li>

                        <li class="flex items-start gap-2">
                            <span class="font-bold">•</span>
                            <span>Pas foto hanya menggunakan format JPG, JPEG, atau PNG.</span>
                        </li>

                        <li class="flex items-start gap-2">
                            <span class="font-bold">•</span>
                            <span>Pastikan dokumen dapat dibaca dengan jelas.</span>
                        </li>

                        <li class="flex items-start gap-2">
                            <span class="font-bold">•</span>
                            <span>Dokumen pendukung lainnya bersifat opsional.</span>
                        </li>

                    </ul>

                </div>

            </div>

        </div>
  
        {{-- TAHAPAN SELEKSI --}}
        <div class="mt-7 rounded-2xl bg-white p-6 shadow-sm md:p-7"
            style="border: 1px solid #D5DFEC;">

            {{-- HEADER DINAMIS --}}
            <div class="mb-5">

                <span class="text-xs font-bold uppercase tracking-widest text-blue-600">
                    {{ $isStaff ? 'Recruitment Process' : 'Internship Process' }}
                </span>

                <h2 class="mt-2 text-lg font-bold text-[#142b59] md:text-xl">
                    {{ $isStaff ? 'Tahapan Seleksi' : 'Tahapan Magang' }}
                </h2>

                <p class="mt-2 text-xs leading-relaxed text-slate-500 md:text-sm">
                    {{ $isStaff
                        ? 'Berikut tahapan yang akan dilalui peserta dalam proses rekrutmen PT Equityworld Futures.'
                        : 'Berikut tahapan yang akan dilalui peserta dalam proses pelaksanaan program magang PT Equityworld Futures.'
                    }}
                </p>

            </div>

            {{-- DATA TAHAPAN BERDASARKAN JENIS PENDAFTARAN --}}
            @php
                if ($isStaff) {
                    $tahapan = [
                        [
                            'judul' => 'Pendaftaran',
                            'deskripsi' => 'Peserta mengisi formulir pendaftaran, melengkapi data diri, dan mengunggah dokumen persyaratan.',
                        ],
                        [
                            'judul' => 'Seleksi Administrasi',
                            'deskripsi' => 'HRD melakukan pemeriksaan terhadap kelengkapan dokumen dan kesesuaian persyaratan peserta.',
                        ],
                        [
                            'judul' => 'Interview',
                            'deskripsi' => 'Peserta yang lolos seleksi administrasi akan mendapatkan informasi jadwal wawancara melalui email.',
                        ],
                        [
                            'judul' => 'Pengumuman Hasil Seleksi',
                            'deskripsi' => 'Hasil akhir seleksi akan diinformasikan kepada peserta melalui email yang didaftarkan.',
                        ],
                    ];
                } else {
                    $tahapan = [
                        [
                            'judul' => 'Pendaftaran',
                            'deskripsi' => 'Peserta mengisi formulir pendaftaran dan mengunggah CV, surat pengantar sekolah atau kampus, identitas diri, serta dokumen persyaratan lainnya.',
                        ],
                        [
                            'judul' => 'Seleksi Administrasi',
                            'deskripsi' => 'HRD memeriksa kelengkapan dokumen, kesesuaian jurusan, periode magang, dan ketersediaan kuota.',
                        ],
                        [
                            'judul' => 'Konfirmasi Penerimaan',
                            'deskripsi' => 'Peserta yang memenuhi persyaratan akan menerima informasi penerimaan dan jadwal pelaksanaan magang melalui email.',
                        ],
                        [
                            'judul' => 'Pelaksanaan Magang',
                            'deskripsi' => 'Peserta mengikuti orientasi dan melaksanakan kegiatan magang sesuai periode serta ketentuan perusahaan.',
                        ],
                    ];
                }
            @endphp

            {{-- TIMELINE --}}
            <div class="space-y-0">

                @foreach ($tahapan as $index => $item)

                    {{-- ITEM TAHAPAN --}}
                    <div class="flex items-start gap-4">

                        {{-- NOMOR --}}
                        <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-full
                            {{ $index === 3 ? 'bg-green-100 text-green-700' : 'bg-blue-100 text-blue-700' }}
                            text-sm font-bold">

                            {{ sprintf('%02d', $index + 1) }}

                        </div>

                        {{-- KETERANGAN --}}
                        <div class="min-w-0 flex-1 pt-1">

                            <h3 class="text-sm font-semibold text-slate-800">
                                {{ $item['judul'] }}
                            </h3>

                            <p class="mt-1 text-xs leading-relaxed text-slate-500 md:text-[13px]">
                                {{ $item['deskripsi'] }}
                            </p>

                        </div>

                    </div>

                    {{-- GARIS PENGHUBUNG --}}
                    @if (!$loop->last)
                        <div class="ml-[21px] h-2 w-[2px] bg-slate-200"></div>
                    @endif

                @endforeach

            </div>

        </div>

        {{-- CATATAN --}}
        <div class="mt-7 text-center">

            <p class="text-xs leading-relaxed text-slate-500 md:text-sm">
                Pastikan alamat email yang Anda cantumkan aktif
                agar dapat menerima informasi jadwal interview
                dan hasil seleksi.
            </p>

        </div>

        {{-- TOMBOL NAVIGASI --}}
        <div class="mt-8 flex flex-col-reverse gap-3 sm:flex-row sm:justify-between">
        
            <a href="{{ route('careers') }}"
            class="inline-flex min-h-[42px] items-center justify-center rounded-lg border border-[#CBD5E1] bg-white px-5 py-2.5 text-sm font-semibold text-slate-600 shadow-sm transition hover:border-blue-300 hover:bg-blue-50 hover:text-blue-700">
                ← Kembali ke Karier
            </a>

            @if ($isStaff)

                <a href="{{ route('form.staff', ['posisi' => $posisi]) }}"
                   class="inline-flex min-h-[46px] items-center justify-center gap-2 rounded-lg bg-[#173F9F] px-7 py-3 text-sm font-bold text-white shadow-md transition hover:-translate-y-0.5 hover:bg-[#102F7D]">

                    Lanjutkan Pendaftaran

                    <span>→</span>

                </a>

            @else

                <a href="{{ route('form.magang', ['kategori' => $kategoriMagang]) }}"
                   class="inline-flex min-h-[46px] items-center justify-center gap-2 rounded-lg bg-[#173F9F] px-7 py-3 text-sm font-bold text-white shadow-md transition hover:-translate-y-0.5 hover:bg-[#102F7D]">

                    Lanjutkan Pendaftaran

                    <span>→</span>

                </a>

            @endif

        </div>

    </div>

</section>

@endsection
