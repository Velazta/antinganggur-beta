@extends('layouts.app')

@section('title', 'Biodata Diri - Profil Jobseeker')

@push('styles')
    <style>
        /* Anda bisa menambahkan gaya kustom di sini jika tidak bisa diatasi dengan Tailwind saja */
        /* Contoh: untuk memastikan gambar profil bulat dan rapi */
        .profile-pic-placeholder {
            background-color: #e0e0e0;
            /* Warna abu-abu default */
        }

        .profile-pic-container {
            position: relative;
            width: 120px;
            /* Ukuran yang lebih besar */
            height: 120px;
            border-radius: 50%;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 2px solid #ddd;
            /* Border tipis opsional */
        }

        .profile-pic-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .profile-pic-container .initials {
            font-size: 3rem;
            /* Ukuran font untuk inisial */
            font-weight: bold;
            color: #666;
        }

        /* Style untuk radio button yang kustom jika diperlukan */
        input[type="radio"] {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            border: 2px solid #ccc;
            border-radius: 50%;
            width: 16px;
            height: 16px;
            outline: none;
            margin-right: 8px;
            cursor: pointer;
            position: relative;
            top: 2px;
            /* Penyesuaian vertikal */
        }

        input[type="radio"]:checked {
            border-color: #FF7144;
            /* Warna oranye saat terpilih */
            background-color: #FF7144;
            /* Isi warna saat terpilih */
        }

        input[type="radio"]:checked::before {
            content: '';
            display: block;
            width: 8px;
            height: 8px;
            background-color: white;
            border-radius: 50%;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
    </style>
@endpush

@section('content')
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <div class="bg-white shadow overflow-hidden sm:rounded-lg flex flex-col lg:flex-row">
            <div class="w-full lg:w-1/4 bg-white p-6 border-b lg:border-r border-gray-200">
                <div class="text-center mb-8">
                    {{-- Placeholder Foto Profil di Sidebar --}}
                    <div class="profile-pic-container mx-auto bg-orange-200 shadow-md">
                        @if (isset($profile->profile_photo_path) && $profile->profile_photo_path)
                            <img class="object-cover" src="{{ asset('storage/' . $profile->profile_photo_path) }}"
                                alt="{{ $user->name }}">
                        @else
                            <div class="initials text-orange-700">
                                @php
                                    $nameParts = explode(' ', $user->name ?? 'User');
                                    $initials =
                                        count($nameParts) > 1
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
                    <a href="{{ route('profile.show') }}"
                        class="flex items-center p-3 rounded-lg text-orange-700 bg-orange-50 font-semibold transition-colors duration-200">
                        <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                clip-rule="evenodd" />
                        </svg>
                        Biodata Diri
                    </a>
                    <a href="{{ route('profile.experience') }}"
                        class="flex items-center p-3 rounded-lg text-gray-600 hover:bg-gray-50 hover:text-orange-700 transition-colors duration-200">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 13.255A23.564 23.564 0 0112 15c-1.638 0-3.232-.387-4.707-1.127m12.454-3.791l-3.327-1.077a2.25 2.25 0 00-2.883 1.077l-4.5 9a2.25 2.25 0 00-1.096 2.457l1.076 3.328m4.004-12.784a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM12 21.75l-4.723-3.374A9.252 9.252 0 013 12.375V6.75a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 6.75v5.625c0 2.656-1.171 5.093-3.175 6.723L12 21.75z">
                            </path>
                        </svg>
                        Pengalaman Kerja
                    </a>
                    <a href="{{ route('profile.education') }}"
                        class="flex items-center p-3 rounded-lg text-gray-600 hover:bg-gray-50 hover:text-orange-700 transition-colors duration-200">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6.251v8.406m-6.495-2.884l-2.073-.622c-.61-.183-1.08-.823-.974-1.464.106-.64.675-1.107 1.285-1.107h.176l.126-2.527a2.25 2.25 0 012.25-2.25h.175a2.25 2.25 0 012.25 2.25l.126 2.527h.176c.61 0 1.179.467 1.285 1.107.106.64-.364 1.281-.974 1.464l-2.073.622M12 6.251V4.5a2.25 2.25 0 00-2.25-2.25h-1.5a2.25 2.25 0 00-2.25 2.25v2.751m9.752 0h-2.25">
                            </path>
                        </svg>
                        Pendidikan
                    </a>
                    <a href="{{ route('profile.cv') }}"
                        class="flex items-center p-3 rounded-lg text-gray-600 hover:bg-gray-50 hover:text-orange-700 transition-colors duration-200">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m5.5 10.104H9.75M18.75 6.75H12">
                            </path>
                        </svg>
                        CV
                    </a>
                </nav>
            </div>

            <div class="w-full lg:w-3/4 p-6 sm:p-8 md:p-10">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Biodata Diri</h2>

                <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT') {{-- Gunakan PUT untuk update --}}

                    <div class="flex flex-col md:flex-row items-start md:items-center gap-6 mb-8">
                        {{-- Area Upload Foto Profil --}}
                        <div class="flex-shrink-0">
                            <div class="profile-pic-container mx-auto md:mx-0 bg-gray-200 shadow-md">
                                {{-- Tampilkan foto yang sudah ada atau inisial --}}
                                @if (isset($profile->profile_photo_path) && $profile->profile_photo_path)
                                    <img id="profile_photo_preview" class="object-cover"
                                        src="{{ asset('storage/' . $profile->profile_photo_path) }}"
                                        alt="{{ $user->name }}">
                                @else
                                    <div id="profile_initials" class="initials text-gray-600">
                                        @php
                                            $nameParts = explode(' ', $user->name ?? 'User');
                                            $initials =
                                                count($nameParts) > 1
                                                    ? strtoupper(
                                                        substr($nameParts[0], 0, 1) . substr(end($nameParts), 0, 1),
                                                    )
                                                    : strtoupper(substr($user->name ?? 'U', 0, 2));
                                        @endphp
                                        {{ $initials }}
                                    </div>
                                @endif
                            </div>
                            <input type="file" id="profile_photo" name="profile_photo" class="hidden"
                                onchange="previewProfilePhoto(event)">
                            <label for="profile_photo"
                                class="mt-4 block text-center md:text-left text-sm text-blue-600 hover:text-blue-800 cursor-pointer">
                                Ubah Foto Profil
                            </label>
                            @error('profile_photo')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Form Baris 1: Nama Lengkap & Email --}}
                        <div class="flex-grow grid grid-cols-1 md:grid-cols-2 gap-4 w-full">
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                                <input type="text" name="name" id="name"
                                    value="{{ old('name', $user->name ?? '') }}"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring-orange-500 sm:text-sm p-2.5">
                                @error('name')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                                <input type="email" name="email" id="email"
                                    value="{{ old('email', $user->email ?? '') }}" readonly
                                    class="mt-1 block w-full border-gray-300 bg-gray-100 rounded-md shadow-sm sm:text-sm p-2.5 cursor-not-allowed">
                            </div>
                        </div>
                    </div>

                    {{-- Form Baris 2: Nomor HP --}}
                    <div class="mb-6">
                        <label for="phone_number" class="block text-sm font-medium text-gray-700">Nomor HP</label>
                        <input type="text" name="phone_number" id="phone_number"
                            value="{{ old('phone_number', $profile->phone_number ?? '') }}"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring-orange-500 sm:text-sm p-2.5">
                        @error('phone_number')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Form Baris 3: Negara & Provinsi --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                        <div>
                            <label for="country" class="block text-sm font-medium text-gray-700">Negara</label>
                            <input type="text" name="country" id="country"
                                value="{{ old('country', $profile->country ?? '') }}"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring-orange-500 sm:text-sm p-2.5">
                            @error('country')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="province" class="block text-sm font-medium text-gray-700">Provinsi</label>
                            <input type="text" name="province" id="province"
                                value="{{ old('province', $profile->province ?? '') }}"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring-orange-500 sm:text-sm p-2.5">
                            @error('province')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    {{-- Form Baris 4: Kota & Tanggal Lahir --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                        <div>
                            <label for="city" class="block text-sm font-medium text-gray-700">Kota</label>
                            <input type="text" name="city" id="city"
                                value="{{ old('city', $profile->city ?? '') }}"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring-orange-500 sm:text-sm p-2.5">
                            @error('city')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="date_of_birth" class="block text-sm font-medium text-gray-700">Tanggal
                                Lahir</label>
                            <input type="date" name="date_of_birth" id="date_of_birth"
                                value="{{ old('date_of_birth', $profile->date_of_birth ? \Carbon\Carbon::parse($profile->date_of_birth)->format('Y-m-d') : '') }}"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring-orange-500 sm:text-sm p-2.5">
                            @error('date_of_birth')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    {{-- Form Baris 5: Jenis Kelamin & Alamat --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Jenis Kelamin</label>
                            <div class="mt-2 flex items-center space-x-6">
                                <label class="inline-flex items-center">
                                    <input type="radio" name="gender" value="male"
                                        class="text-orange-500 focus:ring-orange-500"
                                        {{ old('gender', $profile->gender ?? '') == 'male' ? 'checked' : '' }}>
                                    <span class="ml-2 text-sm text-gray-700">Pria</span>
                                </label>
                                <label class="inline-flex items-center">
                                    <input type="radio" name="gender" value="female"
                                        class="text-orange-500 focus:ring-orange-500"
                                        {{ old('gender', $profile->gender ?? '') == 'female' ? 'checked' : '' }}>
                                    <span class="ml-2 text-sm text-gray-700">Wanita</span>
                                </label>
                            </div>
                            @error('gender')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="address" class="block text-sm font-medium text-gray-700">Alamat</label>
                            <textarea name="address" id="address" rows="2"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring-orange-500 sm:text-sm p-2.5 resize-y">{{ old('address', $profile->address ?? '') }}</textarea>
                            @error('address')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    {{-- Form Baris 6 (Ringkasan Profil) --}}
                    <div class="mb-8">
                        <label for="bio" class="block text-sm font-medium text-gray-700">Ringkasan Profil</label>
                        <textarea name="bio" id="bio" rows="3"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-orange-500 focus:ring-orange-500 sm:text-sm p-2.5 resize-y">{{ old('bio', $profile->bio ?? '') }}</textarea>
                        @error('bio')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Button Form --}}
                    <div class="flex justify-end space-x-4">
                        <button type="button"
                            class="px-6 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Batal
                        </button>
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
        // Script untuk preview foto profil
        function previewProfilePhoto(event) {
            const reader = new FileReader();
            reader.onload = function() {
                const output = document.getElementById('profile_photo_preview');
                const initialsDiv = document.getElementById('profile_initials');
                if (output) {
                    output.src = reader.result;
                    output.style.display = 'block'; // Tampilkan gambar
                    if (initialsDiv) initialsDiv.style.display = 'none'; // Sembunyikan inisial
                } else {
                    // Jika belum ada tag img, buat dan masukkan
                    const container = document.querySelector('.profile-pic-container');
                    if (container) {
                        const img = document.createElement('img');
                        img.id = 'profile_photo_preview';
                        img.className = 'object-cover w-full h-full';
                        img.src = reader.result;
                        container.innerHTML = ''; // Hapus inisial atau placeholder
                        container.appendChild(img);
                    }
                }
            };
            if (event.target.files[0]) {
                reader.readAsDataURL(event.target.files[0]);
            }
        }
    </script>
@endpush
