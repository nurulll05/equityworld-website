
@extends('layouts.admin')

@section('content')
<div class="max-w-4xl mx-auto">

    <!-- HEADER -->
    <div class="mb-6">
        <a href="{{ route('admin.users.index') }}"
            class="inline-flex items-center gap-2 text-sm text-orange-500 hover:text-orange-700 font-medium mb-4">
            <span>&larr;</span>
            Kembali ke Manajemen Pengguna
        </a>

        <h1 class="text-2xl font-bold text-slate-800">
            Tambah User Baru
        </h1>

        <p class="text-sm text-slate-500 mt-1">
            Buat akun internal baru untuk Administrator atau HRD.
        </p>
    </div>

    <!-- FORM -->
    <div class="bg-white border border-slate-200 rounded-2xl p-6 shadow-sm">

        @if ($errors->any())
            <div class="mb-5 rounded-xl bg-red-50 border border-red-200 p-4">
                <p class="font-semibold text-red-700 mb-2">
                    Periksa kembali data yang kamu masukkan:
                </p>

                <ul class="list-disc pl-5 text-sm text-red-600">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.users.store') }}" method="POST">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                <!-- NAMA -->
                <div>
                    <label for="name"
                           class="block text-sm font-medium text-slate-700 mb-2">
                        Nama Lengkap <span class="text-red-500">*</span>
                    </label>

                    <input
                        type="text"
                        id="name"
                        name="name"
                        value="{{ old('name') }}"
                        required
                        placeholder="Masukkan nama lengkap"
                        class="w-full rounded-xl border-t border-r border-b border-l border-solid border-[#aeb9c9] px-4 py-3 text-sm bg-white focus:outline-none focus:ring-2 focus:ring-orange-500"
                    >
                </div>

                <!-- EMAIL -->
                <div>
                    <label for="email"
                           class="block text-sm font-medium text-slate-700 mb-2">
                        Email <span class="text-red-500">*</span>
                    </label>

                    <input
                        type="email"
                        id="email"
                        name="email"
                        value="{{ old('email') }}"
                        required
                        placeholder="nama@email.com"
                        class="w-full rounded-xl border-t border-r border-b border-l border-solid border-[#aeb9c9] px-4 py-3 text-sm bg-white focus:outline-none focus:ring-2 focus:ring-orange-500"
                    >
                </div>

                <!-- TELEPON -->
                <div>
                    <label for="phone"
                           class="block text-sm font-medium text-slate-700 mb-2">
                        Nomor Telepon <span class="text-red-500">*</span>
                    </label>

                    <input
                        type="text"
                        id="phone"
                        name="phone"
                        value="{{ old('phone') }}"
                        required
                        placeholder="Contoh: 081234567890"
                        class="w-full rounded-xl border-t border-r border-b border-l border-solid border-[#aeb9c9] px-4 py-3 text-sm bg-white focus:outline-none focus:ring-2 focus:ring-orange-500"
                    >
                </div>
      
                <!-- ROLE -->
                <div>
                    <label for="role"
                        class="block text-sm font-medium text-slate-700 mb-2">
                        Role Pengguna <span class="text-red-500">*</span>
                    </label>

                    <select
                        id="role"
                        name="role"
                        required
                        class="w-full rounded-xl border-t border-r border-b border-l border-solid border-[#aeb9c9] px-4 py-3 text-sm bg-white focus:outline-none focus:ring-2 focus:ring-orange-500"
                    >
                        <option value="">Pilih Role</option>

                        <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>
                            Administrator
                        </option>

                        <option value="hrd" {{ old('role') == 'hrd' ? 'selected' : '' }}>
                            HRD
                        </option>
                    </select>
                </div>
                
                <!-- PASSWORD -->
                <div>
                    <label for="password"
                        class="block text-sm font-medium text-slate-700 mb-2">
                        Password <span class="text-red-500">*</span>
                    </label>

                    <!-- INPUT PASSWORD + IKON MATA -->
                    <div class="relative">
                        <input
                            type="password"
                            id="password"
                            name="password"
                            required
                            minlength="8"
                            placeholder="Minimal 8 karakter"
                            class="w-full rounded-xl border-t border-r border-b border-l border-solid border-[#aeb9c9] px-4 py-3 pr-12 text-sm bg-white focus:outline-none focus:ring-2 focus:ring-orange-500"
                        >

                        <button
                            type="button"
                            id="toggle-password"
                            class="absolute inset-y-0 right-0 flex items-center justify-center px-4 border-0 bg-transparent shadow-none appearance-none text-slate-500 hover:text-orange-500 cursor-pointer"
                            aria-label="Tampilkan password"
                        >
                            <svg id="eye-password" xmlns="http://www.w3.org/2000/svg"
                                width="20" height="20" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path d="M2 12s3.6-7 10-7 10 7 10 7-3.6 7-10 7S2 12 2 12z"/>
                                <circle cx="12" cy="12" r="3"/>
                            </svg>
                        </button>
                    </div>

                    <!-- PERSYARATAN PASSWORD -->
                    <div id="password-requirements"
                        class="hidden mt-3 rounded-xl border border-slate-200 bg-slate-50 p-4">

                        <div class="mb-4">
                            <div class="flex justify-between items-center mb-2">
                                <span class="text-sm font-semibold text-slate-700">
                                    Tingkat Keamanan Password
                                </span>

                                <span id="password-strength-text"
                                    class="text-xs font-semibold text-slate-400">
                                    Belum diisi
                                </span>
                            </div>

                            <div class="flex gap-1.5">
                                <div id="strength-1" class="h-1.5 flex-1 rounded-full bg-slate-200"></div>
                                <div id="strength-2" class="h-1.5 flex-1 rounded-full bg-slate-200"></div>
                                <div id="strength-3" class="h-1.5 flex-1 rounded-full bg-slate-200"></div>
                            </div>
                        </div>

                        <div class="border-t border-slate-200 pt-3">
                            <p class="text-sm font-semibold text-slate-700 mb-3">
                                Persyaratan Password
                            </p>

                            <div class="grid grid-cols-2 gap-x-4 gap-y-2 text-sm">
                                <div class="space-y-2">
                                    <p id="rule-length" class="text-slate-500">
                                        ○ Minimal 8 karakter
                                    </p>
                                    <p id="rule-lowercase" class="text-slate-500">
                                        ○ Huruf kecil (a-z)
                                    </p>
                                    <p id="rule-uppercase" class="text-slate-500">
                                        ○ Huruf besar (A-Z)
                                    </p>
                                </div>

                                <div class="space-y-2">
                                    <p id="rule-number" class="text-slate-500">
                                        ○ Angka (0-9)
                                    </p>
                                    <p id="rule-symbol" class="text-slate-500">
                                        ○ Karakter khusus (!@#$)
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- KONFIRMASI PASSWORD -->
                <div>
                    <label for="password_confirmation"
                        class="block text-sm font-medium text-slate-700 mb-2">
                        Konfirmasi Password <span class="text-red-500">*</span>
                    </label>

                    <div class="relative">
                        <input
                            type="password"
                            id="password_confirmation"
                            name="password_confirmation"
                            required
                            minlength="8"
                            placeholder="Ulangi password"
                            class="w-full rounded-xl border-t border-r border-b border-l border-solid border-[#aeb9c9] px-4 py-3 pr-12 text-sm bg-white focus:outline-none focus:ring-2 focus:ring-orange-500"
                        >    
                        <button
                            type="button"
                            id="toggle-confirmation"
                            class="absolute inset-y-0 right-0 flex items-center justify-center px-4 border-0 bg-transparent shadow-none appearance-none text-slate-500 hover:text-orange-500 cursor-pointer"
                            aria-label="Tampilkan konfirmasi password"
                        >
                            <svg id="eye-confirmation" xmlns="http://www.w3.org/2000/svg"
                                width="20" height="20" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path d="M2 12s3.6-7 10-7 10 7 10 7-3.6 7-10 7S2 12 2 12z"/>
                                <circle cx="12" cy="12" r="3"/>
                            </svg>
                        </button>
                    </div>
                </div>

            </div>

            <!-- TOMBOL -->
            <div class="flex justify-end gap-3 mt-7 pt-5 border-t border-slate-200">

                <a href="{{ route('admin.users.index') }}"
                   class="px-5 py-3 rounded-xl border border-slate-300 text-sm font-medium text-slate-700 hover:bg-slate-50">
                    Batal
                </a>

                <button
                    type="submit"
                    class="px-5 py-3 rounded-xl border-0 shadow-none bg-orange-500 text-white text-sm font-semibold hover:bg-orange-600"
                >
                    Simpan User
                </button>

            </div>
        </form>
    </div>
</div>
@endsection

<script>
document.addEventListener('DOMContentLoaded', function () {
    const password = document.getElementById('password');
    const requirements = document.getElementById('password-requirements');
    const strengthText = document.getElementById('password-strength-text');

    const rules = {
        length: document.getElementById('rule-length'),
        lowercase: document.getElementById('rule-lowercase'),
        uppercase: document.getElementById('rule-uppercase'),
        number: document.getElementById('rule-number'),
        symbol: document.getElementById('rule-symbol')
    };

    const bars = [
        document.getElementById('strength-1'),
        document.getElementById('strength-2'),
        document.getElementById('strength-3')
    ];

    // TAMPILKAN PERSYARATAN PASSWORD
    password.addEventListener('focus', function () {
        requirements.classList.remove('hidden');
    });

    // UPDATE STATUS PERSYARATAN
    function updateRule(element, valid) {
        const label = element.textContent.replace(/^[✓○]\s*/, '');

        element.textContent = (valid ? '✓ ' : '○ ') + label;
        element.classList.toggle('text-green-600', valid);
        element.classList.toggle('text-slate-500', !valid);
    }

    // INDIKATOR KEAMANAN PASSWORD
    password.addEventListener('input', function () {
        const value = password.value;

        const checks = {
            length: value.length >= 8,
            lowercase: /[a-z]/.test(value),
            uppercase: /[A-Z]/.test(value),
            number: /[0-9]/.test(value),
            symbol: /[^A-Za-z0-9]/.test(value)
        };

        updateRule(rules.length, checks.length);
        updateRule(rules.lowercase, checks.lowercase);
        updateRule(rules.uppercase, checks.uppercase);
        updateRule(rules.number, checks.number);
        updateRule(rules.symbol, checks.symbol);

        const score = Object.values(checks).filter(Boolean).length;

        bars.forEach(bar => {
            bar.style.backgroundColor = '#e2e8f0';
        });

        if (!value) {
            strengthText.textContent = 'Belum diisi';
            strengthText.className = 'text-xs font-semibold text-slate-400';
        } else if (score <= 2) {
            strengthText.textContent = 'Lemah';
            strengthText.className = 'text-xs font-semibold text-red-600';
            bars[0].style.backgroundColor = '#ef4444';
        } else if (score <= 4) {
            strengthText.textContent = 'Sedang';
            strengthText.className = 'text-xs font-semibold text-yellow-600';
            bars[0].style.backgroundColor = '#eab308';
            bars[1].style.backgroundColor = '#eab308';
        } else {
            strengthText.textContent = 'Kuat';
            strengthText.className = 'text-xs font-semibold text-green-600';

            bars.forEach(bar => {
                bar.style.backgroundColor = '#16a34a';
            });
        }
    });

    // FUNGSI TAMPIL / SEMBUNYIKAN PASSWORD
    function setupPasswordToggle(inputId, buttonId) {
        const input = document.getElementById(inputId);
        const button = document.getElementById(buttonId);

        if (!input || !button) return;

        button.addEventListener('click', function () {
            input.type = input.type === 'password' ? 'text' : 'password';
        });
    }

    // AKTIFKAN KEDUA IKON MATA
    setupPasswordToggle('password', 'toggle-password');
    setupPasswordToggle('password_confirmation', 'toggle-confirmation');
});
</script>