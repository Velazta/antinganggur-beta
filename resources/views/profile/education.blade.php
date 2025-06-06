@extends('layouts.app')

@section('title', 'Pendidikan - Profil JobSeeker')

@push('styles')
    <style>
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
    <div class="bg-[#FFF5F2] flex items-center justify-center min-h-screen p-4 sm:p-6 md:p=8 font-sans">
        <div class="flex w-full max-w-6xl mx-auto space-x-8">
            @include('profile.partials.sidebar')

            {{-- Area Konten Utama --}}
            <main class="w-full bg-white p-8 rounded-2xl shadow-lg">
                <div class="flex justify-between items-center mb-8">
                    <h1 class="text-2xl font-bold text-gray-800">Pendidikan</h1>
                </div>

                {{-- notifikasi suksess --}}
                @if (session('success_education'))
                    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded-md" role="alert">
                        <p>{{ session('success_education') }}</p>
                    </div>
                @endif

                {{-- daftar pendidikan yang sudah ada --}}
                <div class="space-y-6 mb-10">
                    {{-- @forelse ($educations as $edu) --}}
                        {{-- Kartu daftar pendidikan akan ada di sini --}}
                    {{-- @empty --}}
                        <div class="text-center py-10 border-2 border-dashed rounded-xl">
                            <p class="text-gray-500">Anda belum menambahkan riwayat pendidikan.</p>
                        </div>
                    {{-- @endforelse --}}
                </div>

                {{-- form tambah pendidikan --}}
                <h2 class="text-xl font-bold text-gray-800 mb-6 border-t pt-8">Tambah riwayat pendidikan</h2>

                <form action="#" method="POST">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-6">

                        {{-- Nama Institusi --}}
                        <div class="md:col-span-2">
                            <label for="university_name" class="block text-sm font-medium text-gray-600 mb-1">Nama Institusi</label>
                            <input type="text" name="university_name" id="university_name" value="{{ old('university_name')}}"
                                class="w-full border border-gray-300 rounded-lg p-2.5 focus:ring-1 focus:ring-orange-500 focus:border-orange-500 transition-all"
                                placeholder="Contoh: Universitas Sebelas Maret">
                            @error('university_name')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Gelar --}}
                        <div>
                            <label for="degree" class="block text-sm font-medium text-gray-600 mb-1">Gelar</label>
                            <input type="text" name="degree" id="degree" value="{{ old('degree') }}"
                                   class="w-full border border-gray-300 rounded-lg p-2.5 focus:ring-1 focus:ring-orange-500 focus:border-orange-500 transition-all"
                                   placeholder="Contoh: Sarjana Komputer">
                            @error('degree')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Jurusan --}}
                        <div>
                            <label for="major" class="block text-sm font-medium text-gray-600 mb-1">Jurusan</label>
                            <input type="text" name="major" id="major" value="{{ old('major') }}"
                                   class="w-full border border-gray-300 rounded-lg p-2.5 focus:ring-1 focus:ring-orange-500 focus:border-orange-500 transition-all"
                                   placeholder="Contoh: Ilmu Komputer">
                            @error('major')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Negara --}}
                        <div>
                            <label for="country" class="block text-sm font-medium text-gray-600 mb-1">Negara</label>
                            <input type="text" name="country" id="country" value="{{ old('country') }}"
                                   class="w-full border border-gray-300 rounded-lg p-2.5 focus:ring-1 focus:ring-orange-500 focus:border-orange-500 transition-all"
                                   placeholder="Contoh: Indonesia">
                            @error('country')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Kota --}}
                        <div>
                            <label for="city" class="block text-sm font-medium text-gray-600 mb-1">Kota</label>
                            <input type="text" name="city" id="city" value="{{ old('city') }}"
                                   class="w-full border border-gray-300 rounded-lg p-2.5 focus:ring-1 focus:ring-orange-500 focus:border-orange-500 transition-all"
                                   placeholder="Contoh: Yogyakarta">
                            @error('city')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- tanggal mulai --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-600 mb-1">Tanggal Mulai</label>
                            <div class="flex space-x-3 mt-1">
                                <select name="start_month" id="start_month" class="w-full border border-gray-300 rounded-lg p-2.5 focus:ring-1 focus:ring-orange-500 focus:border-orange-500 transition-all">
                                    <option value="">Bulan</option>
                                    @php $months = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"]; @endphp
                                    @foreach($months as $index => $month)
                                        <option value="{{ $index + 1 }}" {{ old('start_month') == ($index + 1) ? 'selected' : '' }}>{{ $month }}</option>
                                    @endforeach
                                </select>
                                <select name="start_year" id="start_year" class="w-full border border-gray-300 rounded-lg p-2.5 focus:ring-1 focus:ring-orange-500 focus:border-orange-500 transition-all">
                                    <option value="">Tahun</option>
                                    @for($year = date('Y'); $year >= date('Y') - 50; $year--)
                                        <option value="{{ $year }}" {{ old('start_year') == $year ? 'selected' : '' }}>{{ $year }}</option>
                                    @endfor
                                </select>
                            </div>
                            @error('start_month') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                            @error('start_year') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>

                        {{-- tanggal berakhir --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-600 mb-1">Tanggal Berakhir</label>
                            <div class="flex space-x-3 mt-1">
                                <select name="end_month" id="end_month" class="w-full border border-gray-300 rounded-lg p-2.5 focus:ring-1 focus:ring-orange-500 focus:border-orange-500 transition-all">
                                    <option value="">Bulan</option>
                                    @foreach($months as $index => $month)
                                        <option value="{{ $index + 1 }}" {{ old('end_month') == ($index + 1) ? 'selected' : '' }}>{{ $month }}</option>
                                    @endforeach
                                </select>
                                <select name="end_year" id="end_year" class="w-full border border-gray-300 rounded-lg p-2.5 focus:ring-1 focus:ring-orange-500 focus:border-orange-500 transition-all">
                                    <option value="">Tahun</option>
                                    @for($year = date('Y') + 7; $year >= date('Y') - 50; $year--)
                                        <option value="{{ $year }}" {{ old('end_year') == $year ? 'selected' : '' }}>{{ $year }}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="mt-3">
                                 <label for="currently_studying" class="flex items-center cursor-pointer">
                                     <input type="checkbox" name="currently_studying" id="currently_studying" value="1" {{ old('currently_studying') ? 'checked' : '' }} class="h-4 w-4 rounded text-orange-500 focus:ring-orange-400 border-gray-300">
                                     <span class="ml-2 text-sm text-gray-700">Saat ini masih menempuh pendidikan ini</span>
                                 </label>
                            </div>
                            @error('end_month') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                            @error('end_year') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>

                        {{-- IPK --}}
                         <div class="md:col-span-1">
                            <label for="ipk" class="block text-sm font-medium text-gray-600 mb-1">IPK</label>
                            <input type="text" name="ipk" id="ipk" value="{{ old('ipk') }}"
                                   class="w-full md:w-1/2 border border-gray-300 rounded-lg p-2.5 focus:ring-1 focus:ring-orange-500 focus:border-orange-500 transition-all"
                                   placeholder="Contoh: 3.75">
                             @error('ipk')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- deskripsi tambahan --}}
                        <div class="md:col-span-1">
                            <label for="description" class="block text-sm font-medium text-gray-600 mb-1">Deskripsi Tambahan</label>
                            <textarea name="description" id="description" rows="5"
                                      class="w-full border border-gray-300 rounded-lg p-2.5 focus:ring-1 focus:ring-orange-500 focus:border-orange-500 transition-all resize-y"
                                      placeholder="Jelaskan kegiatan relevan, prestasi, atau informasi lain (opsional)">{{ old('description') }}</textarea>
                            @error('description')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        {{-- Tombol Aksi --}}
                    <div class="mt-10 flex justify-end gap-4">
                        <button type="reset"
                            class="py-2.5 px-8 rounded-lg font-semibold border border-gray-400 text-gray-600 hover:bg-gray-100 transition-all duration-300">
                            Batal
                        </button>
                        <button type="submit"
                            class="py-2.5 px-8 rounded-lg font-semibold bg-orange-500 text-white hover:bg-orange-600 shadow-sm hover:shadow-md transition-all duration-300">
                            Simpan
                        </button>
                    </div>
                </form>
            </main>
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
            if(isDisabled) {
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
            toggleEndDateFields();
        }

        const ipkInput = document.getElementById('ipk');
        if (ipkInput) {
            ipkInput.addEventListener('input', function (e) {
                let value = e.target.value;
                value = value.replace(/[^0-9.]/g, '');
                const parts = value.split('.');
                if (parts.length > 2) {
                    value = parts[0] + '.' + parts.slice(1).join('');
                }
                if (parts[1] && parts[1].length > 2) {
                     value = parts[0] + '.' + parts[1].substring(0, 2);
                }
                e.target.value = value;
            });
        }
    });
</script>
@endpush

