@extends('layouts.app')

@section('title', 'Edit Pendidikan - Profil Jobseeker')

@push('styles')
    <style>
        select { -webkit-appearance: none; -moz-appearance: none; appearance: none; background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3E%3Cpath stroke='%236B7280' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='M6 8l4 4 4-4'/%3E%3C/svg%3E"); background-position: right 0.5rem center; background-repeat: no-repeat; background-size: 1.5em 1.5em; padding-right: 2.5rem; }
    </style>
@endpush

@section('content')
<div class="bg-[#FFF5F2] flex items-center justify-center min-h-screen p-4 sm:p-6 md:p-8 font-sans">
    <div class="flex w-full max-w-6xl mx-auto space-x-8">
        @include('profile.partials.sidebar')

        <main class="w-full bg-white p-8 rounded-2xl shadow-lg">
            <h1 class="text-2xl font-bold text-gray-800 mb-8">Edit Riwayat Pendidikan</h1>

            <form action="{{ route('profile.education.update', $education) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-6">
                    {{-- Nama Institusi --}}
                    <div class="md:col-span-2">
                        <label for="university_name" class="block text-sm font-medium text-gray-600 mb-1">Nama Institusi</label>
                        <input type="text" name="university_name" id="university_name" value="{{ old('university_name', $education->university_name) }}"
                               class="w-full border border-gray-300 rounded-lg p-2.5 focus:ring-1 focus:ring-orange-500 focus:border-orange-500 transition-all">
                        @error('university_name')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                    </div>

                    {{-- Gelar --}}
                    <div>
                        <label for="degree" class="block text-sm font-medium text-gray-600 mb-1">Gelar</label>
                        <input type="text" name="degree" id="degree" value="{{ old('degree', $education->degree) }}"
                               class="w-full border border-gray-300 rounded-lg p-2.5 focus:ring-1 focus:ring-orange-500 focus:border-orange-500 transition-all">
                        @error('degree')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                    </div>

                    {{-- Jurusan --}}
                    <div>
                        <label for="major" class="block text-sm font-medium text-gray-600 mb-1">Jurusan</label>
                        <input type="text" name="major" id="major" value="{{ old('major', $education->major) }}"
                               class="w-full border border-gray-300 rounded-lg p-2.5 focus:ring-1 focus:ring-orange-500 focus:border-orange-500 transition-all">
                        @error('major')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                    </div>

                    {{-- Tanggal Mulai --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-600 mb-1">Tanggal Mulai</label>
                        <div class="flex space-x-3 mt-1">
                            <select name="start_month" id="start_month" class="w-full border border-gray-300 rounded-lg p-2.5">
                                @php $months = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"]; @endphp
                                @foreach($months as $index => $month)
                                    <option value="{{ $index + 1 }}" {{ old('start_month', $education->start_month) == ($index + 1) ? 'selected' : '' }}>{{ $month }}</option>
                                @endforeach
                            </select>
                            <select name="start_year" id="start_year" class="w-full border border-gray-300 rounded-lg p-2.5">
                                @for($year = date('Y'); $year >= date('Y') - 50; $year--)
                                    <option value="{{ $year }}" {{ old('start_year', $education->start_year) == $year ? 'selected' : '' }}>{{ $year }}</option>
                                @endfor
                            </select>
                        </div>
                    </div>

                    {{-- Tanggal Berakhir --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-600 mb-1">Tanggal Berakhir</label>
                        <div class="flex space-x-3 mt-1">
                            <select name="end_month" id="end_month" class="w-full border border-gray-300 rounded-lg p-2.5">
                                <option value="">Bulan</option>
                                @foreach($months as $index => $month)
                                    <option value="{{ $index + 1 }}" {{ old('end_month', $education->end_month) == ($index + 1) ? 'selected' : '' }}>{{ $month }}</option>
                                @endforeach
                            </select>
                            <select name="end_year" id="end_year" class="w-full border border-gray-300 rounded-lg p-2.5">
                                <option value="">Tahun</option>
                                @for($year = date('Y') + 7; $year >= date('Y') - 50; $year--)
                                    <option value="{{ $year }}" {{ old('end_year', $education->end_year) == $year ? 'selected' : '' }}>{{ $year }}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="mt-3">
                             <label for="currently_studying" class="flex items-center cursor-pointer">
                                 <input type="checkbox" name="currently_studying" id="currently_studying" value="1" {{ old('currently_studying', $education->currently_studying) ? 'checked' : '' }} class="h-4 w-4 rounded text-orange-500">
                                 <span class="ml-2 text-sm text-gray-700">Saat ini masih menempuh pendidikan ini</span>
                             </label>
                        </div>
                    </div>

                    {{-- IPK --}}
                    <div class="md:col-span-1">
                        <label for="ipk" class="block text-sm font-medium text-gray-600 mb-1">IPK</label>
                        <input type="text" name="ipk" id="ipk" value="{{ old('ipk', $education->ipk) }}" class="w-full md:w-1/2 border border-gray-300 rounded-lg p-2.5">
                         @error('ipk') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    {{-- PERBAIKAN: Tambahkan field Deskripsi di sini --}}
                    <div class="md:col-span-2">
                        <label for="description" class="block text-sm font-medium text-gray-600 mb-1">Deskripsi Tambahan</label>
                        <textarea name="description" id="description" rows="5"
                                  class="w-full border border-gray-300 rounded-lg p-2.5 focus:ring-1 focus:ring-orange-500 focus:border-orange-500 transition-all resize-y"
                                  placeholder="Jelaskan kegiatan relevan, prestasi, atau informasi lain (opsional)">{{ old('description', $education->description) }}</textarea>
                        @error('description')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                {{-- Tombol Aksi --}}
                <div class="mt-10 flex justify-end gap-4">
                    <a href="{{ route('profile.education') }}" class="py-2.5 px-8 rounded-lg font-semibold border border-gray-400 text-gray-600 hover:bg-gray-100">Batal</a>
                    <button type="submit" class="py-2.5 px-8 rounded-lg font-semibold bg-orange-500 text-white hover:bg-orange-600">Simpan Perubahan</button>
                </div>
            </form>
        </main>
    </div>
</div>
@endsection

@push('scripts')
{{-- Script untuk menonaktifkan Tanggal Berakhir jika "currently studying" dicentang --}}
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
                endMonthSelect.classList.add('bg-gray-100');
                endYearSelect.classList.add('bg-gray-100');
            } else {
                endMonthSelect.classList.remove('bg-gray-100');
                endYearSelect.classList.remove('bg-gray-100');
            }
        }
        currentlyStudyingCheckbox.addEventListener('change', toggleEndDateFields);
        toggleEndDateFields(); // Panggil saat load
    });
</script>
@endpush
