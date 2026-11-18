
{{-- =====================================================
    POPUP LOGIN DAN REGISTRASI
    PT EQUITYWORLD FUTURES
===================================================== --}}

<div
    id="authModal"
    class="fixed inset-0 z-[99999] hidden items-center justify-center overflow-y-auto bg-slate-950/30 p-3 backdrop-blur-[2px] sm:p-5"
    aria-hidden="true"
>
    {{-- CONTAINER UTAMA --}}

    <div
        id="authModalContent"
        class="relative grid h-auto min-h-[440px] max-h-[90vh] w-full max-w-[720px] grid-cols-1 overflow-hidden rounded-2xl bg-white shadow-2xl lg:h-[490px] lg:grid-cols-[0.9fr_1.1fr]"
        role="dialog"
        aria-modal="true"
        aria-labelledby="authWelcomeTitle"
    >

        {{-- TOMBOL TUTUP --}}

        <button
            type="button"
            id="closeAuthModal"
            class="absolute right-3 top-3 z-50 flex h-8 w-8 items-center justify-center rounded-full border border-slate-200 bg-white text-lg font-semibold text-slate-600 shadow-sm transition hover:border-orange-400 hover:bg-orange-500 hover:text-white"
            aria-label="Tutup popup"
        >
            &times;
        </button>


        {{-- =================================================
             PANEL KIRI
        ================================================== --}}

        <section
            class="relative hidden min-w-0 flex-col justify-between overflow-hidden bg-[#101D35] px-6 py-6 text-white lg:flex"
        >

            {{-- DEKORASI BACKGROUND --}}

            <div class="absolute -right-24 -top-24 h-56 w-56 rounded-full bg-orange-500/10 blur-3xl"></div>

            <div class="absolute -bottom-24 -left-24 h-56 w-56 rounded-full bg-blue-500/10 blur-3xl"></div>

            <div
                class="absolute inset-0 opacity-[0.05]"
                style="background-image: radial-gradient(#ffffff 1px, transparent 1px); background-size: 22px 22px;"
            ></div>


            {{-- LOGO SAJA --}}

            <div class="relative z-10 flex items-center">

                <img
                    src="{{ asset('images/logo-ewf-transparent.png') }}"
                    alt="Logo Equityworld Futures"
                    class="h-12 w-12 object-contain"
                >

            </div>


            {{-- WELCOME CONTENT --}}

            <div class="relative z-10 my-auto py-6">

                <p class="mb-2 text-[11px] font-bold uppercase tracking-[0.25em] text-orange-400">
                    Welcome To
                </p>

                <h1
                    id="authWelcomeTitle"
                    class="text-2xl font-extrabold leading-tight xl:text-[27px]"
                >
                    Equityworld

                    <span class="text-orange-400">
                        Futures
                    </span>
                </h1>

                <p class="mt-3 max-w-sm text-xs leading-6 text-slate-300">
                    Selamat datang di sistem informasi dan layanan karier
                    PT Equityworld Futures. Silakan masuk atau buat akun
                    untuk melanjutkan.
                </p>


                {{-- INFORMASI PERUSAHAAN --}}

                <div class="mt-6 space-y-3">

                    {{-- INFORMASI PERUSAHAAN --}}

                    <div class="flex items-center gap-3">

                        <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-orange-500/15 text-orange-400">

                            <svg
                                class="h-4 w-4"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-width="2"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M12 3 3 8v13h18V8l-9-5Z"
                                />

                                <path
                                    stroke-width="2"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M9 21v-6h6v6M9 10h.01M15 10h.01"
                                />

                            </svg>

                        </div>

                        <div>
                            <p class="text-xs font-semibold text-white">
                                Informasi Perusahaan
                            </p>

                            <p class="mt-0.5 text-[11px] text-slate-400">
                                Equityworld Futures
                            </p>
                        </div>

                    </div>


                    {{-- LAYANAN KARIER --}}

                    <div class="flex items-center gap-3">

                        <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-orange-500/15 text-orange-400">

                            <svg
                                class="h-4 w-4"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <circle
                                    cx="12"
                                    cy="12"
                                    r="9"
                                    stroke-width="2"
                                />

                                <path
                                    stroke-width="2"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M12 7v5l3 2"
                                />

                            </svg>

                        </div>

                        <div>
                            <p class="text-xs font-semibold text-white">
                                Layanan Karier
                            </p>

                            <p class="mt-0.5 text-[11px] text-slate-400">
                                Staff dan Program Magang
                            </p>
                        </div>

                    </div>

                </div>

            </div>


            {{-- FOOTER PANEL KIRI --}}

            <div class="relative z-10 mt-3 border-t border-white/10 pb-2 pt-4">

                <p class="text-[10px] text-slate-400">
                    PT Equityworld Futures

                    <span class="mx-1.5 text-orange-400">|</span>

                    Trillium Surabaya
                </p>

            </div>

        </section>


        {{-- =================================================
             PANEL KANAN
        ================================================== --}}

        <section
            class="relative flex min-h-0 min-w-0 flex-col justify-start overflow-y-auto bg-white px-5 pb-5 pt-14 sm:px-7 lg:px-7 lg:pb-6 lg:pt-12"
        >

            {{-- LOGO MOBILE --}}

            <div class="mb-4 flex items-center lg:hidden">

                <img
                    src="{{ asset('images/logo-ewf-transparent.png') }}"
                    alt="Logo Equityworld Futures"
                    class="h-9 w-9 object-contain"
                >

            </div>


            {{-- TAB LOGIN DAN REGISTRASI --}}

            <div class="mb-5 grid shrink-0 grid-cols-2 gap-2 rounded-xl bg-slate-100 p-1">

                <button
                    type="button"
                    data-auth-tab="login"
                    class="auth-tab rounded-lg bg-[#101D35] px-3 py-2.5 text-xs font-bold text-white shadow-sm transition"
                    aria-selected="true"
                >
                    Login
                </button>

                <button
                    type="button"
                    data-auth-tab="register"
                    class="auth-tab rounded-lg px-3 py-2.5 text-xs font-bold text-slate-500 transition hover:text-[#101D35]"
                    aria-selected="false"
                >
                    Registrasi
                </button>

            </div>


            {{-- FORM LOGIN --}}

            @include('auth.login-form')


            {{-- FORM REGISTRASI --}}

            @include('auth.register-form')


        </section>

    </div>

</div>


{{-- =====================================================
     JAVASCRIPT POPUP
===================================================== --}}

<script>
(function () {

    'use strict';

    const modal = document.getElementById('authModal');

    if (!modal) return;

    const closeButton = document.getElementById('closeAuthModal');

    const tabs = modal.querySelectorAll('[data-auth-tab]');

    const loginForm = document.getElementById('loginForm');

    const registerForm = document.getElementById('registerForm');


    // ==========================================
    // MEMBUKA POPUP
    // ==========================================

    window.openAuthPopup = function (mode = 'login') {

        modal.classList.remove('hidden');

        modal.classList.add('flex');

        modal.setAttribute('aria-hidden', 'false');

        document.body.classList.add('overflow-hidden');

        window.switchAuthTab(mode);

    };


    // ==========================================
    // PINDAH TAB LOGIN DAN REGISTRASI
    // ==========================================

    window.switchAuthTab = function (mode = 'login') {

        const selectedMode =
            mode === 'register' ? 'register' : 'login';

        const isLogin = selectedMode === 'login';


        if (loginForm) {

            loginForm.classList.toggle('hidden', !isLogin);

        }


        if (registerForm) {

            registerForm.classList.toggle('hidden', isLogin);

        }


        tabs.forEach(function (tab) {

            const active =
                tab.dataset.authTab === selectedMode;

            tab.classList.toggle('bg-[#101D35]', active);

            tab.classList.toggle('text-white', active);

            tab.classList.toggle('shadow-sm', active);

            tab.classList.toggle('text-slate-500', !active);

            tab.setAttribute(
                'aria-selected',
                active ? 'true' : 'false'
            );

        });


        // KEMBALIKAN POSISI SCROLL KE ATAS

        const rightPanel = modal.querySelector(
            '#authModalContent > section:last-of-type'
        );

        if (rightPanel) {

            rightPanel.scrollTop = 0;

        }

    };


    // ==========================================
    // KLIK TAB
    // ==========================================

    tabs.forEach(function (tab) {

        tab.addEventListener('click', function () {

            window.switchAuthTab(tab.dataset.authTab);

        });

    });


    // ==========================================
    // MENUTUP POPUP
    // ==========================================

    window.closeAuthPopup = function () {

        modal.classList.add('hidden');

        modal.classList.remove('flex');

        modal.setAttribute('aria-hidden', 'true');

        document.body.classList.remove('overflow-hidden');

    };


    if (closeButton) {

        closeButton.addEventListener(
            'click',
            window.closeAuthPopup
        );

    }


    // ==========================================
    // KLIK DI LUAR POPUP
    // ==========================================

    modal.addEventListener('click', function (event) {

        if (event.target === modal) {

            window.closeAuthPopup();

        }

    });


    // ==========================================
    // TOMBOL ESCAPE
    // ==========================================

    document.addEventListener('keydown', function (event) {

        if (
            event.key === 'Escape' &&
            !modal.classList.contains('hidden')
        ) {

            window.closeAuthPopup();

        }

    });


    // ==========================================
    // TAMPILKAN / SEMBUNYIKAN PASSWORD
    // ==========================================

    window.toggleAuthPassword = function (inputId, button) {

        const input = document.getElementById(inputId);

        if (!input) return;

        if (input.type === 'password') {

            input.type = 'text';

            button.setAttribute(
                'aria-label',
                'Sembunyikan kata sandi'
            );

        } else {

            input.type = 'password';

            button.setAttribute(
                'aria-label',
                'Tampilkan kata sandi'
            );

        }

    };


    // ==========================================
    // LINK LOGIN DAN REGISTRASI
    // ==========================================

    document.addEventListener('click', function (event) {

        const target = event.target instanceof Element
            ? event.target
            : event.target.parentElement;

        if (!target) return;

        const link = target.closest('a[href]');

        if (!link) return;

        const url = new URL(link.href, window.location.href);

        if (url.origin !== window.location.origin) return;

        const path = url.pathname.replace(/\/+$/, '') || '/';


        if (path === '/login') {

            event.preventDefault();

            window.openAuthPopup('login');

        }

        else if (
            path === '/register' ||
            path === '/registrasi'
        ) {

            event.preventDefault();

            window.openAuthPopup('register');

        }

    }, true);

    // ==========================================
    // OTOMATIS MEMBUKA POPUP SETELAH REDIRECT
    // ==========================================

    @if(session('open_auth_modal'))

        window.openAuthPopup(
            @json(session('open_auth_modal'))
        );

    @endif

})();
</script>