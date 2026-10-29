
import './bootstrap';

document.addEventListener('DOMContentLoaded', () => {
    // ==========================================
    // 1. MENU NAVIGASI MOBILE
    // ==========================================
    const menuToggle = document.querySelector('.menu-toggle');
    const navigation = document.querySelector('.navigation');

    if (menuToggle && navigation) {
        const closeMenu = () => {
            navigation.classList.remove('is-open');
            menuToggle.classList.remove('is-active');
            menuToggle.setAttribute('aria-expanded', 'false');
            menuToggle.setAttribute('aria-label', 'Buka menu navigasi');
        };

        const openMenu = () => {
            navigation.classList.add('is-open');
            menuToggle.classList.add('is-active');
            menuToggle.setAttribute('aria-expanded', 'true');
            menuToggle.setAttribute('aria-label', 'Tutup menu navigasi');
        };

        menuToggle.addEventListener('click', () => {
            const isOpen =
                menuToggle.getAttribute('aria-expanded') === 'true';

            if (isOpen) {
                closeMenu();
            } else {
                openMenu();
            }
        });

        // Tutup menu setelah pengguna memilih tautan.
        navigation.querySelectorAll('a').forEach((link) => {
            link.addEventListener('click', closeMenu);
        });

        // Tutup menu jika pengguna mengeklik area di luar navigasi.
        document.addEventListener('click', (event) => {
            if (
                !navigation.contains(event.target) &&
                !menuToggle.contains(event.target)
            ) {
                closeMenu();
            }
        });

        // Tutup menu dengan tombol Escape.
        document.addEventListener('keydown', (event) => {
            if (event.key === 'Escape') {
                closeMenu();
                menuToggle.focus();
            }
        });

        // Pastikan menu kembali normal saat ukuran layar berubah.
        window.addEventListener('resize', () => {
            if (window.innerWidth > 760) {
                closeMenu();
            }
        });
    }

    // ==========================================
    // 2. EFEK HEADER SAAT HALAMAN DIGULIR
    // ==========================================
    const header = document.querySelector('.site-header');

    if (header) {
        const updateHeader = () => {
            header.classList.toggle(
                'is-scrolled',
                window.scrollY > 20
            );
        };

        updateHeader();

        window.addEventListener('scroll', updateHeader, {
            passive: true,
        });
    }

    // ==========================================
    // 3. ANIMASI ELEMEN SAAT MUNCUL
    // ==========================================
    const animatedElements = document.querySelectorAll(
        '[data-animate]'
    );

    if (
        animatedElements.length > 0 &&
        'IntersectionObserver' in window
    ) {
        const observer = new IntersectionObserver(
            (entries, currentObserver) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('is-visible');
                        currentObserver.unobserve(entry.target);
                    }
                });
            },
            {
                threshold: 0.12,
                rootMargin: '0px 0px -30px 0px',
            }
        );

        animatedElements.forEach((element) => {
            observer.observe(element);
        });
    } else {
        animatedElements.forEach((element) => {
            element.classList.add('is-visible');
        });
    }

    // ==========================================
    // 4. TAHUN OTOMATIS PADA COPYRIGHT
    // ==========================================
    document.querySelectorAll('[data-current-year]').forEach((element) => {
        element.textContent = new Date().getFullYear();
    });
});
