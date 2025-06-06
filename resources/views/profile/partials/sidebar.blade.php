{{-- Sidebar untuk halaman profil --}}
<aside class="w-full max-w-[280px] bg-white p-6 rounded-2xl shadow-lg flex-shrink-0 self-start hidden lg:block">
    <div class="w-full text-center p-4 rounded-2xl bg-[#FFDAB9]">
        {{-- Pastikan variabel $user dan $profile tersedia saat @include file ini --}}
        <img src="{{ $profile->profile_photo_path ? asset('storage/' . $profile->profile_photo_path) : 'https://i.pinimg.com/564x/2b/0c/53/2b0c53a6539c3319f34a179339e87555.jpg' }}"
            alt="Foto Profil {{ $user->name }}"
            class="w-24 h-24 rounded-full mx-auto object-cover border-4 border-white shadow-md" />
        <h2 class="mt-4 font-bold text-lg text-gray-800">
            {{ $user->name }}
        </h2>
    </div>

    <nav class="w-full mt-8">
        <ul class="space-y-3">
            {{-- Biodata Diri --}}
            <li>
                <a href="{{ route('profile.show') }}"
                    class="flex items-center gap-4 p-3 rounded-xl transition-all duration-300
                        {{ request()->routeIs('profile.show') ? 'bg-[#FFEBE6] text-orange-600 font-bold' : 'text-gray-500 hover:bg-gray-100 hover:text-orange-600' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                        <path fill-rule="evenodd"
                            d="M18.685 19.097A9.723 9.723 0 0 0 21.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 0 0 3.065 7.097A9.716 9.716 0 0 0 12 21.75a9.716 9.716 0 0 0 6.685-2.653Zm-12.54-1.285A7.486 7.486 0 0 1 12 15a7.486 7.486 0 0 1 5.855 2.812A8.224 8.224 0 0 1 12 20.25a8.224 8.224 0 0 1-5.855-2.438ZM15.75 9a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z"
                            clip-rule="evenodd" />
                    </svg>
                    <span>Biodata Diri</span>
                </a>
            </li>
            {{-- Pengalaman Kerja --}}
            <li>
                <a href="{{ route('profile.experience') }}"
                   class="flex items-center gap-4 p-3 rounded-xl transition-all duration-300
                        {{ request()->routeIs('profile.experience') ? 'bg-[#FFEBE6] text-orange-600 font-bold' : 'text-gray-500 hover:bg-gray-100 hover:text-orange-600' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                        <path
                            d="M11.25 4.533A9.707 9.707 0 0 0 6 3a9.735 9.735 0 0 0-3.25.555.75.75 0 0 0-.5.707v14.5c0 .338.216.626.5.707A9.735 9.735 0 0 0 6 21a9.707 9.707 0 0 0 5.25-1.533.75.75 0 0 0 0-1.321v-12.4c0-.527-.422-.966-.948-1.007A6.723 6.723 0 0 0 11.25 4.533ZM12.75 4.533A9.707 9.707 0 0 1 18 3a9.735 9.735 0 0 1 3.25.555.75.75 0 0 1 .5.707v14.5c0 .338-.216.626-.5.707A9.735 9.735 0 0 1 18 21a9.707 9.707 0 0 1-5.25-1.533.75.75 0 0 1 0-1.321v-12.4c0-.527.422-.966.948-1.007A6.723 6.723 0 0 1 12.75 4.533Z" />
                    </svg>
                    <span>Pengalaman Kerja</span>
                </a>
            </li>
            {{-- Pendidikan --}}
            <li>
                <a href="{{ route('profile.education') }}"
                   class="flex items-center gap-4 p-3 rounded-xl transition-all duration-300
                        {{ request()->routeIs('profile.education') ? 'bg-[#FFEBE6] text-orange-600 font-bold' : 'text-gray-500 hover:bg-gray-100 hover:text-orange-600' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                        <path
                            d="M11.7 2.004a.75.75 0 0 1 .6.015l9.75 4.5a.75.75 0 0 1 .45 1.033l-9.75 12a.75.75 0 0 1-1.05 0l-9.75-12a.75.75 0 0 1 .45-1.033l9.75-4.5a.75.75 0 0 1 .45-.015ZM12 6.532l-6.502 3.024 4.195 5.165a.75.75 0 0 0 1.226.002L18.502 9.556 12 6.532Z" />
                    </svg>
                    <span>Pendidikan</span>
                </a>
            </li>
            {{-- CV --}}
            <li>
                <a href="{{ route('profile.cv') }}"
                   class="flex items-center gap-4 p-3 rounded-xl transition-all duration-300
                        {{ request()->routeIs('profile.cv') ? 'bg-[#FFEBE6] text-orange-600 font-bold' : 'text-gray-500 hover:bg-gray-100 hover:text-orange-600' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                        <path fill-rule="evenodd"
                            d="M5.625 1.5c-1.036 0-1.875.84-1.875 1.875v17.25c0 1.035.84 1.875 1.875 1.875h12.75c1.035 0 1.875-.84 1.875-1.875V12.75A3.75 3.75 0 0 0 16.5 9h-1.875a.375.375 0 0 1-.375-.375V6.75A3.75 3.75 0 0 0 9 3H5.625Zm3.75 3a.75.75 0 0 0-1.5 0v2.25c0 .414.336.75.75.75h2.25a.75.75 0 0 0 0-1.5H9.375V4.5Z"
                            clip-rule="evenodd" />
                    </svg>
                    <span>CV</span>
                </a>
            </li>
        </ul>
    </nav>
</aside>
