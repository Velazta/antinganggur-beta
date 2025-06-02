<footer class="bg-slate-800 text-white py-10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <div class="mb-4">
            <a href="{{ url('/') }}" class="flex items-center justify-center">
                <img class="h-8 w-auto" src="{{ asset('asset/page/Vector.png') }}" alt="AntiNganggur Logo">
                <div class="ml-2">
                    <span class="font-bold text-lg text-white">Anti</span><span
                        class="font-bold text-lg text-[#FF7144]">Nganggur</span>
                </div>
            </a>
        </div>
        <nav class="flex flex-wrap justify-center gap-x-6 gap-y-2 mb-4">
            <a href="{{ url('/') }}" class="text-slate-300 hover:text-white">Home</a>
            <a href="{{ url('/lowongan') }}" class="text-slate-300 hover:text-white">Lowongan</a>
            <a href="{{ url('/tentang-kami') }}" class="text-slate-300 hover:text-white">Tentang</a>
            <a href="{{ url('/portfolio') }}" class="text-slate-300 hover:text-white">Portfolio</a>
            <a href="{{ url('/kontak') }}" class="text-slate-300 hover:text-white">Kontak</a>
        </nav>
        <p class="text-sm text-slate-400">
            © {{ date('Y') }} AntiNganggur. Semua Hak Cipta Dilindungi.
        </p>
    </div>
</footer>
