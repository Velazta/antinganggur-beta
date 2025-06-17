@extends('layouts.app')

@section('title', 'Biodata Diri - Profil Jobseeker')

@push('styles')
    <style>
        /* CSS Tambahan untuk menyembunyikan input file asli dan gaya lainnya */
        #photoUpload {
            display: none;
        }

        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #fff5f2;
        }

        ::-webkit-scrollbar-thumb {
            background: #f8afa6;
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #e57373;
        }

    </style>
@endpush

@section('content')
    <div class="bg-[#FFF5F2] flex items-center justify-center min-h-screen p-4 sm:p-6 md:p-8 font-sans">
        <div class="flex w-full max-w-6xl mx-auto space-x-8">
            {{-- Sidebar --}}
            @include('profile.partials.sidebar')

            <main class="w-full bg-white p-8 rounded-2xl shadow-lg">
                <h1 class="text-2xl font-bold text-gray-800 mb-8">
                    Biodata Diri
                </h1>

                @if (session('success'))
                    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded-md"
                        role="alert">
                        <p>{{ session('success') }}</p>
                    </div>
                @endif

                <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="flex flex-col md:flex-row gap-10">
                        <div class="w-full md:w-1/4 flex flex-col items-center flex-shrink-0">
                            <label for="photoUpload" class="cursor-pointer group">
                                <div class="relative w-40 h-40">
                                    <img id="photoPreview"
                                        src="{{ $profile->profile_photo_path ? asset('storage/' . $profile->profile_photo_path) : 'https://via.placeholder.com/150/E0E0E0/BDBDBD?text=+' }}"
                                        alt="Pratinjau Foto Profil"
                                        class="w-40 h-40 rounded-full object-cover bg-gray-200 transition-all duration-300 group-hover:ring-4 ring-[#FFBDA9]">
                                </div>
                            </label>
                            <input type="file" id="photoUpload" name="profile_photo" accept="image/*" class="hidden">
                            <label for="photoUpload"
                                class="mt-2 text-sm text-blue-600 hover:text-blue-800 cursor-pointer">
                                Ubah Foto
                            </label>
                            @error('profile_photo')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>


                        <div class="w-full md:w-3/4">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-6">
                                <div class="md:col-span-2">
                                    <label for="name" class="block text-sm font-medium text-gray-600 mb-1">Nama
                                        Lengkap</label>
                                    <input type="text" id="name" name="name"
                                        placeholder="Masukkan nama lengkap Anda"
                                        value="{{ old('name', $user->name) }}"
                                        class="w-full border border-gray-300 rounded-lg p-2.5  focus:ring-orange-500 focus:border-orange-500 transition-all">
                                    @error('name')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="md:col-span-2">
                                    <label for="email" class="block text-sm font-medium text-gray-600 mb-1">Email</label>
                                    <input type="email" id="email" name="email" value="{{ $user->email }}"
                                        readonly
                                        class="w-full border border-gray-300 rounded-lg p-2.5 bg-gray-100 cursor-not-allowed">
                                </div>

                                <div class="md:col-span-2">
                                    <label for="phone_number" class="block text-sm font-medium text-gray-600 mb-1">Nomor
                                        HP</label>
                                    <input type="tel" id="phone_number" name="phone_number"
                                        placeholder="08123456789" value="{{ old('phone_number', $profile->phone_number) }}"
                                        class="w-full border border-gray-300 rounded-lg p-2.5 focus:outline-none focus:ring-orange-500 focus:ring-2 transition-all">
                                    @error('phone_number')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="country" class="block text-sm font-medium text-gray-600 mb-1">Negara</label>
                                    <input type="text" id="country" name="country" placeholder="Indonesia"
                                        value="{{ old('country', $profile->country) }}"
                                        class="w-full border border-gray-300 rounded-lg p-2.5 focus:outline-none focus:ring-orange-500 focus:ring-2 transition-all">
                                    @error('country')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="province"
                                        class="block text-sm font-medium text-gray-600 mb-1">Provinsi</label>
                                    <input type="text" id="province" name="province" placeholder="Jawa Tengah"
                                        value="{{ old('province', $profile->province) }}"
                                        class="w-full border border-gray-300 rounded-lg p-2.5 focus:outline-none focus:ring-orange-500 focus:ring-2 transition-all">
                                    @error('province')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="city" class="block text-sm font-medium text-gray-600 mb-1">Kota</label>
                                    <input type="text" id="city" name="city" placeholder="Surakarta"
                                        value="{{ old('city', $profile->city) }}"
                                        class="w-full border border-gray-300 rounded-lg p-2.5 focus:outline-none focus:ring-orange-500 focus:ring-2  transition-all">
                                    @error('city')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="date_of_birth" class="block text-sm font-medium text-gray-600 mb-1">Tanggal
                                        Lahir</label>
                                    <input type="date" id="date_of_birth" name="date_of_birth"
                                        value="{{ old('date_of_birth', $profile->date_of_birth) }}"
                                        class="w-full border border-gray-300 rounded-lg p-2.5 focus:outline-none focus:ring-orange-500 focus:ring-2  transition-all text-gray-500">
                                    @error('date_of_birth')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-600 mb-2">Jenis Kelamin</label>
                                    <div class="flex items-center gap-6">
                                        <label class="flex items-center cursor-pointer">
                                            <input type="radio" name="gender" value="male"
                                                {{ old('gender', $profile->gender) == 'male' ? 'checked' : '' }}
                                                class="h-4 w-4 text-orange-500 focus:ring-orange-400">
                                            <span class="ml-2 text-gray-700">Pria</span>
                                        </label>
                                        <label class="flex items-center cursor-pointer">
                                            <input type="radio" name="gender" value="female"
                                                {{ old('gender', $profile->gender) == 'female' ? 'checked' : '' }}
                                                class="h-4 w-4 text-orange-500 focus:ring-orange-400">
                                            <span class="ml-2 text-gray-700">Wanita</span>
                                        </label>
                                    </div>
                                    @error('gender')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="address" class="block text-sm font-medium text-gray-600 mb-1">Alamat</label>
                                    <input type="text" id="address" name="address"
                                        placeholder="Jl. Slamet Riyadi No. 1"
                                        value="{{ old('address', $profile->address) }}"
                                        class="w-full border border-gray-300 rounded-lg p-2.5 focus:outline-none focus:ring-orange-500 focus:ring-2  transition-all">
                                    @error('address')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="md:col-span-2">
                                    <label for="bio" class="block text-sm font-medium text-gray-600 mb-1">Ringkasan
                                        Profil</label>
                                    <textarea id="bio" name="bio" rows="4" placeholder="Tuliskan deskripsi singkat tentang diri Anda..."
                                        class="w-full border border-gray-300 rounded-lg p-2.5 focus:outline-none focus:ring-orange-500 focus:ring-2 transition-all resize-none">{{ old('bio', $profile->bio) }}</textarea>
                                    @error('bio')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-10 flex justify-end gap-4">
                        <button type="button"
                            class="py-2.5 px-8 rounded-lg font-semibold border border-orange-500 text-orange-500 hover:bg-orange-50 transition-all duration-300">
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
        const photoUploadInput = document.getElementById("photoUpload");
        const photoPreviewImage = document.getElementById("photoPreview");

        if (photoUploadInput) {
            photoUploadInput.addEventListener("change", function(event) {
                if (event.target.files && event.target.files[0]) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        photoPreviewImage.src = e.target.result;
                    };
                    reader.readAsDataURL(event.target.files[0]);
                }
            });
        }
    </script>
@endpush
