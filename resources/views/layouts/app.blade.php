
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta
        name="description"
        content="@yield('meta_description', 'PT Equityworld Futures - Informasi perusahaan, layanan, legalitas, berita, dan peluang karier.')"
    >

    <title>@yield('title', 'PT Equityworld Futures')</title>

    <meta name="theme-color" content="#0b142b">

    {{-- FONT WEBSITE --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700;800&family=Manrope:wght@400;500;600;700;800&display=swap"
        rel="stylesheet"
    >

    {{-- CSS UTAMA LARAVEL --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @stack('styles')
</head>

<body class="font-['DM_Sans']">

<header class="sticky top-0 z-50 border-b border-slate-200 bg-white/95 backdrop-blur-xl">

    <div class="relative mx-auto flex min-h-[76px] w-full max-w-[1400px] items-center justify-between gap-4 px-5 py-3 box-border min-[1200px]:min-h-[82px] min-[1200px]:gap-5 min-[1200px]:px-10">

        {{-- LOGO PERUSAHAAN --}}
        <a href="{{ route('home') }}" class="flex shrink-0 items-center gap-4 no-underline min-[1200px]:gap-3 max-[420px]:gap-[7px]" aria-label="PT Equityworld Futures - Beranda">

            <img
                src="{{ asset('images/logo ewf.jpg') }}"
                alt="Logo Equityworld Futures"
                class="h-9 w-9 shrink-0 object-contain min-[1200px]:h-10 min-[1200px]:w-10 max-[420px]:h-8 max-[420px]:w-8"
            >

            <span class="leading-[1.3]">
                <strong class="block whitespace-nowrap font-['Manrope'] text-[13px] font-extrabold text-[#102a43] min-[1200px]:text-sm max-[420px]:text-[11px]">
                PT. Equityworld <em style="color:#ef8b23;font-style:normal;">Futures</em>
            </strong>

            <small class="mt-[3px] block whitespace-nowrap text-[9px] font-bold tracking-[1.2px] text-slate-500 max-[420px]:text-[7px]">
                TRILLIUM SURABAYA
            </small>

        </a>

        {{-- NAVBAR DESKTOP --}}
        <nav
            class="ewf-desktop-nav hidden items-center gap-[3px] rounded-full bg-[#102a43] p-[6px] min-[1200px]:flex"
            aria-label="Navigasi utama"
        >

            <a href="{{ route('home') }}"
                class="inline-flex items-center whitespace-nowrap rounded-full px-[14px] py-[10px] text-xs font-semibold text-slate-200 no-underline transition duration-200 hover:bg-white/10 hover:text-white {{ request()->routeIs('home') ? 'bg-[#2868f4] text-white shadow-[0_3px_8px_rgba(0,0,0,0.15)]' : '' }}"
                @if(request()->routeIs('home')) aria-current="page" @endif>
                Beranda
            </a>

            <a href="{{ route('about') }}"
               class="inline-flex items-center whitespace-nowrap rounded-full px-[14px] py-[10px] text-xs font-semibold text-slate-200 no-underline transition duration-200 hover:bg-white/10 hover:text-white {{ request()->routeIs('about') ? 'bg-[#2868f4] text-white shadow-[0_3px_8px_rgba(0,0,0,0.15)]' : '' }}"
               @if(request()->routeIs('about')) aria-current="page" @endif>
                Tentang Kami
            </a>

            <a href="{{ route('legality') }}"
               class="inline-flex items-center whitespace-nowrap rounded-full px-[14px] py-[10px] text-xs font-semibold text-slate-200 no-underline transition duration-200 hover:bg-white/10 hover:text-white {{ request()->routeIs('legality') ? 'bg-[#2868f4] text-white shadow-[0_3px_8px_rgba(0,0,0,0.15)]' : '' }}"
               @if(request()->routeIs('legality')) aria-current="page" @endif>
                Legalitas
            </a>

            <a href="{{ route('careers') }}"
               class="inline-flex items-center whitespace-nowrap rounded-full px-[14px] py-[10px] text-xs font-semibold text-slate-200 no-underline transition duration-200 hover:bg-white/10 hover:text-white {{ request()->routeIs('careers') ? 'bg-[#2868f4] text-white shadow-[0_3px_8px_rgba(0,0,0,0.15)]' : '' }}"
               @if(request()->routeIs('careers')) aria-current="page" @endif>
                Karier
            </a>

            <a href="{{ route('news') }}"
               class="inline-flex items-center whitespace-nowrap rounded-full px-[14px] py-[10px] text-xs font-semibold text-slate-200 no-underline transition duration-200 hover:bg-white/10 hover:text-white {{ request()->routeIs('news') ? 'bg-[#2868f4] text-white shadow-[0_3px_8px_rgba(0,0,0,0.15)]' : '' }}"
               @if(request()->routeIs('news')) aria-current="page" @endif>
                Berita
            </a>

        </nav>

    {{-- LOGIN DESKTOP --}}
    <div class="ewf-desktop-login group relative hidden shrink-0 min-[1200px]:block">
        <button
            id="ewf-login-toggle"
            type="button"
            class="inline-flex items-center gap-2 rounded-[15px] border border-orange-600/40 bg-[#ff7417] px-5 py-3 text-[13px] font-bold text-white transition duration-200 hover:bg-[#ed650d] cursor-pointer"
            aria-haspopup="true"
            aria-expanded="false"
            aria-controls="ewf-login-dropdown"
        >
            <svg width="18" height="18" viewBox="0 0 24 24"
                fill="none" stroke="currentColor" stroke-width="1.8"
                stroke-linecap="round" stroke-linejoin="round"
                aria-hidden="true">
                <circle cx="12" cy="8" r="3.5"/>
                <path d="M5 20c.7-4 3-6 7-6s6.3 2 7 6"/>
            </svg>

            <span>Masuk</span>

            <svg width="16" height="16" viewBox="0 0 20 20"
                fill="none" stroke="currentColor" stroke-width="1.8"
                aria-hidden="true">
                <path d="m5 7 5 5 5-5"/>
            </svg>
        </button>

        <div
            id="ewf-login-dropdown"
            class="hidden absolute right-0 top-full z-[100] w-max max-w-[calc(100vw-32px)] pt-3"
        >

            <div class="overflow-hidden rounded-2xl border border-slate-300 bg-white p-2 shadow-[0_12px_30px_rgba(15,23,42,0.12)] ring-1 ring-slate-200">

                {{-- JUDUL DROPDOWN --}}
                <div class="border-b border-slate-100 px-5 py-4">
                    <strong class="block text-lg font-bold text-[#102a43]">
                        Selamat Datang
                    </strong>

                    <small class="mt-1 block text-sm text-slate-500">
                        Silakan pilih akses akun Anda
                    </small>
                </div>

                {{-- LOGIN --}}
                <a href="{{ url('/login') }}"
                class="flex items-center gap-3 whitespace-nowrap rounded-xl px-3 py-3 text-base font-semibold text-slate-700 no-underline transition duration-200 hover:bg-blue-50">

                    <span class="flex h-11 w-11 shrink-0 items-center justify-center rounded-2xl bg-blue-50 text-[#2868f4]">
                        <svg class="h-5 w-5" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="1.8"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M10 17l5-5-5-5"/>
                            <path d="M15 12H3"/>
                            <path d="M12 3h6a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-6"/>
                        </svg>
                    </span>

                    <span>Login – Masuk ke akun Anda</span>
                </a>

                {{-- REGISTRASI --}}
                <a href="{{ route('registration') }}"
                class="flex items-center gap-3 whitespace-nowrap rounded-xl px-3 py-3 text-base font-semibold text-slate-700 no-underline transition duration-200 hover:bg-orange-50">

                    <span class="flex h-11 w-11 shrink-0 items-center justify-center rounded-2xl bg-orange-50 text-[#ef8b23]">
                        <svg class="h-5 w-5" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="1.8"
                            stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="9" cy="8" r="3.5"/>
                            <path d="M2.5 20c.6-3.8 2.8-5.7 6.5-5.7"/>
                            <path d="M18 8v8m-4-4h8"/>
                        </svg>
                    </span>

                    <span>Registrasi – Buat akun baru</span>
                </a>

            </div>
        </div>

    </div>

        {{-- TOMBOL HAMBURGER MOBILE --}}
        <button
            id="ewf-mobile-toggle"
            type="button"
            class="box-border flex h-[46px] w-[46px] shrink-0 appearance-none items-center justify-center rounded-[13px] border border-solid border-[#d6dee8] bg-white p-0 shadow-none outline-none ring-0 cursor-pointer"
            aria-label="Buka menu navigasi"
            aria-expanded="false"
            aria-controls="ewf-mobile-panel"
        >
            <svg class="icon-open h-7 w-7" viewBox="0 0 24 24"
                fill="none" stroke="currentColor" stroke-width="2"
                stroke-linecap="round" aria-hidden="true">
                <path d="M4 7h16M4 12h16M4 17h16"/>
            </svg>

            <svg class="icon-close hidden h-7 w-7" viewBox="0 0 24 24"
                fill="none" stroke="currentColor" stroke-width="2"
                stroke-linecap="round" aria-hidden="true">
                <path d="m18 6-12 12M6 6l12 12"/>
            </svg>
        </button>

        {{-- PANEL MENU MOBILE --}}
        <div
            id="ewf-mobile-panel"
            class="absolute right-4 top-[calc(100%+8px)] z-[100] box-border max-h-[calc(100vh-110px)] w-[min(420px,calc(100vw-32px))] overflow-y-auto rounded-[22px] border border-[#e8edf4] bg-white p-[22px] shadow-[0_18px_50px_rgba(15,23,42,0.16)]"
            hidden
        >
            <div class="mb-4">
                <small class="text-[10px] font-extrabold uppercase tracking-[2px] text-orange-500">
                    Menu Utama
                </small>
                <h3 class="mt-[5px] text-[19px] font-extrabold text-[#102a43]">
                    Jelajahi Equityworld
                </h3>
            </div>

            <nav class="flex flex-col gap-[7px]" aria-label="Navigasi mobile">

                {{-- BERANDA --}}
                <a href="{{ route('home') }}"
                class="flex items-center justify-start gap-3 rounded-[13px] px-[13px] py-3 text-sm font-bold text-slate-700 no-underline transition duration-200 hover:bg-slate-50 {{ request()->routeIs('home') ? 'bg-blue-50 text-[#2868f4]' : '' }}">
                    <span class="flex items-center gap-3">
                        <span class="flex h-[37px] w-[37px] shrink-0 items-center justify-center rounded-[10px] bg-slate-100 text-slate-500 {{ request()->routeIs('home') ? 'bg-white text-[#2868f4]' : '' }}">
                            <svg class="h-[19px] w-[19px]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                <path d="m3 10 9-7 9 7v10a1 1 0 0 1-1 1h-6v-7h-4v7H4a1 1 0 0 1-1-1z"/>
                            </svg>
                        </span>
                        Beranda
                    </span>
                </a>

                {{-- TENTANG KAMI --}}
                <a href="{{ route('about') }}"
                class="flex items-center justify-start gap-3 rounded-[13px] px-[13px] py-3 text-sm font-bold text-slate-700 no-underline transition duration-200 hover:bg-slate-50 {{ request()->routeIs('about') ? 'bg-blue-50 text-[#2868f4]' : '' }}">
                    <span class="flex items-center gap-3">
                        <span class="flex h-[37px] w-[37px] shrink-0 items-center justify-center rounded-[10px] bg-slate-100 text-slate-500 {{ request()->routeIs('about') ? 'bg-white text-[#2868f4]' : '' }}">
                            <svg class="h-[19px] w-[19px]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="3" y="3" width="18" height="18" rx="2"/>
                                <path d="M9 21V9h6v12M7 7h.01M17 7h.01"/>
                            </svg>
                        </span>
                        Tentang Kami
                    </span>
                </a>

                {{-- LEGALITAS --}}
                <a href="{{ route('legality') }}"
                class="flex items-center justify-start gap-3 rounded-[13px] px-[13px] py-3 text-sm font-bold text-slate-700 no-underline transition duration-200 hover:bg-slate-50 {{ request()->routeIs('legality') ? 'bg-blue-50 text-[#2868f4]' : '' }}">
                    <span class="flex items-center gap-3">
                        <span class="flex h-[37px] w-[37px] shrink-0 items-center justify-center rounded-[10px] bg-slate-100 text-slate-500 {{ request()->routeIs('legality') ? 'bg-white text-[#2868f4]' : '' }}">
                            <svg class="h-[19px] w-[19px]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M12 22s8-4 8-11V5l-8-3-8 3v6c0 7 8 11 8 11z"/>
                                <path d="m9 12 2 2 4-4"/>
                            </svg>
                        </span>
                        Legalitas
                    </span>
                </a>

                {{-- KARIER --}}
                <a href="{{ route('careers') }}"
                class="flex items-center justify-start gap-3 rounded-[13px] px-[13px] py-3 text-sm font-bold text-slate-700 no-underline transition duration-200 hover:bg-slate-50 {{ request()->routeIs('careers') ? 'bg-blue-50 text-[#2868f4]' : '' }}">
                    <span class="flex items-center gap-3">
                        <span class="flex h-[37px] w-[37px] shrink-0 items-center justify-center rounded-[10px] bg-slate-100 text-slate-500 {{ request()->routeIs('careers') ? 'bg-white text-[#2868f4]' : '' }}">
                            <svg class="h-[19px] w-[19px]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="3" y="7" width="18" height="14" rx="2"/>
                                <path d="M8 7V5a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2M3 12h18"/>
                            </svg>
                        </span>
                        Karier
                    </span>
                </a>

                {{-- BERITA --}}
                <a href="{{ route('news') }}"
                class="flex items-center justify-start gap-3 rounded-[13px] px-[13px] py-3 text-sm font-bold text-slate-700 no-underline transition duration-200 hover:bg-slate-50 {{ request()->routeIs('news') ? 'bg-blue-50 text-[#2868f4]' : '' }}">
                    <span class="flex items-center gap-3">
                        <span class="flex h-[37px] w-[37px] shrink-0 items-center justify-center rounded-[10px] bg-slate-100 text-slate-500 {{ request()->routeIs('news') ? 'bg-white text-[#2868f4]' : '' }}">
                            <svg class="h-[19px] w-[19px]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M4 4h11l5 5v11H4z"/>
                                <path d="M14 4v6h6M8 14h8M8 17h8"/>
                            </svg>
                        </span>
                        Berita
                    </span>
                </a>

            </nav>

            <div class="my-[17px] h-px bg-[#e9eef5]"></div>

            <p class="mb-[10px] text-[10px] font-extrabold uppercase tracking-[1.5px] text-slate-400">
                Akses Akun
            </p>

    <div class="grid grid-cols-2 gap-[18px]">

        {{-- LOGIN --}}
        <a
            href="{{ url('/login') }}"
            class="box-border flex h-12 items-center justify-center gap-[9px] rounded-[14px] bg-[#102a43] p-[6px] text-base font-extrabold text-white no-underline whitespace-nowrap"
        >
            <svg
                class="h-5 w-5 shrink-0"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="1.8"
                stroke-linecap="round"
                stroke-linejoin="round"
                aria-hidden="true"
            >
                <path d="M10 17l5-5-5-5"/>
                <path d="M15 12H3"/>
                <path d="M12 3h6a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-6"/>
            </svg>
            <span>Login</span>
        </a>

        {{-- REGISTRASI --}}
        <a
            href="{{ route('registration') }}"
            class="box-border flex h-12 items-center justify-center gap-[9px] rounded-[14px] bg-[#ff7417] p-[6px] text-base font-extrabold text-white no-underline whitespace-nowrap"
        >
            <svg
                class="h-5 w-5 shrink-0"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="1.8"
                stroke-linecap="round"
                stroke-linejoin="round"
                aria-hidden="true"
            >
                <circle cx="9" cy="8" r="3.5"/>
                <path d="M2.5 20c.6-3.8 2.8-5.7 6.5-5.7"/>
                <path d="M18 8v8m-4-4h8"/>
            </svg>
            <span>Registrasi</span>
        </a>

    </div>

                <p class="mt-[17px] text-center text-[10px] text-slate-400">
                    PT. Equityworld Futures · Trillium Surabaya
                </p>

            </div>

        </div>
    </header>

    {{-- KONTEN UTAMA --}}
    <main id="main-content">
        @yield('content')
    </main>

{{-- FOOTER --}}
<footer class="bg-[#252f40] text-slate-300">

    {{-- FOOTER UTAMA --}}
    <div class="mx-auto grid max-w-[1400px] grid-cols-1 gap-8 px-6 py-8 sm:grid-cols-2 lg:grid-cols-[2fr_0.9fr_0.9fr_1fr] lg:gap-12 lg:px-10">

        {{-- KOLOM 1: PROFIL PERUSAHAAN --}}
        <div>

            {{-- LOGO DAN IDENTITAS --}}
            <a href="{{ route('home') }}"
               class="mb-4 inline-flex items-center gap-3">

                <img
                    src="{{ asset('images/logo-ewf-transparent.png') }}"
                    alt="Logo Equityworld Futures"
                    class="h-11 w-11 shrink-0 object-contain"
                >

                <span class="leading-tight">
                    <strong class="block font-['Manrope'] text-sm font-extrabold tracking-wide text-slate-200">
                        EQUITYWORLD FUTURES
                    </strong>

                    <small class="mt-1 block text-[9px] font-bold tracking-[2px] text-blue-400">
                        TRILLIUM SURABAYA
                    </small>
                </span>

            </a>

            {{-- DESKRIPSI PERUSAHAAN --}}
            <p class="max-w-[360px] text-[11px] leading-[1.7] text-slate-400">
                PT Equityworld Futures adalah perusahaan pialang berjangka
                resmi yang berkomitmen memberikan pelayanan transaksi
                terbaik dan terpercaya di Indonesia.
            </p>

            {{-- MEDIA SOSIAL --}}
            <div class="mt-4 flex items-center gap-2">

                {{-- FACEBOOK --}}
                <a
                    href="#"
                    aria-label="Facebook"
                    class="flex h-8 w-8 items-center justify-center rounded-full bg-slate-500/70 text-white transition duration-200 hover:bg-orange-500"
                >
                    <svg viewBox="0 0 24 24" class="h-4 w-4" fill="currentColor" aria-hidden="true">
                        <path d="M13.5 21v-8h2.7l.4-3.1h-3.1v-2c0-.9.3-1.5 1.6-1.5h1.7V3.6c-.3 0-1.3-.1-2.5-.1-2.5 0-4.2 1.5-4.2 4.3v2.1H7.3V13h2.8v8z"/>
                    </svg>
                </a>

                {{-- INSTAGRAM --}}
                <a
                    href="#"
                    aria-label="Instagram"
                    class="flex h-8 w-8 items-center justify-center rounded-full bg-slate-500/70 text-white transition duration-200 hover:bg-orange-500"
                >
                    <svg viewBox="0 0 24 24" class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true">
                        <rect x="3" y="3" width="18" height="18" rx="5"/>
                        <circle cx="12" cy="12" r="4"/>
                        <circle cx="17.5" cy="6.5" r="1" fill="currentColor" stroke="none"/>
                    </svg>
                </a>
           
                {{-- EMAIL --}}
                <a
                    href="mailto:corporate@equityworld-futures.co.id"
                    aria-label="Email"
                    class="flex h-8 w-8 items-center justify-center rounded-full bg-slate-500/70 text-white transition duration-200 hover:bg-orange-500"
                >
                    <svg
                        viewBox="0 0 24 24"
                        class="h-4 w-4"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="1.8"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        aria-hidden="true"
                    >
                        <rect x="3" y="5" width="18" height="14" rx="2"/>
                        <path d="m3 7 9 6 9-6"/>
                    </svg>
                </a>

                {{-- WHATSAPP --}}
                <a
                    href="#"
                    aria-label="WhatsApp"
                    class="flex h-8 w-8 items-center justify-center rounded-full bg-slate-500/70 text-white transition duration-200 hover:bg-orange-500"
                >
                    <svg viewBox="0 0 24 24" class="h-4 w-4" fill="currentColor" aria-hidden="true">
                        <path d="M12 2a9.8 9.8 0 0 0-8.4 14.9L2.3 22l5.3-1.3A10 10 0 1 0 12 2Zm0 18a8 8 0 0 1-4.1-1.1l-.3-.2-3.1.8.8-3-.2-.3A8 8 0 1 1 12 20Zm4.4-6c-.2-.1-1.4-.7-1.6-.8-.2-.1-.4-.1-.5.1-.2.2-.6.8-.8.9-.1.2-.3.2-.5.1-.2-.1-1-.4-2-1.3-.7-.6-1.2-1.4-1.3-1.6-.1-.2 0-.3.1-.5l.4-.4c.1-.1.2-.3.3-.4.1-.2 0-.3 0-.4l-.7-1.7c-.2-.4-.4-.4-.5-.4h-.5c-.2 0-.4.1-.6.3-.2.2-.8.8-.8 1.9s.8 2.2.9 2.4c.1.2 1.6 2.5 3.9 3.5 1.5.7 2 .7 2.7.6.4-.1 1.4-.6 1.6-1.2.2-.6.2-1.1.1-1.2-.1-.1-.2-.2-.4-.3Z"/>
                    </svg>
                </a>

            </div>
        </div>

        {{-- KOLOM 2: NAVIGASI --}}
        <div>

            <h3 class="mb-4 text-[10px] font-extrabold tracking-wide text-blue-400">
                NAVIGASI
            </h3>

            <div class="flex flex-col gap-2.5 text-[10px] text-slate-400">

                <a href="{{ route('home') }}" class="transition hover:text-orange-400">
                    Beranda
                </a>

                <a href="{{ route('about') }}" class="transition hover:text-orange-400">
                    Tentang Kami
                </a>

                <a href="{{ route('legality') }}" class="transition hover:text-orange-400">
                    Legalitas &amp; Izin
                </a>

                <a href="{{ route('careers') }}" class="transition hover:text-orange-400">
                    Lowongan Karier
                </a>

                <a href="{{ route('news') }}" class="transition hover:text-orange-400">
                    Berita &amp; Artikel
                </a>

            </div>
        </div>

        {{-- KOLOM 3: REGULATOR --}}
        <div>

            <h3 class="mb-4 text-[10px] font-extrabold tracking-wide text-blue-400">
                REGULATOR
            </h3>

            <div class="flex flex-col gap-2.5 text-[10px] text-slate-400">

                <a href="{{ route('legality') }}" class="transition hover:text-orange-400">
                    BAPPEBTI
                </a>

                <a href="{{ route('legality') }}" class="transition hover:text-orange-400">
                    ICDX (Bursa)
                </a>

                <a href="{{ route('legality') }}" class="transition hover:text-orange-400">
                    KBI (Kliring)
                </a>

                <a href="{{ route('legality') }}" class="transition hover:text-orange-400">
                    Kementerian Perdagangan
                </a>

            </div>
        </div>

        {{-- KOLOM 4: KANTOR PUSAT --}}
        <div>

            <h3 class="mb-4 text-[10px] font-extrabold tracking-wide text-blue-400">
                KANTOR PUSAT
            </h3>

            <div class="flex flex-col gap-3 text-[10px] leading-[1.6] text-slate-400">

                {{-- ALAMAT --}}
                <div class="flex items-start gap-2">

                    <svg class="mt-0.5 h-3.5 w-3.5 shrink-0 text-orange-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                        <path d="M20 10c0 5-8 12-8 12S4 15 4 10a8 8 0 1 1 16 0Z"/>
                        <circle cx="12" cy="10" r="2.5"/>
                    </svg>

                    <p>
                        Cyber 2 Tower Lt. 19, Jl. H.R. Rasuna Said Blok X-5,
                        Jakarta Selatan 12950
                    </p>

                </div>

                {{-- TELEPON --}}
                <div class="flex items-center gap-2">

                    <svg class="h-3.5 w-3.5 shrink-0 text-orange-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                        <path d="M22 16.9v3a2 2 0 0 1-2.2 2 19.8 19.8 0 0 1-8.6-3.1 19.4 19.4 0 0 1-6-6A19.8 19.8 0 0 1 2.1 4.2 2 2 0 0 1 4.1 2h3a2 2 0 0 1 2 1.7c.1 1 .4 2 .7 2.9a2 2 0 0 1-.5 2.1L8 10a16 16 0 0 0 6 6l1.3-1.3a2 2 0 0 1 2.1-.5c.9.3 1.9.6 2.9.7a2 2 0 0 1 1.7 2Z"/>
                    </svg>

                    <a href="tel:+622157998000" class="transition hover:text-orange-400">
                        (021) 5799-8000
                    </a>

                </div>

                {{-- EMAIL --}}
                <div class="flex items-start gap-2">

                    <svg class="mt-0.5 h-3.5 w-3.5 shrink-0 text-orange-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                        <rect x="3" y="5" width="18" height="14" rx="2"/>
                        <path d="m3 7 9 6 9-6"/>
                    </svg>

                    <a
                        href="mailto:corporate@equityworld-futures.co.id"
                        class="break-all transition hover:text-orange-400"
                    >
                        corporate@equityworld-futures.co.id
                    </a>

                </div>

            </div>
        </div>

    </div>

    {{-- GARIS PEMISAH --}}
    <div class="mx-auto max-w-[1400px] px-6 lg:px-10">
        <div class="border-t border-slate-600/30"></div>
    </div>

    {{-- PERINGATAN RISIKO --}}
    <div class="mx-auto max-w-[1400px] px-6 py-4 lg:px-10">

        <p class="text-[9px] font-semibold uppercase leading-[1.7] text-slate-300">

            <strong class="text-blue-400">
                PERINGATAN RISIKO (RISK WARNING):
            </strong>

            PERDAGANGAN BERJANGKA MEMILIKI TINGKAT RISIKO YANG TINGGI DAN
            MUNGKIN TIDAK COCOK UNTUK SEMUA INVESTOR. SEBELUM MEMUTUSKAN
            UNTUK BERTRANSAKSI, ANDA HARUS MEMPERTIMBANGKAN DENGAN CERMAT
            TUJUAN INVESTASI, TINGKAT PENGALAMAN, DAN RISIKO YANG ADA.
            ANDA DAPAT KEHILANGAN SEBAGIAN ATAU SELURUH INVESTASI AWAL ANDA.
            PT EQUITYWORLD FUTURES TIDAK BERTANGGUNG JAWAB ATAS KERUGIAN
            FINANSIAL YANG TIMBUL DARI KEPUTUSAN INVESTASI PRIBADI.

        </p>

    </div>

    {{-- COPYRIGHT --}}
    <div class="border-t border-slate-600/20">

        <div class="mx-auto flex max-w-[1400px] flex-col justify-between gap-3 px-6 py-4 text-[10px] text-slate-500 sm:flex-row sm:items-center lg:px-10">

            <p>
                © {{ date('Y') }} PT Equityworld Futures.
                Hak Cipta Dilindungi Undang-Undang.
            </p>

            <div class="flex items-center gap-6">

                <a href="#" class="transition hover:text-orange-400">
                    Kebijakan Privasi
                </a>

                <a href="#" class="transition hover:text-orange-400">
                    Syarat &amp; Ketentuan
                </a>

            </div>

        </div>

    </div>

</footer>
           @stack('scripts')
</body>
</html>