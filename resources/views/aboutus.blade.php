@extends('layouts.app')

@section('title', 'Tentang Kami')

@push('styles') {{-- Ganti @section('styles') menjadi @push('styles') --}}
    {{-- CSS Kustom Khusus Halaman Tentang Kami --}}
    <style>
        body {
            font-family: "Poppins", sans-serif;
            background-color: #fff7f5;
            /* Warna latar belakang utama halaman (soft peach/pink) */
            color: #374151;
            /* Default text color (gray-700) */
        }

        .bg-orange-custom {
            background-color: #FF6B35;
            /* Main orange color */
        }

        /* This wrapper ensures all content inside the section is above the ::after pseudo-element */
        .content-wrapper {
            position: relative;
            z-index: 1;
        }

        /* Responsive adjustments for the curve */
        @media (max-width: 1024px) {
            /* lg breakpoint */
            .custom-curved-container {
                border-bottom-right-radius: 150px;
            }

            .custom-curved-container::after {
                width: 280px;
                height: 280px;
            }
        }

        @media (max-width: 768px) {
            /* md breakpoint */
            .custom-curved-container {
                border-bottom-right-radius: 100px;
            }

            .custom-curved-container::after {
                width: 200px;
                height: 200px;
            }
        }

        .title-what-we-do {
            background-color: #FF7144;
            /* [#FF7144] */
            color: white;
            padding: 0.5rem 2.5rem 0.5rem 1.5rem;
            /* Tambah padding kanan agar teks tidak terlalu dekat */
            display: inline-block;
            position: relative;
            border-radius: 0.375rem 0 0 0.375rem;
            /* rounded kiri */
        }

        /* Membuat panah lancip miring ke kanan */
        .title-what-we-do {
            position: relative;
            display: inline-block;
            background-color: #FF7144;
            /* Warna oranye */
            color: white;
            font-weight: 800;
            /* sesuaikan dengan bold/extrabold */
            font-size: 2.5rem;
            /* contoh ukuran, sesuaikan */
            padding: 0.75rem 2rem 0.75rem 2rem;
            /* ruang dalam teks */
            border-radius: 8px;
            /* sudut membulat pada kotak */
            font-family: 'Poppins', sans-serif;
        }

        /* Ekor lancip di bawah */
        .title-what-we-do::after {
            content: "";
            position: absolute;
            bottom: -20px;
            /* sesuaikan jarak ke bawah */
            left: 50%;
            transform: translateX(-50%);
            width: 0;
            height: 0;
            border-left: 20px solid transparent;
            /* lebar sisi miring kiri */
            border-right: 20px solid transparent;
            /* lebar sisi miring kanan */
            border-top: 20px solid #FF7144;
            /* warna panah */
            filter: drop-shadow(1px 1px 1px rgba(0, 0, 0, 0.15));
            /* shadow lembut */
        }

        /* Garis bawah dekoratif untuk Visi & Misi */
        .underline-decorator {
            display: block;
            width: 50px;
            height: 3px;
            background-color: #FF7144;
            /* [#FF7144] */
            margin-top: 0.75rem;
            /* mb-3 */
            margin-left: auto;
            /* Untuk Visi jika teksnya rata kanan */
            margin-right: auto;
            /* Untuk Visi jika teksnya rata tengah */
        }

        .visi-card .underline-decorator {
            margin-left: 0;
            margin-right: auto;
        }

        /* Rata kiri untuk Visi */
        .misi-card .underline-decorator {
            margin-left: 0;
            margin-right: auto;
        }

        /* Header Left */
        .team-header-left {
            font-weight: 900;
            font-size: 2.25rem;
            /* text-4xl */
            background-color: #FF7144;
            color: white;
            padding: 0 0.5rem 0 0.25rem;
            width: max-content;
            user-select: none;
        }

        /* Header Right */
        .team-header-right {
            background-color: #FF7144;
            color: white;
            font-size: 0.875rem;
            /* text-sm */
            padding: 0.5rem 0.75rem;
            line-height: 1.2;
            user-select: none;
            max-width: 260px;
            text-align: right;
        }

        /* Overlay untuk background */
        .overlay-dark {
            background-color: rgba(20, 20, 40, 0.7);
        }

        /* Animasi fadeIn saat scroll */
        .fade-in {
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.8s ease, transform 0.8s ease;
        }

        .fade-in.visible {
            opacity: 1;
            transform: translateY(0);
        }

        /* Number box diper kecilkan */
        .number-box {
            width: 2.5rem;
            /* lebih kecil */
            height: 2.5rem;
            font-size: 1rem;
            /* teks lebih kecil */
        }

        .content-item .number-box,
        .content-item .title-left {
            transition: transform 0.5s ease;
            /* slow 1 detik */
        }

        .content-item:hover .number-box,
        .content-item:hover .title-left {
            transform: translateX(200px);
        }
    </style>
@endpush

@section('content')
    <main>
        <div class="p-4 sm:pt-6 sm:pb-6 md:px-8 md:pt-0">
            <section class="bg-orange-custom pt-16 md:pt-20 lg:pt-24 pb-20 overflow-hidden rounded-3xl">
                <div class="content-wrapper max-w-7xl mx-auto px-6 sm:px-8 lg:px-12">
                    <div class="lg:grid lg:grid-cols-12 lg:gap-x-8 lg:items-start">
                        <div class="lg:col-span-7 xl:col-span-6 flex flex-col justify-start py-10">
                            <h1
                                class="text-white font-extrabold text-4xl sm:text-5xl md:text-6xl lg:text-7xl leading-tight mb-8 tracking-tight">
                                <span class="block">Selamat</span>
                                <span class="block">Datang Di</span>
                                <span class="block">Perusahaan</span>
                                <span class="block">Kami</span>
                            </h1>
                            <div class="mt-8 lg:mt-12 max-w-[420px] relative">
                                <img src="{{ asset('asset/page/IlusLatarBelakang.png') }}" alt="Tim Perusahaan AntiNganggur"
                                    class="w-full h-auto rounded-lg shadow-xl" />
                            </div>
                        </div>
                        <div
                            class="lg:col-span-5 xl:col-span-6 text-white text-base sm:text-lg leading-relaxed space-y-6 mt-12 lg:mt-0 py-10">
                            <p>
                                AntiNganggur didirikan pada tahun 2020 oleh sekelompok profesional IT yang melihat
                                adanya
                                kesenjangan antara kebutuhan industri dan keterampilan lulusan teknologi di Indonesia.
                            </p>
                            <p>
                                Berawal dari komunitas kecil yang berbagi pengetahuan secara online, kami berkembang
                                menjadi
                                platform komprehensif yang menghubungkan talenta IT dengan peluang karir dan
                                pembelajaran
                                yang relevan dengan kebutuhan industri.
                            </p>
                            <p>
                                Saat ini, AntiNganggur telah membantu lebih dari 5.000 profesional IT menemukan
                                pekerjaan
                                impian mereka dan membekali lebih dari 15.000 pembelajar dengan keterampilan digital
                                yang
                                dibutuhkan di era modern.
                            </p>
                        </div>
                    </div>
                </div>
            </section>
        </div>


        <section class="py-16 md:py-20 lg:py-24">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="lg:grid lg:grid-cols-12 lg:gap-x-12 xl:gap-x-16 items-start">
                    <div class="lg:col-span-6 xl:col-span-5 mb-10 lg:mb-0 flex flex-col">
                        <div class="mb-6 md:mb-8">
                            <h2 class="title-what-we-do text-2xl sm:text-3xl lg:text-4xl !leading-tight">
                                What We Do
                            </h2>
                        </div>
                        <p class="text-base md:text-lg text-slate-600 leading-relaxed text-justify flex-grow">
                            AntiNganggur.id didirikan untuk menjadi solusi digital dalam mengatasi permasalahan
                            pengangguran di sektor IT.
                            Kami menyediakan platform yang menghubungkan perusahaan dengan kandidat berkualitas,
                            menawarkan informasi yang akurat dan relevan tentang lowongan pekerjaan serta profil
                            perusahaan.
                            Dengan pendekatan yang proaktif, kami berkomitmen untuk memberdayakan pencari kerja dan
                            membantu mereka menemukan peluang karir yang tepat.
                            Hingga saat ini, AntiNganggur.id telah menjembatani ribuan profesional IT dengan peluang
                            kerja yang sesuai, berkontribusi pada pertumbuhan industri teknologi informasi di Indonesia.
                        </p>
                    </div>
                    <div class="lg:col-span-6 xl:col-span-7">
                        <div class="w-full rounded-lg overflow-hidden shadow-xl">
                            <img src="{{ asset('asset/page/WhatWeDoIlus.png') }}" alt="Proses Bisnis AntiNganggur"
                                class="w-100 h-100 object-cover" />
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="pt-16 pb-20 md:pt-24 md:pb-32 lg:pb-40 lg:pt-40">
            <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-12 md:mb-16">
                    <div class="inline-block bg-[#FF7144] px-8 py-3 shadow-md mb-4">
                        <h2 class="text-2xl sm:text-4xl font-bold text-white tracking-wide">
                            VISI MISI
                        </h2>
                    </div>
                    <p class="max-w-2xl mx-auto text-base md:text-lg text-slate-600 leading-relaxed">
                        Kami berkomitmen untuk menciptakan dampak positif
                        dalam ekosistem teknologi Indonesia
                    </p>
                </div>
                <div class="grid md:grid-cols-2 gap-8 lg:gap-12">
                    <div
                        class="visi-card bg-white p-6 py-8 md:p-8 rounded-xl shadow-xl border border-orange-100 flex flex-col">
                        <div class="mb-4">
                            <div class="inline-flex items-center justify-center h-16 w-16 rounded-lg mb-10">
                                <img src="{{ asset('asset/page/BulbIcon.png') }}" alt="Visi Icon" class="h-auto w-auto">
                            </div>
                            <h3 class="text-3xl font-bold text-[#FF7144]">
                                VISI
                            </h3>
                        </div>
                        <p class="text-slate-600 leading-relaxed text-justify ">
                            Menjadi katalisator utama dalam menciptakan
                            ekosistem teknologi Indonesia yang inklusif,
                            inovatif, dan berkelanjutan, di mana setiap
                            talenta digital dapat berkembang dan
                            berkontribusi pada kemajuan bangsa.
                        </p>
                        <span class="underline-decorator mt-4"></span>
                    </div>

                    <div
                        class="misi-card bg-white p-6 py-8 md:p-8 rounded-xl shadow-xl border border-orange-100 flex flex-col">
                        <div class="mb-4">
                            <div class="inline-flex items-center justify-center h-16 w-16 rounded-lg mb-10">
                                <img src="{{ asset('asset/page/BoltIcon.png') }}" alt="Misi Icon" class="h-auto w-auto">
                            </div>
                            <h3 class="text-3xl font-bold text-[#FF7144]">
                                MISI
                            </h3>
                        </div>
                        <ul class="space-y-3 text-slate-600 leading-relaxed">
                            <li class="flex items-start text-justify">
                                <img src="{{ asset('asset/page/FowardSign.png') }}" alt="Checklist"
                                    class="flex-shrink-0 h-5 w-5 text-[#FF7144] mt-1 mr-2.5">
                                Menyediakan platform pembelajaran yang
                                relevan dengan kebutuhan industri teknologi
                                terkini.
                            </li>
                            <li class="flex items-start text-justify">
                                <img src="{{ asset('asset/page/FowardSign.png') }}" alt="Checklist"
                                    class="flex-shrink-0 h-5 w-5 text-[#FF7144] mt-1 mr-2.5">
                                Menghubungkan talenta IT dengan perusahaan
                                melalui platform karir yang inovatif.
                            </li>
                            <li class="flex items-start text-justify">
                                <img src="{{ asset('asset/page/FowardSign.png') }}" alt="Checklist"
                                    class="flex-shrink-0 h-5 w-5 text-[#FF7144] mt-1 mr-2.5">
                                Membangun komunitas IT yang kuat untuk
                                berbagi pengetahuan dan peluang.
                            </li>
                            <li class="flex items-start text-justify">
                                <img src="{{ asset('asset/page/FowardSign.png') }}" alt="Checklist"
                                    class="flex-shrink-0 h-5 w-5 text-[#FF7144] mt-1 mr-2.5">
                                Berkontribusi aktif dalam pengembangan
                                ekosistem digital Indonesia.
                            </li>
                        </ul>
                        <span class="underline-decorator mt-4"></span>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-16 md:py-20 lg:py-24">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="lg:grid lg:grid-cols-12 lg:gap-x-12 xl:gap-x-16 lg:items-stretch">

                    <div class="lg:col-span-5 mb-10 lg:mb-0 flex items-stretch">
                        <div class="w-full rounded-lg overflow-hidden shadow-xl max-w-[650px]">
                            <img src="{{ asset('asset/page/CapabilityIlus.png') }}" alt="Kemampuan Kami" class="w-full object-cover"
                                style="height: 100%;" />
                        </div>
                    </div>

                    <div class="lg:col-span-7 flex flex-col">
                        <div class="flex items-center mb-6 md:mb-8">
                            <span class="block h-10 md:h-[100px] w-3 bg-slate-900 mr-4"></span>
                            <h2
                                class="text-[32px] sm:text-[40px] md:text-[48px] lg:text-[56px] font-extrabold !leading-tight">
                                <span class="block text-[#FF7144]">Our Capabilities</span>
                                <span class="block text-slate-900 mt-1">We Provide</span>
                            </h2>
                        </div>
                        <dl class="space-y-8 flex-grow">
                            <div>
                                <dt class="flex items-center">
                                    <span
                                        class="flex-shrink-0 flex items-center justify-center h-10 w-10 rounded-full bg-[#FF7144]">
                                        <img src="{{ asset('asset/page/Service.png') }}" alt="Deskripsi Ikon Anda"
                                            class="h-8 w-8 object-contain" />
                                    </span>
                                    <p
                                        class="ml-4 text-[24px] sm:text-[28px] md:text-[32px] lg:text-[36px] font-semibold text-[#FF7144]">
                                        Pengembangan Solusi IT Kustom
                                    </p>
                                </dt>
                                <dd class="mt-2 ml-14 text-base text-slate-600 leading-relaxed">
                                    Mengembangkan solusi perangkat lunak yang disesuaikan dengan kebutuhan spesifik
                                    klien, mulai dari aplikasi mobile hingga sistem manajemen data.
                                </dd>
                            </div>
                            <div>
                                <dt class="flex items-center">
                                    <span
                                        class="flex-shrink-0 flex items-center justify-center h-10 w-10 rounded-full bg-[#FF7144]">
                                        <img src="{{ asset('asset/page/CloudComputing.png') }}" alt="Deskripsi Ikon Anda"
                                            class="h-8 w-8 object-contain" />
                                    </span>
                                    <p
                                        class="ml-4 text-[24px] sm:text-[28px] md:text-[32px] lg:text-[36px] font-semibold text-[#FF7144]">
                                        Integrasi Teknologi Modern
                                    </p>
                                </dt>
                                <dd class="mt-2 ml-14 text-base text-slate-600 leading-relaxed">
                                    Kami mengintegrasikan teknologi modern seperti AI, Big Data, dan Cloud Computing
                                    untuk memberikan solusi yang efisien dan inovatif.
                                </dd>
                            </div>
                            <div>
                                <dt class="flex items-center">
                                    <span
                                        class="flex-shrink-0 flex items-center justify-center h-10 w-10 rounded-full bg-[#FF7144]">
                                        <img src="{{ asset('asset/page/SecurityShield.png') }}" alt="Deskripsi Ikon Anda"
                                            class="h-8 w-8 object-contain" />
                                    </span>
                                    <p
                                        class="ml-4 text-[24px] sm:text-[28px] md:text-[32px] lg:text-[36px] font-semibold text-[#FF7144]">
                                        Keamanan Cyber
                                    </p>
                                </dt>
                                <dd class="mt-2 ml-14 text-base text-slate-600 leading-relaxed">
                                    Kami menawarkan layanan keamanan siber yang komprehensif untuk melindungi data dan
                                    sistem informasi klien dari berbagai ancaman dan serangan digital.
                                </dd>
                            </div>
                            <div>
                                <dt class="flex items-center">
                                    <span
                                        class="flex-shrink-0 flex items-center justify-center h-10 w-10 rounded-full bg-[#FF7144]">
                                        <img src="{{ asset('asset/page/Maintenance.png') }}" alt="Deskripsi Ikon Anda"
                                            class="h-8 w-8 object-contain" />
                                    </span>
                                    <p
                                        class="ml-4 text-[24px] sm:text-[28px] md:text-[32px] lg:text-[36px] font-semibold text-[#FF7144]">
                                        Dukungan dan Pemeliharaan IT
                                    </p>
                                </dt>
                                <dd class="mt-2 ml-14 text-base text-slate-600 leading-relaxed">
                                    Kami menyediakan layanan dukungan teknis dan pemeliharaan sistem berkelanjutan,
                                    memastikan infrastruktur IT klien berfungsi optimal.
                                </dd>
                            </div>
                        </dl>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-20">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 lg:py-8">

                <header class="flex justify-between items-start mb-12 flex-wrap gap-6">
                    <h1 class="team-header-left">
                        OUR TEAM
                    </h1>
                    <p class="team-header-right max-w-xs text-right">
                        Inspiring Change With Motivational Keynotes, Workshop, And Seminar For
                    </p>
                </header>

                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-x-12 gap-y-16 mt-[100px]">

                    <div class="flex flex-col items-center">
                        <div class="relative w-[240px] h-[260px]">
                            <div class="bg-[#FF7144] rounded-3xl shadow-lg w-full h-full"></div>

                            <img src="{{ asset('asset/page/FotoMember.png') }}" alt="Team Member"
                                class="absolute left-1/2 bottom-0 w-auto h-[320px] object-cover rounded-3xl drop-shadow-lg transform -translate-x-1/2" />

                            <div
                                class="absolute left-4  bottom-4 bg-black bg-opacity-60 px-3 py-1 rounded-md shadow-md inline-block text-white text-sm font-semibold leading-snug">
                                <p>Ravelin Lutfhan</p>
                            </div>
                        </div>

                        <div class="mt-6 max-w-[240px] text-center sm:text-left">
                            <div class="flex items-center justify-center sm:justify-start mb-2">
                                <img src="{{ asset('asset/page/Star.png') }}" alt="Star Icon" class="w-5 h-5 mr-2 flex-shrink-0" />
                                <span class="text-[30px] font-medium text-black">CEO</span>
                            </div>
                            <p class="text-[#FF7144] leading-relaxed mb-4 text-justify text-[20px]">
                                Improve well being, grow future leader, become the greatness human
                            </p>
                            <a href="{{ route('team.ceo')}}" class="text-blue-600 font-semibold hover:underline text-sm">
                                Find out more &rarr;
                            </a>
                        </div>
                    </div>

                    <div class="flex flex-col items-center">
                        <div class="relative w-[240px] h-[260px]">
                            <div class="bg-[#FF7144] rounded-3xl shadow-lg w-full h-full"></div>

                            <img src="{{ asset('asset/page/FotoMember.png') }}" alt="Team Member"
                                class="absolute left-1/2 bottom-0 w-auto h-[320px] object-cover rounded-3xl drop-shadow-lg transform -translate-x-1/2" />

                            <div
                                class="absolute left-4 bottom-4 bg-black bg-opacity-60 px-3 py-1 rounded-md shadow-md inline-block text-white text-sm font-semibold leading-snug">
                                <p>Rizky Amalia</p>
                                </div>
                        </div>

                        <div class="mt-6 max-w-[240px] text-center sm:text-left">
                            <div class="flex items-center justify-center sm:justify-start mb-2">
                                <img src="{{ asset('asset/page/Star.png') }}" alt="Star Icon" class="w-5 h-5 mr-2 flex-shrink-0" />
                                <span class="text-[30px] font-medium text-black">CTO</span>
                            </div>
                            <p class="text-[#FF7144] leading-relaxed mb-4 text-justify text-[20px]">
                                Improve well being, grow future leader, become the greatness human
                            </p>
                            <a href="{{ route('team.cto')}}" class="text-blue-600 font-semibold hover:underline text-sm">
                                Find out more &rarr;
                            </a>
                        </div>
                    </div>

                    <div class="flex flex-col items-center">
                        <div class="relative w-[240px] h-[260px]">
                            <div class="bg-[#FF7144] rounded-3xl shadow-lg w-full h-full"></div>

                            <img src="{{ asset('asset/page/FotoMember.png') }}" alt="Team Member"
                                class="absolute left-1/2 bottom-0 w-auto h-[320px] object-cover rounded-3xl drop-shadow-lg transform -translate-x-1/2" />

                            <div
                                class="absolute left-4 bottom-4 bg-black bg-opacity-60 px-3 py-1 rounded-md shadow-md inline-block text-white text-sm font-semibold leading-snug">
                                <p>Growing Future</p>
                                <p class="mt-1">Leader</p>
                            </div>
                        </div>

                        <div class="mt-6 max-w-[240px] text-center sm:text-left">
                            <div class="flex items-center justify-center sm:justify-start mb-2">
                                <img src="{{ asset('asset/page/Star.png') }}" alt="Star Icon" class="w-5 h-5 mr-2 flex-shrink-0" />
                                <span class="text-[30px] font-medium text-black">Hr Manager</span>
                            </div>
                            <p class="text-[#FF7144] leading-relaxed mb-4 text-justify text-[20px]">
                                Improve well being, grow future leader, become the greatness human
                            </p>
                            <a href="{{ route('team.hrmanager')}}" class="text-blue-600 font-semibold hover:underline text-sm">
                                Find out more &rarr;
                            </a>
                        </div>
                    </div>

                    <div class="flex flex-col items-center">
                        <div class="relative w-[240px] h-[260px]">
                            <div class="bg-[#FF7144] rounded-3xl shadow-lg w-full h-full"></div>

                            <img src="{{ asset('asset/page/FotoMember.png') }}" alt="Team Member"
                                class="absolute left-1/2 bottom-0 w-auto h-[320px] object-cover rounded-3xl drop-shadow-lg transform -translate-x-1/2" />

                            <div
                                class="absolute left-4 bottom-4 bg-black bg-opacity-60 px-3 py-1 rounded-md shadow-md inline-block text-white text-sm font-semibold leading-snug">
                                <p>Growing Future</p>
                                <p class="mt-1">Leader</p>
                            </div>
                        </div>

                        <div class="mt-6 max-w-[240px] text-center sm:text-left">
                            <div class="flex items-center justify-center sm:justify-start mb-2">
                                <img src="{{ asset('asset/page/Star.png') }}" alt="Star Icon" class="w-5 h-5 mr-2 flex-shrink-0" />
                                <span class="text-[30px] font-medium text-black">Specialist</span>
                            </div>
                            <p class="text-[#FF7144] leading-relaxed mb-4 text-justify text-[20px]">
                                Improve well being, grow future leader, become the greatness human
                            </p>
                            <a href="#" class="text-blue-600 font-semibold hover:underline text-sm">
                                Find out more &rarr;
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <section class="relative min-h-screen bg-center bg-cover flex items-center justify-center text-white"
            style="background-image: url('{{ asset('asset/page/BackgroundOffer.png') }}');">
            <div class="absolute inset-0 bg-black bg-opacity-40 z-0"></div>

            <div class="relative z-10 w-full max-w-full px-4 sm:px-8 md:px-20 lg:px-60 py-20">

                <div class="mb-16">
                    <div class="-ml-6">
                        <p class="text-gray-400 uppercase tracking-wider mb-2 text-sm sm:text-base">
                            (What We Offer)
                        </p>
                        <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold tracking-tight leading-tight">
                            WHY CHOOSE US
                        </h1>
                    </div>
                </div>

                <div class="space-y-10">
                    <div
                        class="content-item grid grid-cols-1 sm:grid-cols-12 items-center fade-in border-b border-white pb-8 gap-x-1 cursor-pointer">
                        <div class="number-box col-span-1 flex items-center justify-center border border-gray-500 rounded-lg p-1 sm:p-2 font-bold tracking-wide -ml-1 sm:-ml-2 transition-transform duration-300 ease-in-out"
                            style="min-width: 2rem; min-height: 2rem; font-size: 0.85rem;">
                            01
                        </div>
                        <div
                            class="title-left col-span-11 sm:col-span-5 mt-2 sm:mt-0 text-2xl sm:text-5xl font-extralight tracking-wide pl-0 text-center sm:text-left transition-transform duration-300 ease-in-out">
                            INOVATION
                        </div>
                        <div
                            class="col-span-11 sm:col-span-6 mt-2 sm:mt-0 text-gray-300 text-sm sm:text-base leading-relaxed pl-20 text-justify">
                            Kami berkomitmen untuk terus berinovasi dalam menyediakan solusi teknologi yang mutakhir.
                            Dengan memanfaatkan teknologi terbaru,
                            kami menciptakan produk dan layanan yang tidak hanya memenuhi kebutuhan klien tetapi juga
                            mendorong pertumbuhan dan efisiensi dalam industri IT
                        </div>
                    </div>

                    <div
                        class="content-item grid grid-cols-1 sm:grid-cols-12 items-center fade-in border-b border-white pb-8 gap-x-1 cursor-pointer">
                        <div class="number-box col-span-1 flex items-center justify-center border border-gray-500 rounded-lg p-1 sm:p-2 font-bold tracking-wide -ml-1 sm:-ml-2 transition-transform duration-300 ease-in-out"
                            style="min-width: 2rem; min-height: 2rem; font-size: 0.85rem;">
                            02
                        </div>
                        <div
                            class="title-left col-span-11 sm:col-span-5 mt-2 sm:mt-0 text-2xl sm:text-5xl font-extralight tracking-wide pl-0 text-center sm:text-left transition-transform duration-300 ease-in-out">
                            COLABORATION
                        </div>
                        <div
                            class="col-span-11 sm:col-span-6 mt-2 sm:mt-0 text-gray-300 text-sm sm:text-base leading-relaxed pl-20 text-justify">
                            Kami percaya bahwa kolaborasi adalah kunci untuk mencapai hasil yang luar biasa.
                            Dengan menjalin kemitraan yang kuat antara perusahaan dan kandidat,
                            kami menciptakan sinergi yang saling menguntungkan dan memastikan bahwa setiap pihak
                            mendapatkan manfaat maksimal.
                        </div>
                    </div>

                    <div
                        class="content-item grid grid-cols-1 sm:grid-cols-12 items-center fade-in border-b border-white pb-8 gap-x-1 cursor-pointer">
                        <div class="number-box col-span-1 flex items-center justify-center border border-gray-500 rounded-lg p-1 sm:p-2 font-bold tracking-wide -ml-1 sm:-ml-2 transition-transform duration-300 ease-in-out"
                            style="min-width: 2rem; min-height: 2rem; font-size: 0.85rem;">
                            03
                        </div>
                        <div
                            class="title-left col-span-11 sm:col-span-5 mt-2 sm:mt-0 text-2xl sm:text-5xl font-extralight tracking-wide pl-0 text-center sm:text-left transition-transform duration-300 ease-in-out">
                            INTEGRITY
                        </div>
                        <div
                            class="col-span-11 sm:col-span-6 mt-2 sm:mt-0 text-gray-300 text-sm sm:text-base leading-relaxed pl-20 text-justify">
                            Integritas adalah fondasi dari semua yang kami lakukan.
                            Kami berkomitmen untuk memberikan informasi yang akurat dan transparan,
                            serta menjaga kepercayaan klien dan kandidat kami. Dengan pendekatan yang etis,
                            kami memastikan bahwa setiap interaksi didasarkan pada kejujuran dan tanggung jawab.
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection

@push('scripts') {{-- Ganti @section('scripts') menjadi @push('scripts') --}}
    {{-- JavaScript Kustom Khusus Halaman Tentang Kami --}}
    <script>
        // Fade in saat scroll
        const faders = document.querySelectorAll('.fade-in');

        const appearOptions = {
            threshold: 0.1, // Persentase elemen yang harus terlihat sebelum callback dipicu
            // rootMargin: "0px 0px -50px 0px" // Anda bisa sesuaikan ini jika perlu
        };

        const appearOnScroll = new IntersectionObserver(function (entries, observer) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    // Elemen masuk ke viewport atau sudah di viewport
                    entry.target.classList.add('visible');
                } else {
                    // Elemen keluar dari viewport
                    entry.target.classList.remove('visible');
                    // Tidak perlu unobserve jika ingin animasi berulang
                }
            });
        }, appearOptions);

        faders.forEach(fader => {
            appearOnScroll.observe(fader);
        });
    </script>
@endpush
