@extends('layouts.app')

@section('title', 'Notifikasi')

@section('content')
<main class="w-full flex-grow py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-4xl mx-auto">
        <h1 class="text-3xl font-bold text-slate-800 mb-8">Pemberitahuan</h1>

        <div class="bg-white rounded-lg shadow-md border border-gray-200">
            <div class="space-y-2">
                {{-- PERBAIKAN: Menggunakan variabel $notifications yang dikirim dari controller --}}
                @forelse ($notifications as $notification)
                    <div class="p-5 border-b border-gray-200 hover:bg-gray-50 transition-colors duration-150">
                        <div class="flex justify-between items-center mb-2">
                            <p class="text-sm text-gray-600">
                                Dari: <span class="font-semibold text-slate-800">{{ $notification->admin->name ?? 'Admin Perusahaan' }}</span>
                            </p>
                            <p class="text-xs text-gray-400">
                                {{ $notification->created_at->diffForHumans() }}
                            </p>
                        </div>
                        <h2 class="font-bold text-lg text-orange-600">{{ $notification->subject }}</h2>
                        <p class="text-gray-700 mt-2 leading-relaxed">
                            {{ $notification->body }}
                        </p>
                    </div>
                @empty
                    <div class="text-center py-16">
                         <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                        </svg>
                        <h3 class="mt-2 text-sm font-semibold text-gray-900">Tidak Ada Notifikasi</h3>
                        <p class="mt-1 text-sm text-gray-500">Kotak notifikasi Anda masih kosong.</p>
                    </div>
                @endforelse
            </div>

            @if($notifications->hasPages())
                <div class="p-4 bg-gray-50 border-t">
                    {{-- PERBAIKAN: Menggunakan variabel $notifications untuk pagination --}}
                    {{ $notifications->links('vendor.pagination.custom-pagination') }}
                </div>
            @endif
        </div>
    </div>
</main>
@endsection
