<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>@yield('title', 'Admin Dashboard') - AntiNganggur</title>
    <link rel="icon" href="{{ asset('asset/admin/whitelogoantinganggur.png') }}" type="image/png">

    {{-- Menggunakan Tailwind CSS --}}

{{--

    Ketergantungan (Fonts & Scripts) akan dimuat oleh halaman anak
    @stack('dependencies')

    Style kustom juga akan dimuat oleh halaman anak
    @stack('styles')
 --}}

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
        left: 0;
        width: calc(100% - 20px);
        margin-left: 20px;
        background-color: white;
        border-top-left-radius: 25px;
        border-bottom-left-radius: 25px;
        z-index: 0;
        transition: top 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }
    .sidebar-link {
        position: relative;
        z-index: 1;
        color: white;
        transition: color 0.3s ease-in-out, font-weight 0.3s ease-in-out;
        font-weight: 300;
        font-size: 16px;
    }
    .sidebar-link.active,
    .sidebar-link:hover {
        color: #1A73E8;
        font-weight: 300;
    }
    .menu-icon {
        display: inline-block;
        width: 1.5rem;
        height: 1.5rem;
        background-color: white;
        -webkit-mask-size: contain;
        mask-size: contain;
        -webkit-mask-position: center;
        mask-position: center;
        -webkit-mask-repeat: no-repeat;
        mask-repeat: no-repeat;
        transition: background-color 0.3s ease-in-out;
    }
    .sidebar-link.active .menu-icon,
    .sidebar-link:hover .menu-icon {
        background-color: #1A73E8;
    }
        #user-dropdown { transition: transform 0.2s ease-out, opacity 0.2s ease-out; }
    </style>

</head>
<body>

    <div class="flex min-h-screen">

        @include('admin.partials._sidebar')

        {{-- Wrapper untuk Konten Utama --}}
        <div class="ml-64 flex-1 flex flex-col">

            @include('admin.partials._header')

            <main class="p-8">
                @yield('content')
            </main>
        </div>
    </div>

    <script src="{{ asset('js/admin-sidebar.js') }}"></script>
    <script src="{{ asset('js/admin-header.js') }}"></script>
    @stack('scripts')
</body>
</html>
