<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"> {{-- Menggunakan locale dari Laravel --}}

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'AntiNganggur - Temukan Pekerjaan Impian Anda')</title> {{-- Title dinamis per halaman --}}

    {{-- Tailwind CSS CDN --}}
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- Google Fonts --}}
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    {{-- Style global minimal yang mungkin masih dibutuhkan (seperti scrollbar, jika tidak di CSS terpisah) --}}
    <style>
        /* Custom scrollbar untuk testimoni (jika digunakan dan tidak bisa di-inline) */
        .testimonial-scrollbar::-webkit-scrollbar {
            height: 8px;
        }
        .testimonial-scrollbar::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }
        .testimonial-scrollbar::-webkit-scrollbar-thumb {
            background: #FDBA74; /* orange-300 */
            border-radius: 10px;
        }
        .testimonial-scrollbar::-webkit-scrollbar-thumb:hover {
            background: #FB923C; /* orange-400 */
        }
    </style>
    @stack('styles') {{-- Untuk CSS spesifik per halaman --}}
</head>

{{-- Kelas font, background, dan text color default dari header.blade.php diterapkan di sini --}}
<body class="antialiased font-['Poppins'] bg-[#FFF7F5] text-slate-700">

    {{-- Include Header --}}
    @include('layouts.partials.header')

    <main>
        {{-- Konten utama halaman akan di-inject di sini --}}
        @yield('content')
    </main>

    {{-- Include Footer --}}
    @include('layouts.partials.footer')

    {{-- Script untuk header menu (dari jawaban sebelumnya) --}}
    <script src="{{ asset('js/header-menu.js') }}" defer></script>

    @stack('scripts') {{-- Untuk JavaScript spesifik per halaman --}}
</body>
</html>
