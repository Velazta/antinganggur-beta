@extends('admin.layouts.app')

@section('title', 'Detail Lowongan')
@section('page-title', 'Detail Lowongan')

@section('content')
<div class="bg-white p-8 rounded-2xl shadow-lg">
    {{-- BAGIAN HEADER --}}
    <div class="flex flex-col sm:flex-row items-start sm:items-center mb-6 pb-4 border-b border-gray-200">
        @if($jobVacancy->job_logo)
            <img src="{{ asset('storage/' . $jobVacancy->job_logo) }}" alt="Logo Perusahaan" class="w-24 h-24 object-contain rounded-lg mr-6 mb-4 sm:mb-0">
        @else
            <div class="w-24 h-24 bg-blue-100 rounded-lg flex items-center justify-center mr-6 mb-4 sm:mb-0 text-blue-700 font-semibold text-lg">
                No Logo
            </div>
        @endif
        <div class="flex-grow">
            <h1 class="text-3xl font-bold text-gray-800">{{ $jobVacancy->title }}</h1>
            <p class="text-xl text-gray-600">{{ $jobVacancy->company_name }}</p>
        </div>

    </div>

    {{-- BAGIAN DETAIL UTAMA --}}
    <h3 class="text-xl font-bold text-gray-800 mb-4">Detail Lowongan</h3>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-x-8 gap-y-6 mb-8">
        <div>
            <p class="text-sm font-medium text-gray-500">Lokasi</p>
            <p class="text-lg text-gray-900 font-semibold">{{ $jobVacancy->location }}</p>
        </div>
        <div>
            <p class="text-sm font-medium text-gray-500">Tipe Pekerjaan</p>
            <p class="text-lg text-gray-900 font-semibold">{{ $jobVacancy->type_job }}</p>
        </div>
         <div>
            <p class="text-sm font-medium text-gray-500">Tingkat Karir</p>
            <p class="text-lg text-gray-900 font-semibold">{{ $jobVacancy->career_level ?? 'Tidak disebutkan' }}</p>
        </div>
        <div>
            <p class="text-sm font-medium text-gray-500">Jadwal Kerja</p>
            <p class="text-lg text-gray-900 font-semibold">{{ $jobVacancy->work_schedule ?? 'Tidak disebutkan' }}</p>
        </div>
        <div>
            <p class="text-sm font-medium text-gray-500">Mobilitas</p>
            <p class="text-lg text-gray-900 font-semibold">{{ $jobVacancy->mobility ?? 'Tidak disebutkan' }}</p>
        </div>
        <div>
            <p class="text-sm font-medium text-gray-500">Posisi Dibuka</p>
            <p class="text-lg text-gray-900 font-semibold">{{ $jobVacancy->open_positions ?? '1' }} orang</p>
        </div>
        <div class="md:col-span-2 lg:col-span-3">
            <p class="text-sm font-medium text-gray-500">Rentang Gaji</p>
            <p class="text-lg text-gray-900 font-semibold">
                @if($jobVacancy->min_salary && $jobVacancy->max_salary)
                    {{ number_format($jobVacancy->min_salary, 0, ',', '.') }} - {{ number_format($jobVacancy->max_salary, 0, ',', '.') }} juta/bulan
                @else
                    Gaji Negosiasi
                @endif
            </p>
        </div>
        <div class="md:col-span-2 lg:col-span-3">
            <p class="text-sm font-medium text-gray-500">Alamat Lengkap</p>
            <p class="text-lg text-gray-900 font-semibold">{{ $jobVacancy->location_details ?? 'Tidak disebutkan' }}</p>
        </div>
    </div>

    {{-- BAGIAN BENEFIT --}}
    @if($jobVacancy->jobBenefits->isNotEmpty())
    <div class="mb-8">
        <h3 class="text-xl font-bold text-gray-800 mb-3">Benefit yang Ditawarkan</h3>
        <ul class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-2">
            @foreach($jobVacancy->jobBenefits as $benefit)
            <li class="flex items-center text-gray-700">
                <svg class="w-5 h-5 text-green-500 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                <span>{{ $benefit->benefits_name }}</span>
            </li>
            @endforeach
        </ul>
    </div>
    @endif

    {{-- BAGIAN DESKRIPSI --}}
    <div class="mb-8">
        <h3 class="text-xl font-bold text-gray-800 mb-3">Deskripsi Pekerjaan</h3>
        <div class="prose max-w-none text-gray-700 leading-relaxed">
            {!! nl2br(e($jobVacancy->description)) !!}
        </div>
    </div>

    {{-- BAGIAN INFO TAMBAHAN --}}
    <div class="text-sm text-gray-500 border-t border-gray-200 pt-4">
        Ditambahkan pada: {{ $jobVacancy->created_at->format('d M Y, H:i') }}
        @if($jobVacancy->updated_at && $jobVacancy->created_at->ne($jobVacancy->updated_at))
        <span class="mx-2">|</span> Terakhir diperbarui: {{ $jobVacancy->updated_at->format('d M Y, H:i') }}
        @endif
    </div>


    {{-- BAGIAN TOMBOL AKSI --}}
    <div class="mt-8 flex justify-end gap-4">
        <a href="{{ route('admin.manajemen.lowongan') }}"
           class="py-2.5 px-6 rounded-lg font-semibold border border-gray-400 text-gray-600 hover:bg-gray-100 transition-all duration-300">
            Kembali
        </a>
    </div>
</div>
@endsection
