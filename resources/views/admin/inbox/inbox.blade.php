@extends('admin.layouts.app')

@section('title', 'Kotak Masuk')
@section('page-title', 'Kotak Masuk')

@push('styles')
    <style>
        /* Animasi halus saat hover pada item pesan */
        .message-item:hover {
            transform: translateY(-3px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        }

        /* --- CSS UNTUK FITUR SORTING --- */
        .sortable-header {
            cursor: pointer;
            user-select: none;
            transition: color 0.2s ease;
        }

        .sortable-header:hover {
            color: #1A73E8; /* Warna biru saat cursor di atas header */
        }

        .sort-icon {
            transition: transform 0.2s ease-in-out;
        }

        .sort-icon.active {
            color: #1A73E8; /* Warna ikon saat sorting aktif */
        }

        /* Memutar ikon panah ke atas jika urutan 'asc' */
        .sort-icon.asc {
            transform: rotate(180deg);
        }
    </style>
@endpush

@section('content')
    <div class="bg-white p-6 md:p-8 rounded-2xl shadow-lg">

        @php
            // Logika untuk menentukan arah sorting berikutnya saat link diklik.
            // Jika kolom 'id' sedang aktif dan arahnya 'asc', maka klik berikutnya akan menjadi 'desc', begitu sebaliknya.
            $nextSortDirection = ($sortColumn == 'id' && $sortDirection == 'asc') ? 'desc' : 'asc';
        @endphp

        <div class="hidden md:flex text-sm font-semibold text-gray-500 px-4 pb-4 border-b-2 border-gray-100">
            {{-- Kolom ID dibuat menjadi link --}}
            <div class="w-1/12">
                <a href="{{ route('admin.inbox', ['sort_column' => 'id', 'sort_direction' => $nextSortDirection]) }}" class="sortable-header flex items-center gap-2">
                    <span>Id</span>

                    {{-- Tampilkan ikon panah yang sesuai --}}
                    @if($sortColumn == 'id')
                        {{-- Ikon jika kolom ini sedang aktif --}}
                        <svg class="h-4 w-4 sort-icon active {{ $sortDirection == 'asc' ? 'asc' : '' }}" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    @else
                        {{-- Ikon default jika kolom lain yang aktif --}}
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                        </svg>
                    @endif
                </a>
            </div>

            {{-- Kolom lainnya tetap sama --}}
            <div class="w-3/12">Nama</div>
            <div class="w-3/12">Email</div>
            <div class="w-5/12">Pesan</div>
        </div>



        <div class="space-y-3 mt-4">
            @forelse ($messages as $message)
                <div class="message-item cursor-pointer p-4 rounded-xl flex flex-col md:flex-row items-start md:items-center gap-2 md:gap-4 transition-all duration-200 {{ !$message->is_read ? 'bg-[#1A73E8] text-white shadow-md' : 'bg-white text-gray-700 border border-gray-200 hover:bg-gray-50 hover:shadow-sm' }}">
                    <div class="w-full md:w-1/12 font-semibold">
                        <span class="md:hidden font-bold mr-2 text-xs uppercase opacity-70">Id:</span>
                        {{ $message->id }}
                    </div>
                    <div class="w-full md:w-3/12 font-medium">
                        <span class="md:hidden font-bold mr-2 text-xs uppercase opacity-70">Nama:</span>
                        {{ $message->name }}
                    </div>
                    <div class="w-full md:w-3/12 text-sm {{ !$message->is_read ? 'text-blue-200' : 'text-gray-500' }}">
                        <span class="md:hidden font-bold mr-2 text-xs uppercase {{ !$message->is_read ? 'text-white' : 'text-gray-500' }} opacity-70">Email:</span>
                        {{ $message->email }}
                    </div>
                    <div class="w-full md:w-5/12 text-sm truncate {{ !$message->is_read ? 'text-blue-100' : 'text-gray-600' }}">
                        <span class="md:hidden font-bold mr-2 text-xs uppercase {{ !$message->is_read ? 'text-white' : 'text-gray-500' }} opacity-70">Pesan:</span>
                        {{ $message->message }}
                    </div>
                </div>
            @empty
                <div class="text-center py-16 border-2 border-dashed rounded-xl">
                     <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" /></svg>
                    <h3 class="mt-2 text-sm font-medium text-gray-900">Tidak ada pesan</h3>
                    <p class="mt-1 text-sm text-gray-500">Kotak masuk Anda masih kosong.</p>
                </div>
            @endforelse
        </div>

        {{-- untuk pagination --}}
        <div class="mt-8 flex justify-center items-center text-sm text-gray-500">
            <a href="#" class="px-2 py-1 hover:text-blue-600 transition-colors"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" /></svg></a>
            <a href="#" class="px-3 py-1 rounded-md hover:bg-blue-50 hover:text-blue-600 transition-colors">1</a>
            <a href="#" class="px-3 py-1 rounded-md hover:bg-blue-50 hover:text-blue-600 transition-colors">2</a>
            <a href="#" class="px-3 py-1 rounded-md hover:bg-blue-50 hover:text-blue-600 font-bold text-blue-600">3</a>
            <a href="#" class="px-3 py-1 rounded-md hover:bg-blue-50 hover:text-blue-600 transition-colors">4</a>
            <span class="px-3 py-1">...</span>
            <a href="#" class="px-3 py-1 rounded-md hover:bg-blue-50 hover:text-blue-600 transition-colors">5</a>
            <a href="#" class="px-2 py-1 hover:text-blue-600 transition-colors"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" /></svg></a>
        </div>
    </div>
@endsection
