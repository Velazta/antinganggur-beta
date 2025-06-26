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

        mobileMenuButton.addEventListener('click', () => {

            const isExpanded = mobileMenuButton.getAttribute('aria-expanded') === 'true' || false;
            mobileMenuButton.setAttribute('aria-expanded', String(!isExpanded));
            mobileMenu.classList.toggle('hidden');
            menuIconOpen.classList.toggle('hidden');
            menuIconClose.classList.toggle('hidden');
        });
    } else {

    }

    // Script untuk toggle dropdown menu pengguna (Desktop)
    const userMenuButtonDesktop = document.getElementById('user-menu-button-desktop');
    const userDropdownMenu = document.getElementById('user-dropdown-menu');

    if (userMenuButtonDesktop && userDropdownMenu) {
        console.log('User menu elements found');
        userMenuButtonDesktop.addEventListener('click', (event) => {
            console.log('User menu button CLICKED!');
            event.stopPropagation();
            const isExpanded = userMenuButtonDesktop.getAttribute('aria-expanded') === 'true' || false;
            userMenuButtonDesktop.setAttribute('aria-expanded', String(!isExpanded));
            userDropdownMenu.classList.toggle('hidden');
        });

        document.addEventListener('click', (event) => {
            if (userDropdownMenu.classList.contains('hidden')) {
                return;
            }

            const isClickInsideButton = userMenuButtonDesktop.contains(event.target);
            const isClickInsideMenu = userDropdownMenu.contains(event.target);

            if (!isClickInsideButton && !isClickInsideMenu) {
                console.log('Clicked OUTSIDE, closing dropdown.');
                userMenuButtonDesktop.setAttribute('aria-expanded', 'false');
                userDropdownMenu.classList.add('hidden');
            } else {
            }
        });
    } else {
    }
});
