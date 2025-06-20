<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\JobVacancy;
use Carbon\Carbon; // Menambahkan Carbon untuk penanganan tanggal

class JobVacancySeeder extends Seeder
{
    public function run(): void
    {
        // Daftar lokasi yang tersedia
        $locations = [
            'Jakarta', 'Surabaya', 'Bandung', 'Medan', 'Semarang',
            'Makassar', 'Palembang', 'Tangerang', 'Depok', 'Bekasi', 'Surakarta'
        ];

        // Indeks untuk mengambil lokasi dari array
        $locationIndex = 0;

        // Fungsi bantu untuk mendapatkan lokasi berikutnya dari daftar
        $getNextLocation = function () use (&$locationIndex, $locations) {
            $location = $locations[$locationIndex % count($locations)];
            $locationIndex++;
            return $location;
        };

        JobVacancy::create([
            'title' => 'Software Engineer',
            'company_name' => 'Anti Nganggur',
            'job_logo' => 'https://via.placeholder.com/150/0000FF/FFFFFF?text=TechSol', // Contoh URL logo, sesuaikan jika perlu
            'location' => $getNextLocation(),
            'type_job' => 'Full-time',
            'min_salary' => 8000000.00, // Disarankan menggunakan nilai Rupiah, sesuaikan jika perlu
            'max_salary' => 12000000.00, // Disarankan menggunakan nilai Rupiah, sesuaikan jika perlu
            'description' => 'Kami mencari Software Engineer terampil untuk bergabung dengan tim kami. Bertanggung jawab untuk mengembangkan, menguji, dan memelihara perangkat lunak.',
            // Anda bisa menambahkan 'application_deadline' dan 'status' di sini jika diperlukan.
            // Contoh: 'application_deadline' => Carbon::now()->addMonths(1),
            // Contoh: 'status' => 'active',
        ]);

        JobVacancy::create([
            'title' => 'Data Analyst',
            'company_name' => 'Anti Nganggur',
            'job_logo' => 'https://via.placeholder.com/150/FF0000/FFFFFF?text=DataIns', // Contoh URL logo
            'location' => $getNextLocation(),
            'type_job' => 'Part-time',
            'min_salary' => 6000000.00,
            'max_salary' => 9000000.00,
            'description' => 'Bergabunglah dengan kami sebagai Data Analyst untuk membantu kami membuat keputusan berbasis data. Menganalisis set data besar dan membuat laporan yang dapat ditindaklanjuti.',
            // Contoh: 'application_deadline' => Carbon::now()->addMonths(1),
            // Contoh: 'status' => 'active',
        ]);

        JobVacancy::create([
            'title' => 'Project Manager',
            'company_name' => 'Anti Nganggur',
            'job_logo' => 'https://via.placeholder.com/150/00FF00/FFFFFF?text=ProjMgt', // Contoh URL logo
            'location' => $getNextLocation(),
            'type_job' => 'Contract',
            'min_salary' => 7000000.00,
            'max_salary' => 11000000.00,
            'description' => 'Kami mencari Project Manager untuk mengawasi proyek-proyek kami dan memastikan pengiriman tepat waktu. Memimpin tim lintas fungsi dan mengelola sumber daya.',
            // Contoh: 'application_deadline' => Carbon::now()->addMonths(1),
            // Contoh: 'status' => 'active',
        ]);

        JobVacancy::create([
            'title' => 'UX/UI Designer',
            'company_name' => 'Anti Nganggur',
            'job_logo' => 'https://via.placeholder.com/150/FFFF00/000000?text=DesignSt', // Contoh URL logo
            'location' => $getNextLocation(),
            'type_job' => 'Internship',
            'min_salary' => 3000000.00,
            'max_salary' => 5000000.00,
            'description' => 'Mencari UX/UI Designer yang kreatif untuk bergabung dengan tim desain kami. Membuat wireframe, prototipe, dan antarmuka pengguna.',
            // Contoh: 'application_deadline' => Carbon::now()->addMonths(1),
            // Contoh: 'status' => 'active',
        ]);

        JobVacancy::create([
            'title' => 'Marketing Specialist',
            'company_name' => 'Anti Nganggur',
            'job_logo' => 'https://via.placeholder.com/150/00FFFF/000000?text=MktgSpc', // Contoh URL logo
            'location' => $getNextLocation(),
            'type_job' => 'Full-time',
            'min_salary' => 5000000.00,
            'max_salary' => 8000000.00,
            'description' => 'Bergabunglah dengan tim pemasaran kami sebagai Marketing Specialist untuk mendorong kampanye kami. Mengembangkan dan melaksanakan strategi pemasaran digital.',
            // Contoh: 'application_deadline' => Carbon::now()->addMonths(1),
            // Contoh: 'status' => 'active',
        ]);

        JobVacancy::create([
            'title' => 'DevOps Engineer',
            'company_name' => 'Anti Nganggur',
            'job_logo' => 'https://via.placeholder.com/150/FF00FF/FFFFFF?text=DevOps', // Contoh URL logo
            'location' => $getNextLocation(),
            'type_job' => 'Full-time',
            'min_salary' => 9000000.00,
            'max_salary' => 13000000.00,
            'description' => 'Kami mencari DevOps Engineer untuk mengelola infrastruktur cloud kami. Bertanggung jawab untuk deployment, otomatisasi, dan pemeliharaan sistem.',
            // Contoh: 'application_deadline' => Carbon::now()->addMonths(1),
            // Contoh: 'status' => 'active',
        ]);
    }
}
