<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AntiNganggur - Temukan Pekerjaan Impian Anda</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <style>
        /* Custom scrollbar untuk testimoni jika menggunakan overflow (tidak bisa di-inline dengan Tailwind) */
        .testimonial-scrollbar::-webkit-scrollbar {
            height: 8px;
        }

        .testimonial-scrollbar::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }

        .testimonial-scrollbar::-webkit-scrollbar-thumb {
            background: #FDBA74;
            /* orange-300 */
            border-radius: 10px;
        }

        .testimonial-scrollbar::-webkit-scrollbar-thumb:hover {
            background: #FB923C;
            /* orange-400 */
        }
    </style>
</head>

<body class="antialiased font-['Poppins'] bg-[#FFF7F5] text-slate-700">

    <!-- ===== Header Mulai ===== -->
    <header class="bg-white shadow-sm sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16 md:h-20">
                <div class="flex-shrink-0">
                    <a href="{{ url('/') }}" class="flex items-center">
                        <img class="h-8 sm:h-10 w-auto" src="{{ asset('asset/page/Vector.png') }}"
                            alt="AntiNganggur Logo">
                        <div class="ml-2">
                            <span class="font-bold text-lg sm:text-xl text-slate-800">Anti</span><span
                                class="font-bold text-lg sm:text-xl text-orange-500">Nganggur</span>
                        </div>
                    </a>
                </div>
                <nav class="hidden md:flex items-center space-x-1 lg:space-x-3">
                    <a href="{{ url('/') }}"
                        class="text-slate-700 hover:text-orange-500 px-3 py-2 rounded-md text-[15px] md:text-sm font-medium transition-colors duration-150">Home</a>
                    <a href="#"
                        class="text-slate-700 hover:text-orange-500 px-3 py-2 rounded-md text-[15px] md:text-sm font-medium transition-colors duration-150">Lowongan</a>
                    <a href="{{ url('/aboutus') }}"
                        class="text-slate-700 hover:text-orange-500 px-3 py-2 rounded-md text-[15px] md:text-sm font-medium transition-colors duration-150">Tentang</a>
                    <a href="#"
                        class="text-slate-700 hover:text-orange-500 px-3 py-2 rounded-md text-[15px] md:text-sm font-medium transition-colors duration-150">Portfolio</a>
                    <a href="{{ url('/contact') }}"
                        class="text-slate-700 hover:text-orange-500 px-3 py-2 rounded-md text-[15px] md:text-sm font-medium transition-colors duration-150">Kontak</a>
                </nav>

                @guest
                    <div class="hidden md:flex items-center">
                        <a href="{{ route('login') }}"
                            class="ml-6 inline-flex items-center justify-center px-5 lg:px-6 py-2.5 border-2 border-orange-500 text-[15px] font-semibold rounded-lg text-orange-500 bg-white hover:bg-orange-500 hover:text-white transition-colors duration-200 ease-in-out shadow-sm">
                            Masuk
                        </a>
                    </div>
                @endguest

                @auth
                    <div class="hidden md:flex items-center ml-6 relative">
                        <span class="text-sm font-medium text-slate-700">{{ Auth::user()->name }}</span>
                        <button type="button"
                            class="ml-3 flex-shrink-0 bg-orange-500 rounded-full flex text-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500 items-center justify-center h-10 w-10 overflow-hidden"
                            id="user-menu-button-desktop" aria-expanded="false" aria-haspopup="true">
                            <span class="sr-only">Buka menu pengguna</span>
                            @if (Auth::user()->profile && Auth::user()->profile->profile_photo_path)
                                <img class="h-10 w-10 rounded-full object-cover"
                                    src="{{ asset('storage/' . Auth::user()->profile->profile_photo_path) }}"
                                    alt="{{ Auth::user()->name }}">
                            @else
                                <div class="text-white font-semibold flex items-center justify-center text-base">
                                    @php
                                        $nameParts = explode(' ', Auth::user()->name);
                                        $initials =
                                            count($nameParts) > 1
                                                ? strtoupper(
                                                    substr($nameParts[0], 0, 1) . substr(end($nameParts), 0, 1),
                                                )
                                                : strtoupper(substr(Auth::user()->name, 0, 2));
                                    @endphp
                                    {{ $initials }}
                                </div>
                            @endif
                        </button>

                        <div id="user-dropdown-menu"
                            class="origin-top-right absolute right-0 top-full mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none hidden z-20"
                            role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button-desktop">
                            <a href="{{ route('profile.show') }}"
                                class="block px-4 py-2 text-sm text-slate-700 hover:bg-orange-50 hover:text-orange-600 transition-colors duration-150"
                                role="menuitem" id="user-menu-item-0">Profil Anda</a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); this.closest('form').submit();"
                                    class="block px-4 py-2 text-sm text-slate-700 hover:bg-orange-50 hover:text-orange-600 transition-colors duration-150"
                                    role="menuitem" id="user-menu-item-2">
                                    Keluar
                                </a>
                            </form>
                        </div>
                    </div>
                @endauth

                <!-- Tombol Mobile Menu -->
                <div class="md:hidden flex items-center">
                    <button id="mobile-menu-button" type="button"
                        class="inline-flex items-center justify-center p-2 rounded-md text-slate-600 hover:text-orange-500 hover:bg-orange-50 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-orange-500"
                        aria-controls="mobile-menu" aria-expanded="false">
                        <span class="sr-only">Buka menu utama</span>
                        <svg id="menu-icon-open" class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>
                        <svg id="menu-icon-close" class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu Dropdown -->
        <div class="md:hidden hidden" id="mobile-menu">
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                <a href="{{ url('/') }}"
                    class="text-slate-700 hover:bg-orange-50 hover:text-orange-500 block px-3 py-2 rounded-md text-base font-medium">Home</a>
                <a href="#"
                    class="text-slate-700 hover:bg-orange-50 hover:text-orange-500 block px-3 py-2 rounded-md text-base font-medium">Lowongan</a>
                <a href="{{ url('/aboutus') }}"
                    class="text-slate-700 hover:bg-orange-50 hover:text-orange-500 block px-3 py-2 rounded-md text-base font-medium">Tentang</a>
                <a href="#"
                    class="text-slate-700 hover:bg-orange-50 hover:text-orange-500 block px-3 py-2 rounded-md text-base font-medium">Portfolio</a>
                <a href="{{ url('/contact') }}"
                    class="text-slate-700 hover:bg-orange-50 hover:text-orange-500 block px-3 py-2 rounded-md text-base font-medium">Kontak</a>
            </div>
            @guest
                <div class="pt-4 pb-3 border-t border-gray-200">
                    <div class="px-5">
                        <a href="{{ route('login') }}"
                            class="block w-full text-center px-5 py-2.5 border-2 border-orange-500 text-base font-semibold rounded-lg text-orange-500 bg-white hover:bg-orange-500 hover:text-white transition-colors duration-200 ease-in-out">
                            Masuk
                        </a>
                    </div>
                </div>
            @endguest
            @auth
                <div class="pt-4 pb-3 border-t border-slate-200">
                    <div class="flex items-center px-4 mb-3">
                        <div class="flex-shrink-0">
                            <div
                                class="h-10 w-10 rounded-full bg-orange-500 flex items-center justify-center text-white font-semibold overflow-hidden">

                                {{-- Untuk Ngatur Foto Profil Nanti --}}
                                @if (Auth::user()->profile && Auth::user()->profile->profile_photo_path)
                                    <img class="h-10 w-10 rounded-full object-cover"
                                        src="{{ asset('storage/' . Auth::user()->profile->profile_photo_path) }}"
                                        alt="{{ Auth::user()->name }}">
                                @else
                                    <div class="text-white font-semibold flex items-center justify-center text-base">
                                        @php
                                            $nameParts = explode(' ', Auth::user()->name);
                                            $initials =
                                                count($nameParts) > 1
                                                    ? strtoupper(
                                                        substr($nameParts[0], 0, 1) . substr(end($nameParts), 0, 1),
                                                    )
                                                    : strtoupper(substr(Auth::user()->name, 0, 2));
                                        @endphp
                                        {{ $initials }}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="ml-3">
                            <div class="text-base font-medium text-slate-800">{{ Auth::user()->name }}</div>
                        </div>
                    </div>
                    <div class="px-2 space-y-1">
                        <a href="{{ route('profile.show') }}"
                            class="block px-3 py-2 rounded-md text-base font-medium text-slate-600 hover:bg-orange-50 hover:text-orange-500 transition-colors duration-150">Profil
                            Anda</a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault(); this.closest('form').submit();"
                                class="block px-3 py-2 rounded-md text-base font-medium text-slate-600 hover:bg-orange-50 hover:text-orange-500 transition-colors duration-150">
                                Keluar
                            </a>
                        </form>
                    </div>
                </div>
            @endauth
        </div>
    </header>

    {{-- Skrip yang dibutuhkan secara global (misalnya header-menu.js) --}}
    <script src="{{ asset('js/header-menu.js') }}" defer></script> {{-- Ini mungkin sudah ada di header.blade.php Anda --}}
    {{-- <script src="{{ asset('js/header-menu.js') }}" defer></script> --}}

</body>

</html>
