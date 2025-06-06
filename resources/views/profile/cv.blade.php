@extends('layouts.app')

@section('title', 'Unggah CV - Profil Jobseeker')

@section('content')
<div class="bg-[#FFF5F2] flex items-center justify-center min-h-screen p-4 sm:p-6 md:p-8 font-sans">
    <div class="flex w-full max-w-6xl mx-auto space-x-8">
        {{-- Memanggil sidebar --}}
        @include('profile.partials.sidebar')

        <main class="w-full bg-white p-8 rounded-2xl shadow-lg">
            <h1 class="text-2xl font-bold text-gray-800 mb-8">Curriculum Vitae (CV)</h1>

            {{-- Notifikasi Sukses atau Error --}}
            @if (session('success_cv'))
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded-md" role="alert">
                    <p>{{ session('success_cv') }}</p>
                </div>
            @endif
            @error('cv_file')
                <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded-md" role="alert">
                    <p>{{ $message }}</p>
                </div>
            @enderror

            {{-- Form untuk Upload CV --}}
            <div class="mb-10">
                <h2 class="text-xl font-bold text-gray-800 mb-4">Unggah CV Baru</h2>
                <p class="text-gray-600 mb-4">Unggah CV Anda dalam format PDF, DOC, atau DOCX (maksimal 2MB).</p>

                {{-- Form harus memiliki 'enctype' untuk upload file --}}
                <form id="cv-upload-form" action="{{ route('profile.cv.store') }}" method="POST" enctype="multipart/form-data" class="border-2 border-dashed rounded-xl p-6 flex flex-col items-center justify-center text-center transition-all duration-300 hover:border-orange-400">
                    @csrf
                    <svg class="w-12 h-12 text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-4-4V6a4 4 0 014-4h10a4 4 0 014 4v6a4 4 0 01-4 4H7z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 16v2a2 2 0 01-2 2H8a2 2 0 01-2-2v-2m4-4h4"></path></svg>

                    <label for="cv_file" class="relative cursor-pointer bg-white rounded-md font-medium text-orange-600 hover:text-orange-500">
                        <span id="file-chosen-text">Pilih file untuk diunggah</span>
                        <input id="cv_file" name="cv_file" type="file" class="sr-only" accept=".pdf,.doc,.docx">
                    </label>
                    <p class="text-xs text-gray-500 mt-2">atau seret dan lepas file di sini</p>

                    <button type="submit" class="mt-6 py-2.5 px-8 rounded-lg font-semibold bg-orange-500 text-white hover:bg-orange-600 shadow-sm hover:shadow-md transition-all duration-300">
                        Unggah CV
                    </button>
                </form>
            </div>

            {{-- Daftar CV yang Sudah Diunggah --}}
            <div class="space-y-4">
                <h2 class="text-xl font-bold text-gray-800 mb-4 border-t pt-8">CV Tersimpan</h2>
                @forelse ($cvs as $cv)
                    <div class="flex items-center justify-between p-4 border rounded-xl shadow-sm hover:bg-gray-50">
                        <div class="flex items-center space-x-4">
                            <svg class="w-6 h-6 text-gray-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                            <div class="flex flex-col">
                                <span class="font-medium text-gray-800">{{ $cv->original_name }}</span>
                                <span class="text-sm text-gray-500">{{ number_format($cv->file_size / 1024, 2) }} KB</span>
                            </div>
                        </div>
                        <div class="flex items-center space-x-4">
                            <a href="{{ route('profile.cv.download', $cv) }}" class="text-sm font-medium text-blue-600 hover:text-blue-800 transition-colors">Download</a>
                            <form action="{{ route('profile.cv.delete', $cv) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus CV ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-sm font-medium text-red-600 hover:text-red-800 transition-colors">Hapus</button>
                            </form>
                        </div>
                    </div>
                @empty
                    <div class="text-center py-10 border-2 border-dashed rounded-xl">
                        <p class="text-gray-500">Anda belum mengunggah CV.</p>
                    </div>
                @endforelse
            </div>
        </main>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Script untuk menampilkan nama file yang dipilih
    document.addEventListener('DOMContentLoaded', function() {
        const cvFileInput = document.getElementById('cv_file');
        const fileChosenText = document.getElementById('file-chosen-text');

        if (cvFileInput) {
            cvFileInput.addEventListener('change', function() {
                if (this.files.length > 0) {
                    fileChosenText.textContent = this.files[0].name;
                } else {
                    fileChosenText.textContent = 'Pilih file untuk diunggah';
                }
            });
        }
    });
</script>
@endpush
