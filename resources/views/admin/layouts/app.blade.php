<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>@yield('title', 'Admin Dashboard') - AntiNganggur</title>

    {{-- Ketergantungan (Fonts & Scripts) akan dimuat oleh halaman anak --}}
    @stack('dependencies')

    {{-- Style kustom juga akan dimuat oleh halaman anak --}}
    @stack('styles')
</head>
<body>

    <div class="flex min-h-screen">
        {{-- Memanggil komponen sidebar (hanya HTML) --}}
        @include('admin.partials._sidebar')

        {{-- Wrapper untuk Konten Utama --}}
        <div class="ml-64 flex-1 flex flex-col">
            {{-- Memanggil komponen header (hanya HTML) --}}
            @include('admin.partials._header')

            <main class="p-8">
                @yield('content')
            </main>
        </div>
    </div>

   {{-- Ketergantungan (Fonts & Scripts) --}}
    @stack('dependencies')
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Outfit:wght@700;800&display=swap" rel="stylesheet">


    {{-- Style Kustom --}}
    @stack('styles')
    <style>
        body { font-family: 'Inter', sans-serif; background-color: white; }
        .font-logo { font-family: 'Outfit', sans-serif; }
        .nav-container { position: relative; }
        #active-menu-indicator {
            position: absolute;
            left: 20px;
            width: calc(100% - 1rem);
            height: 100%;
            background-color: white;
            border-top-left-radius: 25px;
            border-bottom-left-radius: 25px;
            z-index: 0;
            transition: top 0.3s cubic-bezier(0.4, 0, 0.2, 1), height 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .sidebar-link { position: relative; z-index: 1; color: white; transition: color 0.3s ease-in-out; font-weight: 300; font-size: 18px; }
        .sidebar-link.active { color: #1A73E8; font-weight: 300; }
        .sidebar-link .icon-inactive, .sidebar-link.active .icon-active { display: inline-block; }
        .sidebar-link .icon-active, .sidebar-link.active .icon-inactive { display: none; }
        #user-dropdown { transition: transform 0.2s ease-out, opacity 0.2s ease-out; }
    </style>

    {{-- Ganti keseluruhan <script> di dalam app.blade.php dengan ini --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // --- Logika untuk Sidebar ---
        const sidebarLinks = document.querySelectorAll('.sidebar-link');
        const indicator = document.getElementById('active-menu-indicator');
        const pageTitle = document.getElementById('page-title');

        // Fungsi ini tetap sama, untuk memindahkan indikator visual
        function moveIndicator(element) {
            if (!element || !indicator) return;
            sidebarLinks.forEach(link => link.classList.remove('active'));
            element.classList.add('active');
            indicator.style.top = `${element.offsetTop}px`;
            indicator.style.height = `${element.offsetHeight}px`;
        }

        // --- Logika Penentuan Link Aktif Saat Halaman Dimuat ---
        // Ini adalah bagian terpenting
        let currentActiveLink = null;
        const currentUrl = window.location.href;

        sidebarLinks.forEach(link => {
            // Kita cek apakah URL link sama dengan URL halaman saat ini
            if (link.href === currentUrl.split('?')[0]) { // .split('?')[0] untuk mengabaikan query string
                currentActiveLink = link;
            }
        });

        // Jika tidak ada URL yang cocok persis (misalnya karena ada parameter),
        // fallback ke link Dashboard sebagai default
        if (!currentActiveLink) {
            const dashboardLink = document.querySelector('.sidebar-link[href*="{{ route('admin.dashboard') }}"]');
            if (dashboardLink && currentUrl.includes('/dashboard')) {
                 currentActiveLink = dashboardLink;
            } else {
                 // Jika masih tidak ada, coba cari berdasarkan segmen URL
                 const path = window.location.pathname;
                 sidebarLinks.forEach(link => {
                    const linkPath = new URL(link.href).pathname;
                    if (path.startsWith(linkPath) && linkPath !== '/admin/dashboard') { // Jangan match dashboard lagi jika bukan halamannya
                        currentActiveLink = link;
                    }
                 });
            }
        }

        // Pindahkan indikator ke link yang aktif
        if (currentActiveLink) {
            moveIndicator(currentActiveLink);
            if(pageTitle && currentActiveLink.querySelector('span')) {
                pageTitle.textContent = currentActiveLink.querySelector('span').textContent.trim();
            }
        }


        // --- Logika untuk Dropdown Header (Tidak berubah) ---
        const userProfileButton = document.getElementById('user-profile-button');
        const userDropdown = document.getElementById('user-dropdown');

        if (userProfileButton && userDropdown) {
            userProfileButton.addEventListener('click', function(event) {
                event.stopPropagation();
                userDropdown.classList.toggle('hidden');
            });

            document.addEventListener('click', function() {
                if (!userDropdown.classList.contains('hidden')) {
                    userDropdown.classList.add('hidden');
                }
            });
        }
    });
</script>
</body>
</html>
