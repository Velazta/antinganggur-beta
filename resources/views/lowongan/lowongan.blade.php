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
                    <h2 class="text-3xl font-extrabold text-slate-700 sm:text-4xl mb-4">
                        Lowongan Terbaru
                    </h2>
                </div>

                <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
                    {{-- card lowongan --}}
                    <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                        <div class="p-6">
                            <div class="flex items-start mb-4">
                                <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center mr-4">
                                    <svg class="w-6 h-6 text-[#FF7144]" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5.25 14.25h13.5m-13.5 0a3 3 0 01-3-3V6a3 3 0 013-3h13.5a3 3 0 013 3v5.25a3 3 0 01-3 3m-16.5 0a3 3 0 013-3h13.5a3 3 0 013 3v5.25a3 3 0 01-3 3H5.25a3 3 0 01-3-3v-5.25z" />
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="text-lg font-semibold text-slate-900">Backend Developer</h3>
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
                                    Rp 18-25 jt/bulan
                                </span>
                            </div>

                            <p class="text-sm text-slate-600 mb-4 leading-relaxed">
                                Mencari Backend Developer berpengalaman dengan Node.js, Python, atau Java. Bertanggung jawab mengembangkan API, database design, dan server-side logic untuk aplikasi web dan mobile.
                            </p>
                        </div>

                        <div class="px-6 py-4 bg-gray-50 border-t border-gray-200 flex space-x-3">
                            <button class="flex-1 px-4 py-2 border-2 border-[#FF7144] text-sm font-semibold rounded-lg text-[#FF7144] bg-white hover:bg-orange-50 transition-colors duration-150 text-center">
                                Lihat Detail
                            </button>
                            <a href="{{ route('lamar.create') }}" class="flex-1 px-4 py-2 text-sm font-semibold rounded-lg text-white bg-[#FF7144] hover:bg-orange-600 transition-colors duration-150 text-center">
                                Lamar
                            </a>
                        </div>
                    </div>

                    <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                        <div class="p-6">
                            <div class="flex items-start mb-4">
                                <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center mr-4">
                                    <svg class="w-6 h-6 text-[#FF7144]" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12a7.5 7.5 0 0015 0m-15 0a7.5 7.5 0 1115 0m-15 0H3m16.5 0H21m-1.5 0H12m-8.457 3.077l1.41-.513m14.095-5.13l1.41-.513M5.106 17.785l1.15-.964m11.49-9.642l1.149-.964M7.501 19.795l.75-1.3m7.5-12.99l.75-1.3m-6.063 16.658l.26-1.477m2.605-14.772l.26-1.477m0 17.726l-.26-1.477M10.698 4.614l-.26-1.477M16.5 19.794l-.75-1.299M7.5 4.205L12 12m6.894 5.785l-1.149-.964M6.256 7.178l-1.15-.964m15.352 8.864l-1.41-.513M4.954 9.435l-1.41-.514M12.002 12l-3.75 6.495" />
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="text-lg font-semibold text-slate-900">DevOps Engineer</h3>
                                    <p class="text-sm text-slate-500">Anti Nganggur</p>
                                </div>
                            </div>

                            <div class="flex flex-wrap gap-2 mb-4">
                                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-orange-100 text-orange-700">
                                    <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                                    </svg>
                                    Bandung
                                </span>
                                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-orange-100 text-orange-700">
                                    <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd" />
                                    </svg>
                                    Full-Time
                                </span>
                                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-orange-100 text-orange-700">
                                    Rp 22-32 jt/bulan
                                </span>
                            </div>

                            <p class="text-sm text-slate-600 mb-4 leading-relaxed">
                                Dibutuhkan DevOps Engineer untuk mengelola CI/CD pipeline, containerization dengan Docker/Kubernetes, dan cloud infrastructure. Pengalaman dengan AWS/GCP/Azure sangat diutamakan.
                            </p>
                        </div>

                        <div class="px-6 py-4 bg-gray-50 border-t border-gray-200 flex space-x-3">
                            <button class="flex-1 px-4 py-2 border-2 border-[#FF7144] text-sm font-semibold rounded-lg text-[#FF7144] bg-white hover:bg-orange-50 transition-colors duration-150 text-center">
                                Lihat Detail
                            </button>
                            <a href="{{ route('lamar.create') }}" class="flex-1 px-4 py-2 text-sm font-semibold rounded-lg text-white bg-[#FF7144] hover:bg-orange-600 transition-colors duration-150 text-center">
                                Lamar
                            </a>
                        </div>
                    </div>

                    <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                        <div class="p-6">
                            <div class="flex items-start mb-4">
                                <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center mr-4">
                                    <svg class="w-6 h-6 text-[#FF7144]" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.53 16.122a3 3 0 00-5.78 1.128 2.25 2.25 0 01-2.4 2.245 4.5 4.5 0 008.4-2.245c0-.399-.078-.78-.22-1.128zm0 0a15.998 15.998 0 003.388-1.62m-5.043-.025a15.994 15.994 0 011.622-3.395m3.42 3.42a15.995 15.995 0 004.764-4.648l3.876-5.814a1.151 1.151 0 00-1.597-1.597L14.146 6.32a15.996 15.996 0 00-4.649 4.763m3.42 3.42a6.776 6.776 0 00-3.42-3.42" />
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="text-lg font-semibold text-slate-900">UI/UX Designer</h3>
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
                                    Rp 12-18 jt/bulan
                                </span>
                            </div>

                            <p class="text-sm text-slate-600 mb-4 leading-relaxed">
                                Mencari UI/UX Designer kreatif untuk merancang pengalaman pengguna yang intuitif. Mahir menggunakan Figma, Adobe XD, dan memahami prinsip design thinking serta user research.
                            </p>
                        </div>

                        <div class="px-6 py-4 bg-gray-50 border-t border-gray-200 flex space-x-3">
                            <button class="flex-1 px-4 py-2 border-2 border-[#FF7144] text-sm font-semibold rounded-lg text-[#FF7144] bg-white hover:bg-orange-50 transition-colors duration-150 text-center">
                                Lihat Detail
                            </button>
                            <a href="{{ route('lamar.create') }}" class="flex-1 px-4 py-2 text-sm font-semibold rounded-lg text-white bg-[#FF7144] hover:bg-orange-600 transition-colors duration-150 text-center">
                                Lamar
                            </a>
                        </div>
                    </div>

                    <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                        <div class="p-6">
                            <div class="flex items-start mb-4">
                                <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center mr-4">
                                    <svg class="w-6 h-6 text-[#FF7144]" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.429 9.75L2.25 12l4.179 2.25m0-4.5l5.571 3 5.571-3m-11.142 0L2.25 7.5 12 2.25l9.75 5.25-4.179 2.25m0 0L21.75 12l-4.179 2.25m0 0l4.179 2.25L12 21.75 2.25 16.5l4.179-2.25m11.142 0l-5.571 3-5.571-3" />
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="text-lg font-semibold text-slate-900">Full Stack Developer</h3>
                                    <p class="text-sm text-slate-500">Anti Nganggur</p>
                                </div>
                            </div>

                            <div class="flex flex-wrap gap-2 mb-4">
                                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-orange-100 text-orange-700">
                                    <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                                    </svg>
                                    Yogyakarta
                                </span>
                                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-orange-100 text-orange-700">
                                    <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd" />
                                    </svg>
                                    Full-Time
                                </span>
                                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-orange-100 text-orange-700">
                                    Rp 20-28 jt/bulan
                                </span>
                            </div>

                            <p class="text-sm text-slate-600 mb-4 leading-relaxed">
                                Dibutuhkan Full Stack Developer yang menguasai frontend (React/Vue) dan backend (Node.js/Laravel). Mampu mengembangkan aplikasi web end-to-end dengan database management yang baik.
                            </p>
                        </div>

                        <div class="px-6 py-4 bg-gray-50 border-t border-gray-200 flex space-x-3">
                            <button class="flex-1 px-4 py-2 border-2 border-[#FF7144] text-sm font-semibold rounded-lg text-[#FF7144] bg-white hover:bg-orange-50 transition-colors duration-150 text-center">
                                Lihat Detail
                            </button>
                            <a href="{{ route('lamar.create') }}" class="flex-1 px-4 py-2 text-sm font-semibold rounded-lg text-white bg-[#FF7144] hover:bg-orange-600 transition-colors duration-150 text-center">
                                Lamar
                            </a>
                        </div>
                    </div>

                    <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                        <div class="p-6">
                            <div class="flex items-start mb-4">
                                <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center mr-4">
                                    <svg class="w-6 h-6 text-[#FF7144]" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 01-1.043 3.296 3.745 3.745 0 01-3.296 1.043A3.745 3.745 0 0112 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 01-3.296-1.043 3.745 3.745 0 01-1.043-3.296A3.745 3.745 0 013 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 011.043-3.296 3.746 3.746 0 013.296-1.043A3.746 3.746 0 0112 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 013.296 1.043 3.746 3.746 0 011.043 3.296A3.745 3.745 0 0121 12z" />
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="text-lg font-semibold text-slate-900">QA Engineer</h3>
                                    <p class="text-sm text-slate-500">Anti Nganggur</p>
                                </div>
                            </div>

                            <div class="flex flex-wrap gap-2 mb-4">
                                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-orange-100 text-orange-700">
                                    <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                                    </svg>
                                    Semarang
                                </span>
                                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-orange-100 text-orange-700">
                                    <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd" />
                                    </svg>
                                    Full-Time
                                </span>
                                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-orange-100 text-orange-700">
                                    Rp 14-20 jt/bulan
                                </span>
                            </div>

                            <p class="text-sm text-slate-600 mb-4 leading-relaxed">
                                Mencari QA Engineer untuk memastikan kualitas software melalui testing manual dan automation. Pengalaman dengan Selenium, Cypress, atau tools testing lainnya sangat diutamakan.
                            </p>
                        </div>

                        <div class="px-6 py-4 bg-gray-50 border-t border-gray-200 flex space-x-3">
                            <button class="flex-1 px-4 py-2 border-2 border-[#FF7144] text-sm font-semibold rounded-lg text-[#FF7144] bg-white hover:bg-orange-50 transition-colors duration-150 text-center">
                                Lihat Detail
                            </button>
                            <a href="{{ route('lamar.create') }}" class="flex-1 px-4 py-2 text-sm font-semibold rounded-lg text-white bg-[#FF7144] hover:bg-orange-600 transition-colors duration-150 text-center">
                                Lamar
                            </a>
                        </div>
                    </div>

                    <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                        <div class="p-6">
                            <div class="flex items-start mb-4">
                                <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center mr-4">
                                    <svg class="w-6 h-6 text-[#FF7144]" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 3v11.25A2.25 2.25 0 006 16.5h2.25M3.75 3h-1.5m1.5 0h16.5m0 0h1.5m-1.5 0v11.25A2.25 2.25 0 0118 16.5h-2.25m-7.5 0h7.5m-7.5 0l-1 3m8.5-3l1 3m0 0l-1 3m-16.5-3l1 3m7.5 0V21m0-10.5V3m0 0L9 6m3-3l3 3" />
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="text-lg font-semibold text-slate-900">Product Manager</h3>
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
                                    Rp 25-35 jt/bulan
                                </span>
                            </div>

                            <p class="text-sm text-slate-600 mb-4 leading-relaxed">
                                Dibutuhkan Product Manager untuk memimpin pengembangan produk digital. Bertanggung jawab atas roadmap produk, analisis market, dan koordinasi dengan tim engineering dan design.
                            </p>
                        </div>

                        <div class="px-6 py-4 bg-gray-50 border-t border-gray-200 flex space-x-3">
                            <button class="flex-1 px-4 py-2 border-2 border-[#FF7144] text-sm font-semibold rounded-lg text-[#FF7144] bg-white hover:bg-orange-50 transition-colors duration-150 text-center">
                                Lihat Detail
                            </button>
                            <a href="{{ route('lamar.create') }}" class="flex-1 px-4 py-2 text-sm font-semibold rounded-lg text-white bg-[#FF7144] hover:bg-orange-600 transition-colors duration-150 text-center">
                                Lamar
                            </a>
                        </div>
                    </div>

                    <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                        <div class="p-6">
                            <div class="flex items-start mb-4">
                                <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center mr-4">
                                    <svg class="w-6 h-6 text-[#FF7144]" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 3.104v5.714a2.25 2.25 0 01-.659 1.591L5 14.5M9.75 3.104c-.251.023-.501.05-.75.082m.75-.082a24.301 24.301 0 014.5 0m0 0v5.714c0 .597.237 1.17.659 1.591L19.8 15.3M14.25 3.104c.251.023.501.05.75.082M19.8 15.3l-1.57.393A9.065 9.065 0 0112 15a9.065 9.065 0 00-6.23-.693L5 14.5m14.8.8l1.402 1.402c1.232 1.232.65 3.318-1.067 3.611A48.309 48.309 0 0112 21c-2.773 0-5.491-.235-8.135-.687-1.718-.293-2.3-2.379-1.067-3.611L5 14.5" />
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="text-lg font-semibold text-slate-900">Machine Learning Engineer</h3>
                                    <p class="text-sm text-slate-500">Anti Nganggur</p>
                                </div>
                            </div>

                            <div class="flex flex-wrap gap-2 mb-4">
                                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-orange-100 text-orange-700">
                                    <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                                    </svg>
                                    Bandung
                                </span>
                                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-orange-100 text-orange-700">
                                    <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd" />
                                    </svg>
                                    Full-Time
                                </span>
                                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-orange-100 text-orange-700">
                                    Rp 28-40 jt/bulan
                                </span>
                            </div>

                            <p class="text-sm text-slate-600 mb-4 leading-relaxed">
                                Mencari ML Engineer untuk mengembangkan dan deploy model machine learning. Pengalaman dengan Python, TensorFlow/PyTorch, dan cloud ML services sangat dibutuhkan.
                            </p>
                        </div>

                        <div class="px-6 py-4 bg-gray-50 border-t border-gray-200 flex space-x-3">
                            <button class="flex-1 px-4 py-2 border-2 border-[#FF7144] text-sm font-semibold rounded-lg text-[#FF7144] bg-white hover:bg-orange-50 transition-colors duration-150 text-center">
                                Lihat Detail
                            </button>
                            <a href="{{ route('lamar.create') }}" class="flex-1 px-4 py-2 text-sm font-semibold rounded-lg text-white bg-[#FF7144] hover:bg-orange-600 transition-colors duration-150 text-center">
                                Lamar
                            </a>
                        </div>
                    </div>

                    <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                        <div class="p-6">
                            <div class="flex items-start mb-4">
                                <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center mr-4">
                                    <svg class="w-6 h-6 text-[#FF7144]" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 6.375c0 2.278-3.694 4.125-8.25 4.125S3.75 8.653 3.75 6.375m16.5 0c0-2.278-3.694-4.125-8.25-4.125S3.75 4.097 3.75 6.375m16.5 0v11.25c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125V6.375m16.5 0v3.75m-16.5-3.75v3.75m16.5 0v3.75C20.25 16.153 16.556 18 12 18s-8.25-1.847-8.25-4.125v-3.75m16.5 0c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125" />
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="text-lg font-semibold text-slate-900">Database Administrator</h3>
                                    <p class="text-sm text-slate-500">Anti Nganggur</p>
                                </div>
                            </div>

                            <div class="flex flex-wrap gap-2 mb-4">
                                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-orange-100 text-orange-700">
                                    <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                                    </svg>
                                    Medan
                                </span>
                                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-orange-100 text-orange-700">
                                    <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd" />
                                    </svg>
                                    Full-Time
                                </span>
                                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-orange-100 text-orange-700">
                                    Rp 16-24 jt/bulan
                                </span>
                            </div>

                            <p class="text-sm text-slate-600 mb-4 leading-relaxed">
                                Dibutuhkan DBA untuk mengelola database MySQL, PostgreSQL, dan MongoDB. Bertanggung jawab atas backup, recovery, performance tuning, dan keamanan database.
                            </p>
                        </div>

                        <div class="px-6 py-4 bg-gray-50 border-t border-gray-200 flex space-x-3">
                            <button class="flex-1 px-4 py-2 border-2 border-[#FF7144] text-sm font-semibold rounded-lg text-[#FF7144] bg-white hover:bg-orange-50 transition-colors duration-150 text-center">
                                Lihat Detail
                            </button>
                            <a href="{{ route('lamar.create') }}" class="flex-1 px-4 py-2 text-sm font-semibold rounded-lg text-white bg-[#FF7144] hover:bg-orange-600 transition-colors duration-150 text-center">
                                Lamar
                            </a>
                        </div>
                    </div>

                    <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                        <div class="p-6">
                            <div class="flex items-start mb-4">
                                <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center mr-4">
                                    <svg class="w-6 h-6 text-[#FF7144]" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 013 19.875v-6.75zM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V8.625zM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V4.125z" />
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="text-lg font-semibold text-slate-900">System Analyst</h3>
                                    <p class="text-sm text-slate-500">Anti Nganggur</p>
                                </div>
                            </div>

                            <div class="flex flex-wrap gap-2 mb-4">
                                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-orange-100 text-orange-700">
                                    <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                                    </svg>
                                    Makassar
                                </span>
                                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-orange-100 text-orange-700">
                                    <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd" />
                                    </svg>
                                    Full-Time
                                </span>
                                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-orange-100 text-orange-700">
                                    Rp 15-22 jt/bulan
                                </span>
                            </div>

                            <p class="text-sm text-slate-600 mb-4 leading-relaxed">
                                Mencari System Analyst untuk menganalisis kebutuhan bisnis dan merancang solusi sistem informasi. Bertanggung jawab atas dokumentasi requirement, flowchart, dan koordinasi implementasi sistem.
                            </p>
                        </div>

                        <div class="px-6 py-4 bg-gray-50 border-t border-gray-200 flex space-x-3">
                            <button class="flex-1 px-4 py-2 border-2 border-[#FF7144] text-sm font-semibold rounded-lg text-[#FF7144] bg-white hover:bg-orange-50 transition-colors duration-150 text-center">
                                Lihat Detail
                            </button>
                            <a href="{{ route('lamar.create') }}" class="flex-1 px-4 py-2 text-sm font-semibold rounded-lg text-white bg-[#FF7144] hover:bg-orange-600 transition-colors duration-150 text-center">
                                Lamar
                            </a>
                        </div>
                    </div>
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
