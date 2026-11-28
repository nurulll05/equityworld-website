
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

<body
    class="font-['DM_Sans']"
    data-visual-editor="{{ ($isVisualEditor ?? false) ? 'true' : 'false' }}"
    data-cms-save-url="{{ route('admin.website.save') }}"
    data-csrf="{{ csrf_token() }}"
>
<header class="site-header sticky top-0 z-50 border-b border-slate-200 bg-white/95 backdrop-blur-xl">    
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
    
        {{-- AKSES AKUN DESKTOP --}}
        <div class="ewf-desktop-login hidden shrink-0 items-center gap-3 min-[1200px]:flex">

            @auth
                @if(auth()->user()->role === 'pelamar')

                    {{-- NOTIFIKASI --}}
                    <details class="relative">
                        <summary
                            class="relative flex h-10 w-10 cursor-pointer list-none items-center justify-center rounded-full text-[#142D59] transition hover:bg-blue-50"
                            aria-label="Notifikasi"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="h-5 w-5"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 17h5l-1.4-1.4A2 2 0 0 1 18 14.2V11a6 6 0 0 0-4.5-5.8V4a1.5 1.5 0 0 0-3 0v1.2A6 6 0 0 0 6 11v3.2a2 2 0 0 1-.6 1.4L4 17h5m6 0a3 3 0 0 1-6 0m6 0H9" />
                            </svg>
                    
                        </summary>

                        <div class="absolute right-0 z-50 mt-3 w-80 rounded-xl border border-gray-100 bg-white p-4 shadow-xl">
                            <h3 class="font-bold text-[#142D59]">Notifikasi</h3>
                            <p class="mt-3 text-sm text-gray-500">
                                Belum ada notifikasi.
                            </p>
                        </div>
                    </details>

                    {{-- PROFIL PELAMAR --}}
                    <details class="relative">

                    <summary class="flex cursor-pointer list-none items-center gap-2 rounded-full border border-gray-200 py-1 pl-1 pr-3 transition hover:bg-gray-50">

                        <span class="flex h-9 w-9 items-center justify-center rounded-full bg-[#142D59] text-sm font-bold uppercase text-white">
                            {{ mb_substr(auth()->user()->name, 0, 1) }}
                        </span>

                        <span class="max-w-[120px] truncate text-sm font-semibold text-[#142D59]">
                            {{ auth()->user()->name }}
                        </span>

                        <svg class="h-4 w-4 text-gray-500" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m6 9 6 6 6-6" />
                        </svg>

                    </summary>

                        <div class="absolute right-0 z-50 mt-3 w-64 overflow-hidden rounded-2xl border border-slate-100 bg-white p-2 shadow-[0_15px_40px_rgba(15,23,42,0.15)]">

                            {{-- PROFIL SAYA --}}
                            <a href="{{ route('pelamar.dashboard', ['tab' => 'profil']) }}"
                                class="group flex items-center gap-3 rounded-xl px-3 py-3 text-sm font-semibold text-slate-700 transition-all duration-200 hover:bg-blue-50 hover:text-blue-600">

                                <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-slate-100 text-slate-500 transition group-hover:bg-blue-100 group-hover:text-blue-600">
                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path d="M20 21a8 8 0 0 0-16 0m8-10a4 4 0 1 0 0-8 4 4 0 0 0 0 8Z"
                                            stroke-width="1.8" stroke-linecap="round"/>
                                    </svg>
                                </span>

                                <span class="flex-1">Profil Saya</span>

                                <svg class="h-4 w-4 text-slate-300 transition group-hover:translate-x-1 group-hover:text-blue-500"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path d="m9 18 6-6-6-6" stroke-width="2" stroke-linecap="round"/>
                                </svg>
                            </a>

                            {{-- STATUS LAMARAN --}}
                            <a href="{{ route('pelamar.dashboard', ['tab' => 'lamaran']) }}"
                                class="group flex items-center gap-3 rounded-xl px-3 py-3 text-sm font-semibold text-slate-700 transition-all duration-200 hover:bg-orange-50 hover:text-orange-600">

                                <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-slate-100 text-slate-500 transition group-hover:bg-orange-100 group-hover:text-orange-600">
                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path d="M8 7V3m8 4V3M4 11h16M5 5h14a1 1 0 0 1 1 1v14H4V6a1 1 0 0 1 1-1Z"
                                            stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </span>

                                <span class="flex-1">Status Lamaran</span>

                                <svg class="h-4 w-4 text-slate-300 transition group-hover:translate-x-1 group-hover:text-orange-500"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path d="m9 18 6-6-6-6" stroke-width="2" stroke-linecap="round"/>
                                </svg>
                            </a>

                            {{-- PEMBATAS --}}
                            <div class="my-2 border-t border-slate-100"></div>

                            {{-- KELUAR --}}
                            <form action="{{ route('logout') }}" method="POST"
                                onsubmit="return confirm('Apakah Anda yakin ingin keluar dari akun?')">
                                @csrf

                                <button type="submit"
                                    class="flex w-full items-center justify-center gap-2 rounded-xl border-0 bg-transparent px-4 py-3 text-sm font-bold text-red-600 transition-all duration-200 hover:bg-red-50 hover:text-red-700">

                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path d="M10 17l5-5-5-5m5 5H3m9-9h7a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-7"
                                            stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>

                                    Keluar
                                </button>
                            </form>

                        </div>

                    </details>

                @elseif(auth()->user()->role === 'admin')
                    <a href="{{ route('admin.dashboard') }}"
                        class="rounded-lg bg-[#142D59] px-5 py-2.5 text-sm font-semibold text-white">
                        Dashboard Admin
                    </a>

                @elseif(auth()->user()->role === 'hrd')
                    <a href="{{ route('hrd.dashboard') }}"
                        class="rounded-lg bg-[#142D59] px-5 py-2.5 text-sm font-semibold text-white">
                        Dashboard HRD
                    </a>
                @endif

            @else

            {{-- LOGIN DAN REGISTRASI UNTUK PENGUNJUNG --}}
            <div class="group relative">

                {{-- TOMBOL MASUK --}}
                <button
                    id="ewf-login-toggle"
                    type="button"
                    class="inline-flex items-center justify-center rounded-lg border border-orange-600 bg-[#F28C28] px-5 py-2.5 text-sm font-bold text-white shadow-sm transition-all duration-200 hover:border-orange-700 hover:bg-[#E87917] hover:shadow-md focus:outline-none focus:ring-2 focus:ring-orange-300"
                >
                    Masuk
                </button>

                {{-- DROPDOWN LOGIN DAN REGISTRASI --}}
                <div
                    id="ewf-login-dropdown"
                    class="invisible absolute right-0 top-full z-50 mt-2 w-56 translate-y-2 overflow-hidden rounded-2xl border border-slate-100 bg-white p-2 opacity-0 shadow-[0_12px_35px_rgba(15,23,42,0.15)] transition-all duration-200 group-hover:visible group-hover:translate-y-0 group-hover:opacity-100 group-focus-within:visible group-focus-within:translate-y-0 group-focus-within:opacity-100"
                >

                    {{-- MENU LOGIN --}}
                    <a
                        href="{{ url('/login') }}"
                        class="group/item flex items-center gap-3 rounded-xl px-3 py-3 text-sm font-semibold text-slate-700 no-underline transition-all duration-200 hover:bg-orange-50 hover:text-orange-600 focus:bg-orange-50 focus:text-orange-600 focus:outline-none"
                    >
                        <span class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg bg-slate-100 text-slate-500 transition-all duration-200 group-hover/item:bg-orange-100 group-hover/item:text-orange-600">
                            <svg
                                class="h-[18px] w-[18px]"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="1.8"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            >
                                <path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"/>
                                <path d="m10 17 5-5-5-5"/>
                                <path d="M15 12H3"/>
                            </svg>
                        </span>

                        <span class="flex-1">Login</span>

                        <svg class="h-4 w-4 text-slate-300 transition group-hover/item:translate-x-1 group-hover/item:text-orange-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="m9 18 6-6-6-6"/>
                        </svg>
                    </a>

                    {{-- MENU REGISTRASI --}}
                    <a
                        href="{{ route('registration') }}"
                        class="group/item flex items-center gap-3 rounded-xl px-3 py-3 text-sm font-semibold text-slate-700 no-underline transition-all duration-200 hover:bg-blue-50 hover:text-blue-600 focus:bg-blue-50 focus:text-blue-600 focus:outline-none"
                    >
                        <span class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg bg-slate-100 text-slate-500 transition-all duration-200 group-hover/item:bg-blue-100 group-hover/item:text-blue-600"
                        >
                            <svg
                                class="h-[18px] w-[18px]"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="1.8"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            >
                                <path d="M16 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                                <circle cx="10" cy="7" r="4"/>
                                <path d="M19 8v6M16 11h6"/>
                            </svg>
                        </span>

                        <span class="flex-1">Registrasi</span>

                        <svg class="h-4 w-4 text-slate-300 transition group-hover/item:translate-x-1 group-hover/item:text-blue-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="m9 18 6-6-6-6"/>
                        </svg>
                    </a>

                </div>
            </div>

            @endauth
        </div>

        {{-- TOMBOL HAMBURGER MOBILE --}}
        <button
            id="ewf-mobile-toggle"
            type="button"
            class="box-border flex h-[46px] w-[46px] shrink-0 appearance-none items-center justify-center rounded-[13px] border border-solid border-[#d6dee8] bg-white p-0 shadow-none outline-none ring-0 cursor-pointer min-[1200px]:hidden"
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

            {{-- AKSES AKUN MOBILE --}}
            <div class="mt-5 border-t border-gray-200 pt-4">

                @auth
                    @if(auth()->user()->role === 'pelamar')

                        <div class="mb-4 flex items-center gap-3">
                            <span class="flex h-10 w-10 items-center justify-center rounded-full bg-[#142D59] font-bold uppercase text-white">
                                {{ mb_substr(auth()->user()->name, 0, 1) }}
                            </span>

                            <div class="min-w-0">
                                <p class="truncate text-sm font-bold text-[#142D59]">
                                    {{ auth()->user()->name }}
                                </p>
                                <p class="text-xs text-gray-500">Akun Pelamar</p>
                            </div>
                        </div>

                        <div class="space-y-2">
                            <a href="{{ route('pelamar.dashboard', ['tab' => 'profil']) }}"
                                class="block rounded-lg px-4 py-3 text-sm text-gray-700 hover:bg-blue-50">
                                Profil Saya
                            </a>

                            <a href="{{ route('pelamar.dashboard', ['tab' => 'lamaran']) }}"
                                class="block rounded-lg px-4 py-3 text-sm text-gray-700 hover:bg-blue-50">
                                Status Lamaran
                            </a>

                            <div class="rounded-lg px-4 py-3 text-sm text-gray-500">
                                Notifikasi
                                <span class="ml-1 text-xs">(Belum tersedia)</span>
                            </div>

                            <form action="{{ route('logout') }}" method="POST"
                                onsubmit="return confirm('Apakah Anda yakin ingin keluar dari akun?')">
                                @csrf
                                <button type="submit"
                                    class="w-full rounded-lg px-4 py-3 text-left text-sm font-semibold text-red-600 hover:bg-red-50">
                                    Keluar
                                </button>
                            </form>
                        </div>

                    @elseif(auth()->user()->role === 'admin')
                        <a href="{{ route('admin.dashboard') }}"
                            class="block rounded-lg bg-[#142D59] px-4 py-3 text-center text-sm font-semibold text-white">
                            Dashboard Admin
                        </a>

                    @elseif(auth()->user()->role === 'hrd')
                        <a href="{{ route('hrd.dashboard') }}"
                            class="block rounded-lg bg-[#142D59] px-4 py-3 text-center text-sm font-semibold text-white">
                            Dashboard HRD
                        </a>
                    @endif

                @else

                    <p class="mb-3 text-xs font-semibold uppercase tracking-wider text-gray-500">
                        Akses Akun
                    </p>

                    <div class="grid grid-cols-2 gap-3">
                        <a href="{{ url('/login') }}"
                            class="rounded-lg border border-[#142D59] px-4 py-3 text-center text-sm font-semibold text-[#142D59]">
                            Login
                        </a>

                        <a href="{{ route('registration') }}"
                            class="rounded-lg bg-[#142D59] px-4 py-3 text-center text-sm font-semibold text-white">
                            Registrasi
                        </a>
                    </div>

                @endauth
            </div>


                <p class="mt-[17px] text-center text-[10px] text-slate-400">
                    PT. Equityworld Futures · Trillium Surabaya
                </p>

            </div>

        </div>
    </header>

    {{-- NOTIFIKASI BERHASIL --}}
    @if (session('success'))
        <div class="fixed left-1/2 top-24 z-[9999] w-[min(92vw,520px)] -translate-x-1/2 px-2">
            <div id="success-notification"
                role="status"
                aria-live="polite"
                class="flex items-center gap-3 rounded-xl border border-emerald-200 bg-white px-5 py-4 shadow-[0_10px_35px_rgba(15,23,42,0.15)] transition-all duration-500">

                <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-emerald-100 text-emerald-600">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path d="m5 12 4 4L19 6"
                            stroke-width="2.5"
                            stroke-linecap="round"
                            stroke-linejoin="round"/>
                    </svg>
                </div>

                <div>
                    <p class="text-sm font-bold text-slate-800">
                        Berhasil!
                    </p>
                    <p class="mt-1 text-sm text-slate-600">
                        {{ session('success') }}
                    </p>
                </div>
            </div>
        </div>
    @endif

    {{-- KONTEN UTAMA --}}
    <main id="main-content">
        @yield('content')
    </main>

{{-- FOOTER --}}
<footer class="bg-[#252f40] text-slate-300">

    {{-- FOOTER UTAMA --}}
    <div class="mx-auto grid max-w-[1280px] grid-cols-1 gap-7 px-6 py-7 sm:grid-cols-2 lg:grid-cols-[1.5fr_0.75fr_0.8fr_1fr] lg:gap-9 lg:px-8">
        {{-- KOLOM 1: PROFIL PERUSAHAAN --}}
        <div>

            {{-- LOGO DAN IDENTITAS --}}
            <a href="{{ route('home') }}"
            class="mb-3 inline-flex items-center gap-2.5">

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
            <p class="max-w-[340px] text-[11px] leading-[1.6] text-slate-400">
                PT Equityworld Futures adalah perusahaan pialang berjangka
                resmi yang berkomitmen memberikan pelayanan transaksi
                terbaik dan terpercaya di Indonesia.
            </p>

            {{-- MEDIA SOSIAL --}}
            <div class="mt-3 flex items-center gap-2">

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

            <h3 class="mb-3 text-[10px] font-extrabold tracking-wide text-blue-400">
                NAVIGASI
            </h3>

            <div class="flex flex-col gap-2 text-[10px] text-slate-400">

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

            <div class="flex flex-col gap-2.5 text-[10px] leading-[1.6] text-slate-400">

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
    <div class="mx-auto max-w-[1280px] px-6 lg:px-8">
        <div class="border-t border-slate-600/30"></div>
    </div>

    {{-- PERINGATAN RISIKO --}}
    <div class="mx-auto max-w-[1280px] px-6 py-3 lg:px-8">

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

        <div class="mx-auto flex max-w-[1280px] flex-col justify-between gap-2 px-6 py-3 text-[10px] text-slate-500 sm:flex-row sm:items-center lg:px-8">

            <p>
                © {{ date('Y') }} PT Equityworld Futures.
                Hak Cipta Dilindungi Undang-Undang.
            </p>
        </div>

    </div>

</footer>
@include('auth.popup')

<script>
document.addEventListener('DOMContentLoaded', function () {
    const notification = document.getElementById('success-notification');

    if (!notification) return;

    setTimeout(function () {
        notification.classList.add('opacity-0', '-translate-y-2');

        setTimeout(function () {
            notification.remove();
        }, 500);
    }, 7000);
});
</script>

@stack('scripts')

</body>
</html>