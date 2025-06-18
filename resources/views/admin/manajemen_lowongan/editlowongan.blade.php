@extends('admin.layouts.app')

@section('title', 'Edit Lowongan')
@section('page-title', 'Edit Lowongan')

@push('styles')
<style>
    /* Style untuk input file kustom */
    .file-input-wrapper {
        position: relative;
        overflow: hidden;
        display: inline-block;
        width: 100%;
    }

    .file-input-wrapper input[type=file] {
        position: absolute;
        left: 0;
        top: 0;
        opacity: 0;
        cursor: pointer;
        width: 100%;
        height: 100%;
    }

    .file-input-button {
        background-color: #f3f4f6;
        color: #4b5563;
        padding: 0.625rem 1rem; /* p-2.5 */
        border: 1px solid #d1d5db;
        border-radius: 0.5rem; /* rounded-lg */
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: space-between;
        transition: all 0.2s ease;
    }

    .file-input-button:hover {
        background-color: #e5e7eb;
    }

    .file-input-button span {
        flex-grow: 1;
        text-align: left;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .file-input-button svg {
        flex-shrink: 0;
        margin-left: 0.5rem;
    }
    /* Style untuk pratinjau gambar */
    #image-preview-container {
        display: flex;
        align-items: center;
        gap: 1rem;
        margin-top: 0.5rem;
        padding: 0.5rem;
        border: 1px solid #e5e7eb; /* gray-200 */
        border-radius: 0.5rem; /* rounded-lg */
        background-color: #f9fafb; /* gray-50 */
    }
    #image-preview {
        max-width: 100px; /* Lebar maksimum untuk pratinjau */
        height: auto;
        object-fit: contain;
        border-radius: 0.25rem; /* rounded-md */
    }
</style>
@endpush

@section('content')
<div class="bg-white p-8 rounded-2xl shadow-lg">
    <h2 class="text-2xl font-bold text-gray-800 mb-8">Form Edit Lowongan</h2>

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

    <form action="{{ route('admin.manajemen.lowongan.update', $jobVacancy->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT') {{-- Pastikan ini ada untuk mengirim sebagai PUT request --}}

        <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-6">
            {{-- Judul Lowongan --}}
            <div class="md:col-span-2">
                <label for="title" class="block text-sm font-medium text-gray-600 mb-1">Judul Lowongan</label>
                <input type="text" name="title" id="title" value="{{ old('title', $jobVacancy->title) }}"
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
                        <option value="{{ $loc }}" {{ old('location', $jobVacancy->location) == $loc ? 'selected' : '' }}>{{ $loc }}</option>
                    @endforeach
                </select>
            </div>

            {{-- Tipe Pekerjaan --}}
            <div>
                <label for="type_job" class="block text-sm font-medium text-gray-600 mb-1">Tipe Pekerjaan</label>
                <select name="type_job" id="type_job"
                        class="w-full border border-gray-300 rounded-lg p-2.5 focus:outline-none focus:ring-2 focus:ring-blue-400 transition-all">
                    <option value="">Pilih Tipe Pekerjaan</option>
                    <option value="Full-time" {{ old('type_job', $jobVacancy->type_job) == 'Full-time' ? 'selected' : '' }}>Full-time</option>
                    <option value="Part-time" {{ old('type_job', $jobVacancy->type_job) == 'Part-time' ? 'selected' : '' }}>Part-time</option>
                    <option value="Kontrak" {{ old('type_job', $jobVacancy->type_job) == 'Kontrak' ? 'selected' : '' }}>Kontrak</option>
                    <option value="Freelance" {{ old('type_job', $jobVacancy->type_job) == 'Freelance' ? 'selected' : '' }}>Freelance</option>
                    <option value="Magang" {{ old('type_job', $jobVacancy->type_job) == 'Magang' ? 'selected' : '' }}>Magang</option>
                </select>
            </div>

            {{-- Gaji Minimum --}}
            <div>
                <label for="min_salary" class="block text-sm font-medium text-gray-600 mb-1">Gaji Minimum (Rp)</label>
                <input type="number" name="min_salary" id="min_salary" value="{{ old('min_salary', $jobVacancy->min_salary) }}"
                       class="w-full border border-gray-300 rounded-lg p-2.5 focus:outline-none focus:ring-2 focus:ring-blue-400 transition-all"
                       placeholder="Contoh: 5000000">
            </div>

            {{-- Gaji Maksimum --}}
            <div>
                <label for="max_salary" class="block text-sm font-medium text-gray-600 mb-1">Gaji Maksimum (Rp)</label>
                <input type="number" name="max_salary" id="max_salary" value="{{ old('max_salary', $jobVacancy->max_salary) }}"
                       class="w-full border border-gray-300 rounded-lg p-2.5 focus:outline-none focus:ring-2 focus:ring-blue-400 transition-all"
                       placeholder="Contoh: 10000000">
            </div>

            {{-- Logo Perusahaan --}}
            <div class="md:col-span-2">
                <label for="job_logo" class="block text-sm font-medium text-gray-600 mb-1">Logo Perusahaan</label>
                <div class="file-input-wrapper">
                    <button type="button" class="file-input-button">
                        <span id="file-name-display">{{ $jobVacancy->job_logo ? basename($jobVacancy->job_logo) : 'Pilih file...' }}</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM6.293 6.707a1 1 0 010-1.414l3-3a1 1 0 011.414 0l3 3a1 1 0 01-1.414 1.414L11 5.414V13a1 1 0 11-2 0V5.414L6.707 6.707a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                        </svg>
                    </button>
                    <input type="file" name="job_logo" id="job_logo" accept="image/*">
                </div>
                <p class="mt-1 text-xs text-gray-500">Max 2MB (JPG, PNG, GIF, SVG). Biarkan kosong jika tidak ingin mengubah.</p>
                {{-- Pratinjau gambar --}}
                <div id="image-preview-container" class="mt-2 {{ $jobVacancy->job_logo ? 'flex' : 'hidden' }} items-center gap-4 p-2 border border-gray-200 rounded-lg bg-gray-50">
                    <img id="image-preview" src="{{ $jobVacancy->job_logo ? asset('storage/' . $jobVacancy->job_logo) : '' }}" alt="Image Preview" class="max-w-[100px] h-auto object-contain rounded-md">
                    <span id="preview-file-name" class="text-sm text-gray-700">{{ $jobVacancy->job_logo ? basename($jobVacancy->job_logo) : '' }}</span>
                </div>
            </div>

            {{-- Deskripsi Pekerjaan --}}
            <div class="md:col-span-2">
                <label for="description" class="block text-sm font-medium text-gray-600 mb-1">Deskripsi Pekerjaan</label>
                <textarea name="description" id="description" rows="8"
                          class="w-full border border-gray-300 rounded-lg p-2.5 focus:outline-none focus:ring-2 focus:ring-blue-400 transition-all resize-y"
                          placeholder="Jelaskan tanggung jawab, kualifikasi, dan manfaat dari lowongan ini.">{{ old('description', $jobVacancy->description) }}</textarea>
            </div>
        </div>

        {{-- Tombol Aksi --}}
        <div class="mt-10 flex justify-end gap-4">
            <a href="{{ route('admin.manajemen.lowongan') }}"
                    class="py-2.5 px-8 rounded-lg font-semibold border border-gray-400 text-gray-600 hover:bg-gray-100 transition-all duration-300">
                Batal
            </a>
            <button type="submit"
                    class="py-2.5 px-8 rounded-lg font-semibold bg-[#1A73E8] text-white hover:bg-blue-700 shadow-sm hover:shadow-md transition-all duration-300">
                Simpan Perubahan
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
        const fileInputButton = document.querySelector('.file-input-button');
        const imagePreviewContainer = document.getElementById('image-preview-container');
        const imagePreview = document.getElementById('image-preview');
        const previewFileName = document.getElementById('preview-file-name');

        // Initial check for existing logo
        if (imagePreview.src && imagePreview.src.includes('storage')) {
            imagePreviewContainer.classList.remove('hidden');
        } else {
            imagePreviewContainer.classList.add('hidden');
        }

        jobLogoInput.addEventListener('change', function() {
            if (this.files && this.files.length > 0) {
                const selectedFile = this.files[0];
                fileNameDisplay.textContent = selectedFile.name; // Update text for the button

                // Display image preview
                const reader = new FileReader();
                reader.onload = function(e) {
                    imagePreview.src = e.target.result;
                    previewFileName.textContent = selectedFile.name;
                    imagePreviewContainer.classList.remove('hidden');
                };
                reader.readAsDataURL(selectedFile);
            } else {
                // If no new file selected, revert to old logo if it existed
                if ("{{ $jobVacancy->job_logo }}") {
                    fileNameDisplay.textContent = "{{ basename($jobVacancy->job_logo) }}";
                    imagePreview.src = "{{ asset('storage/' . $jobVacancy->job_logo) }}";
                    previewFileName.textContent = "{{ basename($jobVacancy->job_logo) }}";
                    imagePreviewContainer.classList.remove('hidden');
                } else {
                    fileNameDisplay.textContent = 'Pilih file...';
                    imagePreviewContainer.classList.add('hidden');
                    imagePreview.src = '';
                    previewFileName.textContent = '';
                }
            }
        });

        // Mencegah form submit saat button file-input-button diklik
        fileInputButton.addEventListener('click', function(e) {
            e.preventDefault();
            jobLogoInput.click(); // Memicu klik pada input file tersembunyi
        });
    });
</script>
@endpush
