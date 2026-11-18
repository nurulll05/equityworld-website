
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Dashboard Admin') - Equityworld Futures</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @stack('styles')
</head>

<body class="min-h-screen bg-slate-100 text-slate-800">

    <!-- Overlay Mobile -->
    <div id="sidebarOverlay"
         class="fixed inset-0 z-40 hidden bg-slate-950/50 md:hidden">
    </div>

    <!-- SIDEBAR -->
    <aside id="adminSidebar"
       class="fixed inset-y-0 left-0 z-50 flex w-[260px] flex-col bg-[#080f20] text-white">

        <!-- Logo -->
        <div class="flex h-[68px] items-center gap-3 px-4">
            <img src="{{ asset('images/logo-ewf-transparent.png') }}"
                 alt="Logo Equityworld Futures"
                 class="h-10 w-10 object-contain">

            <div>
                <h1 class="text-xs font-bold">
                    PT. Equityworld Futures
                </h1>
                <p class="mt-1 text-[9px] font-semibold tracking-widest text-orange-400">
                    PORTAL ADMIN
                </p>
            </div>
        </div>

        <div class="mx-4 border-t border-white/10"></div>

        <!-- Menu -->
        <nav class="admin-sidebar-nav flex-1 overflow-y-auto px-3 py-4">

            <!-- Manajemen Operasional -->
            <p class="mb-3 mt-2 px-3 text-[9px] font-bold uppercase tracking-widest text-slate-500">
                Manajemen Operasional
            </p>

            <a href="{{ route('admin.dashboard') }}"
               class="sidebar-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <span>▦</span>
                Dashboard Admin
            </a>

            <a href="#" class="sidebar-link">
                <span>♟</span>
                User Management
            </a>

            <a href="#" class="sidebar-link">
                <span>♢</span>
                Role Management (RBAC)
            </a>

            <a href="#" class="sidebar-link">
                <span>▣</span>
                Data Pelamar (Staff & Magang)
            </a>


            <!-- Konten Website -->
            <p class="mb-3 mt-7 px-3 text-[9px] font-bold uppercase tracking-widest text-slate-500">
                Konten Website Utama
            </p>

            <a href="#" class="sidebar-link">
                <span>⌂</span>
                Beranda
            </a>

            <a href="#" class="sidebar-link">
                <span>▤</span>
                Tentang Kami
            </a>

            <a href="#" class="sidebar-link">
                <span>⚖</span>
                Pengelolaan Legalitas
            </a>

            <a href="#" class="sidebar-link">
                <span>▣</span>
                Pengelolaan Karier
            </a>

            <a href="#" class="sidebar-link">
                <span>▧</span>
                Pengelolaan Berita
            </a>


            <!-- Audit -->
            <p class="mb-3 mt-7 px-3 text-[9px] font-bold uppercase tracking-widest text-slate-500">
                Audit & Keamanan
            </p>

            <a href="#" class="sidebar-link">
                <span>☷</span>
                Audit Log Sistem
            </a>

            <a href="#" class="sidebar-link">
                <span>◷</span>
                Login Activity Monitor
            </a>

            <a href="#" class="sidebar-link">
                <span>♧</span>
                Security Management
            </a>

        </nav>

        <!-- Profil Admin -->
        <div class="border-t border-white/10 p-4">
            <div class="flex items-center gap-3">
                <div class="flex h-9 w-9 items-center justify-center rounded-full bg-blue-600 text-xs font-bold">
                    AD
                </div>

                <div class="min-w-0">
                    <p class="truncate text-xs font-semibold">
                        Administrator
                    </p>
                    <p class="text-[10px] text-slate-400">
                        Super Administrator
                    </p>
                </div>
            </div>
        </div>

    </aside>

    <!-- MAIN AREA -->
    <div id="adminMain" class="min-h-screen">

        <!-- NAVBAR -->
        <header class="sticky top-0 z-30 flex h-[68px] items-center justify-between bg-white px-4 shadow-sm md:px-7">

            <div class="flex items-center gap-4">

                <button type="button"
                        id="sidebarToggle"
                        aria-label="Buka atau tutup sidebar"
                        aria-expanded="false"
                        class="flex h-9 w-9 items-center justify-center rounded-lg bg-slate-100 text-lg text-slate-700 transition hover:bg-slate-200">
                    ☰
                </button>

                <div>
                    <h2 class="text-sm font-bold text-slate-800">
                        @yield('page-title', 'Dashboard Admin')
                    </h2>
                    <p class="hidden text-[10px] text-slate-400 sm:block">
                        PT. Equityworld Futures
                    </p>
                </div>

            </div>

            <div class="flex items-center gap-3">

                <a href="{{ route('admin.website.visual') }}"
                class="hidden items-center gap-2 rounded-full bg-orange-500 px-4 py-2 text-[11px] font-semibold text-white shadow-sm transition hover:bg-orange-600 sm:flex">
                    <span>🌐</span>
                    Pengelolaan Web Utama
                </a>

                <div class="flex h-9 w-9 items-center justify-center rounded-full bg-slate-100 text-sm md:hidden">
                    🌐
                </div>

            </div>

        </header>


        <!-- CONTENT -->
        <main class="min-h-[calc(100vh-120px)] p-4 md:p-6 lg:p-7">

            @yield('content')

        </main>


        <!-- FOOTER -->
        <footer class="px-6 py-4 text-center text-[10px] text-slate-400">
            © {{ date('Y') }} PT. Equityworld Futures. All Rights Reserved.
        </footer>

    </div>

    @stack('scripts')

</body>
</html>
