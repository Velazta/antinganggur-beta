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

    {{-- Script kustom akan dimuat oleh halaman anak --}}
    @stack('scripts')
</body>
</html>
