
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Portal Pelamar | PT Equityworld Futures')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="min-h-screen bg-[#F5F3EF] font-sans text-[#142943] antialiased">

    {{-- ==========================================
         HEADER KHUSUS PORTAL PELAMAR
    =========================================== --}}

    <header class="sticky top-0 z-50 border-b border-slate-200 bg-white">

        <div class="mx-auto flex min-h-[68px] max-w-[1440px] items-center justify-between gap-4 px-4 lg:px-7">

            {{-- LOGO --}}

            <a href="{{ route('pelamar.dashboard') }}"
               class="flex shrink-0 items-center gap-2.5">

                <div class="flex h-10 w-10 items-center justify-center rounded-full bg-orange-50">

                    <svg class="h-9 w-9 text-orange-500"
                         viewBox="0 0 40 40"
                         fill="none">

                        <circle cx="20" cy="20" r="15"
                                stroke="currentColor"
                                stroke-width="3"/>

                        <ellipse cx="20" cy="20" rx="7" ry="15"
                                 stroke="currentColor"
                                 stroke-width="1.5"/>

                        <path d="M5 20h30M9 11h22M9 29h22"
                              stroke="currentColor"
                              stroke-width="1.5"/>

                    </svg>

                </div>

                <div class="leading-tight">

                    <h1 class="text-sm font-extrabold text-[#142943] sm:text-base">
                        PT. Equityworld <span class="text-orange-500">Futures</span>
                    </h1>

                    <p class="mt-1 text-[9px] font-bold tracking-[0.18em] text-slate-500">
                        TRILLIUM SURABAYA
                    </p>

                </div>

            </a>


            {{-- NAVIGASI TENGAH --}}

            <nav class="hidden items-center rounded-lg bg-slate-100 p-1 sm:flex">

                <a href="{{ route('careers') }}"
                   class="rounded-md bg-[#102B4A] px-5 py-2 text-[11px] font-bold text-white transition">
                    Lowongan
                </a>

                <a href="#status-lamaran"
                   class="rounded-md px-5 py-2 text-[11px] font-semibold text-slate-600 transition hover:bg-white hover:text-[#102B4A]">
                    Status Lamaran
                </a>

            </nav>


            {{-- PROFIL DAN AKSI --}}

            <div class="flex shrink-0 items-center gap-3">

                <a href="{{ route('home') }}"
                   class="hidden text-[10px] font-semibold text-slate-500 transition hover:text-orange-500 md:block">
                    Ke Web Utama ↗
                </a>

                <div class="hidden h-7 w-px bg-slate-200 md:block"></div>

                {{-- PROFIL PELAMAR --}}

                <div class="flex items-center gap-2">

                    <div class="flex h-8 w-8 items-center justify-center rounded-full bg-[#102B4A] text-xs font-bold text-white">

                        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}

                    </div>

                    <div class="hidden leading-tight sm:block">

                        <p class="max-w-[125px] truncate text-[10px] font-bold text-[#142943]">
                            {{ auth()->user()->name }}
                        </p>

                        <p class="mt-0.5 text-[9px] text-slate-500">
                            Kandidat Pelamar
                        </p>

                    </div>

                </div>

                {{-- LOGOUT --}}

                <form action="{{ route('logout') }}" method="POST">

                    @csrf

                    <button type="submit"
                            title="Logout"
                            aria-label="Logout"
                            class="flex h-8 w-8 items-center justify-center rounded-lg text-slate-500 transition hover:bg-red-50 hover:text-red-500">

                        <svg class="h-4 w-4"
                             fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24">

                            <path d="M10 17l5-5-5-5M15 12H3m9-9h7a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-7"
                                  stroke-width="1.8"
                                  stroke-linecap="round"
                                  stroke-linejoin="round"/>

                        </svg>

                    </button>

                </form>

            </div>

        </div>


        {{-- NAVIGASI MOBILE --}}

        <div class="border-t border-slate-100 px-4 py-2 sm:hidden">

            <div class="flex items-center justify-center gap-3">

                <a href="{{ route('careers') }}"
                   class="rounded-md bg-[#102B4A] px-5 py-2 text-[10px] font-bold text-white">
                    Lowongan
                </a>

                <a href="#status-lamaran"
                   class="rounded-md px-5 py-2 text-[10px] font-semibold text-slate-600">
                    Status Lamaran
                </a>

                <a href="{{ route('home') }}"
                   class="text-[10px] font-semibold text-orange-500">
                    Web Utama
                </a>

            </div>

        </div>

    </header>


    {{-- ==========================================
         KONTEN HALAMAN PELAMAR
    =========================================== --}}

    <main class="min-h-screen">

        @yield('content')

    </main>


    @stack('scripts')

</body>
</html>