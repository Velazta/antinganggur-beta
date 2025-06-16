// public/js/admin-header.js

document.addEventListener("DOMContentLoaded", function () {
    const userProfileButton = document.getElementById("user-profile-button");
    const userDropdown = document.getElementById("user-dropdown");

    if (userProfileButton && userDropdown) {
        userProfileButton.addEventListener("click", function (event) {
            event.stopPropagation();
            userDropdown.classList.toggle("hidden");
            if (!userDropdown.classList.contains("hidden")) {
                setTimeout(
                    () =>
                        userDropdown.classList.remove("opacity-0", "scale-95"),
                    10
                );
            } else {
                userDropdown.classList.add("opacity-0", "scale-95");
                setTimeout(() => userDropdown.classList.add("hidden"), 200); // Waktu untuk transisi hide
            }
        });

        document.addEventListener("click", function () {
            if (!userDropdown.classList.contains("hidden")) {
                userDropdown.classList.add("opacity-0", "scale-95");
                setTimeout(() => userDropdown.classList.add("hidden"), 200);
            }
        });
    }
});
