@extends('admin.layouts.app')

@section('title', 'Manajemen Pelamar')
@section('page-title', 'Pelamar')

@section('content')
<main class="w-full flex-grow p-6">
    {{-- Kartu Statistik --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        {{-- Card Total --}}
        <div class="bg-[#1A73E8] p-5 rounded-xl shadow-lg hover:shadow-2xl transition-shadow duration-300 border border-gray-100">
            <div class="flex items-center gap-5">
                <div class="bg-blue-100 text-blue-500 p-3 rounded-lg">
                    <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                </div>
                <div class="ml-4">
                    <p class="text-white text-sm">Total Pelamar</p>
                    <p class="text-[80px] justify-center text-white font-bold ">{{ $stats['total'] ?? 0 }}</p>
                </div>
            </div>
        </div>
        {{-- Card Diterima --}}
        <div class="bg-[#1A73E8] p-5 rounded-xl shadow-lg hover:shadow-2xl transition-shadow duration-300 border border-gray-100">
            <div class="flex items-center gap-5">
                <div class="bg-green-100 text-green-500 p-3 rounded-lg">
                    <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <div class="ml-4">
                    <p class="text-white text-sm">Diterima</p>
                    <p class="text-[80px] justify-center text-white font-bold ">{{ $stats['accepted'] ?? 0 }}</p>
                </div>
            </div>
        </div>
        {{-- Card Ditolak --}}
        <div class="bg-[#1A73E8] p-5 rounded-xl shadow-lg hover:shadow-2xl transition-shadow duration-300 border border-gray-100">
            <div class="flex items-center gap-5">
                <div class="bg-red-100 text-red-500 p-6 rounded-lg">
                    <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <div class="ml-4">
                    <p class="text-white text-sm">Ditolak</p>
                    <p class="text-[90px] text-center text-white font-bold ">{{ $stats['rejected'] ?? 0 }}</p>
                </div>
            </div>
        </div>
        {{-- Card Menunggu --}}
        <div class="bg-[#1A73E8] p-5 rounded-xl shadow-lg hover:shadow-2xl transition-shadow duration-300 border border-gray-100">
            <div class="flex items-center gap-5">
                <div class="bg-yellow-100 text-yellow-500 p-3 rounded-lg">
                    <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                </div>
                <div class="ml-4">
                    <p class="text-white text-sm">Menunggu</p>
                    <p class="text-[80px] justify-center text-white font-bold ">{{ $stats['pending'] ?? 0 }}</p>
                </div>
            </div>
        </div>
    </div>

    @if (session('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded-md shadow-sm" role="alert">
            <p class="font-bold">Sukses</p>
            <p>{{ session('success') }}</p>
        </div>
    @endif

    {{-- Area Daftar Pelamar --}}
    <div class="w-full background-white rounded-lg shadow-md border border-gray-200 p-5">
        {{-- Header Tabel (tanpa background) --}}
        <div class="hidden lg:grid grid-cols-12 gap-4 px-5 py-3 mb-3">
            <div class="col-span-4 text-left text-xs font-semibold text-black uppercase tracking-wider">Nama</div>
            <div class="col-span-3 text-left text-xs font-semibold text-black uppercase tracking-wider">Posisi Yang Dilamar</div>
            <div class="col-span-2 text-left text-xs font-semibold text-black uppercase tracking-wider">Tanggal</div>
            <div class="col-span-2 text-left text-xs font-semibold text-black uppercase tracking-wider">Status</div>
            <div class="col-span-1 text-center text-xs font-semibold text-black uppercase tracking-wider">Aksi</div>
        </div>

        {{-- Isi Tabel (Looping Data) --}}
        <div class="space-y-4">
            @forelse ($applications as $application)
                {{-- Awal dari Baris Kartu --}}
                <div class="bg-white rounded-lg shadow-md border border-gray-200 hover:shadow-xl hover:border-indigo-300 transition-all duration-300">
                    <div class="grid grid-cols-12 gap-4 items-center px-5 py-4">
                        {{-- Kolom Nama --}}
                        <div class="col-span-12 lg:col-span-4">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 w-10 h-10">
                                    <img class="w-full h-full rounded-full" src="https://ui-avatars.com/api/?name={{ urlencode($application->user->name ?? 'U') }}&background=random&color=fff" alt="Avatar">
                                </div>
                                <div class="ml-3">
                                    <p class="text-gray-900 whitespace-no-wrap font-semibold">{{ $application->user->name ?? 'User tidak ditemukan' }}</p>
                                    <p class="text-gray-500 whitespace-no-wrap text-xs">{{ $application->user->email ?? '-' }}</p>
                                </div>
                            </div>
                        </div>
                        {{-- Kolom Posisi --}}
                        <div class="col-span-12 lg:col-span-3">
                             <p class="text-gray-800 whitespace-no-wrap">{{ $application->jobVacancy->title ?? 'Posisi tidak tersedia' }}</p>
                        </div>
                        {{-- Kolom Tanggal --}}
                        <div class="col-span-12 lg:col-span-2">
                            <p class="text-gray-600 whitespace-no-wrap">{{ optional($application->created_at)->isoFormat('D MMMM YYYY') }}</p>
                        </div>
                        {{-- Kolom Status --}}
                        <div class="col-span-12 lg:col-span-2" onclick="event.stopPropagation();">
                             @php
                                $statusClasses = [
                                    'pending'  => 'bg-white text-yellow-800 border-yellow-500 hover:bg-yellow-50',
                                    'accepted' => 'bg-white text-green-800 border-green-500 hover:bg-green-50',
                                    'rejected' => 'bg-white text-red-800 border-red-500 hover:bg-red-50',
                                ];
                            @endphp
                            <form action="{{ route('admin.manajemen.pelamar.updateStatus', $application->id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <div class="relative inline-block w-[80px]" style="min-width: 140px;">
                                    <select name="status" onchange="this.form.submit()"
                                            class="appearance-none w-full font-semibold leading-tight py-1 pl-3 pr-8 rounded-full border-2 focus:outline-none  cursor-pointer transition-all duration-300 ease-in-out {{ $statusClasses[$application->status] ?? 'bg-gray-200' }}">
                                        <option value="pending" @if ($application->status == 'pending') selected @endif class="font-semibold">Menunggu</option>
                                        <option value="accepted" @if ($application->status == 'accepted') selected @endif class="font-semibold">Diterima</option>
                                        <option value="rejected" @if ($application->status == 'rejected') selected @endif class="font-semibold">Ditolak</option>
                                    </select>
                                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                                    </div>
                                </div>
                            </form>
                        </div>
                        {{-- Kolom Aksi --}}
                        <div class="col-span-12 lg:col-span-1 text-center">
                            <a href="#" class="text-indigo-600 hover:text-indigo-900 font-bold" onclick="event.stopPropagation();">Detail</a>
                        </div>
                    </div>
                </div>
                {{-- Akhir dari Baris Kartu --}}
            @empty
                <div class="text-center py-16 bg-white rounded-lg shadow-md border">
                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                      <path vector-effect="non-scaling-stroke" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
                    </svg>
                    <h3 class="mt-2 text-sm font-semibold text-gray-900">Belum ada pelamar</h3>
                    <p class="mt-1 text-sm text-gray-500">Data pelamar akan muncul di sini setelah ada yang melamar pekerjaan.</p>
                </div>
            @endforelse
        </div>

        {{-- Pagination --}}
        <div class="mt-8">
            {{ $applications->links('vendor.pagination.tailwind') }}
        </div>
    </div>
</main>
@endsection
