
@extends('layouts.admin')

@section('title', 'Ganti Password')
@section('page-title', 'Ganti Password')

@section('content')

<div class="mx-auto max-w-3xl">

    <!-- HEADER -->
    <div class="mb-5">
        <h1 class="text-xl font-bold text-slate-800">
            Ganti Password
        </h1>
        <p class="mt-1 text-sm text-slate-500">
            Perbarui password untuk menjaga keamanan akun administrator.
        </p>
    </div>

    <!-- NOTIFIKASI BERHASIL -->
    @if(session('success'))
        <div class="mb-4 rounded-xl border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-700">
            {{ session('success') }}
        </div>
    @endif

    <!-- NOTIFIKASI ERROR -->
    @if($errors->any())
        <div class="mb-4 rounded-xl border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700">
            <p class="mb-1 font-semibold">
                Password belum dapat diperbarui.
            </p>
            <ul class="list-inside list-disc space-y-1">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- CARD UTAMA -->
    <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

        <!-- HEADER CARD -->
        <div class="bg-gradient-to-r from-blue-700 to-blue-600 px-6 py-5 text-white md:px-7">
            <div class="flex items-center gap-4">

                <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-white/20">
                    <svg class="h-6 w-6"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="1.8">
                        <rect x="3" y="11" width="18" height="11" rx="2"/>
                        <path d="M7 11V7a5 5 0 0 1 10 0v4"/>
                    </svg>
                </div>

                <div>
                    <h2 class="text-lg font-bold">
                        Keamanan Akun
                    </h2>
                    <p class="mt-1 text-sm text-blue-100">
                        Pastikan password baru memenuhi persyaratan keamanan.
                    </p>
                </div>

            </div>
        </div>

        <!-- FORM -->
        <div class="px-6 py-5 md:px-7 md:py-6">

            <form action="{{ route('admin.password.update') }}"
                method="POST"
                id="changePasswordForm">

                @csrf
                @method('PUT')

                <div class="w-full space-y-4">

                    <!-- PASSWORD LAMA -->
                    <div>
                        <label for="current_password"
                            class="mb-2 block text-sm font-semibold text-slate-700">
                            Password Lama
                        </label>

                        <div class="relative">
                            <input type="password"
                                name="current_password"
                                id="current_password"
                                autocomplete="current-password"
                                required
                                placeholder="Masukkan password lama"
                                class="w-full rounded-xl border-t border-r border-b border-l border-solid border-[#aeb9c9] bg-white px-4 py-3 pr-12 text-sm text-slate-800 outline-none transition focus:border-orange-400 focus:ring-2 focus:ring-orange-100">

                            <button type="button"
                                data-toggle-password="current_password"
                                aria-label="Tampilkan password lama"
                                class="!absolute !inset-y-0 !right-0 !flex !items-center !justify-center !rounded-r-xl !border-0 !bg-transparent !p-0 !px-4 !text-slate-400 !shadow-none !outline-none hover:!bg-transparent hover:!text-blue-600 focus:!border-0 focus:!ring-0">

                                <svg class="h-5 w-5"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    stroke="currentColor"
                                    stroke-width="1.8">
                                    <path d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7S2 12 2 12Z"/>
                                    <circle cx="12" cy="12" r="3"/>
                                </svg>
                            </button>
                        </div>

                        @error('current_password')
                            <p class="mt-1 text-xs text-red-500">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- PASSWORD BARU -->
                    <div>
                        <label for="password"
                            class="mb-2 block text-sm font-semibold text-slate-700">
                            Password Baru
                        </label>

                        <div class="relative">
                            <input type="password"
                                name="password"
                                id="password"
                                autocomplete="new-password"
                                required
                                placeholder="Buat password baru"
                                class="w-full rounded-xl border-t border-r border-b border-l border-solid border-[#aeb9c9] bg-white px-4 py-3 pr-12 text-sm text-slate-800 outline-none transition focus:border-orange-400 focus:ring-2 focus:ring-orange-100">

                            <button type="button"
                                data-toggle-password="password"
                                aria-label="Tampilkan password baru"
                                class="!absolute !inset-y-0 !right-0 !flex !items-center !justify-center !rounded-r-xl !border-0 !bg-transparent !p-0 !px-4 !text-slate-400 !shadow-none !outline-none hover:!bg-transparent hover:!text-blue-600 focus:!border-0 focus:!ring-0">

                                <svg class="h-5 w-5"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    stroke="currentColor"
                                    stroke-width="1.8">
                                    <path d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7S2 12 2 12Z"/>
                                    <circle cx="12" cy="12" r="3"/>
                                </svg>
                            </button>
                        </div>

                        @error('password')
                            <p class="mt-1 text-xs text-red-500">
                                {{ $message }}
                            </p>
                        @enderror

                        <!-- PANEL KEKUATAN PASSWORD -->
                        <div id="passwordStrengthPanel"
                            class="mt-3 hidden rounded-xl border border-slate-200 bg-slate-50 p-4">

                            <div class="flex items-center justify-between">
                                <p class="text-xs font-semibold text-slate-700">
                                    Kekuatan Password
                                </p>

                                <span id="strengthLabel"
                                    class="text-xs font-semibold text-slate-400">
                                    Belum diisi
                                </span>
                            </div>

                            <!-- BAR KEKUATAN -->
                            <div class="mt-3 flex gap-2">
                                <div id="strengthBar1"
                                    class="h-1.5 flex-1 rounded-full bg-slate-200"></div>

                                <div id="strengthBar2"
                                    class="h-1.5 flex-1 rounded-full bg-slate-200"></div>

                                <div id="strengthBar3"
                                    class="h-1.5 flex-1 rounded-full bg-slate-200"></div>
                            </div>

                            <!-- PERSYARATAN -->
                            <div class="mt-3">
                                <p class="mb-2 text-xs font-semibold text-slate-700">
                                    Persyaratan Password:
                                </p>

                                <div class="grid grid-cols-1 gap-x-4 gap-y-2 sm:grid-cols-2">

                                    <div id="rule-length"
                                        class="flex items-center gap-2 text-xs text-slate-500">
                                        <span class="rule-icon">○</span>
                                        Minimal 8 karakter
                                    </div>

                                    <div id="rule-lowercase"
                                        class="flex items-center gap-2 text-xs text-slate-500">
                                        <span class="rule-icon">○</span>
                                        Huruf kecil (a-z)
                                    </div>

                                    <div id="rule-uppercase"
                                        class="flex items-center gap-2 text-xs text-slate-500">
                                        <span class="rule-icon">○</span>
                                        Huruf besar (A-Z)
                                    </div>

                                    <div id="rule-number"
                                        class="flex items-center gap-2 text-xs text-slate-500">
                                        <span class="rule-icon">○</span>
                                        Angka (0-9)
                                    </div>

                                    <div id="rule-symbol"
                                        class="flex items-center gap-2 text-xs text-slate-500">
                                        <span class="rule-icon">○</span>
                                        Simbol (!@#$%)
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- KONFIRMASI PASSWORD -->
                    <div>
                        <label for="password_confirmation"
                            class="mb-2 block text-sm font-semibold text-slate-700">
                            Konfirmasi Password Baru
                        </label>

                        <div class="relative">
                            <input type="password"
                                name="password_confirmation"
                                id="password_confirmation"
                                autocomplete="new-password"
                                required
                                placeholder="Masukkan ulang password baru"
                                class="w-full rounded-xl border-t border-r border-b border-l border-solid border-[#aeb9c9] bg-white px-4 py-3 pr-12 text-sm text-slate-800 outline-none transition focus:border-orange-400 focus:ring-2 focus:ring-orange-100">

                            <button type="button"
                                data-toggle-password="password_confirmation"
                                aria-label="Tampilkan konfirmasi password"
                                class="!absolute !inset-y-0 !right-0 !flex !items-center !justify-center !rounded-r-xl !border-0 !bg-transparent !p-0 !px-4 !text-slate-400 !shadow-none !outline-none hover:!bg-transparent hover:!text-blue-600 focus:!border-0 focus:!ring-0">

                                <svg class="h-5 w-5"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    stroke="currentColor"
                                    stroke-width="1.8">
                                    <path d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7S2 12 2 12Z"/>
                                    <circle cx="12" cy="12" r="3"/>
                                </svg>
                            </button>
                        </div>

                        <p id="confirmationMessage"
                            class="mt-2 hidden text-xs">
                        </p>
                    </div>

                    <!-- TOMBOL DI BAWAH FORM -->
                    <div class="mt-5 flex flex-col gap-3 sm:flex-row sm:justify-start">

                        <a href="{{ route('admin.dashboard') }}"
                            class="inline-flex w-full items-center justify-center gap-2 rounded-xl border-t border-r border-b border-l border-solid border-[#aeb9c9] bg-white px-5 py-3 text-sm font-semibold text-slate-600 shadow-none transition hover:bg-slate-50 sm:w-auto">

                            <svg class="h-4 w-4"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2">
                                <path d="m15 18-6-6 6-6"/>
                            </svg>

                            Kembali
                        </a>

                        <button type="submit"
                            class="inline-flex w-full items-center justify-center gap-2 rounded-xl border-0 bg-orange-500 px-6 py-3 text-sm font-semibold text-white shadow-none transition hover:bg-orange-600 sm:w-auto">
                            Simpan Password
                        </button>

                    </div>

                </div>

            </form>
        </div>
    </div>

    <!-- FOOTER INFO -->
    <p class="mt-4 text-center text-xs text-slate-400">
        Pastikan password tidak dibagikan kepada pihak lain.
    </p>

</div>

@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {

    const password = document.getElementById('password');
    const confirmation = document.getElementById('password_confirmation');
    const strengthPanel = document.getElementById('passwordStrengthPanel');

    // TAMPIL / SEMBUNYIKAN PASSWORD
    document.querySelectorAll('[data-toggle-password]').forEach(function (button) {

        button.addEventListener('click', function () {

            const inputId = button.getAttribute('data-toggle-password');
            const input = document.getElementById(inputId);

            if (!input) return;

            const isHidden = input.type === 'password';
            input.type = isHidden ? 'text' : 'password';

            button.setAttribute(
                'aria-label',
                isHidden ? 'Sembunyikan password' : 'Tampilkan password'
            );
        });
    });

    if (!password || !confirmation || !strengthPanel) return;

    // PANEL MUNCUL SAAT KOLOM PASSWORD BARU DIKLIK
    password.addEventListener('focus', function () {
        strengthPanel.classList.remove('hidden');
    });

    // ELEMEN INDIKATOR
    const rules = {
        length: document.getElementById('rule-length'),
        lowercase: document.getElementById('rule-lowercase'),
        uppercase: document.getElementById('rule-uppercase'),
        number: document.getElementById('rule-number'),
        symbol: document.getElementById('rule-symbol')
    };

    const bars = [
        document.getElementById('strengthBar1'),
        document.getElementById('strengthBar2'),
        document.getElementById('strengthBar3')
    ];

    const strengthLabel = document.getElementById('strengthLabel');
    const confirmationMessage = document.getElementById('confirmationMessage');

    // PERBARUI PERSYARATAN
    function updateRule(element, passed) {
        if (!element) return;

        const icon = element.querySelector('.rule-icon');

        if (icon) {
            icon.textContent = passed ? '✓' : '○';
        }

        element.classList.toggle('text-green-600', passed);
        element.classList.toggle('text-slate-500', !passed);
    }

    // CEK KONFIRMASI PASSWORD
    function updateConfirmation() {

        if (!confirmation.value) {
            confirmationMessage.classList.add('hidden');
            return;
        }

        confirmationMessage.classList.remove('hidden');

        if (password.value === confirmation.value) {
            confirmationMessage.textContent = '✓ Konfirmasi password sesuai.';
            confirmationMessage.className =
                'mt-2 text-xs font-medium text-green-600';
        } else {
            confirmationMessage.textContent = '✕ Konfirmasi password belum sesuai.';
            confirmationMessage.className =
                'mt-2 text-xs font-medium text-red-500';
        }
    }

    // CEK KEKUATAN PASSWORD
    function updateStrength() {

        const value = password.value;

        const checks = {
            length: value.length >= 8,
            lowercase: /[a-z]/.test(value),
            uppercase: /[A-Z]/.test(value),
            number: /[0-9]/.test(value),
            symbol: /[^A-Za-z0-9]/.test(value)
        };

        Object.keys(checks).forEach(function (key) {
            updateRule(rules[key], checks[key]);
        });

        const score = Object.values(checks).filter(Boolean).length;

        let activeBars = 0;
        let color = '';

        if (score > 0 && score <= 2) {
            activeBars = 1;
            color = 'bg-red-500';
        } else if (score <= 4 && score > 2) {
            activeBars = 2;
            color = 'bg-yellow-400';
        } else if (score === 5) {
            activeBars = 3;
            color = 'bg-green-500';
        }

        bars.forEach(function (bar, index) {
            if (!bar) return;

            bar.className = 'h-1.5 flex-1 rounded-full bg-slate-200';

            if (index < activeBars) {
                bar.classList.remove('bg-slate-200');
                bar.classList.add(color);
            }
        });

        if (score === 0) {
            strengthLabel.textContent = 'Belum diisi';
            strengthLabel.className = 'text-xs font-semibold text-slate-400';
        } else if (score <= 2) {
            strengthLabel.textContent = 'Lemah';
            strengthLabel.className = 'text-xs font-semibold text-red-500';
        } else if (score <= 4) {
            strengthLabel.textContent = 'Sedang';
            strengthLabel.className = 'text-xs font-semibold text-yellow-600';
        } else {
            strengthLabel.textContent = 'Kuat';
            strengthLabel.className = 'text-xs font-semibold text-green-600';
        }

        updateConfirmation();
    }

    password.addEventListener('input', updateStrength);
    confirmation.addEventListener('input', updateConfirmation);

    updateStrength();

});
</script>
@endpush
