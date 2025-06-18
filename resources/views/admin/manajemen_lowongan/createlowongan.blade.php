@extends('admin.layouts.app')

@section('title', 'Tambah Lowongan Baru')
@section('page-title', 'Tambah Lowongan')

@section('content')

@stack('scripts')
<div class="bg-white p-8 rounded-2xl shadow-lg">
    <h2 class="text-2xl font-bold text-gray-800 mb-8">Form Tambah Lowongan Baru</h2>

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-6" role="alert">
            <strong class="font-bold">Oops!</strong>
            <span class="block sm:inline">Ada beberapa masalah dengan input Anda:</span>
            <ul class="mt-3 list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.manajemen.lowongan.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-6">
            {{-- Judul Lowongan --}}
            <div class="md:col-span-2">
                <label for="title" class="block text-sm font-medium text-gray-600 mb-1">Judul Lowongan</label>
                <input type="text" name="title" id="title" value="{{ old('title') }}"
                       class="w-full border border-gray-300 rounded-lg p-2.5 focus:outline-none focus:ring-2 focus:ring-blue-400 transition-all"
                       placeholder="Contoh: Frontend Developer, Manajer Proyek IT">
            </div>

            {{-- Nama Perusahaan --}}
            <div>
                <label for="company_name" class="block text-sm font-medium text-gray-600 mb-1">Nama Perusahaan</label>
                <input type="text" name="company_name" id="company_name" value="Anti Nganggur"
                       class="w-full border border-gray-300 rounded-lg p-2.5 focus:outline-none focus:ring-2 focus:ring-blue-400 transition-all bg-gray-100 cursor-not-allowed"
                       readonly>
                <p class="mt-1 text-xs text-gray-500">Nama perusahaan diisi otomatis sebagai "Anti Nganggur".</p>
            </div>

            {{-- Lokasi Pekerjaan --}}
             <div>
                <label for="location" class="block text-sm font-medium text-gray-600 mb-1">Lokasi</label>
                <select name="location" id="location"
                        class="w-full border border-gray-300 rounded-lg p-2.5 focus:outline-none focus:ring-2 focus:ring-blue-400 transition-all">
                    <option value="">Pilih Lokasi</option>
                    @foreach($locations as $loc)
                        <option value="{{ $loc }}" {{ old('location') == $loc ? 'selected' : '' }}>{{ $loc }}</option>
                    @endforeach
                </select>
            </div>

            {{-- Tipe Pekerjaan --}}
            <div>
                <label for="type_job" class="block text-sm font-medium text-gray-600 mb-1">Tipe Pekerjaan</label>
                <select name="type_job" id="type_job"
                        class="w-full border border-gray-300 rounded-lg p-2.5 focus:outline-none focus:ring-2 focus:ring-blue-400 transition-all">
                    <option value="">Pilih Tipe Pekerjaan</option>
                    <option value="Full-time" {{ old('type_job') == 'Full-time' ? 'selected' : '' }}>Full-time</option>
                    <option value="Part-time" {{ old('type_job') == 'Part-time' ? 'selected' : '' }}>Part-time</option>
                    <option value="Kontrak" {{ old('type_job') == 'Kontrak' ? 'selected' : '' }}>Kontrak</option>
                    <option value="Freelance" {{ old('type_job') == 'Freelance' ? 'selected' : '' }}>Freelance</option>
                    <option value="Magang" {{ old('type_job') == 'Magang' ? 'selected' : '' }}>Magang</option>
                </select>
            </div>

            {{-- Gaji Minimum --}}
            <div>
                <label for="min_salary" class="block text-sm font-medium text-gray-600 mb-1">Gaji Minimum (juta)</label>
                <input type="number" name="min_salary" id="min_salary" value="{{ old('min_salary') }}"
                       class="w-full border border-gray-300 rounded-lg p-2.5 focus:outline-none focus:ring-2 focus:ring-blue-400 transition-all"
                       placeholder="Contoh: 10">
            </div>

            {{-- Gaji Maksimum --}}
            <div>
                <label for="max_salary" class="block text-sm font-medium text-gray-600 mb-1">Gaji Maksimum (juta)</label>
                <input type="number" name="max_salary" id="max_salary" value="{{ old('max_salary') }}"
                       class="w-full border border-gray-300 rounded-lg p-2.5 focus:outline-none focus:ring-2 focus:ring-blue-400 transition-all"
                       placeholder="Contoh: 20">
            </div>

            {{-- Logo Perusahaan (Wajib) --}}
            <div class="md:col-span-2">
                <label for="job_logo" class="block text-sm font-medium text-gray-600 mb-1">Logo Perusahaan</label>
                <div class="relative w-full inline-block">
                    <button type="button"
                        class="flex items-center justify-between w-full bg-gray-100 text-gray-700 py-2.5 px-4 border border-gray-300 rounded-lg cursor-pointer transition-all hover:bg-gray-200"
                        tabindex="-1">
                        <span id="file-name-display" class="flex-grow text-left truncate">Pilih file...</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2 flex-shrink-0" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM6.293 6.707a1 1 0 010-1.414l3-3a1 1 0 011.414 0l3 3a1 1 0 01-1.414 1.414L11 5.414V13a1 1 0 11-2 0V5.414L6.707 6.707a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                        </svg>
                    </button>
                    <input type="file" name="job_logo" id="job_logo" accept="image/*" required
                        class="absolute left-0 top-0 w-full h-full opacity-0 cursor-pointer z-10">
                </div>
                <p class="mt-1 text-xs text-gray-500">Max 2MB (JPG, PNG, GIF, SVG)</p>
                {{-- Pratinjau gambar --}}
                <div id="image-preview-container" class="flex items-center gap-4 mt-2 p-2 border border-gray-200 rounded-lg bg-gray-50" style="display: none;">
                    <img id="image-preview" src="" alt="Image Preview" class="object-contain rounded-md" style="max-width: 100%; max-height: 300px;">
                    <span id="preview-file-name" class="text-sm text-gray-700"></span>
                </div>
            </div>

            {{-- Deskripsi Pekerjaan --}}
            <div class="md:col-span-2">
                <label for="description" class="block text-sm font-medium text-gray-600 mb-1">Deskripsi Pekerjaan</label>
                <textarea name="description" id="description" rows="8"
                          class="w-full border border-gray-300 rounded-lg p-2.5 focus:outline-none focus:ring-2 focus:ring-blue-400 transition-all resize-y"
                          placeholder="Jelaskan tanggung jawab, kualifikasi, dan manfaat dari lowongan ini.">{{ old('description') }}</textarea>
            </div>
        </div>

        {{-- Tombol Aksi --}}
        <div class="mt-10 flex justify-end gap-4">
            <a href="{{ route('admin.manajemen.lowongan') }}"
               class="py-2.5 px-8 rounded-lg font-semibold border border-gray-400 text-gray-600 hover:bg-gray-100 transition-all duration-300 text-center">
            Batal
            </a>
            <button type="submit"
                class="py-2.5 px-8 rounded-lg font-semibold bg-[#1A73E8] text-white hover:bg-blue-700 shadow-sm hover:shadow-md transition-all duration-300">
            Tambah Lowongan
            </button>
        </div>
    </form>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
    const jobLogoInput = document.getElementById('job_logo');
    const fileNameDisplay = document.getElementById('file-name-display');
    const fileInputButton = document.querySelector('button[tabindex="-1"]');
    const imagePreviewContainer = document.getElementById('image-preview-container');
    const imagePreview = document.getElementById('image-preview');
    const previewFileName = document.getElementById('preview-file-name');

    jobLogoInput.addEventListener('change', function() {
        if (this.files && this.files.length > 0) {
            const selectedFile = this.files[0];
            fileNameDisplay.textContent = selectedFile.name;

            const reader = new FileReader();
            reader.onload = function(e) {
                imagePreview.src = e.target.result;
                previewFileName.textContent = selectedFile.name;
                imagePreviewContainer.style.display = 'flex';
                imagePreview.removeAttribute('width');
                imagePreview.removeAttribute('height');
                imagePreview.style.maxWidth = '100%';
                imagePreview.style.maxHeight = '300px';
            };
            reader.readAsDataURL(selectedFile);
        } else {
            fileNameDisplay.textContent = 'Pilih file...';
            imagePreviewContainer.style.display = 'none';
            imagePreview.src = '';
            previewFileName.textContent = '';
        }
    });

    fileInputButton.addEventListener('click', function(e) {
        e.preventDefault();
        jobLogoInput.click();
    });
});

</script>
@endpush
