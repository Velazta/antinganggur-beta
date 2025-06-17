@extends('admin.layouts.app')

@section('title', 'Detail Lowongan')
@section('page-title', 'Detail Lowongan')

@section('content')
<div class="bg-white p-8 rounded-2xl shadow-lg">
    <div class="flex items-center mb-6 pb-4 border-b border-gray-200">
        @if($jobVacancy->job_logo)
            <img src="{{ asset('storage/' . $jobVacancy->job_logo) }}" alt="Logo Perusahaan" class="w-20 h-20 object-contain rounded-lg mr-4">
        @else
            <div class="w-20 h-20 bg-blue-100 rounded-lg flex items-center justify-center mr-4 text-blue-700 font-semibold text-lg">
                No Logo
            </div>
        @endif
        <div>
            <h1 class="text-3xl font-bold text-gray-800">{{ $jobVacancy->title }}</h1>
            <p class="text-xl text-gray-600">{{ $jobVacancy->company_name }}</p>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-6 mb-8">
        <div>
            <p class="text-sm font-medium text-gray-600">Lokasi:</p>
            <p class="text-lg text-gray-800">{{ $jobVacancy->location }}</p>
        </div>
        <div>
            <p class="text-sm font-medium text-gray-600">Tipe Pekerjaan:</p>
            <p class="text-lg text-gray-800">{{ $jobVacancy->type_job }}</p>
        </div>
        <div>
            <p class="text-sm font-medium text-gray-600">Rentang Gaji:</p>
            <p class="text-lg text-gray-800">
                @if($jobVacancy->min_salary && $jobVacancy->max_salary)
                    Rp {{ number_format($jobVacancy->min_salary, 0, ',', '.') }} - Rp {{ number_format($jobVacancy->max_salary, 0, ',', '.') }}/bulan
                @else
                    Gaji Negosiasi
                @endif
            </p>
        </div>
        <div>
            <p class="text-sm font-medium text-gray-600">Ditambahkan Pada:</p>
            <p class="text-lg text-gray-800">{{ $jobVacancy->created_at->format('d M Y H:i') }}</p>
        </div>
        @if($jobVacancy->updated_at && $jobVacancy->created_at != $jobVacancy->updated_at)
        <div>
            <p class="text-sm font-medium text-gray-600">Terakhir Diperbarui:</p>
            <p class="text-lg text-gray-800">{{ $jobVacancy->updated_at->format('d M Y H:i') }}</p>
        </div>
        @endif
    </div>

    <div class="mb-8">
        <h3 class="text-xl font-bold text-gray-800 mb-3">Deskripsi Pekerjaan:</h3>
        <div class="prose max-w-none text-gray-700 leading-relaxed">
            <p>{{ $jobVacancy->description }}</p>
        </div>
    </div>

    <div class="flex justify-end gap-4">
        <a href="{{ route('admin.manajemen.lowongan') }}"
           class="py-2.5 px-6 rounded-lg font-semibold border border-gray-400 text-gray-600 hover:bg-gray-100 transition-all duration-300">
            Kembali
        </a>
        <a href="{{ route('admin.manajemen.lowongan.edit', $jobVacancy) }}"
           class="py-2.5 px-6 rounded-lg font-semibold bg-yellow-500 text-white hover:bg-yellow-600 shadow-sm hover:shadow-md transition-all duration-300">
            Edit Lowongan
        </a>
    </div>
</div>
@endsection
