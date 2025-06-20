@extends('layouts.app')

@section('title', 'Lamar Pekerjaan - AntiNganggur')

@section('content')
    <div class="min-h-screen bg-gray-100 flex justify-center items-start p-5">
        <div class="w-full max-w-md bg-white rounded-lg overflow-hidden shadow-lg">
            <div class="bg-[#FFA98F] p-5 text-white flex items-center justify-center gap-4">
                <img src="{{ asset('asset/page/lamar.png') }}" alt="Illustrasi Orang Bergabung"
                    class="w-20 h-auto object-contain">
                <div class="text-center">
                    <h1 class="text-2xl font-bold mb-1">Lamar Pekerjaan</h1>
                    <h2 class="text-lg font-medium">Isi Data Lamaran</h2>
                </div>
            </div>

            <div class="p-6 pb-8">
                @if (session('application_success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                        <p class="text-sm">{{ session('application_success') }}</p>
                    </div>
                @endif

                @if ($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                        <ul class="list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li class="text-sm">{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (session('error'))
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                        <p class="text-sm">{{ session('error') }}</p>
                    </div>
                @endif

                @if (session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                        <p class="text-sm">{{ session('success') }}</p>
                    </div>
                @endif

                <form action="{{ route('lamar.store') }}" method="POST" enctype="multipart/form-data"
                    id="jobApplicationForm">
                    @csrf

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Posisi yang Dilamar:</label>
                        {{-- Menampilkan job_title secara statis --}}
                        <div class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline bg-gray-50">
                            {{-- Cek apakah $jobVacancy ada, jika tidak gunakan old('position_name') --}}
                            {{ isset($jobVacancy) ? $jobVacancy->job_title : old('position_name', 'Lowongan Tidak Ditemukan') }}
                        </div>
                        {{-- Input hidden untuk job_vacancy_id --}}
                        <input type="hidden" name="job_vacancy_id" id="job_vacancy_id"
                            value="{{ isset($jobVacancy) ? $jobVacancy->id : old('job_vacancy_id') }}">
                        {{-- Input hidden untuk position_name --}}
                        <input type="hidden" name="position_name" id="position_name"
                            value="{{ isset($jobVacancy) ? $jobVacancy->job_title : old('position_name') }}">
                    </div>

                    <div class="floating-label-input">
                        <input type="text" name="full_name" id="nama" placeholder="Nama Lengkap"
                            value="{{ old('full_name') }}" required>
                        <label for="nama">Nama Lengkap</label>
                    </div>

                    <div class="floating-label-input">
                        <input type="tel" name="phone_number" id="nomor" placeholder="Nomor"
                            value="{{ old('phone_number') }}" required>
                        <label for="nomor">Nomor</label>
                    </div>

                    <div class="floating-label-input">
                        <input type="email" name="email" id="email" placeholder="Email" value="{{ old('email') }}"
                            required>
                        <label for="email">Email</label>
                    </div>

                    <div class="floating-label-input">
                        <select name="province" id="provinsi" required>
                            <option value="" disabled selected></option>
                        </select>
                        <label for="provinsi">Pilih Provinsi</label>
                    </div>

                    <div class="floating-label-input">
                        <select name="city" id="lokasi" required disabled>
                            <option value="" disabled selected></option>
                        </select>
                        <label for="lokasi">Pilih Kabupaten/Kota</label>
                    </div>

                    <div class="floating-label-input">
                        <select name="education_level" id="pendidikan" required>
                            <option value="" disabled selected></option>
                            <option value="SMA/SMK" {{ old('education_level') == 'SMA/SMK' ? 'selected' : '' }}>SMA/SMK
                            </option>
                            <option value="D3" {{ old('education_level') == 'D3' ? 'selected' : '' }}>D3</option>
                            <option value="D4" {{ old('education_level') == 'D4' ? 'selected' : '' }}>D4</option>
                            <option value="S1" {{ old('education_level') == 'S1' ? 'selected' : '' }}>S1</option>
                            <option value="S2" {{ old('education_level') == 'S2' ? 'selected' : '' }}>S2</option>
                            <option value="S3" {{ old('education_level') == 'S3' ? 'selected' : '' }}>S3</option>
                            <option value="Lainnya" {{ old('education_level') == 'Lainnya' ? 'selected' : '' }}>Lainnya
                            </option>
                        </select>
                        <label for="pendidikan">Pendidikan Terakhir</label>
                    </div>

                    <div class="floating-label-input">
                        <input type="text" name="major" id="jurusan" placeholder="Jurusan"
                            value="{{ old('major') }}" required>
                        <label for="jurusan">Jurusan</label>
                    </div>

                    <div class="floating-label-input">
                        <select name="experience_level" id="pengalaman" required>
                            <option value="" disabled selected></option>
                            <option value="Fresh Graduate"
                                {{ old('experience_level') == 'Fresh Graduate' ? 'selected' : '' }}>Fresh Graduate</option>
                            <option value="1-2 Tahun" {{ old('experience_level') == '1-2 Tahun' ? 'selected' : '' }}>1-2
                                Tahun</option>
                            <option value="3-5 Tahun" {{ old('experience_level') == '3-5 Tahun' ? 'selected' : '' }}>3-5
                                Tahun</option>
                            <option value="5+ Tahun" {{ old('experience_level') == '5+ Tahun' ? 'selected' : '' }}>5+ Tahun
                            </option>
                        </select>
                        <label for="pengalaman">Tingkat Pengalaman</label>
                    </div>

                    <div class="mb-5">
                        <label class="form-label">CV</label>
                        <label for="cv-upload" class="upload-btn">
                            <div class="upload-icon">+</div>
                            <span class="upload-text" id="cv-text">Unggah CV Dalam Bentuk Pdf</span>
                        </label>
                        <input type="file" name="cv_file" id="cv-upload" accept=".pdf" style="display: none;"
                            required>
                    </div>

                    <div class="mb-5">
                        <label class="form-label">Portfolio</label>
                        <label for="portfolio-upload" class="upload-btn">
                            <div class="upload-icon">+</div>
                            <span class="upload-text" id="portfolio-text">Unggah Portfolio Dalam Bentuk Pdf
                                (Opsional)</span>
                        </label>
                        <input type="file" name="portfolio_file" id="portfolio-upload" accept=".pdf"
                            style="display: none;">
                    </div>

                    <div class="clearfix">
                        <button type="submit" class="submit-btn" style="margin-bottom:32px;">Lamar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @push('styles')
        <style>
            .floating-label-input {
                position: relative;
                margin-bottom: 1.5rem;
            }

            .floating-label-input input,
            .floating-label-input select {
                width: 100%;
                height: 50px;
                padding: 0 15px;
                border: 1px solid #DDD;
                border-radius: 8px;
                font-size: 14px;
                outline: none;
                transition: border 0.2s ease;
                box-sizing: border-box;
            }

            .floating-label-input select {
                -webkit-appearance: none;
                -moz-appearance: none;
                appearance: none;
                background-image: url('data:image/svg+xml;utf8,<svg fill="%23999999" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="M7 10l5 5 5-5z"/><path d="M0 0h24v24H0z" fill="none"/></svg>');
                background-repeat: no-repeat;
                background-position: right 10px center;
                background-size: 16px;
                background-color: white;
                overflow: hidden;
                text-overflow: ellipsis;
                white-space: nowrap;
            }

            .floating-label-input label {
                position: absolute;
                top: 50%;
                left: 15px;
                transform: translateY(-50%);
                font-size: 14px;
                color: #999;
                pointer-events: none;
                transition: all 0.2s ease;
                background-color: white;
                padding: 0 5px;
                z-index: 2;
            }

            .floating-label-input input:focus,
            .floating-label-input select:focus {
                border-color: #FFA98F;
            }

            .floating-label-input input:focus+label,
            .floating-label-input input:not(:placeholder-shown)+label,
            .floating-label-input select:focus+label,
            .floating-label-input select:valid+label {
                top: 0;
                font-size: 12px;
                color: #FFA98F;
                font-weight: 500;
                z-index: 3;
            }

            .floating-label-input input::placeholder {
                color: transparent;
            }

            .floating-label-input select:invalid {
                color: #999;
            }

            .floating-label-input select:valid {
                color: #333;
            }

            .form-label {
                display: block;
                margin-bottom: 8px;
                font-size: 15px;
                color: #333;
                font-weight: 600;
                position: relative;
            }

            .form-label::after {
                content: "";
                position: absolute;
                bottom: -5px;
                left: 0;
                width: 100%;
                height: 1px;
                background-color: #DDD;
            }

            .upload-btn {
                display: flex;
                align-items: center;
                background-color: #F8F8F8;
                border: 1px solid #DDD;
                border-radius: 8px;
                padding: 12px;
                width: 100%;
                cursor: pointer;
                transition: background-color 0.2s ease;
            }

            .upload-btn:hover {
                background-color: #EEE;
            }

            .upload-icon {
                background-color: #FFA98F;
                color: white;
                width: 28px;
                height: 28px;
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                margin-right: 12px;
                font-size: 20px;
                font-weight: 700;
            }

            .upload-text {
                color: #666;
                font-size: 14px;
                font-weight: 400;
            }

            .submit-btn {
                background-color: #FF7F50;
                color: white;
                border: none;
                border-radius: 8px;
                padding: 12px 30px;
                font-size: 16px;
                font-weight: 600;
                cursor: pointer;
                margin-top: 20px;
                float: right;
                transition: background-color 0.2s ease;
            }

            .submit-btn:hover {
                background-color: #FF6B3D;
            }
        </style>
    @endpush

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const provinsiSelect = document.getElementById('provinsi');
                const lokasiSelect = document.getElementById('lokasi');
                // Tidak ada lagi jobVacancySelect karena bukan dropdown.
                // Tetap ada referensi ke input hidden untuk memastikan mereka ada di DOM.
                const jobVacancyIdInput = document.getElementById('job_vacancy_id');
                const positionNameInput = document.getElementById('position_name');

                function populateDropdown(selectElement, data, placeholderText) {
                    selectElement.innerHTML = `<option value="" disabled selected>${placeholderText}</option>`;
                    data.forEach(item => {
                        const option = document.createElement('option');
                        option.value = item.id || item.value;
                        option.textContent = item.name || item.label;
                        selectElement.appendChild(option);
                    });
                    selectElement.classList.remove('valid');
                }

                async function fetchProvinces() {
                    try {
                        const response = await fetch('https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json');
                        if (!response.ok) {
                            throw new Error(`HTTP error! status: ${response.status}`);
                        }
                        const provinces = await response.json();
                        provinces.sort((a, b) => a.name.localeCompare(b.name));
                        populateDropdown(provinsiSelect, provinces, "Provinsi");
                    } catch (error) {
                        console.error('Gagal mengambil data provinsi:', error);
                        alert('Gagal memuat daftar provinsi. Silakan coba lagi nanti.');
                    }
                }

                async function fetchRegencies(provinceId) {
                    lokasiSelect.disabled = true;
                    lokasiSelect.innerHTML = `<option value="" disabled selected>Memuat...</option>`;
                    lokasiSelect.classList.remove('valid');

                    try {
                        const response = await fetch(
                            `https://www.emsifa.com/api-wilayah-indonesia/api/regencies/${provinceId}.json`);
                        if (!response.ok) {
                            throw new Error(`HTTP error! status: ${response.status}`);
                        }
                        const regencies = await response.json();
                        regencies.sort((a, b) => a.name.localeCompare(b.name));
                        populateDropdown(lokasiSelect, regencies, "Kabupaten/Kota");
                        lokasiSelect.disabled = false;
                    } catch (error) {
                        console.error('Gagal mengambil data kabupaten/kota:', error);
                        alert('Gagal memuat daftar kabupaten/kota. Silakan coba lagi nanti.');
                        lokasiSelect.innerHTML = `<option value="" disabled selected>Gagal memuat</option>`;
                    }
                }

                // Event Listeners for location dropdowns remain the same
                provinsiSelect.addEventListener('change', function() {
                    const selectedProvinceId = this.value;
                    if (selectedProvinceId) {
                        fetchRegencies(selectedProvinceId);
                    } else {
                        lokasiSelect.innerHTML = `<option value="" disabled selected>Pilih Kabupaten/Kota</option>`;
                        lokasiSelect.disabled = true;
                        lokasiSelect.classList.remove('valid');
                    }
                    if (this.value !== "") {
                        this.classList.add('valid');
                    } else {
                        this.classList.remove('valid');
                    }
                });

                lokasiSelect.addEventListener('change', function() {
                    if (this.value !== "") {
                        this.classList.add('valid');
                    } else {
                        this.classList.remove('valid');
                    }
                });

                // File upload handlers (remain the same)
                document.getElementById('cv-upload').addEventListener('change', function() {
                    if (this.files.length > 0) {
                        const fileName = this.files[0].name;
                        document.getElementById('cv-text').textContent = fileName;
                    } else {
                        document.getElementById('cv-text').textContent = 'Unggah CV Dalam Bentuk Pdf';
                    }
                });

                document.getElementById('portfolio-upload').addEventListener('change', function() {
                    if (this.files.length > 0) {
                        const fileName = this.files[0].name;
                        document.getElementById('portfolio-text').textContent = fileName;
                    } else {
                        document.getElementById('portfolio-text').textContent =
                            'Unggah Portfolio Dalam Bentuk Pdf (Opsional)';
                    }
                });

                // Initialize dropdowns (only for provinces/regencies now)
                document.addEventListener('DOMContentLoaded', function() {
                    fetchProvinces();
                });
            });
        </script>
    @endpush
