@extends('layouts.app')

@section('title', 'AntiNganggur - Beranda')

@section('content')
    <!-- ===== Section 1: Selamat Datang (Hero) Mulai ===== -->
    <section
        class="pt-12 pb-16 md:pt-20 md:pb-24 lg:pt-24 lg:pb-48 overflow-hidden bg-gradient-to-bl from-orange-200 to-white">
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

                    <p
                        class="mt-5 text-base text-[#626262] sm:mt-6 sm:text-lg md:max-w-xl md:mx-auto lg:mx-0 leading-relaxed">
                        AntiNganggur membantu Anda menemukan pekerjaan yang sesuai dengan keahlian dan minat Anda. Mulailah
                        perjalanan karier Anda sekarang!
                    </p>
                    <div class="mt-8 sm:flex sm:justify-center lg:justify-start sm:space-x-4 space-y-4 sm:space-y-0">
                        {{-- Ganti # dengan route yang sesuai jika ada --}}
                        <a href="{{ url('/lowongan') }}"
                            class="w-full sm:w-auto flex items-center justify-center px-8 py-3 border border-transparent text-base font-semibold rounded-lg text-white bg-[#FF7144] hover:bg-orange-600 md:text-lg md:px-10 shadow-md hover:shadow-lg transition-all duration-200">
                            Lihat Lowongan
                        </a>

                    </div>
                </div>
                <div class="mt-12 lg:mt-0 lg:col-span-6 xl:col-span-6">
                    <div class="relative mx-auto w-full max-w-md lg:max-w-lg xl:max-w-xl">
                        <div class="absolute inset-0 flex items-center justify-center -z-0 opacity-60 pointer-events-none">
                            <div class="w-[110%] h-[110%] aspect-square bg-white/80 rounded-full blur-2xl"></div>
                        </div>
                        <img class="relative w-full h-auto rounded-lg" src="{{ asset('asset/page/Kerja.png') }}"
                            alt="Ilustrasi Temukan Pekerjaan Impian Anda">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ===== Section 1: Selamat Datang (Hero) Selesai ===== -->

    <!-- ===== Section 2: Lowongan IT Terbuka Mulai ===== -->
    <section class="py-16 md:py-20 lg:py-24 bg-[#FFF6F4]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12 md:mb-16">
                <h2 class="text-3xl font-extrabold text-[#FF7144] sm:text-4xl">
                    Trending Job
                </h2>
                <p class="mt-3 max-w-2xl mx-auto text-base text-slate-600 sm:mt-4 sm:text-lg leading-relaxed">
                    Jelajahi Peluang Karir Paling Populer yang Sesuai dengan Keahlian Anda
                </p>
            </div>

            {{-- Cek apakah ada data trending job --}}
            @if ($trendingJobs->isNotEmpty())
                <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">

                    {{-- Mulai Looping untuk setiap lowongan --}}
                    @foreach ($trendingJobs as $job)
                        <div
                            class="flex flex-col rounded-xl shadow-lg overflow-hidden bg-white border border-gray-200 hover:shadow-2xl transition-shadow duration-300">
                            <div class="p-6 flex-grow">
                                <div class="flex items-start">
                                    <span
                                        class="flex-shrink-0 inline-flex items-center justify-center h-12 w-12 rounded-lg bg-orange-100">
                                        {{-- Tampilkan logo pekerjaan --}}
                                        <img src="{{ asset('storage/' . $job->job_logo) }}"
                                            alt="Logo {{ $job->company_name }}" class="h-8 w-8 object-contain">
                                    </span>
                                    <div class="ml-4">
                                        {{-- Ambil judul dari database --}}
                                        <h3 class="text-lg font-semibold text-slate-900">{{ $job->title }}</h3>
                                        <p class="text-sm text-slate-500">{{ $job->company_name }}</p>
                                    </div>
                                </div>
                                <div class="mt-4 flex flex-wrap gap-2">
                                    {{-- Lokasi --}}
                                    <span
                                        class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-orange-100 text-orange-700">
                                        <svg class="-ml-0.5 mr-1.5 h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        {{ $job->location }}
                                    </span>
                                    {{-- Tipe Pekerjaan --}}
                                    <span
                                        class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-orange-100 text-orange-700">
                                        <svg class="-ml-0.5 mr-1.5 h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        {{ $job->type_job }}
                                    </span>
                                </div>
                                {{-- Deskripsi singkat --}}
                                <p class="mt-4 text-sm text-slate-600 line-clamp-3 leading-relaxed">
                                    {{ $job->description }}
                                </p>
                            </div>
                            <div class="p-4 sm:p-6 bg-gray-50 border-t border-gray-200">
                                {{-- Arahkan ke halaman detail sesuai ID lowongan --}}
                                <a href="{{ route('lowongan.show', $job->id) }}"
                                    class="w-full flex items-center justify-center px-4 py-2.5 border-2 border-[#FF7144] text-sm font-semibold rounded-lg text-[#FF7144] bg-white hover:bg-orange-50 hover:border-orange-600 hover:text-orange-600 shadow-sm transition-colors duration-150">
                                    Lihat Detail
                                </a>
                            </div>
                        </div>
                    @endforeach
                    {{-- Selesai Looping --}}
                </div>
            @else
                {{-- Tampilkan pesan jika tidak ada lowongan --}}
                <div class="text-center">
                    <p class="text-lg text-slate-600">Saat ini belum ada lowongan yang sedang tren.</p>
                </div>
            @endif

            <div class="mt-12 md:mt-16 text-center">
                <a href="{{ route('lowongan') }}"
                    class="inline-flex items-center justify-center px-8 py-3.5 border-2 border-[#FF7144] text-base font-semibold rounded-lg text-[#FF7144] bg-white hover:bg-orange-50 hover:border-orange-600 hover:text-orange-600 md:text-lg md:px-10 shadow-sm hover:shadow transition-all duration-200">
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

            <div class="swiper testimonial-slider overflow-hidden">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="max-w-xl mx-auto lg:max-w-2xl xl:max-w-3xl">
                            <div class="bg-white p-6 py-8 md:p-10 rounded-xl shadow-2xl relative border border-gray-100">
                                <p class="text-slate-600 text-base md:text-lg italic leading-relaxed text-center">
                                    "Berkat AntiNganggur, Saya Berhasil Mendapatkan Pekerjaan Sebagai UI/UX Designer Di
                                    Startup Teknologi Hanya Dalam 2 Minggu. Fitur Pencarian Kerja Yang Spesifik Sangat
                                    Membantu!"
                                </p>
                                <div
                                    class="mt-8 flex flex-col items-center text-center sm:flex-row sm:items-center sm:justify-center sm:text-left">
                                    <div class="flex-shrink-0 h-16 w-16 md:h-20 md:w-20 rounded-full bg-[#FF7144] flex items-center justify-center text-white text-2xl md:text-3xl font-bold ring-4 ring-white shadow-md">
                                            RA
                                    </div>
                                    <div class="mt-4 sm:mt-0 sm:ml-6">
                                        <p class="text-lg font-bold text-[#FF7144]">Rizky Amalia</p>
                                        <p class="text-base text-slate-500">UI/UX Designer</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="max-w-xl mx-auto lg:max-w-2xl xl:max-w-3xl">
                            <div class="bg-white p-6 py-8 md:p-10 rounded-xl shadow-2xl relative border border-gray-100">
                                <p class="text-slate-600 text-base md:text-lg italic leading-relaxed text-center">
                                    "Sebagai seorang Backend Developer, saya sering kesulitan mencari lowongan yang sesuai.
                                    AntiNganggur menyediakan filter yang detail, sehingga saya bisa fokus pada lowongan yang
                                    menggunakan teknologi yang saya kuasai."
                                </p>
                                <div
                                    class="mt-8 flex flex-col items-center text-center sm:flex-row sm:items-center sm:justify-center sm:text-left">
                                    <div class="flex-shrink-0">
                                        <div
                                            class="h-16 w-16 md:h-20 md:w-20 rounded-full bg-[#FF7144] flex items-center justify-center text-white text-2xl md:text-3xl font-bold ring-4 ring-white shadow-md">
                                            BS
                                        </div>
                                    </div>
                                    <div class="mt-4 sm:mt-0 sm:ml-6">
                                        <p class="text-lg font-bold text-[#FF7144]">Budi Santoso</p>
                                        <p class="text-base text-slate-500">Backend Developer</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="max-w-xl mx-auto lg:max-w-2xl xl:max-w-3xl">
                            <div class="bg-white p-6 py-8 md:p-10 rounded-xl shadow-2xl relative border border-gray-100">
                                <p class="text-slate-600 text-base md:text-lg italic leading-relaxed text-center">
                                    "Platformnya sangat _user-friendly_ dan proses melamarnya juga cepat. Saya mendapatkan
                                    panggilan interview dari beberapa perusahaan besar. Sangat direkomendasikan untuk para
                                    pencari kerja di bidang IT!"
                                </p>
                                <div
                                    class="mt-8 flex flex-col items-center text-center sm:flex-row sm:items-center sm:justify-center sm:text-left">
                                    <div class="flex-shrink-0">
                                        <div
                                            class="h-16 w-16 md:h-20 md:w-20 rounded-full bg-[#FF7144] flex items-center justify-center text-white text-2xl md:text-3xl font-bold ring-4 ring-white shadow-md">
                                            CL
                                        </div>
                                    </div>
                                    <div class="mt-4 sm:mt-0 sm:ml-6">
                                        <p class="text-lg font-bold text-[#FF7144]">Citra Lestari</p>
                                        <p class="text-base text-slate-500">Data Scientist</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="testimonial-pagination flex justify-center space-x-3 mt-8 md:mt-10"></div>
            </div>
        </div>
    </section>
    <!-- ===== Section 4: Apa Kata Profesional Selesai ===== -->
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const swiper = new Swiper('.testimonial-slider', {
                // Optional parameters
                loop: true,
                slidesPerView: 1,
                spaceBetween: 30,

                // Autoplay configuration
                autoplay: {
                    delay: 3000,
                    disableOnInteraction: false,
                },

                // Pagination configuration
                pagination: {
                    el: '.testimonial-pagination',
                    clickable: true,
                },

                // Effect
                effect: 'fade',
                fadeEffect: {
                    crossFade: true
                },
            });
        });
    </script>
@endpush
