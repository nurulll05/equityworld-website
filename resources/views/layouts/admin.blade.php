
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

            <a href="{{ route('admin.users.index') }}"
            class="sidebar-link {{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
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

            <a href="{{ route('admin.roles.index') }}"
                class="sidebar-link {{ request()->routeIs('admin.roles.*') ? 'active' : '' }}">

                <svg class="h-5 w-5 shrink-0" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="1.7"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path d="m12 3 9 5-9 5-9-5 9-5Z"/>
                    <path d="m3 12 9 5 9-5"/>
                    <path d="m3 16 9 5 9-5"/>
                </svg>

                Role Management (RBAC)
            </a>

            @if(auth()->user()->hasPermission('applications.view'))
                <a href="{{ route('admin.applicants.index') }}"
                    class="sidebar-link {{ request()->routeIs('admin.applicants.*') ? 'active' : '' }}">

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
            @endif

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
        
    <!-- PROFIL ADMIN -->
    <div class="relative border-t border-slate-200 bg-white px-3 py-3">

        <div class="relative">

            <!-- DROPDOWN MENU -->
            <div id="adminProfileDropdown"
                class="absolute bottom-full left-0 right-0 z-[60] mb-3 hidden rounded-xl border border-slate-200 bg-white p-2 text-slate-800 shadow-xl">

                <!-- INFORMASI AKUN -->
                <a href="{{ route('admin.profile') }}"
                class="flex items-center gap-3 rounded-lg px-3 py-3 text-sm text-slate-700 transition hover:bg-slate-100">

                    <svg class="h-5 w-5" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor"
                        stroke-width="1.8">
                        <circle cx="12" cy="8" r="4"/>
                        <path d="M5 21a7 7 0 0 1 14 0"/>
                    </svg>

                    Informasi Akun
                </a>

                <!-- GANTI PASSWORD -->
                <a href="{{ route('admin.password') }}"
                class="flex items-center gap-3 rounded-lg px-3 py-3 text-sm text-slate-700 transition hover:bg-slate-100">

                    <svg class="h-5 w-5" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor"
                        stroke-width="1.8">
                        <rect x="3" y="11" width="18" height="11" rx="2"/>
                        <path d="M7 11V7a5 5 0 0 1 10 0v4"/>
                    </svg>

                    Ganti Password
                </a>

                <div class="my-1 border-t border-slate-100"></div>
              
            <!-- LOGOUT -->
            <form action="{{ route('logout') }}" method="POST" class="px-2 py-1">
                @csrf

                <button type="submit"
                    class="mx-auto flex w-fit items-center justify-center gap-2 rounded-lg border-0 bg-red-50 px-5 py-2 text-xs font-semibold text-red-600 shadow-none transition hover:bg-red-100">

                    <svg class="h-4 w-4" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor"
                        stroke-width="1.8"
                        stroke-linecap="round"
                        stroke-linejoin="round">
                        <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/>
                        <path d="M16 17l5-5-5-5"/>
                        <path d="M21 12H9"/>
                    </svg>

                    Logout
                </button>
            </form>

            </div>

            <!-- FRAME PROFIL -->
            <div class="flex w-full items-center gap-3 rounded-xl bg-slate-50 px-3 py-2.5">

                <!-- AVATAR -->
                <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg bg-blue-600 text-xs font-bold text-white">
                    {{ strtoupper(substr(Auth::user()->name, 0, 2)) }}
                </div>

                <!-- INFORMASI USER -->
                <div class="min-w-0 flex-1">
                    <p class="truncate text-xs font-semibold text-slate-800">
                        {{ Auth::user()->name }}
                    </p>

                    <p class="mt-1 text-[10px] text-slate-500">
                        {{ Auth::user()->is_super_admin ? 'Super Administrator' : strtoupper(Auth::user()->role) }}
                    </p>
                </div>

                <!-- TOMBOL PENGATURAN -->
                <button type="button"
                        id="adminProfileToggle"
                        aria-label="Pengaturan profil"
                        aria-expanded="false"
                        class="flex h-8 w-8 shrink-0 items-center justify-center rounded-lg border-0 bg-transparent p-0 text-blue-600 shadow-none transition hover:bg-blue-50 hover:text-blue-700">

                    <svg class="h-5 w-5" viewBox="0 0 24 24"
                        fill="currentColor">
                        <path d="M19.14 12.94a7.5 7.5 0 0 0 0-1.88l2.03-1.58-2-3.46-2.4.97a7.5 7.5 0 0 0-1.63-.94L14.78 3h-4l-.36 3.05a7.5 7.5 0 0 0-1.63.94l-2.4-.97-2 3.46 2.03 1.58a7.5 7.5 0 0 0 0 1.88l-2.03 1.58 2 3.46 2.4-.97a7.5 7.5 0 0 0 1.63.94L10.78 21h4l.36-3.05a7.5 7.5 0 0 0 1.63-.94l2.4.97 2-3.46-2.03-1.58ZM12.78 15.5a3.5 3.5 0 1 1 0-7 3.5 3.5 0 0 1 0 7Z"/>
                    </svg>
                </button>

            </div>
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

        <!-- TOAST NOTIFICATION -->
        @if (session('success') || session('error'))
            <div id="adminToast"
                class="fixed left-1/2 top-5 z-[100] w-[calc(100%-2.5rem)] max-w-sm
                    -translate-x-1/2 rounded-xl border p-4 shadow-xl
                    flex items-start gap-3
                    transition-all duration-300
                    {{ session('success')
                        ? 'border-green-200 bg-white text-green-700'
                        : 'border-red-200 bg-white text-red-700' }}">

                <!-- ICON -->
                <div class="mt-0.5 shrink-0">
                    @if (session('success'))
                        <svg class="h-6 w-6" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor"
                            stroke-width="2">
                            <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/>
                            <path d="m9 11 3 3L22 4"/>
                        </svg>
                    @else
                        <svg class="h-6 w-6" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor"
                            stroke-width="2">
                            <circle cx="12" cy="12" r="10"/>
                            <path d="M12 8v4m0 4h.01"/>
                        </svg>
                    @endif
                </div>

                <!-- PESAN -->
                <div class="min-w-0 flex-1">
                    <p class="text-sm font-bold">
                        {{ session('success') ? 'Berhasil' : 'Akses Ditolak' }}
                    </p>

                    <p class="mt-1 text-sm text-slate-600">
                        {{ session('success') ?? session('error') }}
                    </p>
                </div>
            </div>
        @endif

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

            // TOAST NOTIFICATION
            const adminToast = document.getElementById('adminToast');

            if (adminToast) {
                setTimeout(() => {
                    adminToast.classList.add('opacity-0', '-translate-y-3');

                    setTimeout(() => {
                        adminToast.remove();
                    }, 300);
                }, 4000);
            }

            // SIDEBAR
            const sidebar = document.getElementById('adminSidebar');
            const toggle = document.getElementById('sidebarToggle');
            const overlay = document.getElementById('sidebarOverlay');

            if (sidebar && toggle && overlay) {

                function openSidebar() {
                    sidebar.style.transform = 'translateX(0)';
                    overlay.classList.remove('hidden');
                    toggle.setAttribute('aria-expanded', 'true');
                }

                function closeSidebar() {
                    sidebar.style.transform = 'translateX(-100%)';
                    overlay.classList.add('hidden');
                    toggle.setAttribute('aria-expanded', 'false');
                }

                closeSidebar();

                toggle.addEventListener('click', function () {
                    const isOpen = toggle.getAttribute('aria-expanded') === 'true';

                    if (isOpen) {
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
            }

            // DROPDOWN PROFIL ADMIN
            const profileToggle = document.getElementById('adminProfileToggle');
            const profileDropdown = document.getElementById('adminProfileDropdown');

            if (profileToggle && profileDropdown) {

                profileToggle.addEventListener('click', function (event) {
                    event.stopPropagation();

                    const isOpen = !profileDropdown.classList.contains('hidden');

                    profileDropdown.classList.toggle('hidden', isOpen);
                    profileToggle.setAttribute('aria-expanded', String(!isOpen));
                });

                document.addEventListener('click', function (event) {
                    if (
                        !profileDropdown.contains(event.target) &&
                        !profileToggle.contains(event.target)
                    ) {
                        profileDropdown.classList.add('hidden');
                        profileToggle.setAttribute('aria-expanded', 'false');
                    }
                });

                document.addEventListener('keydown', function (event) {
                    if (event.key === 'Escape') {
                        profileDropdown.classList.add('hidden');
                        profileToggle.setAttribute('aria-expanded', 'false');
                    }
                });
            }

        });
        </script>
    </body>
</html>