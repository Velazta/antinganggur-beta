@extends('layouts.app') {{-- Menggunakan layout utama Anda --}}

@section('title', 'Lowongan Pekerjaan - AntiNganggur') {{-- Mengganti title sesuai halaman --}}

@push('styles') {{-- Menambahkan CSS spesifik halaman ini ke stack 'styles' di layout master --}}
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #FFF7F5;
            color: #374151;
        }
    </style>
@endpush

@section('content') {{-- Konten utama halaman ini akan berada di dalam section 'content' --}}
    {{-- SECTION 1 : UNTUK FIND JOB (HEADER)--}}
    <section class="bg-[#FF7144] pt-16 md:pt-20 lg:pt-24 pb-24 relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
            <div class="absolute left-11 -bottom-8 top-3 hidden lg:block pointer-events-none">
                {{-- Menggunakan asset() helper untuk gambar --}}
                <img src="{{ asset('asset/page/orang2.png') }}" alt="Professional Person 1" class="h-80 object-cover object-bottom">
            </div>
            <div class="absolute right-0 -bottom-8 top-0 hidden lg:block pointer-events-none">
                {{-- Menggunakan asset() helper untuk gambar --}}
                <img src="{{ asset('asset/page/orang1.png') }}" alt="Professional Person 2" class="h-80 object-cover object-bottom">
            </div>

            <div class="text-center">
                <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-5xl font-bold text-white mb-8 leading-tight max-w-4xl mx-auto">
                    Daftarkan Pekerjaan Impian<br>
                    Anda Di AntiNganggur
                </h1>

                <div class="bg-white rounded-lg p-4 shadow-lg max-w-2xl mx-auto">
                    <div class="flex flex-col sm:flex-row gap-3">
                        <div class="flex-1">
                            <input type="text" placeholder="Posisi Pekerjaan" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#FF7144] focus:border-transparent text-gray-700 placeholder-gray-500">
                        </div>
                        <div class="flex-1">
                            <label for="lokasi" class="sr-only">Lokasi</label>
                            <select id="lokasi" name="lokasi" title="Pilih lokasi" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#FF7144] focus:border-transparent bg-white text-gray-700">
                                <option>Semua Lokasi</option>
                                <option>Jakarta</option>
                                <option>Surabaya</option>
                                <option>Bandung</option>
                                <option>Medan</option>
                                <option>Semarang</option>
                                <option>Makassar</option>
                                <option>Palembang</option>
                                <option>Tangerang</option>
                                <option>Depok</option>
                                <option>Bekasi</option>
                                <option>Surakarta</option>
                            </select>
                        </div>
                        <button class="bg-[#FF7144] text-white px-8 py-3 rounded-lg font-semibold hover:bg-orange-600 transition-colors duration-200 whitespace-nowrap">
                            Cari
                        </button>
                    </div>
                </div>
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
                        <div class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition-shadow duration-300 flex flex-col">
                            <div class="flex items-start mb-4">
                                <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center mr-4">
                                    <svg class="w-6 h-6 text-[#FF7144]" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 6.75L22.5 12l-5.25 5.25m-10.5 0L1.5 12l5.25-5.25m7.5-3l-4.5 16.5" />
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="text-lg font-semibold text-slate-900">Frontend Developer</h3>
                                    <p class="text-sm text-slate-500">Anti Nganggur</p>
                                </div>
                            </div>

                            <div class="flex flex-wrap gap-2 mb-4">
                                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-orange-100 text-orange-700">
                                    <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                                    </svg>
                                    Surabaya
                                </span>
                                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-orange-100 text-orange-700">
                                    <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd" />
                                    </svg>
                                    Full-Time
                                </span>
                                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-orange-100 text-orange-700">
                                    Rp 20-30 jt/bulan
                                </span>
                            </div>

                            <p class="text-sm text-slate-600 mb-4 leading-relaxed">
                                Membutuhkan Frontend Developer Berpengalaman React Js Untuk Membangun Antarmuka Web Yang Responsif, Menarik, Dan Mudah Digunakan.
                            </p>

                            <a href="{{ route('lamar.create') }}" class="w-full bg-[#FF7144] text-white  py-2 rounded-lg font-semibold hover:bg-orange-600 transition-colors duration-200 mt-auto text-center">
                                Lamar
                            </a>
                        </div>

                        <div class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition-shadow duration-300 flex flex-col">
                            <div class="flex items-start mb-4">
                                <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center mr-4">
                                    <svg class="w-6 h-6 text-[#FF7144]" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 1.5H8.25A2.25 2.25 0 006 3.75v16.5a2.25 2.25 0 002.25 2.25h7.5A2.25 2.25 0 0018 20.25V3.75a2.25 2.25 0 00-2.25-2.25H13.5m-3 0V3h3v-1.5m-3 0h3m-3 18.75h3" />
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="text-lg font-semibold text-slate-900">Mobile Developer</h3>
                                    <p class="text-sm text-slate-500">Anti Nganggur</p>
                                </div>
                            </div>

                            <div class="flex flex-wrap gap-2 mb-4">
                                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-orange-100 text-orange-700">
                                    <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                                    </svg>
                                    Surakarta
                                </span>
                                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-orange-100 text-orange-700">
                                    <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd" />
                                    </svg>
                                    Full-Time
                                </span>
                                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-orange-100 text-orange-700">
                                    Rp 10-15 jt/bulan
                                </span>
                            </div>

                            <p class="text-sm text-slate-600 mb-4 leading-relaxed">
                                Mengembangkan dan memelihara aplikasi mobile (Android/iOS), termasuk merancang antarmuka pengguna yang responsif, mengintegrasikan API, serta memastikan performa dan kestabilan aplikasi secara berkelanjutan.
                            </p>

                            <a href="{{ route('lamar.create') }}" class="w-full bg-[#FF7144] text-white py-2 rounded-lg font-semibold hover:bg-orange-600 transition-colors duration-200 mt-auto text-center">
                                Lamar
                            </a>
                        </div>

                        <div class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition-shadow duration-300 flex flex-col">
                            <div class="flex items-start mb-4">
                                <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center mr-4">
                                    <svg class="w-6 h-6 text-[#FF7144]" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15a4.5 4.5 0 004.5 4.5H18a3.75 3.75 0 001.332-7.257 3 3 0 00-3.758-3.848 5.25 5.25 0 00-10.233 2.33A4.502 4.502 0 002.25 15z" />
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="text-lg font-semibold text-slate-900">Cloud Architect</h3>
                                    <p class="text-sm text-slate-500">Anti Nganggur</p>
                                </div>
                            </div>

                            <div class="flex flex-wrap gap-2 mb-4">
                                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-orange-100 text-orange-700">
                                    <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                                    </svg>
                                    Jakarta
                                </span>
                                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-orange-100 text-orange-700">
                                    <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd" />
                                    </svg>
                                    Full-Time
                                </span>
                                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-orange-100 text-orange-700">
                                    Rp 30-45 jt/bulan
                                </span>
                            </div>

                            <p class="text-sm text-slate-600 mb-4 leading-relaxed">
                                Merancang dan mengimplementasikan solusi cloud scalable di platform seperti AWS, Azure, atau GCP. Memastikan keamanan dan performa infrastruktur cloud.
                            </p>

                            <a href="{{ route('lamar.create') }}" class="w-full bg-[#FF7144] text-white py-2 rounded-lg font-semibold hover:bg-orange-600 transition-colors duration-200 mt-auto text-center">
                                Lamar
                            </a>
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
                    @forelse ($jobVacancies as $vacancy)
                        <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                            <div class="p-6">
                                <div class="flex items-start mb-4">
                                    <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center mr-4">
                                        {{-- Tampilkan logo perusahaan jika ada, jika tidak, bisa pakai ikon default atau inisial --}}
                                        @if($vacancy->job_logo)
                                            <img src="{{ asset('storage/' . $vacancy->job_logo) }}" alt="Logo {{ $vacancy->company_name }}" class="w-full h-full object-contain rounded-lg">
                                        @else
                                            {{-- SVG placeholder jika tidak ada logo --}}
                                            <svg class="w-6 h-6 text-[#FF7144]" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M5.25 14.25h13.5m-13.5 0a3 3 0 01-3-3V6a3 3 0 013-3h13.5a3 3 0 013 3v5.25a3 3 0 01-3 3m-16.5 0a3 3 0 013-3h13.5a3 3 0 013 3v5.25a3 3 0 01-3 3H5.25a3 3 0 01-3-3v-5.25z" />
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
                                    @if($vacancy->min_salary && $vacancy->max_salary)
                                        <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-orange-100 text-orange-700">
                                            Rp {{ number_format($vacancy->min_salary, 0, ',', '.') }} - Rp {{ number_format($vacancy->max_salary, 0, ',', '.') }} jt/bulan
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
                                <a href="{{ route('admin.manajemen.lowongan.show', $vacancy->id) }}" class="flex-1 px-4 py-2 border-2 border-[#FF7144] text-sm font-semibold rounded-lg text-[#FF7144] bg-white hover:bg-orange-50 transition-colors duration-150 text-center">
                                    Lihat Detail
                                </a>
                                {{-- Link "Lamar" ke halaman formulir lamar --}}
                                <a href="{{ route('lamar.create') }}" class="flex-1 px-4 py-2 text-sm font-semibold rounded-lg text-white bg-[#FF7144] hover:bg-orange-600 transition-colors duration-150 text-center">
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
            </div>
        </section>
        @endsection

@push('scripts') {{-- Menambahkan JavaScript spesifik halaman ini ke stack 'scripts' di layout master --}}
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
