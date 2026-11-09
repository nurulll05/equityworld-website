
import './bootstrap';

document.addEventListener('DOMContentLoaded', () => {
    
    // 1. MENU HAMBURGER MOBILE
    const menuToggle = document.getElementById('ewf-mobile-toggle');
    const mobilePanel = document.getElementById('ewf-mobile-panel');

    if (menuToggle && mobilePanel) {
        const iconOpen = menuToggle.querySelector('.icon-open');
        const iconClose = menuToggle.querySelector('.icon-close');

        const closeMenu = () => {
            mobilePanel.hidden = true;
            mobilePanel.classList.add('hidden');

            menuToggle.setAttribute('aria-expanded', 'false');
            menuToggle.setAttribute('aria-label', 'Buka menu navigasi');

            iconOpen?.classList.remove('hidden');
            iconClose?.classList.add('hidden');
        };

        const openMenu = () => {
            mobilePanel.hidden = false;
            mobilePanel.classList.remove('hidden');

            menuToggle.setAttribute('aria-expanded', 'true');
            menuToggle.setAttribute('aria-label', 'Tutup menu navigasi');

            iconOpen?.classList.add('hidden');
            iconClose?.classList.remove('hidden');
        };

        menuToggle.addEventListener('click', () => {
            const isOpen =
                menuToggle.getAttribute('aria-expanded') === 'true';

            isOpen ? closeMenu() : openMenu();
        });

        mobilePanel.querySelectorAll('a').forEach((link) => {
            link.addEventListener('click', closeMenu);
        });

        document.addEventListener('click', (event) => {
            if (
                !mobilePanel.hidden &&
                !mobilePanel.contains(event.target) &&
                !menuToggle.contains(event.target)
            ) {
                closeMenu();
            }
        });

        document.addEventListener('keydown', (event) => {
            if (event.key === 'Escape') {
                closeMenu();
                menuToggle.focus();
            }
        });

        window.addEventListener('resize', () => {
            if (window.innerWidth >= 1200) {
                closeMenu();
            }
        });
    }

        // 2. DROPDOWN LOGIN DESKTOP
    const loginToggle = document.getElementById('ewf-login-toggle');
    const loginDropdown = document.getElementById('ewf-login-dropdown');

    if (loginToggle && loginDropdown) {
        const loginWrapper = loginToggle.closest('.ewf-desktop-login');

        const closeLoginDropdown = () => {
            loginDropdown.classList.add('hidden');
            loginToggle.setAttribute('aria-expanded', 'false');
        };

        const openLoginDropdown = () => {
            loginDropdown.classList.remove('hidden');
            loginToggle.setAttribute('aria-expanded', 'true');
        };

        loginToggle.addEventListener('click', (event) => {
            event.stopPropagation();

            const isOpen =
                loginToggle.getAttribute('aria-expanded') === 'true';

            isOpen ? closeLoginDropdown() : openLoginDropdown();
        });

        document.addEventListener('click', (event) => {
            if (
                loginWrapper &&
                !loginWrapper.contains(event.target)
            ) {
                closeLoginDropdown();
            }
        });

        document.addEventListener('keydown', (event) => {
            if (event.key === 'Escape') {
                closeLoginDropdown();
                loginToggle.focus();
            }
        });

        window.addEventListener('resize', () => {
            if (window.innerWidth < 1200) {
                closeLoginDropdown();
            }
        });
    }

    // 3. EFEK HEADER SAAT HALAMAN DIGULIR
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

    // 4. ANIMASI ELEMEN SAAT MUNCUL
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

    // 5. TAHUN OTOMATIS PADA COPYRIGHT
    document.querySelectorAll('[data-current-year]').forEach((element) => {
        element.textContent = new Date().getFullYear();
    });

    // 6. TAB STAFF KANTOR DAN PROGRAM MAGANG
    const careerTabs = document.querySelectorAll('[data-career-tab]');
    const staffPanel = document.getElementById('career-staff-panel');
    const internshipPanel = document.getElementById('career-internship-panel');
    const indicator = document.getElementById('career-tab-indicator');

    if (
        careerTabs.length > 0 &&
        staffPanel &&
        internshipPanel &&
        indicator
    ) {
        function showCareerTab(selectedTab) {
            const showStaff = selectedTab === 'staff';

            // Tampilkan panel yang dipilih
            staffPanel.hidden = !showStaff;
            staffPanel.classList.toggle('hidden', !showStaff);

            internshipPanel.hidden = showStaff;
            internshipPanel.classList.toggle('hidden', showStaff);

            // Warna dan posisi indikator
            indicator.classList.toggle('bg-[#101a30]', showStaff);
            indicator.classList.toggle('bg-orange-500', !showStaff);
            indicator.classList.toggle('translate-x-full', !showStaff);

            // Tampilan tombol tab
            careerTabs.forEach((tab) => {
                const isActive = tab.dataset.careerTab === selectedTab;

                tab.setAttribute('aria-selected', String(isActive));
                tab.classList.toggle('text-white', isActive);
                tab.classList.toggle('text-slate-600', !isActive);
                tab.classList.toggle('font-bold', isActive);
                tab.classList.toggle('font-semibold', !isActive);
            });
        }

        careerTabs.forEach((tab) => {
            tab.addEventListener('click', () => {
                showCareerTab(tab.dataset.careerTab);
            });
        });

        showCareerTab('staff');
    }
});

// HERO SECTION - INDIKATOR KUALITAS KONEKSI
function initConnectionIndicator() {
    const indicator = document.getElementById('connection-indicator');

    if (!indicator) return;

    function updateConnectionStatus() {
        const connection =
            navigator.connection ||
            navigator.mozConnection ||
            navigator.webkitConnection;

        let color = 'bg-emerald-400';
        let shadow = 'shadow-[0_0_12px_rgba(52,211,153,0.8)]';
        let status = 'Koneksi lancar';

        if (!navigator.onLine) {
            color = 'bg-red-500';
            shadow = 'shadow-[0_0_12px_rgba(239,68,68,0.8)]';
            status = 'Tidak ada koneksi internet';
        } else if (connection) {
            const type = connection.effectiveType;
            const speed = connection.downlink;

            if (
                type === 'slow-2g' ||
                type === '2g' ||
                (typeof speed === 'number' && speed < 1)
            ) {
                color = 'bg-red-500';
                shadow = 'shadow-[0_0_12px_rgba(239,68,68,0.8)]';
                status = 'Koneksi lambat';
            } else if (
                type === '3g' ||
                (typeof speed === 'number' && speed < 5)
            ) {
                color = 'bg-orange-400';
                shadow = 'shadow-[0_0_12px_rgba(251,146,60,0.8)]';
                status = 'Koneksi sedang';
            }
        }

        indicator.className =
            `h-2.5 w-2.5 shrink-0 rounded-full animate-pulse ${color} ${shadow}`;

        indicator.setAttribute('aria-label', status);
        indicator.setAttribute('title', status);
    }

    updateConnectionStatus();

    window.addEventListener('online', updateConnectionStatus);
    window.addEventListener('offline', updateConnectionStatus);

    const connection =
        navigator.connection ||
        navigator.mozConnection ||
        navigator.webkitConnection;

    if (connection) {
        connection.addEventListener('change', updateConnectionStatus);
    }
}

document.addEventListener('DOMContentLoaded', initConnectionIndicator);