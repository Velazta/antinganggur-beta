@extends('admin.layouts.app')

@section('title', 'Detail Lamaran')
@section('page-title')
    <div class="flex items-center">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Detail Lamaran
        </h2>
        <span class="ml-2 px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
            {{ $application->full_name }}
        </span>
    </div>
@endsection

@section('content')
<main class="w-full flex-grow p-6">
    <div class="bg-white rounded-lg shadow-md border border-gray-200 p-8 mx-auto">

        {{-- Header Lamaran --}}
        <div class="flex justify-between items-start mb-6">
            <div>
                <h3 class="text-2xl font-bold text-gray-900">Lamaran untuk Posisi Front End</h3>
                <p class="text-sm text-gray-500 mt-1">
                    Tanggal Melamar: {{ optional($application->created_at)->isoFormat('D MMMM YYYY, HH:mm') }}
                </p>
            </div>
            <a href="{{ route('admin.manajemen.pelamar') }}" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Kembali
            </a>
        </div>
        <hr class="mb-6">

        {{-- Detail Informasi Pelamar --}}
        <div>
            <h4 class="text-lg font-bold text-gray-800 mb-4">Informasi Pribadi</h4>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-500">Nama Lengkap</label>
                    <p class="mt-1 text-md text-gray-900 font-semibold">{{ $application->full_name }}</p>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-500">Nomor Telepon</label>
                    <p class="mt-1 text-md text-gray-900">{{ $application->phone_number }}</p>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-500">Email</label>
                    <p class="mt-1 text-md text-gray-900">{{ $application->email }}</p>
                </div>
                 <div>
                    <label class="block text-sm font-medium text-gray-500">Kota</label>
                    <p class="mt-1 text-md text-gray-900">{{ $application->city.', '.$application->province }}</p>
                </div>
            </div>
        </div>

        <hr class="my-6">

        {{-- Detail Pendidikan & Pengalaman --}}
        <div>
            <h4 class="text-lg font-bold text-gray-800 mb-4">Pendidikan dan Pengalaman</h4>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-500">Tingkat Pendidikan</label>
                    <p class="mt-1 text-md text-gray-900">{{ $application->education_level }}</p>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-500">Jurusan</label>
                    <p class="mt-1 text-md text-gray-900">{{ $application->major }}</p>
                </div>
                <div class="col-span-2">
                    <label class="block text-sm font-medium text-gray-500">Tingkat Pengalaman</label>
                    <p class="mt-1 text-md text-gray-900">{{ $application->experience_level }}</p>
                </div>
            </div>
        </div>

        <hr class="my-6">

        {{-- Dokumen Terlampir --}}
        <div>
            <h4 class="text-lg font-bold text-gray-800 mb-4">Dokumen Terlampir</h4>
            <div class="flex items-center space-x-4">
                @if ($application->cv_file)
                    <a href="{{ asset('storage/' . $application->cv_file) }}" target="_blank" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-500 active:bg-blue-700 focus:outline-none focus:border-blue-700 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                        Unduh CV
                    </a>
                @else
                    <p class="text-sm text-gray-500">CV tidak dilampirkan.</p>
                @endif

                @if ($application->portfolio_file)
                    <a href="{{ asset('storage/' . $application->portfolio_file) }}" target="_blank" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"></path></svg>
                        Lihat Portofolio
                    </a>
                @else
                     <p class="text-sm text-gray-500">Portofolio tidak dilampirkan.</p>
                @endif
            </div>
        </div>
    </div>
</main>
@endsection
