<footer class="footer">
    <div class="footer-column">
        <h3 class="footer-title">Tentang Kami</h3>
        <div class="footer-content">
            <p>AntiNganggur adalah perusahaan teknologi yang menyediakan berbagai lowongan kerja di bidang IT dan digital. Kami membuka kesempatan bagi talenta IT Indonesia untuk bergabung dan berkembang bersama kami melalui posisi-posisi yang tersedia di berbagai divisi teknologi.</p>
            <div class="contact-info">
                <span class="contact-icon">
                    <img src="{{ asset('assets/icons/phone.png') }}" alt="Phone Icon" class="w-5 h-5" />
                </span>
                <div>08123123123</div>
            </div>
            <div class="contact-info">
                <span class="contact-icon">
                    <img src="{{ asset('assets/icons/email.png') }}" alt="Email Icon" class="w-5 h-5" />
                </span>
                <div>Antinganggur@Gmail.Com</div>
            </div>
            <div class="contact-info">
                <span class="contact-icon">
                    <img src="{{ asset('assets/icons/address.png') }}" alt="Address Icon" class="w-5 h-5" />
                </span>
                <div>Jl. Ir. Sutami 36-A, Kentingan, Jebres, Surakarta, Jawa Tengah.</div>
            </div>
        </div>
    </div>

    <div class="footer-column">
        <h3 class="footer-title">Tautan Cepat</h3>
        <div class="footer-links">
            {{-- Menggunakan url() helper untuk tautan ke halaman dalam proyek --}}
            {{-- Anda bisa mengganti ini dengan route('nama_rute') jika sudah mendefinisikan named routes --}}
            <a href="{{ url('/') }}">Beranda</a>
            <a href="{{ url('/lowongan') }}">Lowongan</a> {{-- Mengubah .html menjadi tanpa ekstensi jika rute Laravel --}}
            <a href="{{ url('/aboutus') }}">Tentang Kami</a> {{-- Mengubah .html menjadi tanpa ekstensi jika rute Laravel --}}
            <a href="{{ url('/contact') }}">Hubungi Kami</a> {{-- Mengubah .html menjadi tanpa ekstensi jika rute Laravel --}}
        </div>
    </div>

    <div class="footer-column">
        <h3 class="footer-title">Kategori Pekerjaan</h3>
        <div class="footer-links">
            <a href="#">Web Developer</a>
            <a href="#">Mobile Developer</a>
            <a href="#">DevOps Engineer</a>
            <a href="#">UI/UX Designer</a>
            <a href="#">Data Scientist</a>
            <a href="#">IT Support</a>
        </div>
    </div>

    <div class="footer-column">
        <h3 class="footer-title">Hubungi Kami</h3>

        {{-- Menampilkan feedback sukses --}}
        @if (session('success'))
            <p class="text-green-200 text-sm mb-2">{{ session('success') }}</p>
        @endif

        <form class="contact-form" method="POST" action="{{ route('contact.store') }}">
            @csrf {{-- Token CSRF untuk keamanan Laravel --}}
            <input type="email" name="email" value="{{ old('email') }}" placeholder="Masukkan Email" required>
            {{-- Menampilkan error validasi untuk email --}}
            @error('email')
                <p class="text-red-200 text-sm mb-1">{{ $message }}</p>
            @enderror

            <textarea name="message" placeholder="Masukkan Pesan" required>{{ old('message') }}</textarea>
            {{-- Menampilkan error validasi untuk pesan --}}
            @error('message')
                <p class="text-red-200 text-sm mb-1">{{ $message }}</p>
            @enderror

            <button type="submit">Kirim</button>
        </form>
    </div>
</footer>
