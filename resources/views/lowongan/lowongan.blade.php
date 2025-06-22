@extends('layouts.app') {{-- Menggunakan layout utama Anda --}}

@section('title', 'Lowongan Pekerjaan - AntiNganggur') {{-- Mengganti title sesuai halaman --}}

@push('styles')
    {{-- Menambahkan CSS spesifik halaman ini ke stack 'styles' di layout master --}}
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #FFF7F5;
            color: #374151;
        }
    </style>
@endpush

@section('content') {{-- Konten utama halaman ini akan berada di dalam section 'content' --}}
    {{-- SECTION 1 : UNTUK FIND JOB (HEADER) --}}
    <section class="bg-[#FF7144] pt-16 md:pt-20 lg:pt-24 pb-24 relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
            <div class="absolute left-11 -bottom-8 top-3 hidden lg:block pointer-events-none">
                {{-- Menggunakan asset() helper untuk gambar --}}
                <img src="{{ asset('asset/page/orang2.png') }}" alt="Professional Person 1"
                    class="h-80 object-cover object-bottom">
            </div>
            <div class="absolute right-0 -bottom-8 top-0 hidden lg:block pointer-events-none">
                {{-- Menggunakan asset() helper untuk gambar --}}
                <img src="{{ asset('asset/page/orang1.png') }}" alt="Professional Person 2"
                    class="h-80 object-cover object-bottom">
            </div>

            <div class="text-center">
                <h1
                    class="text-3xl sm:text-4xl md:text-5xl lg:text-5xl font-bold text-white mb-8 leading-tight max-w-4xl mx-auto">
                    Daftarkan Pekerjaan Impian<br>
                    Anda Di AntiNganggur
                </h1>

                {{-- Ganti search bar lama Anda dengan form ini --}}
                <form action="{{ route('lowongan') }}" method="GET" class="w-full">
                    <div class="bg-white rounded-lg p-4 shadow-lg max-w-2xl mx-auto">
                        <div class="flex flex-col sm:flex-row gap-3">

                            {{-- Input untuk Posisi Pekerjaan --}}
                            <div class="flex-1">
                                <input type="text" name="search" placeholder="Posisi Pekerjaan"
                                    value="{{ request('search') }}"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#FF7144] focus:border-transparent text-gray-700 placeholder-gray-500">
                            </div>

                            {{-- Dropdown untuk Lokasi --}}
                            <div class="flex-1">
                                <select id="lokasi" name="location" title="Pilih lokasi"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#FF7144] focus:border-transparent bg-white text-gray-700">
                                    <option value="" {{ request('location') == '' ? 'selected' : '' }}>Semua Lokasi
                                    </option>
                                    @foreach ($locations as $loc)
                                        <option value="{{ $loc }}"
                                            {{ request('location') == $loc ? 'selected' : '' }}>
                                            {{ $loc }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- Tombol Cari --}}
                            <button type="submit"
                                class="bg-[#FF7144] text-white px-8 py-3 rounded-lg font-semibold hover:bg-orange-600 transition-colors duration-200 whitespace-nowrap">
                                Cari
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

    {{-- SECTION 2 : LOWONGAN YANG SEDANG TREND --}}
    <section class="py-16 md:py-20 lg:py-24 bg-gradient-to-b from-[#FFB5A3] to-[#FFF7F5]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="lg:grid lg:grid-cols-12 lg:gap-x-12 xl:gap-x-16 lg:items-start">
                <div class="lg:col-span-4 mb-12 lg:mb-0">
                    <h2 class="text-3xl sm:text-4xl font-bold text-slate-700 mb-6 leading-tight">
                        Lowongan Kerja<br>
                        Yang Sedang<br>
                        Trending
                    </h2>
                    <p class="text-slate-600 leading-relaxed text-lg">
                        Temukan Lowongan Pekerjaan Terbaru Yang Sedang Diminati Oleh Para Pencari Kerja
                    </p>
                </div>

                <div class="lg:col-span-8">
                    <div class="grid gap-6 md:grid-cols-3">
                        {{-- === PERBAIKAN: Looping data lowongan trending dari controller === --}}
                        @forelse ($trendingVacancies as $vacancy)
                            <div class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition-shadow duration-300 flex flex-col">
                                <div class="flex items-start mb-4">
                                    <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center mr-4">
                                        @if ($vacancy->job_logo)
                                            <img src="{{ asset('storage/' . $vacancy->job_logo) }}" alt="Logo {{ $vacancy->company_name }}" class="w-[30px] h-[30px] object-contain rounded-lg">
                                        @else
                                            <svg class="w-6 h-6 text-[#FF7144]" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 6.75L22.5 12l-5.25 5.25m-10.5 0L1.5 12l5.25-5.25m7.5-3l-4.5 16.5" />
                                            </svg>
                                        @endif
                                    </div>
                                    <div>
                                        <h3 class="text-lg font-semibold text-slate-900">{{ $vacancy->title }}</h3>
                                        <p class="text-sm text-slate-500">{{ $vacancy->company_name }}</p>
                                    </div>
                                </div>

                                <div class="flex flex-wrap gap-2 mb-4">
                                    <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-orange-100 text-orange-700">
                                        <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                                        </svg>
                                        {{ $vacancy->location }}
                                    </span>
                                    <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-orange-100 text-orange-700">
                                        <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd" />
                                        </svg>
                                        {{ $vacancy->type_job }}
                                    </span>
                                    @if ($vacancy->min_salary && $vacancy->max_salary)
                                        <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-orange-100 text-orange-700">
                                            Rp {{ number_format($vacancy->min_salary, 0, ',', '.') }} - {{ number_format($vacancy->max_salary, 0, ',', '.') }}
                                        </span>
                                    @endif
                                </div>

                                <p class="text-sm text-slate-600 mb-4 leading-relaxed flex-grow">
                                    {{ Str::limit($vacancy->description, 100) }}
                                </p>

                                <a href="{{ route('lamar.create', ['job_vacancy_id' => $vacancy->id, 'job_title' => $vacancy->title]) }}" class="w-full bg-[#FF7144] text-white py-2 rounded-lg font-semibold hover:bg-orange-600 transition-colors duration-200 mt-auto text-center">
                                    Lamar
                                </a>
                            </div>
                        @empty
                            <p class="text-slate-500 col-span-3">Lowongan trending belum tersedia.</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- SECTION 3 : LIST LOWONGAN --}}
    <section class="py-16 md:py-20 lg:py-24 bg-[#FFF7F5]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12 md:mb-16">
                <h2 class="text-6xl font-extrabold text-slate-700 sm:text-6xl mb-4">
                    Lowongan Terbaru
                </h2>
            </div>

            <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
                {{-- card lowongan --}}
                {{-- Iterasi setiap lowongan dari database --}}
                @forelse ($lowongan as $vacancy)
                    <div
                        class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                        <div class="p-6">
                            <div class="flex items-start mb-4">
                                <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center mr-4">
                                    {{-- Tampilkan logo perusahaan jika ada, jika tidak, bisa pakai ikon default atau inisial --}}
                                    @if ($vacancy->job_logo)
                                        <img src="{{ asset('storage/' . $vacancy->job_logo) }}"
                                            alt="Logo {{ $vacancy->company_name }}"
                                            class="w-[30px] h-[30px] object-contain rounded-lg">
                                    @else
                                        {{-- SVG placeholder jika tidak ada logo --}}
                                        <svg class="w-6 h-6 text-[#FF7144]" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M5.25 14.25h13.5m-13.5 0a3 3 0 01-3-3V6a3 3 0 013-3h13.5a3 3 0 013 3v5.25a3 3 0 01-3 3m-16.5 0a3 3 0 013-3h13.5a3 3 0 013 3v5.25a3 3 0 01-3 3H5.25a3 3 0 01-3-3v-5.25z" />
                                        </svg>
                                    @endif
                                </div>
                                <div>
                                    <h3 class="text-lg font-semibold text-slate-900">{{ $vacancy->title }}</h3>
                                    <p class="text-sm text-slate-500">{{ $vacancy->company_name }}</p>
                                </div>
                            </div>

                            <div class="flex flex-wrap gap-2 mb-4">
                                <span
                                    class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-orange-100 text-orange-700">
                                    <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    {{ $vacancy->location }}
                                </span>
                                <span
                                    class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-orange-100 text-orange-700">
                                    <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    {{ $vacancy->type_job }}
                                </span>
                                @if ($vacancy->min_salary && $vacancy->max_salary)
                                    <span
                                        class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-orange-100 text-orange-700">
                                        Rp {{ number_format($vacancy->min_salary, 0, ',', '.') }} -
                                        {{ number_format($vacancy->max_salary, 0, ',', '.') }} jt/bulan
                                    </span>
                                @endif
                            </div>

                            <p class="text-sm text-slate-600 mb-4 leading-relaxed">
                                {{ Str::limit($vacancy->description, 150) }}
                            </p>
                        </div>

                        <div class="px-6 py-4 bg-gray-50 border-t border-gray-200 flex space-x-3">
                            {{-- Link "Lihat Detail" akan mengarah ke halaman detail admin (bisa diubah nanti untuk user) --}}
                            {{-- Atau jika Anda ingin modal, Anda bisa membuat fungsi JS seperti di admin manajemen lowongan --}}
                            <a href="{{ route('admin.manajemen.lowongan.show', $vacancy->id) }}"
                                class="flex-1 px-4 py-2 border-2 border-[#FF7144] text-sm font-semibold rounded-lg text-[#FF7144] bg-white hover:bg-orange-50 transition-colors duration-150 text-center">
                                Lihat Detail
                            </a>
                            {{-- Link "Lamar" ke halaman formulir lamar, sekarang dengan parameter ID dan Title --}}
                            <a href="{{ route('lamar.create', ['job_vacancy_id' => $vacancy->id, 'job_title' => $vacancy->title]) }}"
                                class="flex-1 px-4 py-2 text-sm font-semibold rounded-lg text-white bg-[#FF7144] hover:bg-orange-600 transition-colors duration-150 text-center">
                                Lamar
                            </a>
                        </div>
                    </div>
                @empty
                    {{-- Pesan jika tidak ada lowongan --}}
                    <div class="lg:col-span-3 text-center py-10 border-2 border-dashed rounded-xl text-gray-500">
                        Belum ada lowongan pekerjaan terbaru saat ini.
                    </div>
                @endforelse
            </div>

            {{-- Pagination --}}
            <div class="mt-12 flex justify-center">
                {{-- Custom pagination dari Laravel --}}
                 {{ $lowongan->withQueryString()->links('vendor.pagination.custom-pagination') }}
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    {{-- Menambahkan JavaScript spesifik halaman ini ke stack 'scripts' di layout master --}}
    <script>
        // Mengubah mobile menu button agar berfungsi dengan rute Laravel
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');
        const menuIconOpen = document.getElementById('menu-icon-open');
        const menuIconClose = document.getElementById('menu-icon-close');

        if (mobileMenuButton && mobileMenu && menuIconOpen && menuIconClose) {
            mobileMenuButton.addEventListener('click', () => {
                const isExpanded = mobileMenuButton.getAttribute('aria-expanded') === 'true' || false;
                mobileMenuButton.setAttribute('aria-expanded', !isExpanded);
                mobileMenu.classList.toggle('hidden');
                menuIconOpen.classList.toggle('hidden');
                menuIconClose.classList.toggle('hidden');
            });
        }
    </script>
@endpush
