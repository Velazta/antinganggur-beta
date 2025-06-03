@extends('layouts.app')

@section('title', 'Pendidikan - Profil Jobseeker')

@push('styles')
    <style>
        .profile-pic-container {
            position: relative;
            width: 120px; /* Ukuran yang lebih besar */
            height: 120px;
            border-radius: 50%;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 2px solid #ddd; /* Border tipis opsional */
        }
        .profile-pic-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .profile-pic-container .initials {
            font-size: 3rem; /* Ukuran font untuk inisial */
            font-weight: bold;
            color: #666;
        }
        select {
            padding-right: 2.5rem; /* Memberi ruang untuk panah dropdown bawaan */
        }
    </style>
@endpush

@section('content')
<div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
    <div class="bg-white shadow overflow-hidden sm:rounded-lg flex flex-col lg:flex-row">
        {{-- Sidebar --}}
        <div class="w-full lg:w-1/4 bg-white p-6 border-b lg:border-r border-gray-200">
            <div class="text-center mb-8">
                {{-- Placeholder Foto Profil di Sidebar --}}
                <div class="profile-pic-container mx-auto bg-orange-200 shadow-md">
                    @if(isset($user->profile_photo_path) && $user->profile_photo_path)
                        <img class="object-cover" src="{{ asset('storage/' . $user->profile_photo_path) }}" alt="{{ $user->name }}">
                    @else
                        <div class="initials text-orange-700">
                            @php
                                $nameParts = explode(' ', $user->name ?? 'User');
                                $initials = count($nameParts) > 1
                                            ? strtoupper(substr($nameParts[0], 0, 1) . substr(end($nameParts), 0, 1))
                                            : strtoupper(substr($user->name ?? 'U', 0, 2));
                            @endphp
                            {{ $initials }}
                        </div>
                    @endif
                </div>
                <p class="mt-3 text-lg font-semibold text-gray-800">{{ $user->name ?? 'Giselle Aespa' }}</p>
            </div>

            <nav class="space-y-2">
                <a href="{{ route('profile.show') }}" class="flex items-center p-3 rounded-lg text-gray-600 hover:bg-gray-50 hover:text-orange-700 transition-colors duration-200">
                    <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                    </svg>
                    Biodata Diri
                </a>
                <a href="{{ route('profile.experience') }}" class="flex items-center p-3 rounded-lg text-gray-600 hover:bg-gray-50 hover:text-orange-700 transition-colors duration-200">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.564 23.564 0 0112 15c-1.638 0-3.232-.387-4.707-1.127m12.454-3.791l-3.327-1.077a2.25 2.25 0 00-2.883 1.077l-4.5 9a2.25 2.25 0 00-1.096 2.457l1.076 3.328m4.004-12.784a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM12 21.75l-4.723-3.374A9.252 9.252 0 013 12.375V6.75a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 6.75v5.625c0 2.656-1.171 5.093-3.175 6.723L12 21.75z"></path></svg>
                    Pengalaman Kerja
                </a>
                <a href="{{ route('profile.education') }}" class="flex items-center p-3 rounded-lg text-orange-700 bg-orange-50 font-semibold transition-colors duration-200">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.251v8.406m-6.495-2.884l-2.073-.622c-.61-.183-1.08-.823-.974-1.464.106-.64.675-1.107 1.285-1.107h.176l.126-2.527a2.25 2.25 0 012.25-2.25h.175a2.25 2.25 0 012.25 2.25l.126 2.527h.176c.61 0 1.179.467 1.285 1.107.106.64-.364 1.281-.974 1.464l-2.073.622M12 6.251V4.5a2.25 2.25 0 00-2.25-2.25h-1.5a2.25 2.25 0 00-2.25 2.25v2.751m9.752 0h-2.25"></path></svg>
                    Pendidikan
                </a>
                <a href="{{ route('profile.cv') }}" class="flex items-center p-3 rounded-lg text-gray-600 hover:bg-gray-50 hover:text-orange-700 transition-colors duration-200">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m5.5 10.104H9.75M18.75 6.75H12"></path></svg>
                    CV
                </a>
            </nav>
        </div>

        {{-- Content Area --}}
        <div class="w-full lg:w-3/4 p-6 sm:p-8 md:p-10">
            <h2 class="text-2xl font-bold text-gray-900 mb-6">Pendidikan</h2>

            {{-- Form Pendidikan --}}
            {{-- Ganti action dengan route yang sesuai untuk menyimpan data pendidikan --}}
            <form action="{{ route('profile.education.store') }}" method="POST">
                @csrf

                {{-- Baris 1: Nama Institusi --}}
                <div class="mb-6">
                    <label for="institution_name" class="block text-sm font-medium text-gray-700">Nama Institusi</label>
                    <input type="text" name="institution_name" id="institution_name" value="{{ old('institution_name') }}"
                           class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring-orange-500 sm:text-sm p-2.5"
                           placeholder="Contoh: Universitas Gadjah Mada">
                    @error('institution_name')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Baris 2: Gelar & Jurusan --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <label for="degree" class="block text-sm font-medium text-gray-700">Gelar</label>
                        <input type="text" name="degree" id="degree" value="{{ old('degree') }}"
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring-orange-500 sm:text-sm p-2.5"
                               placeholder="Contoh: Sarjana Komputer">
                        @error('degree')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="major" class="block text-sm font-medium text-gray-700">Jurusan</label>
                        <input type="text" name="major" id="major" value="{{ old('major') }}"
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring-orange-500 sm:text-sm p-2.5"
                               placeholder="Contoh: Ilmu Komputer">
                        @error('major')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                {{-- Baris 3: Negara & Kota --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <label for="country" class="block text-sm font-medium text-gray-700">Negara</label>
                        <input type="text" name="country" id="country" value="{{ old('country') }}"
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring-orange-500 sm:text-sm p-2.5"
                               placeholder="Contoh: Indonesia">
                        @error('country')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="city" class="block text-sm font-medium text-gray-700">Kota</label>
                        <input type="text" name="city" id="city" value="{{ old('city') }}"
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring-orange-500 sm:text-sm p-2.5"
                               placeholder="Contoh: Yogyakarta">
                        @error('city')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                {{-- Baris 4: Tanggal Mulai & Tanggal Berakhir --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Tanggal Mulai</label>
                        <div class="flex space-x-2 mt-1">
                            <select name="start_month" id="start_month" class="block w-full border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring-orange-500 sm:text-sm p-2.5">
                                <option value="">Bulan</option>
                                @php $months = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"]; @endphp
                                @foreach($months as $index => $month)
                                    <option value="{{ $index + 1 }}" {{ old('start_month') == ($index + 1) ? 'selected' : '' }}>{{ $month }}</option>
                                @endforeach
                            </select>
                            <select name="start_year" id="start_year" class="block w-full border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring-orange-500 sm:text-sm p-2.5">
                                <option value="">Tahun</option>
                                @for($year = date('Y'); $year >= date('Y') - 50; $year--)
                                    <option value="{{ $year }}" {{ old('start_year') == $year ? 'selected' : '' }}>{{ $year }}</option>
                                @endfor
                            </select>
                        </div>
                        @error('start_month') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        @error('start_year') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Tanggal Berakhir (atau Perkiraan)</label>
                        <div class="flex space-x-2 mt-1">
                            <select name="end_month" id="end_month" class="block w-full border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring-orange-500 sm:text-sm p-2.5">
                                <option value="">Bulan</option>
                                @foreach($months as $index => $month)
                                    <option value="{{ $index + 1 }}" {{ old('end_month') == ($index + 1) ? 'selected' : '' }}>{{ $month }}</option>
                                @endforeach
                            </select>
                            <select name="end_year" id="end_year" class="block w-full border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring-orange-500 sm:text-sm p-2.5">
                                <option value="">Tahun</option>
                                {{-- Allow future years for expected graduation --}}
                                @for($year = date('Y') + 7; $year >= date('Y') - 50; $year--)
                                    <option value="{{ $year }}" {{ old('end_year') == $year ? 'selected' : '' }}>{{ $year }}</option>
                                @endfor
                            </select>
                        </div>
                         <div class="mt-2">
                             <input type="checkbox" name="currently_studying" id="currently_studying" value="1" {{ old('currently_studying') ? 'checked' : '' }} class="mr-2 rounded text-orange-500 focus:ring-orange-500">
                             <label for="currently_studying" class="text-sm text-gray-700">Saat ini masih menempuh pendidikan ini</label>
                        </div>
                        @error('end_month') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        @error('end_year') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>

                {{-- Baris 5: IPK --}}
                <div class="mb-6">
                    <label for="gpa" class="block text-sm font-medium text-gray-700">IPK</label>
                    <input type="text" name="gpa" id="gpa" value="{{ old('gpa') }}"
                           class="mt-1 block w-1/2 md:w-1/4 border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring-orange-500 sm:text-sm p-2.5"
                           placeholder="Contoh: 3.75 (Skala 4.00)">
                     @error('gpa')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>


                {{-- Baris 6: Deskripsi Tambahan --}}
                <div class="mb-8">
                    <label for="additional_description" class="block text-sm font-medium text-gray-700">Deskripsi Tambahan</label>
                    <textarea name="additional_description" id="additional_description" rows="4"
                              class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring-orange-500 sm:text-sm p-2.5 resize-y"
                              placeholder="Jelaskan kegiatan relevan, prestasi, atau informasi lain (opsional)">{{ old('additional_description') }}</textarea>
                    @error('additional_description')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Tombol Aksi --}}
                <div class="flex justify-end space-x-4">
                    <a href="{{ route('profile.show') }}" {{-- Atau route lain yang sesuai untuk batal --}}
                       class="px-6 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Batal
                    </a>
                    <button type="submit"
                            class="px-6 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-orange-500 hover:bg-orange-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const currentlyStudyingCheckbox = document.getElementById('currently_studying');
        const endMonthSelect = document.getElementById('end_month');
        const endYearSelect = document.getElementById('end_year');

        function toggleEndDateFields() {
            const isDisabled = currentlyStudyingCheckbox.checked;
            endMonthSelect.disabled = isDisabled;
            endYearSelect.disabled = isDisabled;
            if (isDisabled) {
                endMonthSelect.value = '';
                endYearSelect.value = '';
                endMonthSelect.classList.add('bg-gray-100', 'cursor-not-allowed');
                endYearSelect.classList.add('bg-gray-100', 'cursor-not-allowed');
            } else {
                endMonthSelect.classList.remove('bg-gray-100', 'cursor-not-allowed');
                endYearSelect.classList.remove('bg-gray-100', 'cursor-not-allowed');
            }
        }

        if (currentlyStudyingCheckbox) {
            currentlyStudyingCheckbox.addEventListener('change', toggleEndDateFields);
            // Panggil saat load untuk set state awal
            toggleEndDateFields();
        }

        // Validasi input IPK agar hanya menerima angka dan satu titik desimal
        const gpaInput = document.getElementById('gpa');
        if (gpaInput) {
            gpaInput.addEventListener('input', function (e) {
                // Hapus karakter yang tidak valid, izinkan angka dan satu titik
                let value = e.target.value;
                value = value.replace(/[^0-9.]/g, ''); // Hanya angka dan titik

                // Pastikan hanya ada satu titik desimal
                const parts = value.split('.');
                if (parts.length > 2) {
                    value = parts[0] + '.' + parts.slice(1).join('');
                }

                // Batasi panjang setelah titik desimal jika perlu (misal, 2 digit)
                if (parts[1] && parts[1].length > 2) {
                     value = parts[0] + '.' + parts[1].substring(0, 2);
                }

                e.target.value = value;
            });
        }
    });
</script>
@endpush
