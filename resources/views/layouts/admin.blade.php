
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
        class="fixed inset-0 z-40 hidden bg-slate-950/50">
    </div>

    <!-- SIDEBAR -->
    <aside id="adminSidebar"
        class="fixed inset-y-0 left-0 z-50 flex w-[260px] flex-col
            -translate-x-full transition-transform duration-300 ease-in-out
            bg-[#080f20] text-white">

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
                <svg class="h-5 w-5 shrink-0" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="1.7"
                    stroke-linecap="round" stroke-linejoin="round">
                    <rect x="3" y="3" width="7" height="7" rx="1"/>
                    <rect x="14" y="3" width="7" height="7" rx="1"/>
                    <rect x="3" y="14" width="7" height="7" rx="1"/>
                    <rect x="14" y="14" width="7" height="7" rx="1"/>
                </svg>
                Dashboard Admin
            </a>

            <a href="#" class="sidebar-link">
                <svg class="h-5 w-5 shrink-0" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="1.7"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path d="M16 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                    <circle cx="10" cy="7" r="4"/>
                    <path d="M20 21v-2a4 4 0 0 0-3-3.87"/>
                    <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
                </svg>
                User Management
            </a>

            <a href="#" class="sidebar-link">
                <svg class="h-5 w-5 shrink-0" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="1.7"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path d="m12 3 9 5-9 5-9-5 9-5Z"/>
                    <path d="m3 12 9 5 9-5"/>
                    <path d="m3 16 9 5 9-5"/>
                </svg>
                Role Management (RBAC)
            </a>

            <a href="#" class="sidebar-link">
                <svg class="h-5 w-5 shrink-0" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="1.7"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path d="M16 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                    <circle cx="10" cy="7" r="4"/>
                    <path d="M20 8v6"/>
                    <path d="M17 11h6"/>
                </svg>
                Data Pelamar (Staff & Magang)
            </a>

            <!-- Audit -->
            <p class="mb-3 mt-7 px-3 text-[9px] font-bold uppercase tracking-widest text-slate-500">
                Audit & Keamanan
            </p>

            <a href="#" class="sidebar-link">
                <svg class="h-5 w-5 shrink-0" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="1.7"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path d="M4 5h16M4 12h16M4 19h16"/>
                    <circle cx="8" cy="5" r="1"/>
                    <circle cx="16" cy="12" r="1"/>
                    <circle cx="10" cy="19" r="1"/>
                </svg>
                Audit Log Sistem
            </a>

            <a href="#" class="sidebar-link">
                <svg class="h-5 w-5 shrink-0" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="1.7"
                    stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="12" r="9"/>
                    <path d="M12 7v5l3 2"/>
                </svg>
                Login Activity Monitor
            </a>

            <a href="#" class="sidebar-link">
                <svg class="h-5 w-5 shrink-0" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="1.7"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path d="M12 22v-5"/>
                    <path d="M9 8a3 3 0 1 1 6 0c0 2-3 3-3 5"/>
                    <path d="M5 13a3 3 0 1 1 3 4"/>
                    <path d="M19 13a3 3 0 1 0-3 4"/>
                    <path d="M12 3v1"/>
                </svg>
                Security Management
            </a>

        </nav>
        
<!-- Profil Admin -->
<div class="border-t border-slate-200 bg-white px-3 py-2">

    <!-- Frame Profil -->
    <div class="inline-flex w-fit max-w-full items-center gap-3 rounded-xl bg-slate-50 px-3 py-2.5">

        <!-- Avatar -->
        <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg bg-blue-600 text-xs font-bold text-white">
            AD
        </div>

        <!-- Informasi Admin -->
        <div class="min-w-0 flex-1">
            <p class="truncate text-xs font-semibold text-slate-800">
                Administrator
            </p>
            <p class="mt-1 text-[10px] text-slate-500">
                Super Administrator
            </p>
        </div>

        <!-- Ikon Setting -->
        <button type="button"
                aria-label="Pengaturan profil"
                class="flex h-8 w-8 shrink-0 items-center justify-center border-0 bg-transparent p-0 text-blue-600 shadow-none outline-none hover:bg-transparent hover:text-blue-700 focus:outline-none focus:ring-0">
            <svg xmlns="http://www.w3.org/2000/svg"
                class="h-5 w-5"
                viewBox="0 0 24 24"
                fill="currentColor">

                <g>
                    <circle cx="12" cy="12" r="8.5"/>

                    <g>
                        <rect x="9" y="1" width="6" height="6" rx="1.8"/>
                        <rect x="9" y="1" width="6" height="6" rx="1.8" transform="rotate(45 12 12)"/>
                        <rect x="9" y="1" width="6" height="6" rx="1.8" transform="rotate(90 12 12)"/>
                        <rect x="9" y="1" width="6" height="6" rx="1.8" transform="rotate(135 12 12)"/>
                        <rect x="9" y="1" width="6" height="6" rx="1.8" transform="rotate(180 12 12)"/>
                        <rect x="9" y="1" width="6" height="6" rx="1.8" transform="rotate(225 12 12)"/>
                        <rect x="9" y="1" width="6" height="6" rx="1.8" transform="rotate(270 12 12)"/>
                        <rect x="9" y="1" width="6" height="6" rx="1.8" transform="rotate(315 12 12)"/>
                    </g>
                </g>

                <circle cx="12" cy="12" r="3.5" fill="#f8fafc"/>
            </svg>
        </button>

    </div>
</div>

    </aside>

    <!-- MAIN AREA -->
    <div id="adminMain" class="min-h-screen w-full">

        <!-- NAVBAR -->
        <header class="sticky top-0 z-30 flex h-[68px] items-center justify-between bg-white px-4 shadow-sm md:px-7">

            <div class="flex items-center gap-4">

                <button type="button"
                        id="sidebarToggle"
                        aria-label="Buka atau tutup sidebar"
                        aria-expanded="false"
                        class="flex h-9 w-9 items-center justify-center
                            rounded-lg border border-solid border-slate-400
                            bg-slate-100 text-slate-700
                            ring-0 ring-offset-0 shadow-none
                            outline-none transition
                            hover:bg-slate-200
                            focus:border-slate-400 focus:ring-0 focus:ring-offset-0
                            focus:outline-none">
                    ☰
                </button>

                <div>
                    <h2 class="text-sm font-bold text-slate-800">
                        @yield('page-title', 'Dashboard Admin')
                    </h2>
                    <p class="hidden text-[10px] font-medium text-orange-500 sm:block">
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
        <main class="p-4 md:p-6 lg:p-7">

            @yield('content')

        </main>

        <!-- FOOTER -->
        <footer class="px-4 py-3 text-center text-[10px] text-slate-400">
            © {{ date('Y') }} PT. Equityworld Futures. All Rights Reserved.
        </footer>

    </div>

    @stack('scripts')

    <script>   
    document.addEventListener('DOMContentLoaded', function () {
        const sidebar = document.getElementById('adminSidebar');
        const toggle = document.getElementById('sidebarToggle');
        const overlay = document.getElementById('sidebarOverlay');

        function openSidebar() {
            sidebar.classList.add('is-open');
            overlay.classList.remove('hidden');
            toggle.setAttribute('aria-expanded', 'true');
        }

        function closeSidebar() {
            sidebar.classList.remove('is-open');
            overlay.classList.add('hidden');
            toggle.setAttribute('aria-expanded', 'false');
        }

        // Kondisi awal: sidebar tertutup
        closeSidebar();

        toggle.addEventListener('click', function () {
            if (sidebar.classList.contains('is-open')) {
                closeSidebar();
            } else {
                openSidebar();
            }
        });

        overlay.addEventListener('click', closeSidebar);

        document.addEventListener('keydown', function (event) {
            if (event.key === 'Escape') {
                closeSidebar();
            }
        });
    });
    </script>

</body>
</html>
