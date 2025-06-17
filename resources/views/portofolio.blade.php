@extends('layouts.app')

@section('title', 'Portofolio - AntiNganggur')

@push('styles')
<style>
    .hero-bg {
        background-image: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4));
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
    }

    .project-carousel {
        background-image: url('{{ asset('placeholder.svg?height=400&width=700') }}');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
    }
</style>
@endpush

@section('content')
<!-- Hero Section -->
<section class="py-32 bg-[#FFF7F5]" style="background-image: url('{{ asset('asset/page/bannerporto.png') }}'); background-size: cover; background-position: center;">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <div class="max-w-4xl mx-auto mt-64">
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold leading-tight mb-6">
                <span class="text-[#FF7144] mb-2 inline-block">Komitmen Pada Kualitas</span><br>
                <span class="text-[#FF7144] mb-2 inline-block opacity-80">Bukti Nyata Melalui Karya</span><br>
                <span class="text-[#FF7144] opacity-60">Jelajahi Portofolio Kami</span>
            </h1>
        </div>
    </div>
</section>

<!-- Project Section -->
<section class="py-16 bg-[#FFF7F5] mt-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl md:text-5xl font-bold text-[#FF7144] mb-4">Project Kami</h2>
            <p class="text-lg text-slate-600 max-w-4xl mx-auto">
                Tujuan AntiNganggur adalah memberdayakan banyak pemuda untuk mengikuti pelatihan keterampilan yang
                relevan dengan industri, sehingga dapat membantu mereka mendapatkan pekerjaan yang lebih baik.
            </p>
        </div>

        <div class="relative max-w-4xl mx-auto">
            <div class="bg-black rounded-lg overflow-hidden shadow-2xl relative project-carousel h-[400px]">
                <img id="carousel-image"
                    src="{{ asset('asset/page/porto1.png') }}"
                    alt="Project Image"
                    class="w-full h-full object-cover transition-opacity duration-500 opacity-100" />
                <img id="carousel-image" src="{{ asset('asset/page/porto1.png') }}" alt="Project Image" class="w-full h-full object-cover transition-all duration-300" />
                <div class="absolute inset-0 bg-black bg-opacity-50 flex items-end">
                    <div class="p-8">
                        <h3 id="carousel-title" class="text-3xl font-bold text-white mb-2">Project Web Inovatif</h3>
                        <p id="carousel-desc" class="text-white text-lg">Solusi teknologi terdepan untuk masa depan</p>
                    </div>
                </div>
            </div>

            <!-- Navigation Arrows -->
            <button onclick="prevProject()" class="absolute left-4 top-1/2 transform -translate-y-1/2 bg-white bg-opacity-20 hover:bg-opacity-30 rounded-full p-3 transition-all duration-200">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
            </button>
            <button onclick="nextProject()" class="absolute right-4 top-1/2 transform -translate-y-1/2 bg-white bg-opacity-20 hover:bg-opacity-30 rounded-full p-3 transition-all duration-200">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </button>
        </div>

        <script>
        const projects = [
            {
                image: "{{ asset('asset/page/porto1.png') }}",
                title: "Project Web Inovatif",
                desc: "Solusi teknologi terdepan untuk masa depan"
            },
            {
                image: "{{ asset('asset/page/porto2.jpeg') }}",
                title: "Aplikasi Mobile Kreatif",
                desc: "Inovasi aplikasi untuk kebutuhan modern"
            },
            {
                image: "{{ asset('asset/page/porto3.png') }}",
                title: "Sistem Data Analitik",
                desc: "Analisa data cerdas untuk bisnis"
            }
        ];

        let current = 0;
        function showProject(idx) {
            const img = document.getElementById('carousel-image');
            img.classList.remove('opacity-100');
            img.classList.add('opacity-0');
            setTimeout(() => {
                img.src = projects[idx].image;
                img.classList.remove('opacity-0');
                img.classList.add('opacity-100');
                document.getElementById('carousel-title').textContent = projects[idx].title;
                document.getElementById('carousel-desc').textContent = projects[idx].desc;
            }, 300);
        }

        function prevProject() {
            current = (current - 1 + projects.length) % projects.length;
            showProject(current);
        }

        function nextProject() {
            current = (current + 1) % projects.length;
            showProject(current);
        }
        </script>
        </div>

<!-- Testimonials Section -->
<section class="py-16 bg-[#FFF7F5] mt-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl md:text-5xl font-bold text-[#FF7144] mb-4">Ulasan Klien</h2>
            <p class="text-lg text-slate-600 max-w-4xl mx-auto">
                Kami Menyediakan Solusi Yang Tepat Waktu Dan Efektif, Membangun Hubungan Yang Kuat<br>
                Dengan Klien
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @php
                $testimonials = [
                    [
                    'name' => 'Amalia Putri',
                    'role' => 'Frontend Developer',
                    'initials' => 'AP',
                    'text' => 'Tim ini sangat ahli dalam membangun tampilan website yang modern dan responsif.'
                ],
                [
                    'name' => 'Rizky Pratama',
                    'role' => 'Backend Developer',
                    'initials' => 'RP',
                    'text' => 'Integrasi API dan pengelolaan database berjalan lancar berkat keahlian mereka.'
                ],
                [
                    'name' => 'Siti Nurhaliza',
                    'role' => 'UI/UX Designer',
                    'initials' => 'SN',
                    'text' => 'Desain antarmuka yang dibuat sangat user-friendly dan menarik.'
                ],
                [
                    'name' => 'Budi Santoso',
                    'role' => 'DevOps Engineer',
                    'initials' => 'BS',
                    'text' => 'Deployment aplikasi menjadi lebih mudah dan stabil dengan bantuan tim ini.'
                ],
                [
                    'name' => 'Dewi Lestari',
                    'role' => 'Mobile App Developer',
                    'initials' => 'DL',
                    'text' => 'Aplikasi mobile yang dikembangkan sangat smooth dan minim bug.'
                ],
                [
                    'name' => 'Andi Wijaya',
                    'role' => 'Full Stack Developer',
                    'initials' => 'AW',
                    'text' => 'Pengerjaan proyek dari frontend hingga backend sangat terstruktur dan efisien.'
                ],
                [
                    'name' => 'Maya Sari',
                    'role' => 'QA Engineer',
                    'initials' => 'MS',
                    'text' => 'Proses testing sangat detail sehingga aplikasi bebas dari error.'
                ],
                [
                    'name' => 'Fajar Nugroho',
                    'role' => 'Data Engineer',
                    'initials' => 'FN',
                    'text' => 'Pengolahan data dan pipeline berjalan optimal berkat solusi dari tim ini.'
                ],
                [
                    'name' => 'Lina Marlina',
                    'role' => 'System Analyst',
                    'initials' => 'LM',
                    'text' => 'Analisis sistem yang diberikan sangat membantu dalam pengembangan aplikasi.'
                ]
                ];
            @endphp

            @foreach($testimonials as $testimonial)
                <div class="bg-white rounded-lg p-6 shadow-lg transition-all duration-300 hover:shadow-xl hover:scale-105">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-white rounded-full flex items-center justify-center mr-4">
                            <span class="text-gray-600 font-semibold">{{ $testimonial['initials'] }}</span>
                        </div>
                        <div>
                            <h4 class="font-semibold text-slate-800">{{ $testimonial['name'] }}</h4>
                            <p class="text-sm text-slate-600">{{ $testimonial['role'] }}</p>
                        </div>
                    </div>
                    <p class="text-slate-700">
                        {{ $testimonial['text'] }}
                    </p>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Project carousel functionality
        const leftArrow = document.querySelector('.absolute.left-4');
        const rightArrow = document.querySelector('.absolute.right-4');

        if (leftArrow) {
            leftArrow.addEventListener('click', function() {
                console.log('Previous project');
                // Add carousel navigation logic here
            });
        }

        if (rightArrow) {
            rightArrow.addEventListener('click', function() {
                console.log('Next project');
                // Add carousel navigation logic here
            });
        }
    });
</script>
@endpush
