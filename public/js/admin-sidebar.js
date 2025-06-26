// public/js/admin-sidebar.js

document.addEventListener("DOMContentLoaded", function () {
    const sidebar = document.querySelector(".nav-container"); // Targetkan container nav
    const sidebarLinks = document.querySelectorAll(".sidebar-link");
    const indicator = document.getElementById("active-menu-indicator");
    const pageTitle = document.getElementById("page-title");

    if (!sidebar || !indicator) return;

    // Fungsi untuk memindahkan indikator. Kini hanya fokus pada perpindahan visual.
    function moveIndicator(element) {
        if (!element) return;
        indicator.style.top = `${element.offsetTop}px`;
        indicator.style.height = `${element.offsetHeight}px`;
    }

    const currentPath = window.location.pathname;
    let activeLink = null;
    let bestMatchLength = 0;

    sidebarLinks.forEach(link => {
        let linkPath;
        try {
            linkPath = new URL(link.href, window.location.origin).pathname;
        } catch (e) {
            // Fallback for invalid URLs
            linkPath = link.getAttribute('href') || '';
        }
        if (currentPath.startsWith(linkPath) && linkPath.length > bestMatchLength) {
            activeLink = link;
            bestMatchLength = linkPath.length;
        }
    });

    // fallback to dashboard
    if (!activeLink) {
        activeLink = document.querySelector('.sidebar-link[href*="dashboard"]');
    }

    if (activeLink) {

        activeLink.classList.add('active');


        indicator.style.transition = 'none';
        moveIndicator(activeLink);

        // Update judul halaman
        let linkText = null;
        if (activeLink) {
            linkText = activeLink.querySelector('.sidebar-link-text span');
        }
        if (pageTitle && linkText) {
            pageTitle.textContent = linkText.textContent.trim();
        }

        // mengaktifkan kembali transisi setelah posisi awal diatur
        setTimeout(() => {
            indicator.style.transition = 'top 0.3s cubic-bezier(0.4, 0, 0.2, 1)';
        }, 50);
    }

    // event listener hover
    sidebarLinks.forEach(link => {
        // Saat mouse masuk ke area link
        link.addEventListener('mouseenter', function() {
            moveIndicator(this); // move indikator ke link yang di-hover
        });
    });

    // Saat mouse keluar dari area sidebar secara keseluruhan
    sidebar.addEventListener('mouseleave', function() {
        moveIndicator(activeLink);
    });
});
