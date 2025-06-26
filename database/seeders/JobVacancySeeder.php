<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\JobVacancy;
use App\Models\JobBenefit;
use Carbon\Carbon;

class JobVacancySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Data lowongan pekerjaan yang lebih detail
        $vacancies = [
            [
                'title' => 'Senior Software Engineer (Backend)',
                'company_name' => 'Anti Nganggur',
                'job_logo' => 'job_logos/2xRYM5vI75q8cGnWNi1jycsw8x1z7ppR1m7a0EHP.png',
                'location' => 'Jakarta',
                'location_details' => 'Jalan Jenderal Sudirman Kav. 52-53, Jakarta Selatan',
                'type_job' => 'Full-time',
                'work_schedule' => 'Senin - Jumat',
                'career_level' => 'Senior',
                'mobility' => 'Hybrid',
                'min_salary' => 1.00,
                'max_salary' => 2.50,
                'description' => 'Kami mencari Backend Engineer berpengalaman untuk membangun dan memelihara arsitektur inti dari platform kami. Anda akan bekerja dengan teknologi modern untuk menghadirkan solusi yang skalabel dan andal.',
                'open_positions' => 2,
                'benefits' => ['Asuransi Kesehatan Penuh', 'Makan Siang Gratis', 'Dana Pensiun', 'Cuti Tidak Terbatas']
            ],
            [
                'title' => 'UI/UX Designer',
                'company_name' => 'Anti Nganggur',
                'job_logo' => 'job_logos/2xRYM5vI75q8cGnWNi1jycsw8x1z7ppR1m7a0EHP.png',
                'location' => 'Bandung',
                'location_details' => 'Jl. Dago No. 123, Coblong, Bandung',
                'type_job' => 'Full-time',
                'work_schedule' => 'Fleksibel',
                'career_level' => 'Menengah (Mid-level)',
                'mobility' => 'Remote',
                'min_salary' => 8.00,
                'max_salary' => 14.00,
                'description' => 'Rancang antarmuka yang intuitif dan menarik untuk aplikasi web dan seluler kami. Anda akan berkolaborasi dengan manajer produk dan pengembang untuk menciptakan pengalaman pengguna yang luar biasa.',
                'open_positions' => 1,
                'benefits' => ['Tunjangan Kerja Remote', 'Budget untuk Pengembangan Diri', 'Asuransi Kesehatan']
            ],
            [
                'title' => 'Digital Marketing Intern',
                'company_name' => 'Anti Nganggur',
                'job_logo' => 'job_logos/2xRYM5vI75q8cGnWNi1jycsw8x1z7ppR1m7a0EHP.png',
                'location' => 'Surabaya',
                'location_details' => 'Gedung Graha Pena, Jl. Ahmad Yani No. 88',
                'type_job' => 'Internship',
                'work_schedule' => 'Senin - Jumat',
                'career_level' => 'Magang/Intern',
                'mobility' => 'On-site',
                'min_salary' => 2.00,
                'max_salary' => 3.50,
                'description' => 'Kesempatan magang bagi mahasiswa tingkat akhir untuk belajar dan berkontribusi dalam kampanye pemasaran digital kami. Anda akan terlibat dalam SEO, SEM, dan manajemen media sosial.',
                'open_positions' => 3,
                'benefits' => ['Uang Saku Bulanan', 'Sertifikat Magang', 'Makan Siang']
            ],
             [
                'title' => 'Lead Data Scientist',
                'company_name' => 'Anti Nganggur',
                'job_logo' => 'job_logos/2xRYM5vI75q8cGnWNi1jycsw8x1z7ppR1m7a0EHP.png',
                'location' => 'Yogyakarta',
                'location_details' => 'Jl. Kaliurang KM 5, Sleman',
                'type_job' => 'Full-time',
                'work_schedule' => 'Senin - Jumat',
                'career_level' => 'Lead/Manajer',
                'mobility' => 'Hybrid',
                'min_salary' => 2.00,
                'max_salary' => 3.50,
                'description' => 'Pimpin tim data scientist kami untuk menggali wawasan dari data yang kompleks. Kembangkan model machine learning dan presentasikan temuan kepada para pemangku kepentingan.',
                'open_positions' => 1,
                'benefits' => ['Bonus Kinerja', 'Saham Perusahaan (ESOP)', 'Asuransi Keluarga', 'Gym Membership']
            ]
        ];

       foreach ($vacancies as $vacancyData) {
            // Salin data benefit sebelum dikirim ke JobVacancy
            $benefitNames = $vacancyData['benefits'];

            $vacancyData['benefits'] = json_encode($benefitNames);

            // Membuat entri lowongan baru
            $jobVacancy = JobVacancy::create($vacancyData);

            // benefit yang terkait ke tabel job_benefits
            foreach ($benefitNames as $benefitName) {
                JobBenefit::create([
                    'job_vacancy_id' => $jobVacancy->id,
                    'benefits_name' => $benefitName
                ]);
            }
        }
    }
}
