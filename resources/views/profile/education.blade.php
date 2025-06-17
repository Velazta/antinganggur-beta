@extends('layouts.app')

@section('title', 'Pendidikan - Profil JobSeeker')

@push('styles')
    <style>
        /* CSS Anda yang sudah ada, tidak perlu diubah */
        input:-webkit-autofill,
        input:-webkit-autofill:hover,
        input:-webkit-autofill:focus,
        input:-webkit-autofill:active {
            -webkit-text-fill-color: #4a5568;
            -webkit-box-shadow: 0 0 0px 1000px #fff inset;
            transition: background-color 5000s ease-in-out 0s;
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
    <div class="bg-[#FFF5F2] flex items-center justify-center min-h-screen p-4 sm:p-6 md:p-8 font-sans">
        <div class="flex w-full max-w-6xl mx-auto space-x-8">
            @include('profile.partials.sidebar')

            <main class="w-full bg-white p-8 rounded-2xl shadow-lg">
                <div class="flex justify-between items-center mb-8">
                    <h1 class="text-2xl font-bold text-gray-800">Riwayat Pendidikan</h1>
                </div>

                @if (session('success_education'))
                    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded-md" role="alert">
                        <p>{{ session('success_education') }}</p>
                    </div>
                @endif

                {{-- Daftar Pendidikan yang Sudah Ada --}}
                <div class="space-y-6 mb-10">
                    @php
                        // Definisikan array bulan di sini sekali saja untuk digunakan di dalam loop
                        $months_map = [
                            '',
                            'Januari',
                            'Februari',
                            'Maret',
                            'April',
                            'Mei',
                            'Juni',
                            'Juli',
                            'Agustus',
                            'September',
                            'Oktober',
                            'November',
                            'Desember',
                        ];
                    @endphp

                    @forelse ($educations as $edu)
                        <div
                            class="flex items-start justify-between p-4 border rounded-xl shadow-sm hover:border-orange-300">
                            <div class="flex items-start space-x-4">
                                <div
                                    class="flex-shrink-0 w-12 h-12 bg-orange-100 rounded-full flex items-center justify-center">
                                    <svg class="w-6 h-6 text-orange-500" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 14l9-5-9-5-9 5 9 5z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 14l6.16-3.422A12.083 12.083 0 0112 21a12.083 12.083 0 01-6.16-9.422L12 14z">
                                        </path>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="text-lg font-bold text-gray-800">{{ $edu->degree }} - {{ $edu->major }}
                                    </h3>
                                    <p class="text-gray-600">{{ $edu->university_name }}</p>
                                    <p class="text-sm text-gray-500">
                                        {{-- PERBAIKAN UTAMA: Menggunakan array mapping manual --}}
                                        {{ $months_map[(int) $edu->start_month] ?? '' }} {{ $edu->start_year }} -
                                        @if ($edu->currently_studying)
                                            Sekarang
                                        @elseif($edu->end_month && $edu->end_year)
                                            {{ $months_map[(int) $edu->end_month] ?? '' }} {{ $edu->end_year }}
                                        @endif
                                    </p>
                                    @if ($edu->ipk)
                                        <p class="text-sm text-gray-500 mt-1">IPK: {{ number_format($edu->ipk, 2) }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="flex items-center space-x-2">
                                <a href="{{ route('profile.education.edit', $edu) }}" title="Edit"
                                    class="text-gray-400 hover:text-blue-500 p-1 rounded-full hover:bg-blue-50">
                                    <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path
                                            d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                        <path fill-rule="evenodd"
                                            d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </a>
                                <form action="{{ route('profile.education.delete', $edu) }}" method="POST"
                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus riwayat pendidikan ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" title="Hapus"
                                        class="text-gray-400 hover:text-red-500 p-1 rounded-full hover:bg-red-50">
                                        <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-10 border-2 border-dashed rounded-xl">
                            <p class="text-gray-500">Anda belum menambahkan riwayat pendidikan.</p>
                        </div>
                    @endforelse
                </div>

                <h2 class="text-xl font-bold text-gray-800 mb-6 border-t pt-8">Tambah Riwayat Pendidikan</h2>

                <form action="{{ route('profile.education.store') }}" method="POST">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-6">
                        <div class="md:col-span-2">
                            <label for="university_name" class="block text-sm font-medium text-gray-600 mb-1">Nama
                                Institusi</label>
                            <input type="text" name="university_name" id="university_name"
                                value="{{ old('university_name') }}"
                                class="w-full border border-gray-300 rounded-lg p-2.5 focus:outline-none focus:ring-2 focus:ring-orange-400 transition-all"
                                placeholder="Contoh: Universitas Sebelas Maret">
                        </div>
                        <div>
                            <label for="degree" class="block text-sm font-medium text-gray-600 mb-1">Gelar</label>
                            <input type="text" name="degree" id="degree" value="{{ old('degree') }}"
                                class="w-full border border-gray-300 rounded-lg p-2.5 focus:outline-none focus:ring-2 focus:ring-orange-400 transition-all"
                                placeholder="Contoh: Sarjana Komputer">
                            @error('degree')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="major" class="block text-sm font-medium text-gray-600 mb-1">Jurusan</label>
                            <input type="text" name="major" id="major" value="{{ old('major') }}"
                                class="w-full border border-gray-300 rounded-lg p-2.5 focus:outline-none focus:ring-2 focus:ring-orange-400 transition-all"
                                placeholder="Contoh: Ilmu Komputer">
                            @error('major')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="country" class="block text-sm font-medium text-gray-600 mb-1">Negara</label>
                            <input type="text" name="country" id="country" value="{{ old('country') }}"
                                class="w-full border border-gray-300 rounded-lg p-2.5 focus:outline-none focus:ring-2 focus:ring-orange-400 transition-all"
                                placeholder="Contoh: Indonesia">
                            @error('country')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="city" class="block text-sm font-medium text-gray-600 mb-1">Kota</label>
                            <input type="text" name="city" id="city" value="{{ old('city') }}"
                                class="w-full border border-gray-300 rounded-lg p-2.5 focus:outline-none focus:ring-2 focus:ring-orange-400 transition-all"
                                placeholder="Contoh: Yogyakarta">
                            @error('city')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-600 mb-1">Tanggal Mulai</label>
                            <div class="flex space-x-3 mt-1">
                                <select name="start_month" id="start_month"
                                    class="w-full border border-gray-300 rounded-lg p-2.5 focus:outline-none focus:ring-2 focus:ring-orange-400 transition-all">
                                    <option value="">Bulan</option>
                                    @php $form_months = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"]; @endphp
                                    @foreach ($form_months as $index => $month)
                                        <option value="{{ $index + 1 }}"
                                            {{ old('start_month') == $index + 1 ? 'selected' : '' }}>{{ $month }}
                                        </option>
                                    @endforeach
                                </select>
                                <select name="start_year" id="start_year"
                                    class="w-full border border-gray-300 rounded-lg p-2.5 focus:outline-none focus:ring-2 focus:ring-orange-400 transition-all">
                                    <option value="">Tahun</option>
                                    @for ($year = date('Y'); $year >= date('Y') - 50; $year--)
                                        <option value="{{ $year }}"
                                            {{ old('start_year') == $year ? 'selected' : '' }}>{{ $year }}
                                        </option>
                                    @endfor
                                </select>
                            </div>
                            @error('start_month')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                            @error('start_year')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-600 mb-1">Tanggal Berakhir</label>
                            <div class="flex space-x-3 mt-1">
                                <select name="end_month" id="end_month"
                                    class="w-full border border-gray-300 rounded-lg p-2.5 focus:outline-none focus:ring-2 focus:ring-orange-400 transition-all">
                                    <option value="">Bulan</option>
                                    @foreach ($form_months as $index => $month)
                                        <option value="{{ $index + 1 }}"
                                            {{ old('end_month') == $index + 1 ? 'selected' : '' }}>{{ $month }}
                                        </option>
                                    @endforeach
                                </select>
                                <select name="end_year" id="end_year"
                                    class="w-full border border-gray-300 rounded-lg p-2.5 focus:outline-none focus:ring-2 focus:ring-orange-400 transition-all">
                                    <option value="">Tahun</option>
                                    @for ($year = date('Y') + 7; $year >= date('Y') - 50; $year--)
                                        <option value="{{ $year }}"
                                            {{ old('end_year') == $year ? 'selected' : '' }}>{{ $year }}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="mt-3">
                                <label for="currently_studying" class="flex items-center cursor-pointer">
                                    <input type="checkbox" name="currently_studying" id="currently_studying"
                                        value="1" {{ old('currently_studying') ? 'checked' : '' }}
                                        class="h-4 w-4 rounded text-orange-500">
                                    <span class="ml-2 text-sm text-gray-700">Saat ini masih menempuh pendidikan ini</span>
                                </label>
                            </div>
                            @error('end_month')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                            @error('end_year')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="md:col-span-1">
                            <label for="ipk" class="block text-sm font-medium text-gray-600 mb-1">IPK</label>
                            <input type="text" name="ipk" id="ipk" value="{{ old('ipk') }}"
                                class="w-full border border-gray-300 rounded-lg p-2.5 focus:outline-none focus:ring-2 focus:ring-orange-400 transition-all"
                                placeholder="Contoh: 3.75">
                            @error('ipk')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="md:col-span-2">
                            <label for="description" class="block text-sm font-medium text-gray-600 mb-1">Deskripsi
                                Tambahan</label>
                            <textarea name="description" id="description" rows="5"
                                class="w-full border border-gray-300 rounded-lg p-2.5 focus:outline-none focus:ring-2 focus:ring-orange-400 transition-all resize-y"
                                placeholder="Jelaskan kegiatan relevan, prestasi, atau informasi lain (opsional)">{{ old('description') }}</textarea>
                            @error('description')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="mt-10 flex justify-end gap-4">
                        <button type="reset"
                            class="py-2.5 px-8 rounded-lg font-semibold border border-gray-400 text-gray-600 hover:bg-gray-100">Batal</button>
                        <button type="submit"
                            class="py-2.5 px-8 rounded-lg font-semibold bg-orange-500 text-white hover:bg-orange-600">Simpan</button>
                    </div>
                </form>
            </main>
        </div>
    </div>
@endsection

@push('scripts')
    {{-- Script Anda yang sudah ada --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
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
                toggleEndDateFields();
            }
            const ipkInput = document.getElementById('ipk');
            if (ipkInput) {
                ipkInput.addEventListener('input', function(e) {
                    let value = e.target.value;
                    value = value.replace(/[^0-9.]/g, '');
                    const parts = value.split('.');
                    if (parts.length > 2) value = parts[0] + '.' + parts.slice(1).join('');
                    if (parts[1] && parts[1].length > 2) value = parts[0] + '.' + parts[1].substring(0, 2);
                    e.target.value = value;
                });
            }
        });
    </script>
@endpush
