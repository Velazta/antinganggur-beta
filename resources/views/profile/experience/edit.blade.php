@extends('layouts.app')

@section('title', 'Edit Pengalaman Kerja - Profil Jobseeker')

@push('styles')
    {{-- Salin semua style dari experience.blade.php --}}
    <style>
        /* Mengatasi warna background aneh saat autofill di browser berbasis WebKit */
        input:-webkit-autofill,
        input:-webkit-autofill:hover,
        input:-webkit-autofill:focus,
        input:-webkit-autofill:active {
            -webkit-text-fill-color: #4a5568;
            -webkit-box-shadow: 0 0 0px 1000px #fff inset;
            transition: background-color 5000s ease-in-out 0s;
            border-color: #f8afa6;
            caret-color: #4a5568;
        }

        /* Gaya untuk select agar terlihat konsisten */
        select {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3E%3Cpath stroke='%236B7280' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='M6 8l4 4 4-4'/%3E%3C/svg%3E");
            background-position: right 0.5rem center;
            background-repeat: no-repeat;
            background-size: 1.5em 1.5em;
            padding-right: 2.5rem;
        }
    </style>
@endpush

@section('content')
    <div class="bg-[#FFF5F2] flex items-center justify-center min-h-screen p-4 sm:p-6 md:p-8 font-sans">
        <div class="flex w-full max-w-6xl mx-auto space-x-8">

            {{-- Panggil sidebar --}}
            @include('profile.partials.sidebar')

            {{-- Area Konten Utama --}}
            <main class="w-full bg-white p-8 rounded-2xl shadow-lg">
                <h1 class="text-2xl font-bold text-gray-800 mb-8">
                    Edit Pengalaman Kerja
                </h1>

                {{-- Form Edit Pengalaman Kerja --}}
                <form action="{{ route('profile.experience.update', $experience->id) }}" method="POST">
                    @csrf
                    @method('PUT') {{-- Method untuk update adalah PUT --}}

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-6">
                        {{-- Posisi Kerja --}}
                        <div>
                            <label for="job_title" class="block text-sm font-medium text-gray-600 mb-1">Posisi Kerja</label>
                            <input type="text" name="job_title" id="job_title"
                                value="{{ old('job_title', $experience->job_title) }}"
                                class="w-full border border-gray-300 rounded-lg p-2.5 focus:ring-1 focus:ring-orange-500 focus:border-orange-500 transition-all"
                                placeholder="Contoh: Software Engineer">
                            @error('job_title')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Nama Perusahaan --}}
                        <div>
                            <label for="company_name" class="block text-sm font-medium text-gray-600 mb-1">Nama
                                Perusahaan</label>
                            <input type="text" name="company_name" id="company_name"
                                value="{{ old('company_name', $experience->company_name) }}"
                                class="w-full border border-gray-300 rounded-lg p-2.5 focus:ring-1 focus:ring-orange-500 focus:border-orange-500 transition-all"
                                placeholder="Contoh: PT Teknologi Maju">
                            @error('company_name')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Negara --}}
                        <div>
                            <label for="country" class="block text-sm font-medium text-gray-600 mb-1">Negara</label>
                            <input type="text" name="country" id="country" value="{{ old('country', $experience->country) }}"
                                class="w-full border border-gray-300 rounded-lg p-2.5 focus:ring-1 focus:ring-orange-500 focus:border-orange-500 transition-all"
                                placeholder="Contoh: Indonesia">
                            @error('country')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Kota --}}
                        <div>
                            <label for="city" class="block text-sm font-medium text-gray-600 mb-1">Kota</label>
                            <input type="text" name="city" id="city" value="{{ old('city', $experience->city) }}"
                                class="w-full border border-gray-300 rounded-lg p-2.5 focus:ring-1 focus:ring-orange-500 focus:border-orange-500 transition-all"
                                placeholder="Contoh: Jakarta">
                            @error('city')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Tanggal Mulai --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-600 mb-1">Tanggal Mulai</label>
                            <div class="flex space-x-3 mt-1">
                                <select name="start_month" id="start_month"
                                    class="w-full border border-gray-300 rounded-lg p-2.5 focus:ring-1 focus:ring-orange-500 focus:border-orange-500 transition-all">
                                    <option value="">Bulan</option>
                                    @php $months = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"]; @endphp
                                    @foreach ($months as $index => $month)
                                        <option value="{{ $index + 1 }}" {{ old('start_month', $experience->start_month) == ($index + 1) ? 'selected' : '' }}>{{ $month }}</option>
                                    @endforeach
                                </select>
                                <select name="start_year" id="start_year"
                                    class="w-full border border-gray-300 rounded-lg p-2.5 focus:ring-1 focus:ring-orange-500 focus:border-orange-500 transition-all">
                                    <option value="">Tahun</option>
                                    @for ($year = date('Y'); $year >= date('Y') - 50; $year--)
                                        <option value="{{ $year }}" {{ old('start_year', $experience->start_year) == $year ? 'selected' : '' }}>{{ $year }}</option>
                                    @endfor
                                </select>
                            </div>
                            @error('start_month') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                            @error('start_year') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>

                        {{-- Tanggal Berakhir --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-600 mb-1">Tanggal Berakhir</label>
                            <div class="flex space-x-3 mt-1">
                                <select name="end_month" id="end_month"
                                    class="w-full border border-gray-300 rounded-lg p-2.5 focus:ring-1 focus:ring-orange-500 focus:border-orange-500 transition-all">
                                    <option value="">Bulan</option>
                                    @foreach ($months as $index => $month)
                                        <option value="{{ $index + 1 }}" {{ old('end_month', $experience->end_month) == ($index + 1) ? 'selected' : '' }}>{{ $month }}</option>
                                    @endforeach
                                </select>
                                <select name="end_year" id="end_year"
                                    class="w-full border border-gray-300 rounded-lg p-2.5 focus:ring-1 focus:ring-orange-500 focus:border-orange-500 transition-all">
                                    <option value="">Tahun</option>
                                    @for ($year = date('Y'); $year >= date('Y') - 50; $year--)
                                        <option value="{{ $year }}" {{ old('end_year', $experience->end_year) == $year ? 'selected' : '' }}>{{ $year }}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="mt-3">
                                <label for="current_job" class="flex items-center cursor-pointer">
                                    <input type="checkbox" name="current_job" id="current_job" value="1" {{ old('current_job', $experience->current_job) ? 'checked' : '' }}
                                        class="h-4 w-4 rounded text-orange-500 focus:ring-orange-400 border-gray-300">
                                    <span class="ml-2 text-sm text-gray-700">Saya masih bekerja di sini</span>
                                </label>
                            </div>
                            @error('end_month') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                            @error('end_year') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>

                        {{-- Deskripsi Pekerjaan --}}
                        <div class="md:col-span-2">
                            <label for="description" class="block text-sm font-medium text-gray-600 mb-1">Deskripsi Pekerjaan</label>
                            <textarea name="description" id="description" rows="5"
                                class="w-full border border-gray-300 rounded-lg p-2.5 focus:ring-1 focus:ring-orange-500 focus:border-orange-500 transition-all resize-y"
                                placeholder="Jelaskan tanggung jawab dan pencapaian Anda">{{ old('description', $experience->description) }}</textarea>
                            @error('description')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    {{-- Tombol Aksi --}}
                    <div class="mt-10 flex justify-end gap-4">
                        <a href="{{ route('profile.experience') }}"
                            class="py-2.5 px-8 rounded-lg font-semibold border border-gray-400 text-gray-600 hover:bg-gray-100 transition-all duration-300">
                            Batal
                        </a>
                        <button type="submit"
                            class="py-2.5 px-8 rounded-lg font-semibold bg-orange-500 text-white hover:bg-orange-600 shadow-sm hover:shadow-md transition-all duration-300">
                            Simpan Perubahan
                        </button>
                    </div>
                </form>
            </main>
        </div>
    </div>
@endsection

@push('scripts')
    {{-- Salin script yang sama dari experience.blade.php untuk checkbox --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const currentJobCheckbox = document.getElementById('current_job');
            const endMonthSelect = document.getElementById('end_month');
            const endYearSelect = document.getElementById('end_year');

            function toggleEndDateFields() {
                const isDisabled = currentJobCheckbox.checked;
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

            if (currentJobCheckbox) {
                currentJobCheckbox.addEventListener('change', toggleEndDateFields);
                toggleEndDateFields();
            }
        });
    </script>
@endpush
