@extends('layouts.app')

@section('content')

<section class="min-h-screen bg-slate-100 pb-16">

    {{-- HEADER FORMULIR --}}
    <div class="bg-gradient-to-r from-[#102A43] via-[#173F68] to-[#245A91] px-5 py-6 md:py-7">
        <div class="mx-auto max-w-[1600px] px-4 sm:px-6 lg:px-10">

            {{-- BREADCRUMB --}}
            <div class="mb-2 flex items-center gap-2 text-xs md:text-sm">
                <a href="{{ route('careers') }}"
                   class="text-blue-300 transition hover:text-white hover:underline">
                    Kembali
                </a>

                <span class="text-white">/</span>

                <span class="text-white">Formulir Lamaran Staff</span>
            </div>

            {{-- JUDUL --}}
            <h1 class="text-2xl font-bold leading-tight text-white md:text-3xl">
                Formulir Lamaran Staff
            </h1>

            <p class="mt-2 max-w-2xl text-xs leading-relaxed text-blue-100 md:text-sm">
                Silakan lengkapi informasi diri Anda untuk mengikuti proses
                rekrutmen PT Equityworld Futures.
            </p>

        </div>
    </div>

    {{-- AREA FORMULIR --}}
    <div class="mx-auto max-w-5xl px-4 pt-8 sm:px-6">

        <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm md:p-10">

            {{-- PROGRESS --}}
            <div class="mb-10">

                <div class="mb-3 flex items-center justify-between text-sm">
                    <span id="step-indicator" class="font-bold text-[#17365D]">
                        01. Data Pribadi
                    </span>

                    <span id="step-number" class="text-slate-400">
                        Tahap 1 dari 2
                    </span>
                </div>

                <div class="h-2 overflow-hidden rounded-full bg-slate-100">
                    <div id="progress-bar"
                         class="h-full w-1/2 rounded-full bg-blue-700 transition-all duration-300">
                    </div>
                </div>

            </div>

            {{-- CLASS INPUT --}}
            @php
                $fieldClass = 'box-border block w-full rounded-lg border border-solid border-slate-300 bg-white px-4 py-3 font-sans text-sm text-slate-700 outline-none transition focus:border-blue-600 focus:ring-2 focus:ring-blue-100';
            @endphp

            {{-- FORM --}}
            <form id="staff-personal-form"
                  enctype="multipart/form-data"
                  novalidate>

                {{-- TAHAP 1: DATA PRIBADI --}}
                <div id="step-1">

                    <div class="mb-5 border-b border-slate-100 pb-4">
                        <h2 class="text-xl font-bold text-slate-800">
                            Informasi Data Pribadi
                        </h2>

                        <p class="mt-2 text-sm text-slate-500">
                            Isi data berikut sesuai dengan identitas resmi Anda.
                            Kolom bertanda (*) wajib diisi.
                        </p>
                    </div>

                    <div class="grid grid-cols-1 gap-x-6 gap-y-6 md:grid-cols-2">

                        {{-- POSISI --}}
                        <div>
                            <label class="mb-2 block text-sm font-semibold text-slate-700">
                                Posisi yang Dilamar *
                            </label>

                            <div class="relative">
                                <input
                                    type="text"
                                    name="posisi"
                                    value="{{ request('posisi', 'Staff Kantor') }}"
                                    readonly
                                    title="Posisi lamaran tidak dapat diubah"
                                    class="{{ $fieldClass }} cursor-not-allowed bg-slate-100 pr-12 text-slate-500"
                                >

                                <span class="absolute right-4 top-1/2 -translate-y-1/2 text-slate-400">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                         width="17"
                                         height="17"
                                         viewBox="0 0 24 24"
                                         fill="none"
                                         stroke="currentColor"
                                         stroke-width="1.8"
                                         stroke-linecap="round"
                                         stroke-linejoin="round">
                                        <rect x="3" y="11" width="18" height="11" rx="2"/>
                                        <path d="M7 11V7a5 5 0 0 1 10 0v4"/>
                                    </svg>
                                </span>
                            </div>

                            <p class="mt-2 text-xs text-slate-400">
                                Posisi lamaran telah ditentukan dan tidak dapat diubah.
                            </p>
                        </div>

                        {{-- NAMA --}}
                        <div>
                            <label class="mb-2 block text-sm font-semibold text-slate-700">
                                Nama Lengkap *
                            </label>

                            <input
                                type="text"
                                name="nama"
                                placeholder="Masukkan nama lengkap"
                                maxlength="100"
                                autocomplete="name"
                                required
                                class="{{ $fieldClass }}"
                            >
                        </div>

                        {{-- TEMPAT LAHIR --}}
                        <div>
                            <label class="mb-2 block text-sm font-semibold text-slate-700">
                                Tempat Lahir *
                            </label>

                            <input
                                type="text"
                                name="tempat_lahir"
                                placeholder="Contoh: Jakarta"
                                maxlength="60"
                                required
                                class="{{ $fieldClass }}"
                            >
                        </div>

                        {{-- TANGGAL LAHIR --}}
                        <div>
                            <label class="mb-2 block text-sm font-semibold text-slate-700">
                                Tanggal Lahir *
                            </label>

                            <input
                                type="date"
                                name="tanggal_lahir"
                                max="{{ date('Y-m-d') }}"
                                required
                                class="{{ $fieldClass }}"
                            >
                        </div>

                        {{-- JENIS KELAMIN --}}
                        <div>
                            <label class="mb-3 block text-sm font-semibold text-slate-700">
                                Jenis Kelamin *
                            </label>

                            <div class="flex flex-wrap gap-6 pt-2 text-sm text-slate-600">

                                <label class="flex cursor-pointer items-center gap-2">
                                    <input
                                        type="radio"
                                        name="jenis_kelamin"
                                        value="Laki-laki"
                                        required
                                    >
                                    Laki-laki
                                </label>

                                <label class="flex cursor-pointer items-center gap-2">
                                    <input
                                        type="radio"
                                        name="jenis_kelamin"
                                        value="Perempuan"
                                    >
                                    Perempuan
                                </label>

                            </div>
                        </div>

                        {{-- NO HP --}}
                        <div>
                            <label class="mb-2 block text-sm font-semibold text-slate-700">
                                Nomor HP / WhatsApp *
                            </label>

                            <input
                                type="tel"
                                name="no_hp"
                                placeholder="Contoh: 081234567890"
                                inputmode="numeric"
                                autocomplete="tel"
                                maxlength="13"
                                minlength="10"
                                pattern="08[1-9][0-9]{7,10}"
                                required
                                class="{{ $fieldClass }}"
                            >
                        </div>

                        {{-- EMAIL --}}
                        <div>
                            <label class="mb-2 block text-sm font-semibold text-slate-700">
                                Email *
                            </label>

                            <input
                                type="email"
                                name="email"
                                placeholder="Contoh: email@example.com"
                                autocomplete="email"
                                maxlength="150"
                                required
                                class="{{ $fieldClass }}"
                            >
                        </div>

                        {{-- ALAMAT --}}
                        <div>
                            <label class="mb-2 block text-sm font-semibold text-slate-700">
                                Alamat Lengkap *
                            </label>

                            <textarea
                                name="alamat"
                                rows="3"
                                placeholder="Masukkan alamat lengkap"
                                maxlength="500"
                                required
                                class="{{ $fieldClass }} resize-y"
                            ></textarea>
                        </div>

                    </div>

                    {{-- TOMBOL TAHAP 1 --}}
                    <div class="mt-4 flex justify-end border-t border-slate-100 pt-2">
                        <button
                            type="button"
                            id="next-step"
                            class="appearance-none rounded-lg border-0 bg-[#173F9F] px-8 py-3 font-sans text-sm font-semibold text-white shadow-md transition hover:bg-[#102F7D] focus:outline-none focus:ring-2 focus:ring-blue-300 focus:ring-offset-2"
                        >
                            Selanjutnya
                        </button>
                    </div>

                </div>

                {{-- TAHAP 2: UNGGAH DOKUMEN --}}
                <div id="step-2" class="hidden">

                    <div class="mb-3 border-b border-slate-100 pb-3">
                        <h2 class="text-xl font-bold text-slate-800">
                            Unggah Dokumen Persyaratan
                        </h2>

                        <p class="mt-2 text-sm text-slate-500">
                            Silakan unggah dokumen yang diperlukan untuk melengkapi
                            proses lamaran Anda. Kolom bertanda (*) wajib diisi.
                        </p>
                    </div>

                    {{-- INFORMASI FORMAT --}}
                    <div class="mb-4 flex items-center gap-3 rounded-lg border border-solid border-blue-200 bg-blue-50 px-4 py-3">

                        <div class="shrink-0 text-blue-600">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                 width="21"
                                 height="21"
                                 viewBox="0 0 24 24"
                                 fill="none"
                                 stroke="currentColor"
                                 stroke-width="1.8"
                                 stroke-linecap="round"
                                 stroke-linejoin="round">
                                <circle cx="12" cy="12" r="10"/>
                                <path d="M12 16v-4"/>
                                <path d="M12 8h.01"/>
                            </svg>
                        </div>

                        <p class="text-xs leading-relaxed text-blue-800">
                            Format file yang diterima: PDF, JPG, JPEG, dan PNG.
                            Ukuran maksimal setiap file adalah 5 MB.
                            Pastikan dokumen dapat dibaca dengan jelas.
                        </p>

                    </div>

                    <div class="grid grid-cols-1 gap-6 md:grid-cols-2">

                        {{-- CV --}}
                        <div>
                            <label class="mb-2 block text-sm font-semibold text-slate-700">
                                Curriculum Vitae (CV) *
                            </label>

                            <input
                                type="file"
                                name="cv"
                                accept=".pdf,.jpg,.jpeg,.png"
                                data-max-size="5242880"
                                required
                                class="{{ $fieldClass }} file:mr-3 file:rounded-md file:border-0 file:bg-blue-50 file:px-3 file:py-2 file:text-xs file:font-semibold file:text-blue-700"
                            >

                            <p class="mt-2 text-xs text-slate-400">
                                Unggah CV terbaru Anda.
                            </p>
                        </div>

                        {{-- KTP --}}
                        <div>
                            <label class="mb-2 block text-sm font-semibold text-slate-700">
                                Kartu Tanda Penduduk (KTP) *
                            </label>

                            <input
                                type="file"
                                name="ktp"
                                accept=".pdf,.jpg,.jpeg,.png"
                                data-max-size="5242880"
                                required
                                class="{{ $fieldClass }} file:mr-3 file:rounded-md file:border-0 file:bg-blue-50 file:px-3 file:py-2 file:text-xs file:font-semibold file:text-blue-700"
                            >

                            <p class="mt-2 text-xs text-slate-400">
                                Unggah foto atau scan KTP yang masih berlaku.
                            </p>
                        </div>

                        {{-- IJAZAH / SKL --}}
                        <div>
                            <label class="mb-2 block text-sm font-semibold text-slate-700">
                                Ijazah Terakhir / SKL *
                            </label>

                            <input
                                type="file"
                                name="ijazah"
                                accept=".pdf,.jpg,.jpeg,.png"
                                data-max-size="5242880"
                                required
                                class="{{ $fieldClass }} file:mr-3 file:rounded-md file:border-0 file:bg-blue-50 file:px-3 file:py-2 file:text-xs file:font-semibold file:text-blue-700"
                            >

                            <p class="mt-2 text-xs text-slate-400">
                                Lulusan baru dapat menggunakan Surat Keterangan Lulus (SKL).
                            </p>
                        </div>

                        {{-- PAS FOTO --}}
                        <div>
                            <label class="mb-2 block text-sm font-semibold text-slate-700">
                                Pas Foto Terbaru *
                            </label>

                            <input
                                type="file"
                                name="pas_foto"
                                accept=".jpg,.jpeg,.png"
                                data-max-size="5242880"
                                required
                                class="{{ $fieldClass }} file:mr-3 file:rounded-md file:border-0 file:bg-blue-50 file:px-3 file:py-2 file:text-xs file:font-semibold file:text-blue-700"
                            >

                            <p class="mt-2 text-xs text-slate-400">
                                Unggah pas foto dengan format JPG atau PNG.
                            </p>
                        </div>

                        {{-- DOKUMEN PENDUKUNG --}}
                        <div class="md:col-span-2">
                            <label class="mb-2 block text-sm font-semibold text-slate-700">
                                Dokumen Pendukung Lainnya
                                <span class="font-normal text-slate-400">(Opsional)</span>
                            </label>

                            <input
                                type="file"
                                name="dokumen_pendukung[]"
                                accept=".pdf,.jpg,.jpeg,.png"
                                data-max-size="5242880"
                                multiple
                                class="{{ $fieldClass }} file:mr-3 file:rounded-md file:border-0 file:bg-blue-50 file:px-3 file:py-2 file:text-xs file:font-semibold file:text-blue-700"
                            >

                            <p class="mt-2 text-xs text-slate-400">
                                Contoh: sertifikat, piagam, atau dokumen pendukung lainnya.
                                Anda dapat memilih lebih dari satu file.
                            </p>
                        </div>

                    </div>

                    {{-- TOMBOL TAHAP 2 --}}
                    <div class="mt-4 flex items-center justify-between gap-3 border-t border-slate-100 pt-3">

                        <button
                            type="button"
                            id="previous-step"
                            class="appearance-none rounded-lg border border-solid border-slate-300 bg-white px-7 py-3 font-sans text-sm font-semibold text-slate-600 transition hover:bg-slate-50 focus:outline-none focus:ring-2 focus:ring-slate-200"
                        >
                            Sebelumnya
                        </button>

                        <button
                            type="button"
                            id="submit-application"
                            class="appearance-none rounded-lg border border-solid border-[#173F9F] bg-[#173F9F] px-7 py-3 font-sans text-sm font-semibold text-white shadow-sm transition hover:border-[#102F7D] hover:bg-[#102F7D] focus:outline-none focus:ring-2 focus:ring-blue-300 focus:ring-offset-2"
                        >
                            Kirim Lamaran
                        </button>

                    </div>

                </div>

            </form>

        </div>

        <p class="mt-5 text-center text-xs text-slate-400">
            Pastikan seluruh informasi dan dokumen yang Anda masukkan sudah benar.
        </p>

    </div>

</section>

@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {

    const form = document.getElementById('staff-personal-form');

    const step1 = document.getElementById('step-1');
    const step2 = document.getElementById('step-2');

    const nextButton = document.getElementById('next-step');
    const previousButton = document.getElementById('previous-step');
    const submitButton = document.getElementById('submit-application');

    const stepIndicator = document.getElementById('step-indicator');
    const stepNumber = document.getElementById('step-number');
    const progressBar = document.getElementById('progress-bar');

    if (!form || !step1 || !step2) return;

    // MEMBERSIHKAN NOMOR HP
    const phoneInput = form.querySelector('[name="no_hp"]');

    phoneInput.addEventListener('input', function () {
        this.value = this.value.replace(/\D/g, '').slice(0, 13);
        this.setCustomValidity('');
    });

    // PESAN VALIDASI BAHASA INDONESIA
    function getErrorMessage(field) {

        const value = field.value.trim();

        // VALIDASI WAJIB DIISI
        if (field.validity.valueMissing) {

            const messages = {
                nama: 'Nama lengkap wajib diisi.',
                tempat_lahir: 'Tempat lahir wajib diisi.',
                tanggal_lahir: 'Tanggal lahir wajib diisi.',
                jenis_kelamin: 'Silakan pilih jenis kelamin.',
                no_hp: 'Nomor HP atau WhatsApp wajib diisi.',
                email: 'Alamat email wajib diisi.',
                alamat: 'Alamat lengkap wajib diisi.',
                cv: 'Silakan unggah Curriculum Vitae (CV).',
                ktp: 'Silakan unggah KTP.',
                ijazah: 'Silakan unggah ijazah terakhir atau SKL.',
                pas_foto: 'Silakan unggah pas foto terbaru.'
            };

            return messages[field.name] || 'Bagian ini wajib diisi.';
        }

        // VALIDASI NAMA LENGKAP
        if (field.name === 'nama') {

            if (!/^[\p{L}][\p{L}\s'.-]*$/u.test(value)) {
                return 'Nama hanya boleh berisi huruf, spasi, titik, apostrof, dan tanda hubung.';
            }

            if (value.length < 2) {
                return 'Nama lengkap minimal terdiri dari 2 karakter.';
            }
        }

        // VALIDASI TEMPAT LAHIR
        if (field.name === 'tempat_lahir') {

            if (!/^[\p{L}\s'.-]+$/u.test(value)) {
                return 'Tempat lahir hanya boleh berisi huruf, spasi, titik, apostrof, dan tanda hubung.';
            }

            if (value.length < 2) {
                return 'Tempat lahir minimal terdiri dari 2 karakter.';
            }
        }

        // VALIDASI TANGGAL LAHIR
        if (field.name === 'tanggal_lahir') {

            if (field.validity.rangeOverflow) {
                return 'Tanggal lahir tidak boleh melebihi tanggal hari ini.';
            }

            if (field.validity.badInput) {
                return 'Format tanggal lahir tidak valid.';
            }
        }

        // VALIDASI NOMOR HP
        if (field.name === 'no_hp') {

            const phonePattern = /^08[1-9][0-9]{7,10}$/;

            if (!phonePattern.test(value)) {
                return 'Nomor HP harus diawali 08 dan terdiri dari 10–13 digit angka. Contoh: 081234567890.';
            }
        }

        // VALIDASI EMAIL
        if (field.name === 'email') {

            if (field.validity.typeMismatch) {
                return 'Masukkan email dengan format yang benar, contoh nama@email.com.';
            }

            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

            if (!emailPattern.test(value)) {
                return 'Alamat email harus memiliki format yang benar.';
            }
        }

        // VALIDASI FILE
        if (field.type === 'file' && field.files.length > 0) {

            const allowedExtensions = ['pdf', 'jpg', 'jpeg', 'png'];

            const maxSize = Number(field.dataset.maxSize || 5242880);

            for (const file of field.files) {

                const extension = file.name
                    .split('.')
                    .pop()
                    .toLowerCase();

                if (!allowedExtensions.includes(extension)) {
                    return 'Format file tidak sesuai. Gunakan PDF, JPG, JPEG, atau PNG.';
                }

                if (
                    field.name === 'pas_foto' &&
                    !['jpg', 'jpeg', 'png'].includes(extension)
                ) {
                    return 'Pas foto hanya boleh menggunakan format JPG, JPEG, atau PNG.';
                }

                if (file.size > maxSize) {
                    return 'Ukuran setiap file maksimal 5 MB.';
                }
            }
        }

        return '';
    }

    // VALIDASI SELURUH FIELD
   function validateFields(container) {

        const fields = container.querySelectorAll(
            'input, textarea, select'
        );

        const checkedRadios = new Set();

        for (const field of fields) {

            // LEWATI INPUT READONLY
            if (field.readOnly) continue;

            // RESET PESAN VALIDASI
            field.setCustomValidity('');

            // VALIDASI RADIO BUTTON
            if (field.type === 'radio') {

                if (checkedRadios.has(field.name)) continue;

                checkedRadios.add(field.name);

                const group = container.querySelectorAll(
                    'input[type="radio"][name="' + field.name + '"]'
                );

                const required = Array.from(group).some(
                    radio => radio.required
                );

                const selected = Array.from(group).some(
                    radio => radio.checked
                );

                if (required && !selected) {

                    group[0].setCustomValidity(
                        'Silakan pilih jenis kelamin.'
                    );

                    group[0].reportValidity();

                    return false;
                }

                continue;
            }

            // VALIDASI KHUSUS FIELD
            const message = getErrorMessage(field);

            if (message) {

                field.setCustomValidity(message);
                field.reportValidity();

                return false;
            }

            // VALIDASI HTML BAWAAN
            if (!field.checkValidity()) {

                let defaultMessage = 'Periksa kembali data yang Anda masukkan.';

                if (field.validity.typeMismatch) {
                    defaultMessage = 'Format data yang dimasukkan tidak valid.';
                }

                if (field.validity.tooLong) {
                    defaultMessage = 'Jumlah karakter yang dimasukkan terlalu panjang.';
                }

                if (field.validity.tooShort) {
                    defaultMessage = 'Jumlah karakter yang dimasukkan terlalu sedikit.';
                }

                if (field.validity.patternMismatch) {
                    defaultMessage = 'Format data yang dimasukkan tidak sesuai.';
                }

                field.setCustomValidity(defaultMessage);
                field.reportValidity();

                return false;
            }
        }

        return true;
    }

    // HAPUS PESAN ERROR KETIKA FIELD DIPERBAIKI
    form.addEventListener('input', function (event) {

        if (event.target.setCustomValidity) {
            event.target.setCustomValidity('');
        }

    });

    form.addEventListener('change', function (event) {

        if (event.target.setCustomValidity) {
            event.target.setCustomValidity('');
        }

    });


    // ==========================================
    // PINDAH KE TAHAP 2
    // ==========================================

    nextButton.addEventListener('click', function () {

        if (!validateFields(step1)) return;

        step1.classList.add('hidden');
        step2.classList.remove('hidden');

        stepIndicator.textContent = '02. Dokumen Lamaran';
        stepNumber.textContent = 'Tahap 2 dari 2';

        progressBar.classList.remove('w-1/2');
        progressBar.classList.add('w-full');

        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });

    });


    // ==========================================
    // KEMBALI KE TAHAP 1
    // ==========================================

    previousButton.addEventListener('click', function () {

        step2.classList.add('hidden');
        step1.classList.remove('hidden');

        stepIndicator.textContent = '01. Data Pribadi';
        stepNumber.textContent = 'Tahap 1 dari 2';

        progressBar.classList.remove('w-full');
        progressBar.classList.add('w-1/2');

        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });

    });


    // ==========================================
    // VALIDASI TAHAP 2
    // ==========================================

    submitButton.addEventListener('click', function () {

        if (!validateFields(step2)) return;

        alert(
            'Seluruh data pribadi dan dokumen persyaratan telah lengkap. ' +
            'Formulir siap diproses.'
        );

    });

});
</script>
@endpush