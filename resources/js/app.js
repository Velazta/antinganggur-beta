import "./bootstrap";

// Kode JavaScript untuk semua fungsionalitas UI dasbor
document.addEventListener("DOMContentLoaded", function () {
    // --- Logika Global untuk Sidebar ---
    const sidebarLinks = document.querySelectorAll(".sidebar-link");
    const indicator = document.getElementById("active-menu-indicator");

    function moveIndicator(element) {
        if (!element) return;
        sidebarLinks.forEach((link) => link.classList.remove("active"));
        element.classList.add("active");
        indicator.style.top = `${element.offsetTop}px`;
        indicator.style.height = `${element.offsetHeight}px`;
    }

    let currentActiveLink = document.querySelector(".sidebar-link.active");
    if (!currentActiveLink) {
        currentActiveLink = document.querySelector(
            '.sidebar-link[data-order="0"]'
        );
        if (currentActiveLink) {
            currentActiveLink.classList.add("active"); // Tambahkan kelas active secara otomatis
        }
    }
    // Panggil moveIndicator hanya jika link aktif benar-benar ada
    if (currentActiveLink) {
        moveIndicator(currentActiveLink);
    }

    // --- Logika Global untuk Dropdown Header ---
    const userProfileButton = document.getElementById("user-profile-button");
    const userDropdown = document.getElementById("user-dropdown");

    if (userProfileButton && userDropdown) {
        userProfileButton.addEventListener("click", function (event) {
            event.stopPropagation();
            const isHidden = userDropdown.classList.contains("hidden");
            if (isHidden) {
                userDropdown.classList.remove("hidden");
                setTimeout(() => {
                    userDropdown.classList.remove("opacity-0", "scale-95");
                }, 10);
            } else {
                userDropdown.classList.add("opacity-0", "scale-95");
                setTimeout(() => {
                    userDropdown.classList.add("hidden");
                }, 200);
            }
        });

        document.addEventListener("click", function () {
            if (!userDropdown.classList.contains("hidden")) {
                userDropdown.classList.add("opacity-0", "scale-95");
                setTimeout(() => {
                    userDropdown.classList.add("hidden");
                }, 200);
            }
        });
    }
});
