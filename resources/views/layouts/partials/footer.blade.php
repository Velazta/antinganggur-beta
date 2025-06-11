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
                         <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path d="M22 16.92v3a2 2 0 0 1-2.18 2A19.72 19.72 0 0 1 3.09 5.18 2 2 0 0 1 5 3h3a2 2 0 0 1 2 1.72c.13.81.37 1.6.72 2.34a2 2 0 0 1-.45 2.11l-1.27 1.27a16 16 0 0 0 6.29 6.29l1.27-1.27a2 2 0 0 1 2.11-.45c.74.35 1.53.59 2.34.72A2 2 0 0 1 22 16.92z"/>
                        </svg>
                    </span>
                    <div>08123123123</div>
                </div>

                <div class="contact-info">
                    <span class="contact-icon">
                        <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <rect x="3" y="5" width="18" height="14" rx="2"/>
                            <polyline points="3 7 12 13 21 7"/>
                        </svg>
                    </span>
                    <div>Antinganggur@Gmail.Com</div>
                </div>

                <div class="contact-info">
                    <span class="contact-icon">
                        <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path d="M12 21s-6-5.686-6-10A6 6 0 0 1 18 11c0 4.314-6 10-6 10z"/>
                            <circle cx="12" cy="11" r="2"/>
                        </svg>
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
                <input type="email" name="email" placeholder="Masukkan Email" required>
                <textarea name="message" placeholder="Masukkan Pesan" required></textarea>
                <button type="submit">Kirim</button>
            </form>
        </div>
    </footer>
</body>
</html>
