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

    // --- Langkah 1: Tentukan link yang "benar-benar" aktif saat halaman dimuat ---
    const currentPath = window.location.pathname;
    let activeLink = null;
    let bestMatchLength = 0;

    sidebarLinks.forEach(link => {
        const linkPath = new URL(link.href).pathname;
        if (currentPath.startsWith(linkPath) && linkPath.length > bestMatchLength) {
            activeLink = link;
            bestMatchLength = linkPath.length;
        }
    });

    // Jika tidak ada yang cocok, fallback ke Dashboard
    if (!activeLink) {
        activeLink = document.querySelector('.sidebar-link[href*="dashboard"]');
    }

    // --- Langkah 2: Posisikan indikator dan set kelas .active pada link yang benar ---
    if (activeLink) {
        // Tandai link yang benar-benar aktif
        activeLink.classList.add('active');

        // Pindahkan indikator ke posisi awal tanpa animasi untuk menghindari 'flash'
        indicator.style.transition = 'none';
        moveIndicator(activeLink);

        // Update judul halaman
        if (pageTitle && activeLink.querySelector("span")) {
            pageTitle.textContent = activeLink.querySelector("span").textContent.trim();
        }

        // Aktifkan kembali transisi setelah posisi awal diatur
        setTimeout(() => {
            indicator.style.transition = 'top 0.3s cubic-bezier(0.4, 0, 0.2, 1)';
        }, 50);
    }

    // --- Langkah 3: Tambahkan event listener untuk efek hover ---
    sidebarLinks.forEach(link => {
        // Saat mouse masuk ke area link
        link.addEventListener('mouseenter', function() {
            moveIndicator(this); // Pindahkan indikator ke link yang di-hover
        });
    });

    // Saat mouse keluar dari area sidebar secara keseluruhan
    sidebar.addEventListener('mouseleave', function() {
        moveIndicator(activeLink); // Kembalikan indikator ke link yang "benar-benar" aktif
    });
});
