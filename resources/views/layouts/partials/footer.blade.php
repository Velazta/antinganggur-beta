<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AntiNganggur Footer</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        /* Menggunakan font Poppins sebagai default */
        body {
            font-family: 'Poppins', sans-serif;
        }
        /* Helper class untuk teks kecil pada avatar, jika diperlukan */
        .text-10px {
            font-size: 10px;
        }
        .leading-11px {
            line-height: 11px;
        }
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        .footer {
            background-color: #FF7043;
            color: white;
            padding: 40px 10%;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .footer-column {
            width: 22%;
            margin-bottom: 20px;
        }

        .footer-title {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.3);
        }

        .footer-content p {
            margin-bottom: 15px;
            line-height: 1.5;
        }

        .footer-links a {
            display: block;
            color: white;
            text-decoration: none;
            margin-bottom: 10px;
        }

        .footer-links a:hover {
            text-decoration: underline;
        }

        .contact-form input,
        .contact-form textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: none;
            border-radius: 4px;
            background-color: rgba(255, 255, 255, 0.9);
            color: black; /* Agar teks terlihat di input */
        }

        .contact-form textarea {
            height: 100px;
            resize: none;
        }

        .contact-form button {
            padding: 5px 15px;
            background-color: #fff;
            color: #FF7144;
            border: 2px solid #fff;
            border-radius: 4px;
            cursor: pointer;
            float: right;
        }

        .contact-info {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }

        .contact-icon {
            margin-right: 10px;
        }

        @media (max-width: 768px) {
            .footer-column {
                width: 48%;
            }
        }

        @media (max-width: 576px) {
            .footer-column {
                width: 100%;
            }
        }
    </style>
</head>
<body>
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
                <a href="{{ url('/') }}">Beranda</a>
                <a href="{{ url('/lowongan.html') }}">Lowongan</a>
                <a href="{{ url('/aboutus.html') }}">Tentang Kami</a>
                <a href="{{ url('/contact.html') }}">Hubungi Kami</a>
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
            @if(session('success'))
                <div class="bg-green-500 text-white p-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif
            <form class="contact-form" method="POST" action="{{ route('contact.store') }}">
                @csrf
                <input type="text" name="nama" placeholder="Masukkan Nama" required>
                <input type="email" name="email" placeholder="Masukkan Email" required>
                <textarea name="message" placeholder="Masukkan Pesan" required></textarea>
                <button type="submit">Kirim</button>
            </form>
        </div>
    </footer>
</body>
</html>
