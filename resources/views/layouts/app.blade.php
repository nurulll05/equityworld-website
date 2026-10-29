
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

    {{-- CSS DESAIN EWF --}}
    <link
        rel="stylesheet"
        href="{{ asset('css/ewf.css') }}"
    >

    @stack('styles')
</head>

<body>

    {{-- =========================
         NAVBAR
    ========================== --}}
    <header class="site-header">
        <div class="container navbar">

            {{-- LOGO / WORDMARK --}}
            <a
                href="{{ route('home') }}"
                class="brand"
                aria-label="PT Equityworld Futures - Beranda"
            >
                <span class="brand-copy">
                    <strong>
                        PT. Equityworld
                        <em>Futures</em>
                    </strong>

                    <small>TRILLIUM SURABAYA</small>
                </span>
            </a>

            {{-- MENU MOBILE --}}
            <button
                class="menu-toggle"
                type="button"
                aria-label="Buka menu navigasi"
                aria-expanded="false"
                aria-controls="main-navigation"
            >
                <span></span>
                <span></span>
                <span></span>
            </button>

            {{-- NAVIGASI UTAMA --}}
            <nav
                class="navigation"
                id="main-navigation"
                aria-label="Navigasi utama"
            >

                <a
                    href="{{ route('home') }}"
                    class="{{ request()->routeIs('home') ? 'active' : '' }}"
                    @if(request()->routeIs('home'))
                        aria-current="page"
                    @endif
                >
                    Beranda
                </a>

                <a
                    href="{{ route('about') }}"
                    class="{{ request()->routeIs('about') ? 'active' : '' }}"
                    @if(request()->routeIs('about'))
                        aria-current="page"
                    @endif
                >
                    Tentang Kami
                </a>

                <a
                    href="{{ route('legality') }}"
                    class="{{ request()->routeIs('legality') ? 'active' : '' }}"
                    @if(request()->routeIs('legality'))
                        aria-current="page"
                    @endif
                >
                    Legalitas
                </a>

                <a
                    href="{{ route('careers') }}"
                    class="{{ request()->routeIs('careers') ? 'active' : '' }}"
                    @if(request()->routeIs('careers'))
                        aria-current="page"
                    @endif
                >
                    Karier
                </a>

                <a
                    href="{{ route('news') }}"
                    class="{{ request()->routeIs('news') ? 'active' : '' }}"
                    @if(request()->routeIs('news'))
                        aria-current="page"
                    @endif
                >
                    Berita
                </a>

                {{-- TOMBOL DAFTAR KARIER --}}
                <a
                    href="{{ route('careers') }}"
                    class="nav-cta"
                >
                    DAFTAR KARIER
                </a>

                {{-- REGISTRASI --}}
                <a
                    href="{{ route('registration') }}"
                    class="nav-register {{ request()->routeIs('registration') ? 'active' : '' }}"
                    @if(request()->routeIs('registration'))
                        aria-current="page"
                    @endif
                >
                    REGISTRASI
                    <span aria-hidden="true">⌄</span>
                </a>

            </nav>

        </div>
    </header>


    {{-- =========================
         KONTEN UTAMA
    ========================== --}}
    <main id="main-content">
        @yield('content')
    </main>


    {{-- =========================
         FOOTER
    ========================== --}}
    <footer class="site-footer">

        <div class="container footer-grid">

            {{-- INFORMASI PERUSAHAAN --}}
            <div class="footer-about">

                <a
                    href="{{ route('home') }}"
                    class="brand footer-brand"
                    aria-label="PT Equityworld Futures - Beranda"
                >
                    <span class="brand-copy">
                        <strong>
                            PT. Equityworld
                            <em>Futures</em>
                        </strong>

                        <small>TRILLIUM SURABAYA</small>
                    </span>
                </a>

                <p>
                    PT Equityworld Futures menyediakan informasi
                    perusahaan, legalitas, berita, edukasi, serta
                    peluang karier bagi masyarakat.
                </p>

                {{-- MEDIA SOSIAL --}}
                <div class="social-links">
                    <a href="#" aria-label="Facebook">f</a>
                    <a href="#" aria-label="Instagram">◎</a>
                    <a href="#" aria-label="LinkedIn">in</a>
                    <a href="#" aria-label="YouTube">▶</a>
                </div>

            </div>


            {{-- NAVIGASI --}}
            <div class="footer-column">

                <h3>NAVIGASI</h3>

                <a href="{{ route('home') }}">
                    Beranda
                </a>

                <a href="{{ route('about') }}">
                    Tentang Kami
                </a>

                <a href="{{ route('legality') }}">
                    Legalitas &amp; Izin
                </a>

                <a href="{{ route('careers') }}">
                    Lowongan Karier
                </a>

                <a href="{{ route('news') }}">
                    Berita &amp; Artikel
                </a>

            </div>


            {{-- REGULATOR --}}
            <div class="footer-column">

                <h3>REGULATOR</h3>

                <a href="{{ route('legality') }}">
                    BAPPEBTI
                </a>

                <a href="{{ route('legality') }}">
                    Bursa Berjangka
                </a>

                <a href="{{ route('legality') }}">
                    Lembaga Kliring
                </a>

                <a href="{{ route('legality') }}">
                    Peraturan Perdagangan
                </a>

            </div>


            {{-- KONTAK --}}
            <div class="footer-column">

                <h3>KANTOR PUSAT</h3>

                <p>
                    Silakan kunjungi halaman kontak untuk mendapatkan
                    informasi alamat kantor dan saluran komunikasi
                    resmi perusahaan.
                </p>

                <a href="{{ route('contact') }}">
                    Hubungi Kami
                    <span aria-hidden="true">→</span>
                </a>

            </div>

        </div>


        {{-- PERINGATAN RISIKO --}}
        <div class="container footer-risk">
            <strong>PERINGATAN RISIKO:</strong>

            Perdagangan berjangka memiliki risiko yang tinggi dan
            mungkin tidak cocok untuk semua investor. Pelajari
            karakteristik, mekanisme, serta risiko sebelum
            mengambil keputusan transaksi.
        </div>


        {{-- COPYRIGHT --}}
        <div class="container footer-bottom">

            <p>
                &copy; {{ date('Y') }}
                PT Equityworld Futures.
                Seluruh hak cipta dilindungi.
            </p>

            <a href="{{ route('contact') }}">
                Informasi Kontak
            </a>

        </div>

    </footer>


    {{-- JAVASCRIPT MENU MOBILE --}}
    <script src="{{ asset('js/ewf.js') }}" defer></script>

    @stack('scripts')

</body>
</html>
