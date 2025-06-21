{{-- resources/views/admin/layouts/partials/_sidebar.blade.php --}}

{{-- Kode HTML untuk <aside> tetap sama persis --}}
<aside class="w-64 bg-[#1A73E8] text-white flex flex-col py-4 fixed h-full ">

    <div class="flex-shrink-0 px-6">
        <div class="flex items-center gap-7 py-5 border-b border-white">
            {{-- Ganti src dengan helper asset() --}}
            <img src="{{ asset('asset/admin/whitelogoantinganggur.png') }}" alt="Logo AntiNganggur" class="h-8 w-8">
            <span class="font-logo text-xl font-bold tracking-wider">AntiNganggur</span>
        </div>
    </div>

    <nav class="flex-grow flex items-center">
        <div class="nav-container w-full">
            <div id="active-menu-indicator"></div>

            {{-- Anda bisa mengubah `space-y-8` ini untuk mengatur jarak antar menu --}}
            <ul class="space-y-8">
                <li>
                    <a href="{{ route('admin.dashboard') }}" class="sidebar-link flex items-center gap-6 py-4 px-10">
                        {{-- PERUBAHAN: Menggunakan <span> untuk ikon, bukan <img> --}}
                        <span class="menu-icon" style="-webkit-mask-image: url('{{ asset('asset/admin/Dashboardwhite.svg') }}'); mask-image: url('{{ asset('asset/admin/Dashboardwhite.svg') }}');"></span>
                        <span class="sidebar-link-text">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.manajemen.lowongan') }}" class="sidebar-link flex items-center gap-6 py-4 px-10">
                        <span class="menu-icon" style="-webkit-mask-image: url('{{ asset('asset/admin/Briefcasewhite.svg') }}'); mask-image: url('{{ asset('asset/admin/Briefcasewhite.svg') }}');"></span>
                        <span class="sidebar-link-text">Lowongan</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.manajemen.pelamar') }}" class="sidebar-link flex items-center gap-6 py-4 px-10">
                        <span class="menu-icon" style="-webkit-mask-image: url('{{ asset('asset/admin/Userwhite.svg') }}'); mask-image: url('{{ asset('asset/admin/Userwhite.svg') }}');"></span>
                        <span class="sidebar-link-text">Pelamar</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.inbox') }}" class="sidebar-link flex items-center gap-6 py-4 px-10">
                        <span class="menu-icon" style="-webkit-mask-image: url('{{ asset('asset/admin/Speechbubblewhite.svg') }}'); mask-image: url('{{ asset('asset/admin/Speechbubblewhite.svg') }}');"></span>
                        <span class="sidebar-link-text">Kotak Pesan</span>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</aside>

