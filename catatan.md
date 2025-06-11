.
├── app
│   ├── Http
│   │   ├── Controllers
│   │   │   ├── Admin                 <-- FOLDER BARU
│   │   │   │   ├── Auth
│   │   │   │   │   └── LoginController.php  <-- Controller login khusus admin
│   │   │   │   ├── DashboardController.php
│   │   │   │   ├── JobVacancyController.php
│   │   │   │   └── JobSeekerController.php
│   │   │   ├── AuthController.php      <-- Untuk Job Seeker
│   │   │   └── ProfileController.php   <-- Untuk Job Seeker
│   │   └── Middleware
│   │       └── AuthenticateAdmin.php   <-- Middleware yang kita buat
│   ├── Models
│   │   ├── Admin.php                 <-- Model Admin
│   │   ├── User.php                  <-- Model Job Seeker
│   │   └── ...
├── resources
│   └── views
│       ├── admin                     <-- FOLDER BARU
│       │   ├── auth
│       │   │   └── login.blade.php
│       │   ├── dashboard.blade.php
│       │   ├── layouts
│       │   │   └── app.blade.php       <-- Layout khusus admin
│       │   └── ...
│       ├── auth                      <-- View untuk Job Seeker
│       │   ├── login.blade.php
│       │   └── register.blade.php
│       ├── layouts                   <-- Layout untuk Job Seeker
│       └── ...
└── routes
    ├── web.php                     <-- Tempat kita mendefinisikan route group
    └── ...

    # berikut adalah susunan untuk membuat fungsi dari si admin nantinya. On Progress

2. Berikut adalah penyusunan untuk panel system gambarannya seperti ini
/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Admin/  <-- Folder utama untuk semua hal terkait Admin
│   │   │   │   ├── Auth/
│   │   │   │   │   └── LoginController.php       // Mengelola login & logout admin
│   │   │   │   │
│   │   │   │   ├── DashboardController.php     // Logika untuk halaman Dashboard
│   │   │   │   ├── JobVacancyController.php    // CRUD (Create, Read, Update, Delete) Lowongan
│   │   │   │   ├── ApplicantController.php     // Melihat daftar pelamar dan detailnya
│   │   │   │   └── InboxController.php         // Mengelola pesan dari "Hubungi Kami"
│   │   │   │
│   │   │   ├── AuthController.php          // <-- Controller untuk job seeker (tetap di luar)
│   │   │   └── ProfileController.php         // <-- Controller untuk job seeker (tetap di luar)
│   │   │
│   │   ├── Middleware/
│   │   │   └── AuthenticateAdmin.php         // <-- Middleware yang sudah kita buat
│   │
│   ├── Models/
│   │   ├── Admin.php                       // Model untuk tabel `admins`
│   │   ├── JobVacancy.php                  // Model untuk tabel `job_vacancies` (buat baru)
│   │   ├── Applicant.php                   // Model untuk tabel `applications` (buat baru)
│   │   ├── Message.php                     // Model untuk tabel `messages` (buat baru)
│   │   ├── User.php                        // Model untuk job seeker (sudah ada)
│   │   └── ...                             // Model-model lain yang sudah ada
│
├── database/
│   ├── migrations/
│   │   ├── ..._create_admins_table.php
│   │   ├── ..._create_job_vacancies_table.php
│   │   ├── ..._create_applications_table.php
│   │   └── ..._create_messages_table.php
│   │
│   └── seeders/
│       ├── AdminSeeder.php
│       └── ...
│
├── resources/
│   └── views/
│       ├── admin/  <-- Folder utama untuk semua tampilan (view) admin
│       │   ├── auth/
│       │   │   └── login.blade.php           // Tampilan login admin
│       │   │
│       │   ├── layouts/
│       │   │   └── app.blade.php             // Layout utama khusus dasbor admin (dengan sidebar, dll)
│       │   │
│       │   ├── dashboard.blade.php         // Tampilan untuk menu Dashboard
│       │   ├── vacancies/                  // Folder untuk fitur Manajemen Lowongan
│       │   │   ├── index.blade.php         // Daftar semua lowongan
│       │   │   ├── create.blade.php        // Form tambah lowongan baru
│       │   │   └── edit.blade.php          // Form edit lowongan
│       │   │
│       │   ├── applicants/                 // Folder untuk fitur Pelamar
│       │   │   ├── index.blade.php         // Daftar semua pelamar
│       │   │   └── show.blade.php          // Halaman detail profil seorang pelamar
│       │   │
│       │   └── inbox/                      // Folder untuk fitur Kotak Pesan
│       │       ├── index.blade.php         // Daftar semua pesan
│       │       └── show.blade.php          // Halaman untuk membaca satu pesan
│       │
│       └── ...                             // <-- View untuk job seeker (tetap di luar)
│
└── routes/
    ├── admin.php                         // (Opsional tapi sangat disarankan) File route khusus admin
    └── web.php                             // File route utama untuk job seeker


1. index.blade.php (File Utama)

    File ini akan berisi perulangan (@foreach) untuk menampilkan semua kartu lowongan seperti pada desain Anda.
    
    Yang paling penting: File ini juga akan berisi kode HTML untuk semua modal/pop-up Anda (Lihat, Edit, dan Hapus). Awalnya, semua pop-up ini akan disembunyikan menggunakan CSS (display: none; atau kelas dari Tailwind seperti hidden).
    JavaScript akan berperan untuk:
    - Menampilkan pop-up yang sesuai saat tombol "Lihat", "Edit", atau "Hapus" diklik.
    - Mengambil data lowongan yang relevan (misalnya, saat klik "Edit" pada lowongan #3) dan mengisi form di dalam pop-up edit dengan data tersebut.
    - Mengirim data kembali ke server saat form di dalam pop-up di-submit, tanpa me-refresh halaman (menggunakan teknologi AJAX).

2. create.blade.php (Tetap Terpisah)

    Form untuk "Tambah Lowongan Baru" umumnya lebih baik diletakkan di halaman terpisah. Alasannya, aksi ini tidak terikat pada satu data lowongan spesifik dan biasanya form-nya cukup panjang. Tombol + di halaman index akan mengarah ke halaman ini.
