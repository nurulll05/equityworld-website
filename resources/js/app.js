import './bootstrap';
document.addEventListener('DOMContentLoaded', () => {
    const menuButton = document.querySelector('.menu-toggle');
    const navigation = document.querySelector('.navigation');

    if (!menuButton || !navigation) {
        return;
    }

    menuButton.addEventListener('click', () => {
        const isOpen = navigation.classList.toggle('is-open');

        menuButton.setAttribute('aria-expanded', String(isOpen));
        menuButton.setAttribute(
            'aria-label',
            isOpen ? 'Tutup menu navigasi' : 'Buka menu navigasi'
        );
    });

    navigation.querySelectorAll('a').forEach((link) => {
        link.addEventListener('click', () => {
            navigation.classList.remove('is-open');
            menuButton.setAttribute('aria-expanded', 'false');
            menuButton.setAttribute('aria-label', 'Buka menu navigasi');
        });
    });

    document.addEventListener('keydown', (event) => {
        if (event.key === 'Escape') {
            navigation.classList.remove('is-open');
            menuButton.setAttribute('aria-expanded', 'false');
        }
    });
});