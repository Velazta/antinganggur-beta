@extends('layouts.app') {{-- Menggunakan layout utama --}}

@section('title', 'AntiNganggur - Beranda') {{-- Mengganti title default jika perlu --}}

@section('content')
    <!-- ===== Section 1: Selamat Datang (Hero) Mulai ===== -->
    <section class="pt-12 pb-16 md:pt-20 md:pb-24 lg:pt-24 lg:pb-48 overflow-hidden bg-gradient-to-bl from-orange-200 to-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="lg:grid lg:grid-cols-12 lg:gap-x-12 xl:gap-x-16 lg:items-center">
                <div class="lg:col-span-6 xl:col-span-6 text-center lg:text-left">

                    <p class="text-lg font-semibold tracking-wide">
                        <span class="text-[#FF7144]">Selamat</span>
                        <span class="text-[#626262]"> Datang!</span>
                    </p>

                    <p class="mt-2 text-4xl tracking-tight font-extrabold sm:text-5xl md:text-5xl leading-tight">
                        <span class="text-[#FF7144]">Temukan</span>
                        <span class="text-[#626262]"> Pekerjaan</span><br>
                        <span class="text-[#626262]">Impian</span>
                        <span class="text-[#FF7144]"> Anda.</span>
                    </p>

                    <p class="mt-5 text-base text-[#626262] sm:mt-6 sm:text-lg md:max-w-xl md:mx-auto lg:mx-0 leading-relaxed">
                        AntiNganggur membantu Anda menemukan pekerjaan yang sesuai dengan keahlian dan minat Anda. Mulailah perjalanan karier Anda sekarang!
                    </p>
                    <div class="mt-8 sm:flex sm:justify-center lg:justify-start sm:space-x-4 space-y-4 sm:space-y-0">
                        {{-- Ganti # dengan route yang sesuai jika ada --}}
                        <a href="{{ url('/lowongan') }}" class="w-full sm:w-auto flex items-center justify-center px-8 py-3 border border-transparent text-base font-semibold rounded-lg text-white bg-[#FF7144] hover:bg-orange-600 md:text-lg md:px-10 shadow-md hover:shadow-lg transition-all duration-200">
                            Lihat Lowongan
                        </a>
                        <a href="{{ asset('asset/page/lamar') }}" class="w-full sm:w-auto flex items-center justify-center px-8 py-3 border-2 border-[#FF7144] text-base font-semibold rounded-lg text-[#FF7144] bg-white hover:bg-orange-50 hover:border-orange-600 hover:text-orange-600 md:text-lg md:px-10 shadow-sm hover:shadow transition-all duration-200">
                            Lamar Sekarang
                        </a>
                    </div>
                </div>
                <div class="mt-12 lg:mt-0 lg:col-span-6 xl:col-span-6">
                    <div class="relative mx-auto w-full max-w-md lg:max-w-lg xl:max-w-xl">
                        <div class="absolute inset-0 flex items-center justify-center -z-0 opacity-60 pointer-events-none">
                            <div class="w-[110%] h-[110%] aspect-square bg-white/80 rounded-full blur-2xl"></div>
                        </div>
                        <img class="relative w-full h-auto rounded-lg" src="{{ asset('asset/page/Kerja.png') }}" alt="Ilustrasi Temukan Pekerjaan Impian Anda">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ===== Section 1: Selamat Datang (Hero) Selesai ===== -->

    <!-- ===== Section 2: Lowongan IT Terbuka Mulai ===== -->
    <section class="py-16 md:py-20 lg:py-24 bg-[#FFF6F4]"> {{-- bg-brand-peach equivalent --}}
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12 md:mb-16">
                <h2 class="text-3xl font-extrabold text-[#FF7144] sm:text-4xl">
                    Lowongan IT Terbuka
                </h2>
                <p class="mt-3 max-w-2xl mx-auto text-base text-slate-600 sm:mt-4 sm:text-lg leading-relaxed">
                    Temukan Pekerjaan Teknologi Terkini Dari Perusahaan AntiNganggur
                </p>
            </div>

            <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
                <!-- Card Lowongan 1 -->
                <div class="flex flex-col rounded-xl shadow-lg overflow-hidden bg-white border border-gray-200 hover:shadow-2xl transition-shadow duration-300">
                    <div class="p-6 flex-grow">
                        <div class="flex items-start">
                            <span class="flex-shrink-0 inline-flex items-center justify-center h-12 w-12 rounded-lg bg-orange-100 text-[#FF7144]">
                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 6.75L22.5 12l-5.25 5.25m-10.5 0L1.5 12l5.25-5.25m7.5-3l-4.5 16.5" />
                                </svg>
                            </span>
                            <div class="ml-4">
                                <h3 class="text-lg font-semibold text-slate-900">Frontend Developer</h3>
                                <p class="text-sm text-slate-500">Anti Nganggur</p>
                            </div>
                        </div>
                        <div class="mt-4 flex flex-wrap gap-2">
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-orange-100 text-orange-700"> {{-- Dulu bg-brand-tag-bg text-brand-tag-text --}}
                                <svg class="-ml-0.5 mr-1.5 h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                                </svg>
                                Surakarta
                            </span>
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-orange-100 text-orange-700">
                                <svg class="-ml-0.5 mr-1.5 h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd" />
                                </svg>
                                Full-Time
                            </span>
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-orange-100 text-orange-700">
                                <svg class="-ml-0.5 mr-1.5 h-4 w-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
                                </svg>
                                Rp10-15jt/Bulan
                            </span>
                        </div>
                        <p class="mt-4 text-sm text-slate-600 line-clamp-3 leading-relaxed">
                            Membutuhkan Frontend Developer berpengalaman React Js untuk Membangun Antarmuka Web Yang Responsif, Menarik, Dan Mudah Digunakan. Kandidat Harus Memahami Integrasi API, Version Control, Dan Prinsip Desain UI Yang Baik.
                        </p>
                    </div>
                    <div class="p-4 sm:p-6 bg-gray-50 border-t border-gray-200 flex space-x-3">
                        <a href="{{ asset('asset/page/lowongan/frontend-developer') }}" class="w-1/2 flex items-center justify-center px-4 py-2.5 border-2 border-[#FF7144] text-sm font-semibold rounded-lg text-[#FF7144] bg-white hover:bg-orange-50 hover:border-orange-600 hover:text-orange-600 shadow-sm transition-colors duration-150">
                            Lihat Detail
                        </a>
                        <a href="{{ asset('asset/page/lamar/frontend-developer') }}" class="w-1/2 flex items-center justify-center px-4 py-2.5 border-2 border-[#FF7144] text-sm font-semibold rounded-lg text-white bg-[#FF7144] hover:bg-orange-600 hover:border-orange-600 shadow-sm hover:shadow-md transition-all duration-150">
                            Lamar
                        </a>
                    </div>
                </div>

                <!-- Card Lowongan 2 -->
                <div class="flex flex-col rounded-xl shadow-lg overflow-hidden bg-white border border-gray-200 hover:shadow-2xl transition-shadow duration-300">
                    <div class="p-6 flex-grow">
                        <div class="flex items-start">
                            <span class="flex-shrink-0 inline-flex items-center justify-center h-12 w-12 rounded-lg bg-orange-100 text-[#FF7144]">
                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 6.375c0 2.278-3.694 4.125-8.25 4.125S3.75 8.653 3.75 6.375m16.5 0c0-2.278-3.694-4.125-8.25-4.125S3.75 4.097 3.75 6.375m16.5 0v11.25c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125V6.375m16.5 0v3.75m-16.5-3.75v3.75m16.5 0v3.75C20.25 16.153 16.556 18 12 18s-8.25-1.847-8.25-4.125v-3.75m16.5 0c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125" />
                                </svg>
                            </span>
                            <div class="ml-4">
                                <h3 class="text-lg font-semibold text-slate-900">Data Scientist</h3>
                                <p class="text-sm text-slate-500">Anti Nganggur</p>
                            </div>
                        </div>
                        <div class="mt-4 flex flex-wrap gap-2">
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-orange-100 text-orange-700">
                                 <svg class="-ml-0.5 mr-1.5 h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                                </svg>
                                Surakarta
                            </span>
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-orange-100 text-orange-700">
                                 <svg class="-ml-0.5 mr-1.5 h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd" />
                                </svg>
                                Full-Time
                            </span>
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-orange-100 text-orange-700">
                                 <svg class="-ml-0.5 mr-1.5 h-4 w-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
                                </svg>
                                Rp22-32jt/Bulan
                            </span>
                        </div>
                        <p class="mt-4 text-sm text-slate-600 line-clamp-3 leading-relaxed">
                            AntiNganggur Membuka Lowongan Untuk Data Scientist Yang Mampu Mengolah Data Kompleks Menggunakan Python & Machine Learning. Kandidat Akan Membantu Menghasilkan Insight Yang Bermanfaat Bagi Pengambilan Keputusan Bisnis.
                        </p>
                    </div>
                    <div class="p-4 sm:p-6 bg-gray-50 border-t border-gray-200 flex space-x-3">
                         <a href="{{ asset('asset/page/lowongan/data-scientist') }}" class="w-1/2 flex items-center justify-center px-4 py-2.5 border-2 border-[#FF7144] text-sm font-semibold rounded-lg text-[#FF7144] bg-white hover:bg-orange-50 hover:border-orange-600 hover:text-orange-600 shadow-sm transition-colors duration-150">
                            Lihat Detail
                        </a>
                        <a href="{{ asset('asset/page/lamar/data-scientist') }}" class="w-1/2 flex items-center justify-center px-4 py-2.5 border-2 border-[#FF7144] text-sm font-semibold rounded-lg text-white bg-[#FF7144] hover:bg-orange-600 hover:border-orange-600 shadow-sm hover:shadow-md transition-all duration-150">
                            Lamar
                        </a>
                    </div>
                </div>

                <!-- Card Lowongan 3 -->
                <div class="flex flex-col rounded-xl shadow-lg overflow-hidden bg-white border border-gray-200 hover:shadow-2xl transition-shadow duration-300">
                    <div class="p-6 flex-grow">
                        <div class="flex items-start">
                            <span class="flex-shrink-0 inline-flex items-center justify-center h-12 w-12 rounded-lg bg-orange-100 text-[#FF7144]">
                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622A11.99 11.99 0 0018.402 6a11.959 11.959 0 01-1.909-.786A11.971 11.971 0 0012 2.25c-2.649 0-5.106.904-7.091 2.464z" />
                                </svg>
                            </span>
                            <div class="ml-4">
                                <h3 class="text-lg font-semibold text-slate-900">Cyber Security Analyst</h3>
                                <p class="text-sm text-slate-500">Anti Nganggur</p>
                            </div>
                        </div>
                        <div class="mt-4 flex flex-wrap gap-2">
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-orange-100 text-orange-700">
                                 <svg class="-ml-0.5 mr-1.5 h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                                </svg>
                                Surakarta
                            </span>
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-orange-100 text-orange-700">
                                 <svg class="-ml-0.5 mr-1.5 h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd" />
                                </svg>
                                Full-Time
                            </span>
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-orange-100 text-orange-700">
                                 <svg class="-ml-0.5 mr-1.5 h-4 w-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
                                </svg>
                                Rp15-25jt/Bulan
                            </span>
                        </div>
                        <p class="mt-4 text-sm text-slate-600 line-clamp-3 leading-relaxed">
                            Dibutuhkan Cyber Security Analyst Yang Berpengalaman Menjaga Sistem IT Tetap Aman Dari Ancaman. Bertanggung Jawab Atas Pemantauan Keamanan, Analisis Kerentanan, Dan Implementasi Kebijakan Perlindungan Data.
                        </p>
                    </div>
                     <div class="p-4 sm:p-6 bg-gray-50 border-t border-gray-200 flex space-x-3">
                         <a href="{{ asset('asset/page/lowongan/cyber-security-analyst') }}" class="w-1/2 flex items-center justify-center px-4 py-2.5 border-2 border-[#FF7144] text-sm font-semibold rounded-lg text-[#FF7144] bg-white hover:bg-orange-50 hover:border-orange-600 hover:text-orange-600 shadow-sm transition-colors duration-150">
                            Lihat Detail
                        </a>
                        <a href="{{ asset('asset/page/lamar/cyber-security-analyst') }}" class="w-1/2 flex items-center justify-center px-4 py-2.5 border-2 border-[#FF7144] text-sm font-semibold rounded-lg text-white bg-[#FF7144] hover:bg-orange-600 hover:border-orange-600 shadow-sm hover:shadow-md transition-all duration-150">
                            Lamar
                        </a>
                    </div>
                </div>
            </div>

            <div class="mt-12 md:mt-16 text-center">
                <a href="{{ url('/lowongan') }}" class="inline-flex items-center justify-center px-8 py-3.5 border-2 border-[#FF7144] text-base font-semibold rounded-lg text-[#FF7144] bg-white hover:bg-orange-50 hover:border-orange-600 hover:text-orange-600 md:text-lg md:px-10 shadow-sm hover:shadow transition-all duration-200">
                    Lihat Semua Lowongan
                </a>
            </div>
        </div>
    </section>
    <!-- ===== Section 2: Lowongan IT Terbuka Selesai ===== -->

    <!-- ===== Section 3: Mulai Perjalanan Karir Mu Mulai ===== -->
    <section class="py-16 md:py-20 lg:py-24 bg-[#FFF6F4]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12 md:mb-16">
                <h2 class="text-3xl font-extrabold text-[#FF7144] sm:text-4xl">
                    Mulai Perjalanan Karier Mu
                </h2>
                <p class="mt-3 max-w-2xl mx-auto text-base text-slate-600 sm:mt-4 sm:text-lg leading-relaxed">
                    Empat Langkah Mudah Menuju Karier Impian
                </p>
            </div>
            <div class="grid gap-6 md:gap-8 md:grid-cols-2 lg:grid-cols-4">
                <!-- Step Card 1 -->
                <div class="bg-white p-8 rounded-xl shadow-lg text-center hover:shadow-xl transition-shadow duration-300">
                    <div class="flex items-center justify-center mx-auto h-20 w-20 rounded-xl bg-gray-100 mb-6">
                        <span class="text-4xl font-bold text-[#FF7144]">1</span>
                    </div>
                    <h3 class="text-xl font-semibold text-slate-900 mb-2">Buat Profile</h3>
                    <p class="text-sm text-slate-600 leading-relaxed">
                        Buat Akun Dan Lengkapi Profil Dengan Skills, Portfolio, Dan Project Teknologi Anda
                    </p>
                </div>
                 <!-- Step Card 2 -->
                <div class="bg-white p-8 rounded-xl shadow-lg text-center hover:shadow-xl transition-shadow duration-300">
                    <div class="flex items-center justify-center mx-auto h-20 w-20 rounded-xl bg-gray-100 mb-6">
                        <span class="text-4xl font-bold text-[#FF7144]">2</span>
                    </div>
                    <h3 class="text-xl font-semibold text-slate-900 mb-2">Temukan Pekerjaan</h3>
                    <p class="text-sm text-slate-600 leading-relaxed">
                        Cari Lowongan IT Yang Sesuai Dengan Keahlian Dan Minat Anda
                    </p>
                </div>
                 <!-- Step Card 3 -->
                <div class="bg-white p-8 rounded-xl shadow-lg text-center hover:shadow-xl transition-shadow duration-300">
                    <div class="flex items-center justify-center mx-auto h-20 w-20 rounded-xl bg-gray-100 mb-6">
                        <span class="text-4xl font-bold text-[#FF7144]">3</span>
                    </div>
                    <h3 class="text-xl font-semibold text-slate-900 mb-2">Lamar Pekerjaan</h3>
                    <p class="text-sm text-slate-600 leading-relaxed">
                        Kirim Lamaran Dan Ikuti Proses Rekrutmen
                    </p>
                </div>
                 <!-- Step Card 4 -->
                <div class="bg-white p-8 rounded-xl shadow-lg text-center hover:shadow-xl transition-shadow duration-300">
                    <div class="flex items-center justify-center mx-auto h-20 w-20 rounded-xl bg-gray-100 mb-6">
                        <span class="text-4xl font-bold text-[#FF7144]">4</span>
                    </div>
                    <h3 class="text-xl font-semibold text-slate-900 mb-2">Mulai Karier IT</h3>
                    <p class="text-sm text-slate-600 leading-relaxed">
                        Dapatkan Pekerjaan Impian Dan Mulai Karier Teknologi Anda
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!-- ===== Section 3: Mulai Perjalanan Karir Mu Selesai ===== -->

    <!-- ===== Section 4: Apa Kata Profesional Mulai ===== -->
    <section class="py-16 md:py-20 lg:py-24 bg-[#FFF6F4]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12 md:mb-16">
                <h2 class="text-3xl font-extrabold text-[#FF7144] sm:text-4xl">
                    Apa Kata Profesional Tentang AntiNganggur
                </h2>
            </div>
            <!-- Jika ingin slider, Anda perlu JS. Ini adalah tampilan statis satu testimoni -->
            <div class="relative">
                <div class="max-w-xl mx-auto lg:max-w-2xl xl:max-w-3xl">
                    <div class="bg-white p-6 py-8 md:p-10 rounded-xl shadow-2xl relative border border-gray-100">
                        <p class="text-slate-600 text-base md:text-lg italic leading-relaxed text-center">
                            "Berkat AntiNganggur, Saya Berhasil Mendapatkan Pekerjaan Sebagai UI/UX Designer Di Startup Teknologi Hanya Dalam 2 Minggu Setelah Mengunggah CV. Fitur Pencarian Kerja Yang Spesifik Untuk Bidang Desain Sangat Membantu!"
                        </p>
                        <div class="mt-8 flex flex-col items-center text-center sm:flex-row sm:items-center sm:justify-center sm:text-left">
                            <div class="flex-shrink-0">
                                <div class="h-16 w-16 md:h-20 md:w-20 rounded-full bg-orange-100 flex items-center justify-center text-[#FF7144] text-2xl md:text-3xl font-bold ring-4 ring-white shadow-md">
                                    RA
                                </div>
                            </div>
                            <div class="mt-4 sm:mt-0 sm:ml-6">
                                <p class="text-lg font-bold text-[#FF7144]">Rizky Amalia</p>
                                <p class="text-base text-slate-500">UI/UX Designer</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Dots Paginasi (Simulasi, perlu JS untuk fungsionalitas) -->
                <div class="flex justify-center space-x-3 mt-8 md:mt-10">
                    <button aria-label="Testimonial 1" class="h-3 w-3 bg-[#FF7144] rounded-full focus:outline-none ring-2 ring-[#FF7144] ring-offset-2 ring-offset-white"></button>
                    <button aria-label="Testimonial 2" class="h-3 w-3 bg-gray-300 hover:bg-gray-400 rounded-full focus:outline-none focus:ring-2 focus:ring-gray-400 ring-offset-2 ring-offset-white"></button>
                    <button aria-label="Testimonial 3" class="h-3 w-3 bg-gray-300 hover:bg-gray-400 rounded-full focus:outline-none focus:ring-2 focus:ring-gray-400 ring-offset-2 ring-offset-white"></button>
                </div>
            </div>
        </div>
    </section>
    <!-- ===== Section 4: Apa Kata Profesional Selesai ===== -->
@endsection
