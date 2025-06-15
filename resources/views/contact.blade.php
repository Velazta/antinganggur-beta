@extends('layouts.app')

@section('title', 'Kontak Kami - AntiNganggur')

@push('styles')
    {{-- CSS Kustom Khusus Halaman Kontak --}}
    <style>
        body {
            font-family: "Poppins", sans-serif;
            background-color: #fff7f5;
            /* Warna latar belakang utama halaman (soft peach/pink) */
            color: #374151;
            /* Default text color (gray-700) */
        }

        input[type="text"],
        input[type="email"],
        textarea {
            transition: border-color 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        }
    </style>
@endpush

@section('content')
    <main>
        <section class="relative max-w-7xl mx-auto px-6 sm:px-12 lg:px-24 py-20 bg-[#fff7f5] overflow-hidden">

            <div class="mb-16 max-w-3xl relative z-10">
                <p class="text-gray-400 uppercase tracking-wider mb-2 text-sm sm:text-base">(OUR CONTACT)</p>
                <h1 class="text-4xl sm:text-6xl font-bold leading-tight tracking-tight text-slate-800">Get Ready</h1>
                <h2 class="text-4xl sm:text-6xl font-bold text-[#FF7144] leading-tight tracking-tight mt-1 sm:mt-2">
                    With Us
                </h2>
            </div>

            <div class="relative lg:grid lg:grid-cols-2 lg:gap-x-10 xl:gap-x-12 lg:mb-20">

                <div class="relative z-10 flex flex-col">

                    <div class="space-y-10 md:space-y-12">
                        <div class="flex items-start gap-4 sm:gap-5">
                            <div class="flex-shrink-0 bg-[#FF9878]/80 rounded-xl p-3 sm:p-4">
                                <img src="{{ asset('asset/page/Location.png') }}" alt="Location" class="w-7 h-7 sm:w-8 sm:h-8" />
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-700 mb-1 text-lg">Location</h3>
                                <p class="text-[#FF7144] leading-relaxed text-base">
                                    Jalan Ir. Sutami 36-A, Kentingan, Jebres, Surakarta, Jawa Tengah, Indonesia 57126
                                </p>
                            </div>
                        </div>

                        <div class="flex items-start gap-4 sm:gap-5">
                            <div class="flex-shrink-0 bg-[#FF9878]/80 rounded-xl p-3 sm:p-4">
                                <img src="{{ asset('asset/page/Phone.png') }}" alt="Contact Person" class="w-7 h-7 sm:w-8 sm:h-8" />
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-700 mb-1 text-lg">Contact Person</h3>
                                <p class="text-[#FF7144] leading-relaxed text-base">+62 812 1950 0363</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-4 sm:gap-5">
                            <div class="flex-shrink-0 bg-[#FF9878]/80 rounded-xl p-3 sm:p-4">
                                <img src="{{ asset('asset/page/Clock.png') }}" alt="Working Hours" class="w-7 h-7 sm:w-8 sm:h-8" />
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-700 mb-1 text-lg">Working Hours</h3>
                                <p class="text-[#FF7144] leading-relaxed text-base">Senin - Sabtu: 07:00 - 18:00</p>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-wrap items-center gap-4 sm:gap-6 mt-10 md:mt-12">
                        <a href="https://instagram.com" target="_blank" rel="noopener"
                            class="flex items-center gap-2 border border-gray-400 rounded-lg py-2.5 px-4 text-gray-700 hover:bg-orange-100 hover:border-[#FF7144] hover:text-orange-600 transition duration-300 text-sm">
                            <img src="{{ asset('asset/page/Instagram.png') }}" alt="Instagram" class="w-5 h-5" />
                            <span class="font-semibold uppercase tracking-wider">Instagram</span>
                        </a>
                        <a href="https://wa.me/6281219500363" target="_blank" rel="noopener"
                            class="flex items-center gap-2 border border-gray-400 rounded-lg py-2.5 px-4 text-gray-700 hover:bg-orange-100 hover:border-[#FF7144] hover:text-orange-600 transition duration-300 text-sm">
                            <img src="{{ asset('asset/page/WhatsApp.png') }}" alt="WhatsApp" class="w-5 h-5" />
                            <span class="font-semibold uppercase tracking-wider">WhatsApp</span>
                        </a>
                        <a href="https://github.com/username" target="_blank" rel="noopener"
                            class="flex items-center gap-2 border border-gray-400 rounded-lg py-2.5 px-4 text-gray-700 hover:bg-orange-100 hover:border-[#FF7144] hover:text-orange-600 transition duration-300 text-sm">
                            <img src="{{ asset('asset/page/Gmailgray.png') }}" alt="Gmail" class="w-5 h-5" />
                            <span class="font-semibold uppercase tracking-wider">Gmail</span>
                        </a>
                    </div>
                </div>

                <div class="rounded-2xl border-4 sm:border-8 border-[#FF7144]
                shadow-xl overflow-hidden relative
                w-full h-[300px] mt-12
                sm:h-[350px]
                md:h-[400px]
                lg:-mt-40 lg:h-[550px]
                xl:h-[550px]">
                    <a href="https://goo.gl/maps/wFRDdFrcJPxPTeG6A" target="_blank" rel="Open"
                        aria-label="Open Google Maps Location" class="block w-full h-full">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3955.132514339174!2d110.85237737482811!3d-7.555239192461973!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a1772652b414f%3A0x6b2e0437452d2746!2sFakultas%20Teknik%20UNS!5e0!3m2!1sen!2sid!4v1678901234567!5m2!1sen!2sid"
                            width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </a>
                </div>
            </div>
        </section>

        <section class="bg-[#F9D066] py-12 sm:py-16 md:py-18 relative overflow-hidden">

            <div
                class="max-w-7xl mx-auto px-6 sm:px-12 lg:px-24 flex flex-col lg:flex-row items-center lg:items-start gap-10 lg:gap-20 h-full">

                <div
                    class="relative w-full max-w-xs sm:max-w-sm md:max-w-md lg:w-1/2 lg:max-w-none self-center lg:self-stretch">

                    <div class="absolute bottom-0 left-0 right-0 mx-auto lg:relative lg:mx-0 lg:bottom-auto">
                        <img src="{{ asset('asset/page/girlcontact.png') }}" alt="Contact Girl"
                            class="w-full h-auto object-contain lg:transform lg:translate-y-[80px]" />

                    </div>
                </div>

                <div
                    class="bg-white rounded-xl shadow-xl p-6 sm:p-8 md:p-10 w-full lg:w-1/2 max-w-md lg:max-w-lg mx-auto lg:mx-0 mb-0 lg:mb-0">
                    <h2 class="text-2xl sm:text-3xl font-bold text-slate-800 mb-4 sm:mb-6">Hubungi Kami Sekarang</h2>
                    <p class="mb-6 sm:mb-8 text-gray-700 leading-relaxed text-sm sm:text-base">
                        Kami senang membantu Anda dengan pertanyaan Anda! Silahkan isi formulir di bawah ini dan kami
                        akan segera menghubungi Anda kembali.
                    </p>

                    {{-- MODIFIKASI UNTUK POST PESAN KONTAK --}}
                    <form method="POST" action="{{ route('contact.store') }}">
                        @csrf
                        <div class="mb-5">
                            <label for="nama" class="block text-slate-700 font-semibold mb-1.5 text-sm">Nama</label>
                            <input type="text" id="nama" name="nama" placeholder="Nama Anda"
                                class="w-full px-4 py-2.5 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-400 placeholder-gray-400 text-sm" />
                            @error('nama')
                                <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                            @enderror   s
                        </div>

                        <div class="mb-5">
                            <label for="email" class="block text-slate-700 font-semibold mb-1.5 text-sm">Email</label>
                            <input type="email" id="email" name="email" placeholder="Email Anda"
                                class="w-full px-4 py-2.5 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-400 placeholder-gray-400 text-sm" />
                            @error('email')
                                <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-6 sm:mb-8">
                            <label for="message" class="block text-slate-700 font-semibold mb-1.5 text-sm">Pesan</label>
                            <textarea id="message" name="message" rows="4" placeholder="Tulis pesan anda disini..."
                                class="w-full px-4 py-2.5 border border-gray-300 rounded-md resize-none focus:outline-none focus:ring-2 focus:ring-yellow-400 placeholder-gray-400 text-sm"></textarea>
                            @error('message')
                                <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                            @enderror
                        </div>

                        <button type="submit"
                            class="w-full bg-blue-600 text-white font-semibold py-3 rounded-lg hover:bg-blue-700 transition-colors duration-300 text-base">
                            Submit
                        </button>
                    </form>
                </div>
            </div>
        </section>
    </main>
@endsection


