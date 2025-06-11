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
                    {{-- PERBAIKAN: Padding horizontal (px-10) sekarang ada di sini --}}
                    <a href="#" class="sidebar-link flex items-center gap-8 py-3 px-10" data-order="0">
                        <img src="{{ asset('asset/admin/Dashboardwhite.png') }}" alt="Icon Dashboard" class="w-6 h-6 icon-inactive">
                        <img src="{{ asset('asset/admin/Dashboardblue.png') }}" alt="Icon Dashboard Active" class="w-6 h-6 icon-active">
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="sidebar-link flex items-center gap-8 py-3 px-10" data-order="1">
                        <img src="{{ asset('asset/admin/Briefcasewhite.png') }}" alt="Icon Lowongan" class="w-6 h-6 icon-inactive">
                        <img src="{{ asset('asset/admin/Briefcaseblue.png') }}" alt="Icon Lowongan Active" class="w-6 h-6 icon-active">
                        <span>Lowongan</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="sidebar-link flex items-center gap-8 py-3 px-10" data-order="2">
                        <img src="{{ asset('asset/admin/Userwhite.png') }}" alt="Icon Pelamar" class="w-6 h-6 icon-inactive">
                        <img src="{{ asset('asset/admin/Userblue.png') }}" alt="Icon Pelamar Active" class="w-6 h-6 icon-active">
                        <span>Pelamar</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="sidebar-link flex items-center gap-8 py-3 px-10" data-order="3">
                        <img src="{{ asset('asset/admin/SpeechBubblewhite.png') }}" alt="Icon Kotak Pesan" class="w-6 h-6 icon-inactive">
                        <img src="{{ asset('asset/admin/SpeechBubbleblue.png') }}" alt="Icon Kotak Pesan Active" class="w-6 h-6 icon-active">
                        <span>Kotak Pesan</span>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</aside>
