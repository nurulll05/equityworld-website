<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description"
          content="@yield('meta_description', 'PT Equityworld Futures - Informasi perusahaan, layanan, dan peluang karier.')">

    <title>@yield('title', 'PT Equityworld Futures')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

    {{-- NAVBAR --}}
    <header class="site-header">
        <div class="container navbar">

            <a href="{{ url('/') }}" class="brand" aria-label="EWF Beranda">
                <img
                    src="{{ asset('images/logo-ewf.png') }}"
                    alt="Logo Equityworld Futures"
                    class="brand-logo"
                    onerror="this.style.display='none'; this.nextElementSibling.style.display='block';"
                >

                <span class="brand-fallback">
                    <strong>EWF</strong>
                    <small>EQUITYWORLD FUTURES</small>
                </span>
            </a>

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

            <nav class="navigation" id="main-navigation">
                <a href="{{ url('/') }}"
                   class="{{ request()->is('/') ? 'active' : '' }}">
                    Beranda
                </a>

                <a href="{{ url('/tentang-kami') }}"
                   class="{{ request()->is('tentang-kami*') ? 'active' : '' }}">
                    Tentang Kami
                </a>

                <a href="{{ url('/legalitas') }}"
                   class="{{ request()->is('legalitas*') ? 'active' : '' }}">
                    Legalitas
                </a>

                <a href="{{ url('/karier') }}"
                   class="{{ request()->is('karier*') ? 'active' : '' }}">
                    Karier
                </a>

                <a href="{{ url('/berita') }}"
                   class="{{ request()->is('berita*') ? 'active' : '' }}">
                    Berita
                </a>

                <a href="{{ url('/kontak') }}"
                   class="{{ request()->is('kontak*') ? 'active' : '' }}">
                    Kontak
                </a>

                <a href="{{ url('/registrasi') }}" class="nav-cta">
                    Registrasi
                    <span aria-hidden="true">↗</span>
                </a>
            </nav>

        </div>
    </header>

    {{-- KONTEN HALAMAN --}}
    <main>
        @yield('content')
    </main>

    {{-- FOOTER --}}
    <footer class="site-footer">
        <div class="container footer-grid">

            <div class="footer-about">
                <a href="{{ url('/') }}" class="brand footer-brand">
                    <img
                        src="{{ asset('images/logo-ewf.png') }}"
                        alt="Logo Equityworld Futures"
                        class="brand-logo"
                        onerror="this.style.display='none'; this.nextElementSibling.style.display='block';"
                    >

                    <span class="brand-fallback">
                        <strong>EWF</strong>
                        <small>EQUITYWORLD FUTURES</small>
                    </span>
                </a>

                <p>
                    PT Equityworld Futures. Temukan informasi perusahaan,
                    layanan, dan peluang untuk berkembang bersama kami.
                </p>
            </div>

            <div class="footer-column">
                <h3>Jelajahi</h3>
                <a href="{{ url('/') }}">Beranda</a>
                <a href="{{ url('/tentang-kami') }}">Tentang Kami</a>
                <a href="{{ url('/legalitas') }}">Legalitas</a>
                <a href="{{ url('/berita') }}">Berita</a>
            </div>

            <div class="footer-column">
                <h3>Karier</h3>
                <a href="{{ url('/karier') }}">Lowongan Kerja</a>
                <a href="{{ url('/magang') }}">Program Magang</a>
                <a href="{{ url('/registrasi') }}">Registrasi</a>
            </div>

            <div class="footer-column">
                <h3>Hubungi Kami</h3>
                <p>Informasi alamat, telepon, dan email kantor dapat ditambahkan di sini.</p>
                <a href="{{ url('/kontak') }}">Informasi Kontak →</a>
            </div>

        </div>

        <div class="container footer-bottom">
            <p>
                &copy; {{ date('Y') }} PT Equityworld Futures.
                Seluruh hak cipta dilindungi.
            </p>

            <a href="{{ url('/kebijakan-privasi') }}">
                Kebijakan Privasi
            </a>
        </div>
    </footer>

</body>
</html>