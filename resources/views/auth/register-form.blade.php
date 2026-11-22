
{{-- FORM REGISTRASI --}}

<form
    id="registerForm"
    action="{{ route('auth.register') }}"
    method="POST"
    class="hidden space-y-3"
>
    @csrf

    {{-- KONTEKS REGISTRASI --}}
    <input
        type="hidden"
        id="registerContext"
        name="auth_context"
        value="{{ session('auth_context', 'general') }}"
    >

    {{-- JUDUL --}}
    <div class="mb-3">
        <h2 class="text-xl font-extrabold leading-tight text-[#101D35]">
            Buat Akun Baru
        </h2>

        <p class="mt-1.5 text-xs leading-5 text-slate-500">
            Lengkapi informasi berikut untuk membuat akun Equityworld Futures.
        </p>
    </div>

    {{-- BARIS PERTAMA --}}
    <div class="grid grid-cols-2 gap-3">

        {{-- NAMA LENGKAP --}}
        <div>
            <label for="registerName" class="mb-1.5 block text-xs font-semibold text-slate-700">
                Nama Lengkap
            </label>

            <input
                type="text"
                id="registerName"
                name="name"
                placeholder="Nama lengkap"
                autocomplete="name"
                required
                class="box-border h-10 w-full min-w-0 appearance-none !border-[1px] !border-solid !border-slate-200 rounded-lg bg-slate-50 px-3 text-xs text-slate-800 outline-none transition placeholder:text-slate-400 focus:!border-orange-400 focus:!ring-2 focus:!ring-orange-500/10"
            >
        </div>

        {{-- EMAIL --}}
        <div>
            <label for="registerEmail" class="mb-1.5 block text-xs font-semibold text-slate-700">
                Email Aktif
            </label>

            <input
                type="email"
                id="registerEmail"
                name="email"
                placeholder="nama@email.com"
                autocomplete="email"
                required
                class="box-border h-10 w-full min-w-0 appearance-none !border-[1px] !border-solid !border-slate-200 rounded-lg bg-slate-50 px-3 text-xs text-slate-800 outline-none transition placeholder:text-slate-400 focus:!border-orange-400 focus:!ring-2 focus:!ring-orange-500/10"
            >
        </div>

    </div>
  
    {{-- BARIS KEDUA --}}
    <div class="grid grid-cols-2 gap-3">

        {{-- NOMOR WHATSAPP --}}
        <div>
            <label for="registerPhone" class="mb-1.5 block text-xs font-semibold text-slate-700">
                Nomor WhatsApp
            </label>

            <input
                type="tel"
                id="registerPhone"
                name="phone"
                placeholder="081234567890"
                autocomplete="tel"
                required
                class="box-border h-10 w-full min-w-0 appearance-none !border-[1px] !border-solid !border-slate-200 rounded-lg bg-slate-50 px-3 text-xs text-slate-800 outline-none transition placeholder:text-slate-400 focus:!border-orange-400 focus:!ring-2 focus:!ring-orange-500/10"
            >
        </div>

        {{-- PASSWORD --}}
        <div>
            <label for="registerPassword" class="mb-1.5 block text-xs font-semibold text-slate-700">
                Kata Sandi
            </label>

            <div class="relative">
                <input
                    type="password"
                    id="registerPassword"
                    name="password"
                    placeholder="Minimal 8 karakter"
                    minlength="8"
                    autocomplete="new-password"
                    required
                    class="box-border h-10 w-full min-w-0 appearance-none !border-[1px] !border-solid !border-slate-200 rounded-lg bg-slate-50 px-3 pr-9 text-xs text-slate-800 outline-none transition placeholder:text-slate-400 focus:!border-orange-400 focus:!ring-2 focus:!ring-orange-500/10"
                >

                <button
                    type="button"
                    onclick="toggleAuthPassword('registerPassword', this)"
                    class="absolute inset-y-0 right-2 flex appearance-none items-center border-0 bg-transparent p-0 text-slate-400 shadow-none outline-none transition hover:text-orange-500 focus:outline-none"
                    aria-label="Tampilkan kata sandi"
                >
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7-10-7-10-7Z" stroke-width="1.8"/>
                        <circle cx="12" cy="12" r="3" stroke-width="1.8"/>
                    </svg>
                </button>
            </div>
        </div>

        
            {{-- INDIKATOR KEAMANAN PASSWORD --}}
            <div
                id="registerPasswordGuide"
                class="hidden col-span-2 w-full min-w-0 rounded-lg border border-slate-100 bg-slate-50 p-3"
            >
                {{-- KEKUATAN PASSWORD --}}
                <div class="mb-2 flex items-center justify-between gap-2">
                    <span class="text-xs font-semibold text-slate-600">
                        Kekuatan kata sandi
                    </span>

                    <span id="registerPasswordStrength" class="text-xs font-bold text-slate-400">
                        Belum diisi
                    </span>
                </div>

                {{-- BAR KEKUATAN --}}
                <div class="mb-3 flex w-full gap-1">
                    <div id="registerStrength1" class="h-1.5 flex-1 rounded-full bg-slate-200"></div>
                    <div id="registerStrength2" class="h-1.5 flex-1 rounded-full bg-slate-200"></div>
                    <div id="registerStrength3" class="h-1.5 flex-1 rounded-full bg-slate-200"></div>
                    <div id="registerStrength4" class="h-1.5 flex-1 rounded-full bg-slate-200"></div>
                </div>

                {{-- PERSYARATAN PASSWORD --}}
                <p class="mb-2 text-xs font-semibold text-slate-600">
                    Persyaratan kata sandi:
                </p>

                <ul class="grid grid-cols-2 gap-x-4 gap-y-1 text-xs">
                    <li id="registerRuleLength" class="text-slate-400">
                        ○ Minimal 8 karakter
                    </li>

                    <li id="registerRuleUpper" class="text-slate-400">
                        ○ Mengandung huruf besar
                    </li>

                    <li id="registerRuleLower" class="text-slate-400">
                        ○ Mengandung huruf kecil
                    </li>

                    <li id="registerRuleNumber" class="text-slate-400">
                        ○ Mengandung angka
                    </li>

                    <li id="registerRuleSymbol" class="text-slate-400">
                        ○ Mengandung simbol
                    </li>
                </ul>
            </div>
        </div>

    {{-- KONFIRMASI PASSWORD --}}
    <div>
        <label for="registerConfirmation" class="mb-1.5 block text-xs font-semibold text-slate-700">
            Konfirmasi Kata Sandi
        </label>

        <div class="relative">
            <input
                type="password"
                id="registerConfirmation"
                name="password_confirmation"
                placeholder="Ulangi kata sandi"
                autocomplete="new-password"
                required
                class="box-border h-10 w-full appearance-none !border-[1px] !border-solid !border-slate-200 rounded-lg bg-slate-50 px-3 pr-9 text-xs text-slate-800 outline-none transition placeholder:text-slate-400 focus:!border-orange-400 focus:!ring-2 focus:!ring-orange-500/10"
            >

            {{-- TOMBOL LIHAT / SEMBUNYIKAN PASSWORD --}}
            <button
                type="button"
                onclick="toggleAuthPassword('registerConfirmation', this)"
                class="absolute inset-y-0 right-2 flex appearance-none items-center border-0 bg-transparent p-0 text-slate-400 shadow-none outline-none transition hover:text-orange-500 focus:outline-none"
                aria-label="Tampilkan konfirmasi kata sandi"
            >
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7-10-7-10-7Z" stroke-width="1.8"/>
                    <circle cx="12" cy="12" r="3" stroke-width="1.8"/>
                </svg>
            </button>
        </div>

        {{-- STATUS KECOCOKAN PASSWORD --}}
        <p id="registerPasswordMatch" class="mt-1.5 hidden text-xs"></p>
    </div>
     
    {{-- PERSETUJUAN --}}
    <div class="pt-1">

        <label class="flex cursor-pointer items-start gap-2 text-[11px] leading-5 text-slate-500">

            <input
                type="checkbox"
                id="registerAgreement"
                name="agreement"
                value="1"
                required
                class="mt-0.5 h-3.5 w-3.5 shrink-0 cursor-pointer accent-blue-700"
            >

            <span class="min-w-0 text-left">
                Saya telah membaca dan menyetujui
                <a
                    href="#"
                    onclick="event.preventDefault(); openRegisterPolicy();"
                    class="cursor-pointer font-semibold text-blue-700 hover:text-blue-900 no-underline"
                >Ketentuan Pengguna dan Kebijakan Privasi</a>
                yang berlaku.
            </span>

        </label>

    </div>

    {{-- TOMBOL REGISTRASI --}}
    <div class="pt-1">
        <button
            type="submit"
            class="mx-auto flex h-10 w-full max-w-[230px] items-center justify-center gap-2 rounded-lg bg-[#101D35] px-5 text-xs font-bold tracking-wide text-white shadow-md shadow-slate-900/10 transition duration-200 hover:bg-blue-700 hover:shadow-blue-700/20"
        >
            BUAT AKUN

            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path d="M5 12h14m-6-6 6 6-6 6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </button>
    </div>

    {{-- PINDAH KE LOGIN --}}
    <p class="pt-1 text-center text-xs text-slate-500">
        Sudah memiliki akun?

        <button
            type="button"
            onclick="window.switchAuthTab('login')"
            class="appearance-none border-0 bg-transparent p-0 font-bold text-orange-500 shadow-none outline-none transition hover:text-orange-600 focus:outline-none"
        >
            Masuk
        </button>
    </p>

</form>


{{-- MODAL KETENTUAN PENGGUNA DAN KEBIJAKAN PRIVASI --}}

<div
    id="registerPolicyModal"
    class="fixed inset-0 z-[100] hidden items-center justify-center bg-slate-950/60 p-4"
    onclick="if(event.target === this) closeRegisterPolicy()"
>
    <div class="w-full max-w-lg overflow-hidden rounded-2xl bg-white shadow-2xl">

        <div class="flex items-center justify-between border-b border-slate-100 px-5 py-4">
            <h3 id="registerPolicyTitle" class="text-base font-extrabold text-[#101D35]">
                Ketentuan Pengguna dan Kebijakan Privasi
            </h3>

            <button
                type="button"
                onclick="closeRegisterPolicy()"
                class="!appearance-none !border-0 !bg-transparent !p-0 !shadow-none text-xl font-normal leading-none text-slate-400 outline-none transition hover:text-slate-700 focus:outline-none"
                aria-label="Tutup"
            >
                &times;
            </button>
        </div>

        <div
            id="registerPolicyContent"
            class="max-h-[60vh] overflow-y-auto px-5 py-5 text-sm leading-6 text-slate-600"
        >
        </div>

        {{-- PERSETUJUAN DI DALAM MODAL --}}
        <div class="border-t border-slate-100 px-5 py-3">
            <label class="flex cursor-pointer items-start gap-2 text-xs leading-5 text-slate-600">

                <input
                    type="checkbox"
                    id="registerAgreementModal"
                    class="mt-1 h-4 w-4 shrink-0 cursor-pointer accent-blue-700"
                >
                <span>
                    Saya telah membaca dan menyetujui Ketentuan Pengguna
                    dan Kebijakan Privasi.
                </span>
            </label>
        </div>

        <div class="border-t border-slate-100 px-5 py-4 text-right">
            <button
                type="button"
                onclick="closeRegisterPolicy()"
                class="rounded-lg bg-[#101D35] px-5 py-2.5 text-xs font-medium text-white shadow-sm transition hover:bg-blue-700"
            >
                Mengerti
            </button>
        </div>

    </div>
</div>


<script>
(function () {

    function initRegisterForm() {

        const password = document.getElementById('registerPassword');
        const confirmation = document.getElementById('registerConfirmation');
        const guide = document.getElementById('registerPasswordGuide');
        const strengthText = document.getElementById('registerPasswordStrength');
        const matchText = document.getElementById('registerPasswordMatch');

        if (!password || !confirmation || !guide || guide.dataset.initialized === 'true') {
            return;
        }

        guide.dataset.initialized = 'true';

        const rules = {
            length: value => value.length >= 8,
            upper: value => /[A-Z]/.test(value),
            lower: value => /[a-z]/.test(value),
            number: value => /[0-9]/.test(value),
            symbol: value => /[^A-Za-z0-9]/.test(value)
        };

        const ruleElements = {
            length: document.getElementById('registerRuleLength'),
            upper: document.getElementById('registerRuleUpper'),
            lower: document.getElementById('registerRuleLower'),
            number: document.getElementById('registerRuleNumber'),
            symbol: document.getElementById('registerRuleSymbol')
        };

        const ruleLabels = {
            length: 'Minimal 8 karakter',
            upper: 'Mengandung huruf besar',
            lower: 'Mengandung huruf kecil',
            number: 'Mengandung angka',
            symbol: 'Mengandung simbol'
        };

        const bars = [1, 2, 3, 4].map(number =>
            document.getElementById('registerStrength' + number)
        );

        function checkPasswordMatch() {

            if (!matchText) return;

            if (!confirmation.value) {
                matchText.classList.add('hidden');
                return;
            }

            matchText.classList.remove('hidden');

            if (password.value === confirmation.value) {
                matchText.textContent = '✓ Konfirmasi kata sandi sesuai.';
                matchText.className = 'mt-1.5 text-xs text-green-600';
            } else {
                matchText.textContent = '✕ Konfirmasi kata sandi belum sesuai.';
                matchText.className = 'mt-1.5 text-xs text-red-600';
            }
        }

        function checkPasswordStrength() {

            const value = password.value;
            let score = 0;

            Object.keys(rules).forEach(key => {

                const passed = rules[key](value);

                if (passed) score++;

                const element = ruleElements[key];

                if (element) {
                    element.textContent =
                        (passed ? '✓ ' : '○ ') + ruleLabels[key];

                    element.className = passed
                        ? 'text-green-600'
                        : 'text-slate-400';
                }
            });

            let label = 'Lemah';
            let color = 'text-red-600';
            let barColor = 'bg-red-500';

            if (score === 3) {
                label = 'Sedang';
                color = 'text-orange-500';
                barColor = 'bg-orange-400';
            } else if (score === 4) {
                label = 'Kuat';
                color = 'text-green-600';
                barColor = 'bg-green-500';
            } else if (score === 5) {
                label = 'Sangat Kuat';
                color = 'text-green-600';
                barColor = 'bg-green-500';
            }

            if (strengthText) {
                strengthText.textContent = value.length
                    ? label
                    : 'Belum diisi';

                strengthText.className =
                    'text-xs font-bold ' +
                    (value.length ? color : 'text-slate-400');
            }

            bars.forEach((bar, index) => {

                if (!bar) return;

                bar.className =
                    'h-1.5 flex-1 rounded-full ' +
                    (index < score ? barColor : 'bg-slate-200');
            });

            checkPasswordMatch();
        }

        // Tampilkan indikator saat password atau konfirmasi dipilih
        password.addEventListener('focus', function () {
            guide.classList.remove('hidden');
            checkPasswordStrength();
        });

        password.addEventListener('input', function () {
            guide.classList.remove('hidden');
            checkPasswordStrength();
        });

        confirmation.addEventListener('input', checkPasswordMatch);

        // Sembunyikan indikator ketika fokus berpindah ke bagian lain
        document.addEventListener('focusin', function (event) {
            if (event.target === password) {
                guide.classList.remove('hidden');
            } else {
                guide.classList.add('hidden');
            }
        });

        // Sembunyikan indikator ketika fokus keluar dari kedua kolom
        [password, confirmation].forEach(field => {

            field.addEventListener('focusout', function (event) {

                if (
                    event.relatedTarget !== password &&
                    event.relatedTarget !== confirmation
                ) {
                    guide.classList.add('hidden');
                }
            });
        });

    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initRegisterForm);
    } else {
        initRegisterForm();
    }

})();


// MODAL KETENTUAN PENGGUNA DAN KEBIJAKAN PRIVASI

function openRegisterPolicy() {

    const modal = document.getElementById('registerPolicyModal');
    const title = document.getElementById('registerPolicyTitle');
    const content = document.getElementById('registerPolicyContent');

    if (!modal || !title || !content) return;

    title.textContent = 'Ketentuan Pengguna dan Kebijakan Privasi';

    content.innerHTML = `

        <h4 class="mb-2 font-bold text-slate-800">
            A. KETENTUAN PENGGUNA
        </h4>

        <h4 class="mb-2 font-semibold text-slate-800">
            1. Ketentuan Umum
        </h4>
        <p class="mb-4">
            Dengan membuat akun, pengguna dianggap telah membaca
            dan memahami ketentuan penggunaan layanan Equityworld Futures.
        </p>

        <h4 class="mb-2 font-semibold text-slate-800">
            2. Informasi Pengguna
        </h4>
        <p class="mb-4">
            Pengguna wajib memberikan informasi yang benar, lengkap,
            dan dapat dipertanggungjawabkan pada saat melakukan pendaftaran.
        </p>

        <h4 class="mb-2 font-semibold text-slate-800">
            3. Keamanan Akun
        </h4>
        <p class="mb-4">
            Pengguna bertanggung jawab menjaga kerahasiaan kata sandi
            dan keamanan akun masing-masing.
        </p>

        <h4 class="mb-2 font-semibold text-slate-800">
            4. Penggunaan Layanan
        </h4>
        <p class="mb-4">
            Pengguna wajib menggunakan layanan sesuai tujuan dan
            ketentuan yang berlaku di perusahaan.
        </p>

        <h4 class="mb-2 font-semibold text-slate-800">
            5. Persetujuan
        </h4>
        <p class="mb-5">
            Dengan melanjutkan pendaftaran, pengguna menyatakan
            persetujuannya terhadap ketentuan yang berlaku.
        </p>

        <div class="border-t border-slate-200 my-4"></div>

        <h4 class="mb-2 font-bold text-slate-800">
            B. KEBIJAKAN PRIVASI
        </h4>

        <h4 class="mb-2 font-semibold text-slate-800">
            1. Data yang Dikumpulkan
        </h4>
        <p class="mb-4">
            Informasi yang diberikan saat pendaftaran dapat mencakup
            nama lengkap, alamat email, nomor WhatsApp, dan informasi akun.
        </p>

        <h4 class="mb-2 font-semibold text-slate-800">
            2. Penggunaan Data
        </h4>
        <p class="mb-4">
            Data digunakan untuk keperluan pembuatan akun, pengelolaan
            layanan, komunikasi, dan kebutuhan administrasi perusahaan.
        </p>

        <h4 class="mb-2 font-semibold text-slate-800">
            3. Perlindungan Data
        </h4>
        <p class="mb-4">
            Perusahaan perlu menerapkan langkah pengamanan yang sesuai
            untuk menjaga data pribadi pengguna.
        </p>

        <h4 class="mb-2 font-semibold text-slate-800">
            4. Pengelolaan Data
        </h4>
        <p class="mb-4">
            Data pribadi dikelola sesuai tujuan pengumpulan dan
            ketentuan peraturan perlindungan data pribadi yang berlaku.
        </p>

        <h4 class="mb-2 font-semibold text-slate-800">
            5. Persetujuan
        </h4>
        <p>
            Dengan melakukan pendaftaran, pengguna menyatakan telah
            membaca informasi kebijakan privasi ini.
        </p>

    `;

    // Samakan checkbox modal dengan checkbox utama
    const mainCheckbox = document.getElementById('registerAgreement');
    const modalCheckbox = document.getElementById('registerAgreementModal');

    if (mainCheckbox && modalCheckbox) {
        modalCheckbox.checked = mainCheckbox.checked;
    }

    modal.classList.remove('hidden');
    modal.classList.add('flex');
}


// SINKRONISASI CHECKBOX UTAMA DAN MODAL

document.addEventListener('change', function (event) {

    const mainCheckbox = document.getElementById('registerAgreement');
    const modalCheckbox = document.getElementById('registerAgreementModal');

    if (!mainCheckbox || !modalCheckbox) return;

    if (event.target === modalCheckbox) {
        mainCheckbox.checked = modalCheckbox.checked;
    }

    if (event.target === mainCheckbox) {
        modalCheckbox.checked = mainCheckbox.checked;
    }

});


// TUTUP MODAL

function closeRegisterPolicy() {

    const modal = document.getElementById('registerPolicyModal');

    if (!modal) return;

    modal.classList.add('hidden');
    modal.classList.remove('flex');
}

</script>
