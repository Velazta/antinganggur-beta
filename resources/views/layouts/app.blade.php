<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'AntiNganggur - Temukan Pekerjaan Impian Anda')</title>

    {{-- Favicon --}}
    <link rel="icon" href="{{ asset('asset/page/Vector.png') }}" type="image/png">

    <script src="https://cdn.tailwindcss.com"></script>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>

        .testimonial-scrollbar::-webkit-scrollbar {
            height: 8px;
        }
        .testimonial-scrollbar::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }
        .testimonial-scrollbar::-webkit-scrollbar-thumb {
            background: #FDBA74;
            border-radius: 10px;
        }
        .testimonial-scrollbar::-webkit-scrollbar-thumb:hover {
            background: #FB923C;
        }
    </style>
    @stack('styles')
</head>

<body class="antialiased font-['Poppins'] bg-[#FFF7F5] text-slate-700">

    {{-- Include Header --}}
    @include('layouts.partials.header')

    <main>
        {{-- Konten utama halaman akan di-inject di sini --}}
        @yield('content')
    </main>

    @include('layouts.partials.footer')

    {{-- JavaScript --}}

    @stack('scripts')

</body>
</html>
