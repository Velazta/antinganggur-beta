{{-- resources/views/admin/partials/_header.blade.php --}}

<header class="bg-white px-8 pt-6 pb-4 shadow-sm">
    <div class="flex justify-between items-center">

        <div class="flex items-center">
            <h1 id="page-title" class="text-[40px] font-medium text-black">
                @yield('page-title', 'Dashboard')
            </h1>
        </div>

        <div class="flex items-center ml-auto relative">
            <button id="user-profile-button" class="flex items-center gap-3">
                <span class="font-semibold text-gray-700 hidden sm:block">Admin Perusahaan</span>
                <img src="{{asset('asset/auth/vector.png')}}" alt="Foto Profil" class="w-10 h-10 rounded-full object-cover border-2 border-gray-200 hover:ring-2 hover:ring-blue-400 transition-all">
            </button>

            <div id="user-dropdown" class="origin-top-right absolute right-0 top-full mt-1 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none hidden transform opacity-0 scale-95" role="menu">
                <div class="py-1" role="none">
                    <form method="POST" action="{{ route('admin.logout') }}">
                        @csrf
                        <button type="submit" class="w-full text-left flex items-center gap-3 px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">
                            <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                            </svg>
                            <span>Logout</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>
