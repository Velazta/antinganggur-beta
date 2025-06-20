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
                        <label for="position-select" class="block text-sm font-medium text-gray-700 mb-1">Posisi Yang Dilamar <span class="text-red-500">*</span></label>
                        <select id="position-select" name="job_vacancy_id"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-[#FF7144] focus:border-[#FF7144] sm:text-sm bg-white text-gray-900">
                            <option value="">Pilih Posisi</option>
                            @foreach ($jobVacancies as $jobVacancy)
                                <option value="{{ $jobVacancy->id }}"
                                    {{ (old('job_vacancy_id', $selectedJobId ?? '') == $jobVacancy->id) ? 'selected' : '' }}>
                                    {{ $jobVacancy->title }}
                                </option>
                            @endforeach
                        </select>
                        <input type="hidden" name="position_name" id="position-name-hidden" value="{{ old('position_name', $selectedJobTitle ?? '') }}">
                        @error('job_vacancy_id')
                            <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                        @enderror
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
             const selectedJobId = "{{ $selectedJobId ?? '' }}";
        const selectedJobTitle = "{{ $selectedJobTitle ?? '' }}";
        const oldProvince = "{{ old('province') }}"; // Mengambil nilai provinsi lama jika ada error validasi
        const oldCity = "{{ old('city') }}"; // Mengambil nilai kota lama jika ada error validasi

        document.addEventListener('DOMContentLoaded', function() {
            // Pre-fill Job Position if parameters are present
            const positionSelect = document.getElementById('position-select');
            const positionNameHidden = document.getElementById('position-name-hidden');

            if (selectedJobId && positionSelect) {
                positionSelect.value = selectedJobId;
                // Update hidden input with the job title
                const selectedOption = positionSelect.options[positionSelect.selectedIndex];
                if (selectedOption) {
                    positionNameHidden.value = selectedOption.textContent.trim();
                }
            } else if (old('job_vacancy_id')) {
                 // Jika ada old input (misal setelah validasi gagal), gunakan itu
                positionSelect.value = "{{ old('job_vacancy_id') }}";
                const selectedOption = positionSelect.options[positionSelect.selectedIndex];
                if (selectedOption) {
                    positionNameHidden.value = selectedOption.textContent.trim();
                }
            }


            // --- Province and City Dropdown Logic ---
            const provinceSelect = document.getElementById('province-select');
            const citySelect = document.getElementById('city-select');

            function fetchProvinces() {
                fetch('https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json')
                    .then(response => response.json())
                    .then(provinces => {
                        provinceSelect.innerHTML = '<option value="">Pilih Provinsi</option>';
                        provinces.forEach(province => {
                            const option = document.createElement('option');
                            option.value = province.name;
                            option.dataset.id = province.id; // Simpan ID untuk fetch kota
                            option.textContent = province.name;
                            if (oldProvince && province.name === oldProvince) {
                                option.selected = true;
                            }
                            provinceSelect.appendChild(option);
                        });
                        // Jika ada oldProvince, panggil fetchCities untuk mengisi kota
                        if (oldProvince) {
                            const selectedProvinceOption = Array.from(provinceSelect.options).find(opt => opt.value === oldProvince);
                            if (selectedProvinceOption) {
                                fetchCities(selectedProvinceOption.dataset.id, oldCity);
                            }
                        }
                    })
                    .catch(error => console.error('Error fetching provinces:', error));
            }

            function fetchCities(provinceId, initialCity = null) {
                citySelect.innerHTML = '<option value="">Pilih Kota/Kabupaten</option>';
                citySelect.disabled = true; // Disable until cities are loaded
                if (!provinceId) return;

                fetch(`https://www.emsifa.com/api-wilayah-indonesia/api/regencies/${provinceId}.json`)
                    .then(response => response.json())
                    .then(cities => {
                        citySelect.disabled = false;
                        cities.forEach(city => {
                            const option = document.createElement('option');
                            option.value = city.name;
                            option.textContent = city.name;
                            if (initialCity && city.name === initialCity) {
                                option.selected = true;
                            }
                            citySelect.appendChild(option);
                        });
                    })
                    .catch(error => console.error('Error fetching cities:', error));
            }

            provinceSelect.addEventListener('change', function() {
                const selectedProvinceId = this.options[this.selectedIndex].dataset.id;
                fetchCities(selectedProvinceId);
            });

            // Input field 'valid' class logic (remains the same)
            document.querySelectorAll('.form-group input, .form-group select').forEach(input => {
                // Initial check on load for existing values (e.g., old() inputs)
                if (input.value !== "") {
                    input.classList.add('valid');
                } else {
                    input.classList.remove('valid');
                }

                input.addEventListener('input', function() {
                    if (this.value !== "") {
                        this.classList.add('valid');
                    } else {
                        this.classList.remove('valid');
                    }
                });
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

            // Initialize dropdowns (for positions, provinces, and regencies)
            fetchProvinces(); // Call fetchProvinces to populate on load
        });
        </script>
    @endpush
