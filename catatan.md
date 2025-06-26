.
├── app
│   ├── Http
│   │   ├── Controllers
│   │   │   ├── Admin                 <-- FOLDER BARU
│   │   │   │   ├── Auth
│   │   │   │   │   └── LoginController.php  <-- Controller login khusus admin
│   │   │   │   ├── DashboardController.php
│   │   │   │   ├── JobVacancyController.php
│   │   │   │   └── JobSeekerController.php
│   │   │   ├── AuthController.php      <-- Untuk Job Seeker
│   │   │   └── ProfileController.php   <-- Untuk Job Seeker
│   │   └── Middleware
│   │       └── AuthenticateAdmin.php   <-- Middleware yang kita buat
│   ├── Models
│   │   ├── Admin.php                 <-- Model Admin
│   │   ├── User.php                  <-- Model Job Seeker
│   │   └── ...
├── resources
│   └── views
│       ├── admin                     <-- FOLDER BARU
│       │   ├── auth
│       │   │   └── login.blade.php
│       │   ├── dashboard.blade.php
│       │   ├── layouts
│       │   │   └── app.blade.php       <-- Layout khusus admin
│       │   └── ...
│       ├── auth                      <-- View untuk Job Seeker
│       │   ├── login.blade.php
│       │   └── register.blade.php
│       ├── layouts                   <-- Layout untuk Job Seeker
│       └── ...
└── routes
    ├── web.php                     <-- Tempat kita mendefinisikan route group
    └── ...

    # berikut adalah susunan untuk membuat fungsi dari si admin nantinya. On Progress

2. Berikut adalah penyusunan untuk panel system gambarannya seperti ini
/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Admin/  <-- Folder utama untuk semua hal terkait Admin
│   │   │   │   ├── Auth/
│   │   │   │   │   └── LoginController.php       // Mengelola login & logout admin
│   │   │   │   │
│   │   │   │   ├── DashboardController.php     // Logika untuk halaman Dashboard
│   │   │   │   ├── JobVacancyController.php    // CRUD (Create, Read, Update, Delete) Lowongan
│   │   │   │   ├── ApplicantController.php     // Melihat daftar pelamar dan detailnya
│   │   │   │   └── InboxController.php         // Mengelola pesan dari "Hubungi Kami"
│   │   │   │
│   │   │   ├── AuthController.php          // <-- Controller untuk job seeker (tetap di luar)
│   │   │   └── ProfileController.php         // <-- Controller untuk job seeker (tetap di luar)
│   │   │
│   │   ├── Middleware/
│   │   │   └── AuthenticateAdmin.php         // <-- Middleware yang sudah kita buat
│   │
│   ├── Models/
│   │   ├── Admin.php                       // Model untuk tabel `admins`
│   │   ├── JobVacancy.php                  // Model untuk tabel `job_vacancies` (buat baru)
│   │   ├── Applicant.php                   // Model untuk tabel `applications` (buat baru)
│   │   ├── Message.php                     // Model untuk tabel `messages` (buat baru)
│   │   ├── User.php                        // Model untuk job seeker (sudah ada)
│   │   └── ...                             // Model-model lain yang sudah ada
│
├── database/
│   ├── migrations/
│   │   ├── ..._create_admins_table.php
│   │   ├── ..._create_job_vacancies_table.php
│   │   ├── ..._create_applications_table.php
│   │   └── ..._create_messages_table.php
│   │
│   └── seeders/
│       ├── AdminSeeder.php
│       └── ...
│
├── resources/
│   └── views/
│       ├── admin/  <-- Folder utama untuk semua tampilan (view) admin
│       │   ├── auth/
│       │   │   └── login.blade.php           // Tampilan login admin
│       │   │
│       │   ├── layouts/
│       │   │   └── app.blade.php             // Layout utama khusus dasbor admin (dengan sidebar, dll)
│       │   │
│       │   ├── dashboard.blade.php         // Tampilan untuk menu Dashboard
│       │   ├── vacancies/                  // Folder untuk fitur Manajemen Lowongan
│       │   │   ├── index.blade.php         // Daftar semua lowongan
│       │   │   ├── create.blade.php        // Form tambah lowongan baru
│       │   │   └── edit.blade.php          // Form edit lowongan
│       │   │
│       │   ├── applicants/                 // Folder untuk fitur Pelamar
│       │   │   ├── index.blade.php         // Daftar semua pelamar
│       │   │   └── show.blade.php          // Halaman detail profil seorang pelamar
│       │   │
│       │   └── inbox/                      // Folder untuk fitur Kotak Pesan
│       │       ├── inbox.blade.php         // Daftar semua pesan
│       │       └── show.blade.php          // Halaman untuk membaca satu pesan
│       │
│       └── ...                             // <-- View untuk job seeker (tetap di luar)
│
└── routes/
    ├── admin.php                         // (Opsional tapi sangat disarankan) File route khusus admin
    └── web.php                             // File route utama untuk job seeker


1. index.blade.php (File Utama)

    File ini akan berisi perulangan (@foreach) untuk menampilkan semua kartu lowongan seperti pada desain Anda.
    
    Yang paling penting: File ini juga akan berisi kode HTML untuk semua modal/pop-up Anda (Lihat, Edit, dan Hapus). Awalnya, semua pop-up ini akan disembunyikan menggunakan CSS (display: none; atau kelas dari Tailwind seperti hidden).
    JavaScript akan berperan untuk:
    - Menampilkan pop-up yang sesuai saat tombol "Lihat", "Edit", atau "Hapus" diklik.
    - Mengambil data lowongan yang relevan (misalnya, saat klik "Edit" pada lowongan #3) dan mengisi form di dalam pop-up edit dengan data tersebut.
    - Mengirim data kembali ke server saat form di dalam pop-up di-submit, tanpa me-refresh halaman (menggunakan teknologi AJAX).

2. create.blade.php (Tetap Terpisah)

    Form untuk "Tambah Lowongan Baru" umumnya lebih baik diletakkan di halaman terpisah. Alasannya, aksi ini tidak terikat pada satu data lowongan spesifik dan biasanya form-nya cukup panjang. Tombol + di halaman index akan mengarah ke halaman ini.


@extends('admin.layouts.app')

@section('title', 'Tambah Lowongan Baru')
@section('page-title', 'Tambah Lowongan')

@section('content')
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

    {{-- Menggunakan route name yang sesuai dengan Route::resource --}}
    <form action="{{ route('admin.manajemenlowongan.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-6">
            {{-- Judul Lowongan --}}
            <div class="md:col-span-2">
                <label for="title" class="block text-sm font-medium text-gray-600 mb-1">Judul Lowongan</label>
                <input type="text" name="title" id="title" value="{{ old('title') }}"
                       class="w-full border border-gray-300 rounded-lg p-2.5 focus:outline-none focus:ring-2 focus:ring-blue-400 transition-all"
                       placeholder="Contoh: Frontend Developer, Manajer Proyek IT" required>
            </div>

            {{-- Nama Perusahaan --}}
            <div>
                <label for="company_name" class="block text-sm font-medium text-gray-600 mb-1">Nama Perusahaan</label>
                <input type="text" name="company_name" id="company_name" value="Anti Nganggur"
                       class="w-full border border-gray-300 rounded-lg p-2.5 focus:outline-none focus:ring-2 focus:ring-blue-400 transition-all bg-gray-100 cursor-not-allowed"
                       readonly>
                <p class="mt-1 text-xs text-gray-500">Nama perusahaan diisi otomatis.</p>
            </div>

            {{-- Lokasi Pekerjaan --}}
            <div>
                <label for="location" class="block text-sm font-medium text-gray-600 mb-1">Lokasi (Kota)</label>
                <input type="text" name="location" id="location" value="{{ old('location') }}"
                       class="w-full border border-gray-300 rounded-lg p-2.5 focus:outline-none focus:ring-2 focus:ring-blue-400 transition-all"
                       placeholder="Contoh: Jakarta, Bandung" required>
            </div>

            {{-- Detail Lokasi --}}
            <div class="md:col-span-2">
                <label for="location_detail" class="block text-sm font-medium text-gray-600 mb-1">Detail Lokasi (Alamat Lengkap)</label>
                <textarea name="location_detail" id="location_detail" rows="3"
                          class="w-full border border-gray-300 rounded-lg p-2.5 focus:outline-none focus:ring-2 focus:ring-blue-400 transition-all"
                          placeholder="Contoh: Jl. Jendral Sudirman No. 5, Gedung ABC Lt. 10">{{ old('location_detail') }}</textarea>
            </div>

            {{-- Tipe Pekerjaan --}}
            <div>
                <label for="type_job" class="block text-sm font-medium text-gray-600 mb-1">Tipe Pekerjaan</label>
                <select name="type_job" id="type_job" required
                        class="w-full border border-gray-300 rounded-lg p-2.5 focus:outline-none focus:ring-2 focus:ring-blue-400 transition-all">
                    <option value="">Pilih Tipe Pekerjaan</option>
                    <option value="Full-time" {{ old('type_job') == 'Full-time' ? 'selected' : '' }}>Full-time</option>
                    <option value="Part-time" {{ old('type_job') == 'Part-time' ? 'selected' : '' }}>Part-time</option>
                    <option value="Contract" {{ old('type_job') == 'Contract' ? 'selected' : '' }}>Kontrak</option>
                    <option value="Internship" {{ old('type_job') == 'Internship' ? 'selected' : '' }}>Magang</option>
                    <option value="Freelance" {{ old('type_job') == 'Freelance' ? 'selected' : '' }}>Freelance</option>
                </select>
            </div>

            {{-- Jadwal Kerja --}}
            <div>
                <label for="work_schedule" class="block text-sm font-medium text-gray-600 mb-1">Jadwal Kerja</label>
                <input type="text" name="work_schedule" id="work_schedule" value="{{ old('work_schedule', 'Senin - Jumat') }}"
                       class="w-full border border-gray-300 rounded-lg p-2.5 focus:outline-none focus:ring-2 focus:ring-blue-400 transition-all"
                       placeholder="Contoh: Senin - Jumat, Fleksibel">
            </div>
            
            {{-- Tingkat Karir --}}
            <div>
                <label for="career_level" class="block text-sm font-medium text-gray-600 mb-1">Tingkat Karir</label>
                <select name="career_level" id="career_level"
                        class="w-full border border-gray-300 rounded-lg p-2.5 focus:outline-none focus:ring-2 focus:ring-blue-400 transition-all">
                    <option value="">Pilih Tingkat Karir</option>
                    <option value="Entry Level" {{ old('career_level') == 'Entry Level' ? 'selected' : '' }}>Entry Level / Pemula</option>
                    <option value="Junior Staff" {{ old('career_level') == 'Junior Staff' ? 'selected' : '' }}>Junior Staff</option>
                    <option value="Senior Staff" {{ old('career_level') == 'Senior Staff' ? 'selected' : '' }}>Senior Staff</option>
                    <option value="Manager" {{ old('career_level') == 'Manager' ? 'selected' : '' }}>Manager</option>
                </select>
            </div>

            {{-- Mobilitas --}}
            <div>
                <label for="mobility" class="block text-sm font-medium text-gray-600 mb-1">Mobilitas</label>
                <select name="mobility" id="mobility"
                        class="w-full border border-gray-300 rounded-lg p-2.5 focus:outline-none focus:ring-2 focus:ring-blue-400 transition-all">
                    <option value="">Pilih Mobilitas</option>
                    <option value="WFO" {{ old('mobility') == 'WFO' ? 'selected' : '' }}>Work From Office (WFO)</option>
                    <option value="WFA" {{ old('mobility') == 'WFA' ? 'selected' : '' }}>Work From Anywhere (WFA)</option>
                    <option value="Hybrid" {{ old('mobility') == 'Hybrid' ? 'selected' : '' }}>Hybrid</option>
                </select>
            </div>

            {{-- Gaji Minimum --}}
            <div>
                <label for="min_salary" class="block text-sm font-medium text-gray-600 mb-1">Gaji Minimum (Opsional)</label>
                <input type="number" name="min_salary" id="min_salary" value="{{ old('min_salary') }}"
                       class="w-full border border-gray-300 rounded-lg p-2.5 focus:outline-none focus:ring-2 focus:ring-blue-400 transition-all"
                       placeholder="Contoh: 5000000">
            </div>

            {{-- Gaji Maksimum --}}
            <div>
                <label for="max_salary" class="block text-sm font-medium text-gray-600 mb-1">Gaji Maksimum (Opsional)</label>
                <input type="number" name="max_salary" id="max_salary" value="{{ old('max_salary') }}"
                       class="w-full border border-gray-300 rounded-lg p-2.5 focus:outline-none focus:ring-2 focus:ring-blue-400 transition-all"
                       placeholder="Contoh: 10000000">
            </div>
            
             {{-- Jumlah Posisi --}}
            <div class="md:col-span-2">
                <label for="open_positions" class="block text-sm font-medium text-gray-600 mb-1">Jumlah Posisi Dibuka</label>
                <input type="number" name="open_positions" id="open_positions" value="{{ old('open_positions', 1) }}" min="1" required
                       class="w-full border border-gray-300 rounded-lg p-2.5 focus:outline-none focus:ring-2 focus:ring-blue-400 transition-all">
            </div>

            {{-- Logo Perusahaan --}}
            <div class="md:col-span-2">
                <label for="job_logo" class="block text-sm font-medium text-gray-600 mb-1">Logo Perusahaan</label>
                <div class="relative w-full inline-block">
                    <input type="file" name="job_logo" id="job_logo" accept="image/*"
                           class="absolute left-0 top-0 w-full h-full opacity-0 cursor-pointer z-10">
                    <label for="job_logo" class="flex items-center justify-between w-full bg-gray-100 text-gray-700 py-2.5 px-4 border border-gray-300 rounded-lg cursor-pointer transition-all hover:bg-gray-200">
                        <span id="file-name-display" class="flex-grow text-left truncate">Pilih file...</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2 flex-shrink-0" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM6.293 6.707a1 1 0 010-1.414l3-3a1 1 0 011.414 0l3 3a1 1 0 01-1.414 1.414L11 5.414V13a1 1 0 11-2 0V5.414L6.707 6.707a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                        </svg>
                    </label>
                </div>
                <p class="mt-1 text-xs text-gray-500">Max 2MB (JPG, PNG, GIF, SVG)</p>
                <div id="image-preview-container" class="mt-2" style="display: none;">
                    <img id="image-preview" src="" alt="Image Preview" class="max-w-xs max-h-48 rounded-lg shadow-md">
                </div>
            </div>

            {{-- Deskripsi Pekerjaan --}}
            <div class="md:col-span-2">
                <label for="description" class="block text-sm font-medium text-gray-600 mb-1">Deskripsi Pekerjaan</label>
                <textarea name="description" id="description" rows="8" required
                          class="w-full border border-gray-300 rounded-lg p-2.5 focus:outline-none focus:ring-2 focus:ring-blue-400 transition-all resize-y"
                          placeholder="Jelaskan tanggung jawab, kualifikasi, dan manfaat dari lowongan ini.">{{ old('description') }}</textarea>
            </div>
        </div>

        {{-- Bagian Benefit --}}
        <div class="mt-8 border-t border-gray-200 pt-6">
            <label class="block text-xl font-semibold text-gray-700 mb-4">Benefit yang Ditawarkan</label>
            <div id="benefits-container" class="space-y-4">
                {{-- Input benefit dinamis akan ditambahkan di sini --}}
            </div>
            <button type="button" id="add-benefit-btn" class="mt-4 py-2 px-4 rounded-lg font-semibold border border-gray-400 text-gray-600 hover:bg-gray-100 transition-all duration-300 text-center">
                + Tambah Benefit
            </button>
        </div>


        {{-- Tombol Aksi --}}
        <div class="mt-10 flex justify-end gap-4">
            {{-- Menggunakan route name yang sesuai dengan Route::resource --}}
            <a href="{{ route('admin.manajemenlowongan.index') }}"
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
    // === SCRIPT UNTUK PREVIEW LOGO ===
    const jobLogoInput = document.getElementById('job_logo');
    const fileNameDisplay = document.getElementById('file-name-display');
    const imagePreviewContainer = document.getElementById('image-preview-container');
    const imagePreview = document.getElementById('image-preview');

    jobLogoInput.addEventListener('change', function() {
        if (this.files && this.files[0]) {
            const file = this.files[0];
            fileNameDisplay.textContent = file.name;
            const reader = new FileReader();
            reader.onload = (e) => {
                imagePreview.src = e.target.result;
                imagePreviewContainer.style.display = 'block';
            };
            reader.readAsDataURL(file);
        } else {
            fileNameDisplay.textContent = 'Pilih file...';
            imagePreviewContainer.style.display = 'none';
        }
    });

    // === SCRIPT UNTUK BENEFIT DINAMIS ===
    const benefitsContainer = document.getElementById('benefits-container');
    const addBenefitButton = document.getElementById('add-benefit-btn');

    const createBenefitInput = () => {
        const wrapper = document.createElement('div');
        wrapper.className = 'flex items-center gap-x-3';
        
        const input = document.createElement('input');
        input.type = 'text';
        input.name = 'benefits[]'; // Penting: gunakan array name
        input.className = 'w-full border border-gray-300 rounded-lg p-2.5 focus:outline-none focus:ring-2 focus:ring-blue-400 transition-all';
        input.placeholder = 'Contoh: Asuransi Kesehatan, Tunjangan Makan';

        const removeButton = document.createElement('button');
        removeButton.type = 'button';
        removeButton.className = 'py-2 px-4 rounded-lg font-semibold bg-red-500 text-white hover:bg-red-600 transition-all duration-300';
        removeButton.textContent = 'Hapus';
        removeButton.onclick = () => {
            wrapper.remove();
        };
        
        wrapper.appendChild(input);
        wrapper.appendChild(removeButton);
        benefitsContainer.appendChild(wrapper);
    };

    // Tambahkan input benefit saat tombol diklik
    addBenefitButton.addEventListener('click', createBenefitInput);

    // Tambahkan satu input benefit kosong saat halaman pertama kali dimuat
    createBenefitInput();
});
</script>
@endpush



<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    @php
                                        $statusClasses = [
                                            'pending' => 'text-yellow-800 bg-yellow-100 border-yellow-300',
                                            'accepted' => 'text-green-800 bg-green-100 border-green-300',
                                            'rejected' => 'text-red-800 bg-red-100 border-red-300',
                                        ];
                                        $statusLabels = [
                                            'pending' => 'Menunggu',
                                            'accepted' => 'Diterima',
                                            'rejected' => 'Ditolak',
                                        ];
                                    @endphp

                                    <div class="relative status-dropdown-group" style="min-width: 140px;">
                                        <button type="button"
                                            class="w-full flex justify-between items-center font-semibold leading-tight py-1 px-3 rounded-full border cursor-pointer focus:outline-none transition {{ $statusClasses[$application->status] ?? 'bg-gray-200' }}"
                                            onclick="toggleDropdown(this)">
                                            <span>{{ $statusLabels[$application->status] ?? ucfirst($application->status) }}</span>
                                            <svg class="w-4 h-4 ml-2 text-gray-500 transition-transform duration-200" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 9l-7 7-7-7"></path>
                                            </svg>
                                        </button>
                                        <div class="absolute left-0 mt-2 w-full rounded-lg shadow-lg bg-white border border-gray-200 z-10 overflow-hidden dropdown-menu"
                                            style="max-height:0; opacity:0; transition:max-height 0.25s cubic-bezier(.4,0,.2,1),opacity 0.2s;">
                                            <form action="{{ route('admin.manajemen.pelamar.updateStatus', $application->id) }}" method="POST" class="m-0">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" name="status" value="pending"
                                                    class="block w-full text-left px-4 py-2 text-gray-800 hover:bg-yellow-50 font-semibold {{ $application->status == 'pending' ? 'bg-yellow-100 text-yellow-800' : '' }}">
                                                    Menunggu
                                                </button>
                                                <button type="submit" name="status" value="accepted"
                                                    class="block w-full text-left px-4 py-2 text-gray-800 hover:bg-green-50 font-semibold {{ $application->status == 'accepted' ? 'bg-green-100 text-green-800' : '' }}">
                                                    Diterima
                                                </button>
                                                <button type="submit" name="status" value="rejected"
                                                    class="block w-full text-left px-4 py-2 text-gray-800 hover:bg-red-50 font-semibold {{ $application->status == 'rejected' ? 'bg-red-100 text-red-800' : '' }}">
                                                    Ditolak
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                                @section('scripts')
                                <script>
                                    function closeAllDropdowns() {
                                        document.querySelectorAll('.dropdown-menu').forEach(menu => {
                                            menu.style.maxHeight = '0';
                                            menu.style.opacity = '0';
                                            menu.parentElement.querySelector('svg').style.transform = '';
                                        });
                                    }
                                    function toggleDropdown(btn) {
                                        const menu = btn.parentElement.querySelector('.dropdown-menu');
                                        const svg = btn.querySelector('svg');
                                        if (menu.style.maxHeight && menu.style.maxHeight !== '0px') {
                                            menu.style.maxHeight = '0';
                                            menu.style.opacity = '0';
                                            svg.style.transform = '';
                                        } else {
                                            closeAllDropdowns();
                                            menu.style.maxHeight = menu.scrollHeight + 'px';
                                            menu.style.opacity = '1';
                                            svg.style.transform = 'rotate(180deg)';
                                        }
                                    }
                                    document.addEventListener('click', function(e) {
                                        if (!e.target.closest('.status-dropdown-group')) {
                                            closeAllDropdowns();
                                        }
                                    });
                                </script>
                                @endsection
