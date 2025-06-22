@extends('layouts.app')

@section('title', 'Detail Lowongan - ' . $vacancy->title)

@push('styles')
    {{-- Menambahkan CSS spesifik untuk halaman ini jika diperlukan --}}
    <style>
        body {
            background-color: #FFF7F5;
            /* Set background color for the page */
        }

        .detail-grid {
            display: grid;
            grid-template-columns: auto 1fr;
            gap: 1rem 1.5rem;
            /* row-gap, column-gap */
            align-items: start;
        }

        .detail-grid dt {
            /* Definition Term: Label (e.g., "Gaji") */
            color: #6B7280;
            /* text-gray-500 */
            white-space: nowrap;
        }

        .detail-grid dd {
            /* Definition Description: Value (e.g., ": Rp 1.000.000") */
            font-weight: 500;
            /* font-medium */
            color: #374151;
            /* text-gray-700 */
        }
    </style>
@endpush

@section('content')
    <main class="w-full flex-grow py-12 md:py-16 lg:py-20">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            {{-- Wrapper Card Putih --}}
            <div class="bg-white rounded-2xl shadow-lg p-8 md:p-10">

                {{-- Header Detail Lowongan --}}
                <div class="flex flex-col sm:flex-row items-start mb-8">
                    {{-- Ikon --}}
                    <div class="w-16 h-16 flex items-center justify-center mr-6 mb-4 sm:mb-0 flex-shrink-0">
                        @if ($vacancy->job_logo)
                            <img src="{{ asset('storage/' . $vacancy->job_logo) }}" alt="Logo {{ $vacancy->company_name }}"
                                class="w-full h-full object-contain">
                        @else
                            {{-- Icon Placeholder dari Desain --}}
                            <div class="w-full h-full bg-orange-100 rounded-lg flex items-center justify-center">
                                <svg class="w-8 h-8 text-[#FF7144]" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15A2.25 2.25 0 002.25 6.75m19.5 0v.243c0 .38.16.74.424 1.01l.162.176a2.25 2.25 0 011.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                                </svg>
                            </div>
                        @endif
                    </div>
                    {{-- Judul dan Tags --}}
                    <div class="w-full">
                        <h1 class="text-3xl md:text-4xl font-bold text-slate-800 mb-3">{{ $vacancy->title }}</h1>
                        <div class="flex flex-wrap items-center gap-3">
                            {{-- Tag Lokasi --}}
                            <span
                                class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-orange-100 text-orange-700">
                                <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                                        clip-rule="evenodd" />
                                </svg>
                                {{ $vacancy->location }}
                            </span>
                            {{-- Tag Tipe Pekerjaan --}}
                            <span
                                class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-orange-100 text-orange-700">
                                <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                                        clip-rule="evenodd" />
                                </svg>
                                {{ $vacancy->type_job }}
                            </span>
                            {{-- Tag Gaji --}}
                            @if ($vacancy->min_salary && $vacancy->max_salary)
                                <span
                                    class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-orange-100 text-orange-700">
                                    Rp {{ number_format($vacancy->min_salary, 0, ',', '.') }} -
                                    {{ number_format($vacancy->max_salary, 0, ',', '.') }}
                                </span>
                            @endif
                        </div>
                    </div>
                </div>

                {{-- Grid Detail (Menggunakan <dl> untuk semantik) --}}
                <dl class="detail-grid">
                    <dt>Tanggal Diposting</dt>
                    <dd>: {{ $vacancy->created_at->format('d/m/Y') }}</dd>

                    <dt>Gaji</dt>
                    <dd>: Rp {{ number_format($vacancy->min_salary, 0, ',', '.') }} -
                        {{ number_format($vacancy->max_salary, 0, ',', '.') }} jt/bulan</dd>

                    <dt>Tipe Pekerjaan</dt>
                    <dd>: {{ $vacancy->type_job }}</dd>

                    <dt>Lokasi Pekerjaan</dt>
                    <dd>: {{ $vacancy->location }}</dd>

                    <dt>Alamat Lengkap</dt>
                    <dd>: {{ $vacancy->location_details }}</dd>

                    <dt>Kerja Jarak Jauh</dt>
                    <dd>: {{ $vacancy->mobility }}</dd>

                    <dt>Jadwal Kerja</dt>
                    <dd>: {{ $vacancy->work_schedule }}</dd>

                    <dt>Tingkat Karir</dt>
                    <dd>: {{ $vacancy->career_level }}</dd>

                    <dt>Benefit</dt>
                    <dd>
                        @if ($vacancy->jobBenefits->isNotEmpty())
                            {{-- Menggunakan list untuk benefit agar lebih rapi --}}
                            <ul class="list-disc list-inside -ml-1">
                                @foreach ($vacancy->jobBenefits as $benefit)
                                    <li>{{ $benefit->benefits_name }}</li>
                                @endforeach
                            </ul>
                        @else
                            : -
                        @endif
                    </dd>

                    <dt>Jumlah posisi dibuka</dt>
                    <dd>: {{ $vacancy->open_positions }} orang</dd>
                </dl>


                {{-- Deskripsi Pekerjaan --}}
                <div class="mt-8 pt-8 border-t border-gray-200">
                    <div class="prose prose-sm sm:prose-base max-w-none text-gray-600 leading-relaxed">

                        <h2 class="text-xl font-semibold text-slate-800 mb-4">Deskripsi Pekerjaan</h2>
                        {{-- Menggunakan {!! !!} untuk menampilkan HTML yang sudah di-escape --}}
                        {{-- Detail deskripsi dari database --}}
                        <div class="mt-4">
                            {!! nl2br(e($vacancy->description)) !!}
                        </div>
                    </div>
                </div>

                {{-- Tombol Aksi --}}
                <div class="mt-12 flex flex-col sm:flex-row items-center justify-start gap-4">
                    {{-- Tombol "Lihat Lowongan" (Primary) Sesuai Desain --}}
                    <a href="{{ route('lowongan') }}"
                        class="w-full sm:w-auto text-center px-8 py-3 font-semibold rounded-lg text-white bg-[#FF7144] hover:bg-orange-600 transition-colors duration-150">
                        Lihat Lowongan
                    </a>
                    {{-- Tombol "Lamar Sekarang" (Secondary) Sesuai Desain --}}
                    <a href="{{ route('lamar.create', ['job_vacancy_id' => $vacancy->id, 'job_title' => $vacancy->title]) }}"
                        class="w-full sm:w-auto text-center px-8 py-3 border-2 border-[#FF7144] font-semibold rounded-lg text-[#FF7144] bg-white hover:bg-orange-50 transition-colors duration-150">
                        Lamar Sekarang
                    </a>
                </div>
            </div>
        </div>
    </main>
@endsection
