@extends('admin.layouts.app')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')


{{-- Mendorong semua ketergantungan (CDN, Fonts) ke layout utama --}}
@push('dependencies')
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Outfit:wght@700;800&display=swap" rel="stylesheet">
@endpush


{{-- Mendorong semua Style Kustom ke layout utama --}}
@push('styles')
<style>
    body {
        font-family: 'Inter', sans-serif;
        background-color: #f1f5f9;
    }
    /* Style untuk Sidebar */
    .font-logo {
            font-family: 'Outfit', sans-serif;
        }

        .nav-container {
            position: relative;
        }

        /* --- PERBAIKAN --- */
        #active-menu-indicator {
            position: absolute;
            /* 1. Beri jarak 1rem (16px) dari kiri */
            left: 20px;
            /* 2. Kurangi lebarnya sebesar 1rem agar sisi kanan tetap menempel */
            width: calc(100% - 1rem);
            height: 100%;
            /* Pastikan tingginya sesuai */
            background-color: white;
            /* 3. Buat semua sudut membulat untuk bentuk "pill" */
            border-top-left-radius: 25px;
            border-bottom-left-radius: 25px;
            /* rounded-xl */
            z-index: 0;
            transition: top 0.3s cubic-bezier(0.4, 0, 0.2, 1), height 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .sidebar-link {
            position: relative;
            z-index: 1;
            color: white;
            transition: color 0.3s ease-in-out;
            font-weight: 300;
            font-size: 18px;
        }

        .sidebar-link.active {
            color: #1A73E8;
            font-weight: 300;
        }

        .sidebar-link .icon-inactive,
        .sidebar-link.active .icon-active {
            display: inline-block;
        }

        .sidebar-link .icon-active,
        .sidebar-link.active .icon-inactive {
            display: none;
        }
    /* Style untuk Header */
    #user-dropdown {
        transition: transform 0.2s ease-out, opacity 0.2s ease-out;
    }
</style>
@endpush


{{-- Konten Utama Halaman --}}
@section('content')
    <div class="bg-white p-6 rounded-xl shadow">
        <p>Konten khusus halaman dasbor ada di sini.</p>
    </div>
@endsection


{{-- Mendorong semua JavaScript ke layout utama --}}
@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // --- Logika untuk Sidebar ---
        const sidebarLinks = document.querySelectorAll('.sidebar-link');
        const indicator = document.getElementById('active-menu-indicator');
        const pageTitle = document.getElementById('page-title');

        function moveIndicator(element) {
            if (!element) return;
            sidebarLinks.forEach(link => link.classList.remove('active'));
            element.classList.add('active');
            indicator.style.top = `${element.offsetTop}px`;
            indicator.style.height = `${element.offsetHeight}px`;
            // Ganti judul header sesuai menu yang aktif
            if(pageTitle && element.querySelector('span')) {
                pageTitle.textContent = element.querySelector('span').textContent;
            }
        }

        let currentActiveLink = document.querySelector('.sidebar-link.active');
        if (!currentActiveLink) {
            currentActiveLink = document.querySelector('.sidebar-link[data-order="0"]');
            if (currentActiveLink) currentActiveLink.classList.add('active');
        }
        if (currentActiveLink) {
            moveIndicator(currentActiveLink);
        }

        sidebarLinks.forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                moveIndicator(this);
            });
        });

        // --- Logika untuk Dropdown Header ---
        const userProfileButton = document.getElementById('user-profile-button');
        const userDropdown = document.getElementById('user-dropdown');

        if (userProfileButton && userDropdown) {
            userProfileButton.addEventListener('click', function(event) {
                event.stopPropagation();
                userDropdown.classList.toggle('hidden');
                if(!userDropdown.classList.contains('hidden')) {
                    setTimeout(() => userDropdown.classList.remove('opacity-0', 'scale-95'), 10);
                } else {
                    userDropdown.classList.add('opacity-0', 'scale-95');
                }
            });
            document.addEventListener('click', function() {
                if (!userDropdown.classList.contains('hidden')) {
                    userDropdown.classList.add('opacity-0', 'scale-95');
                    setTimeout(() => userDropdown.classList.add('hidden'), 200);
                }
            });
        }
    });
</script>
@endpush
