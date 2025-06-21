@extends('admin.layouts.app')

@section('title', 'Hubungi Kandidat')
@section('page-title')
    <div class="flex items-center">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Hubungi Kandidat
        </h2>
    </div>
@endsection

@section('content')
<main class="w-full flex-grow p-6">
    <div class="bg-white rounded-lg shadow-md border border-gray-200 p-8 max-w-4xl mx-auto">

        {{-- Header Form --}}
        <div class="flex justify-between items-start mb-6">
            <div>
                <h3 class="text-2xl font-bold text-gray-900">Kirim Pesan</h3>
                <p class="text-sm text-gray-500 mt-1">
                    Kirim pesan langsung kepada <span class="font-semibold">{{ $application->user->name }}</span>
                    terkait lamaran untuk posisi <span class="font-semibold">{{ $application->jobVacancy->title }}</span>.
                </p>
            </div>
            <a href="{{ url()->previous() }}" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150">
                Kembali
            </a>
        </div>
        <hr class="mb-6">

        <form action="{{ route('admin.manajemen.pelamar.sendMessage', $application->id) }}" method="POST">
            @csrf
            <div class="space-y-6">
                <!-- Penerima (Read-only) -->
                <div>
                    <label for="recipient" class="block text-sm font-medium text-gray-700">Kepada</label>
                    <input type="text" name="recipient" id="recipient" readonly value="{{ $application->user->name }} ({{ $application->user->email }})"
                           class="mt-1 block w-full px-3 py-2 bg-gray-100 border border-gray-300 rounded-md shadow-sm focus:outline-none sm:text-sm">
                </div>

                <!-- Subjek Pesan -->
                <div>
                    <label for="subject" class="block text-sm font-medium text-gray-700">Subjek</label>
                    <input type="text" name="subject" id="subject"
                           class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                           placeholder="Contoh: Undangan Wawancara untuk Posisi {{ $application->jobVacancy->title }}"
                           value="{{ old('subject') }}">
                    @error('subject')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Isi Pesan -->
                <div>
                    <label for="body" class="block text-sm font-medium text-gray-700">Isi Pesan</label>
                    <textarea id="body" name="body" rows="10"
                              class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                              placeholder="Tulis pesan Anda di sini...">{{ old('body') }}</textarea>
                    @error('body')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            {{-- Tombol Aksi --}}
            <div class="flex justify-end mt-8">
                 <button type="submit" class="inline-flex items-center px-6 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-500 active:bg-blue-700 focus:outline-none focus:border-blue-700 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150">
                    <svg class="w-5 h-5 mr-2 -ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path></svg>
                    Kirim Pesan
                </button>
            </div>
        </form>
    </div>
</main>
@endsection
