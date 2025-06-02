// public/js/header-menu.js atau resources/js/header-menu.js

console.log('header-menu.js loaded');

document.addEventListener('DOMContentLoaded', function() {
    console.log('DOMContentLoaded event fired');

    // Script untuk toggle menu mobile
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');
    const menuIconOpen = document.getElementById('menu-icon-open');
    const menuIconClose = document.getElementById('menu-icon-close');

    if (mobileMenuButton && mobileMenu && menuIconOpen && menuIconClose) {
        // console.log('Mobile menu elements found'); // Anda bisa uncomment ini untuk debug
        mobileMenuButton.addEventListener('click', () => {
            // console.log('Mobile menu button CLICKED!'); // Anda bisa uncomment ini untuk debug
            const isExpanded = mobileMenuButton.getAttribute('aria-expanded') === 'true' || false;
            mobileMenuButton.setAttribute('aria-expanded', String(!isExpanded));
            mobileMenu.classList.toggle('hidden');
            menuIconOpen.classList.toggle('hidden');
            menuIconClose.classList.toggle('hidden');
        });
    } else {
        // console.warn('One or more mobile menu elements NOT found.'); // Anda bisa uncomment ini untuk debug
    }

    // Script untuk toggle dropdown menu pengguna (Desktop)
    const userMenuButtonDesktop = document.getElementById('user-menu-button-desktop');
    const userDropdownMenu = document.getElementById('user-dropdown-menu');

    if (userMenuButtonDesktop && userDropdownMenu) {
        console.log('User menu elements found');
        userMenuButtonDesktop.addEventListener('click', (event) => {
            console.log('User menu button CLICKED!');
            event.stopPropagation(); // Mencegah event klik menyebar ke document listener di bawah jika dropdown baru saja dibuka
            const isExpanded = userMenuButtonDesktop.getAttribute('aria-expanded') === 'true' || false;
            userMenuButtonDesktop.setAttribute('aria-expanded', String(!isExpanded));
            userDropdownMenu.classList.toggle('hidden');
        });

        // Menutup dropdown jika diklik di luar area dropdown atau tombolnya
        document.addEventListener('click', (event) => {
            // Pastikan dropdown ada dan sedang tidak hidden SEBELUM mencoba mengakses propertinya
            if (userDropdownMenu.classList.contains('hidden')) {
                return; // Keluar dari fungsi jika dropdown sudah tertutup
            }

            const isClickInsideButton = userMenuButtonDesktop.contains(event.target);
            const isClickInsideMenu = userDropdownMenu.contains(event.target);

            // Hanya tutup jika klik BUKAN di dalam tombol DAN BUKAN di dalam menu
            if (!isClickInsideButton && !isClickInsideMenu) {
                console.log('Clicked OUTSIDE, closing dropdown.');
                userMenuButtonDesktop.setAttribute('aria-expanded', 'false');
                userDropdownMenu.classList.add('hidden');
            } else {
                // console.log('Clicked INSIDE button or menu, NOT closing.'); // Tidak perlu log ini jika sudah berfungsi
            }
        });
    } else {
        // Hanya tampilkan error ini jika pengguna seharusnya login dan melihat tombol tersebut
        // Karena tombol ini hanya ada jika @auth, maka kita tidak perlu console.error jika tidak ditemukan
        // kecuali kita tahu konteksnya (misalnya, pengguna sudah login)
        // console.error('User menu button or dropdown NOT found!');
    }
});
