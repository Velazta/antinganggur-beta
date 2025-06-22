<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\JobBenefit;

class JobVacancy extends Model
{
    use HasFactory;

    protected $table = 'job_vacancies';

    protected $fillable = [
        'title',          // Judul lowongan
        'company_name',   // Nama perusahaan
        'job_logo',       // Path atau nama file logo pekerjaan
        'location',       // Lokasi pekerjaan
        'location_details', // Detail lokasi (nama kolom baru yang Anda inginkan)
        'type_job',       // Tipe pekerjaan (nama kolom baru yang Anda inginkan)
        'work_schedule',  // Jadwal kerja (nama kolom baru yang Anda inginkan)
        'career_level',   // Tingkat karir (nama kolom baru yang Anda inginkan)
        'mobility',      // Mobilitas (nama kolom baru yang Anda inginkan)
        'benefits',       // Manfaat pekerjaan (nama kolom baru yang Anda inginkan, bisa berupa JSON)
        'open_positions', // Jumlah posisi yang dibuka
        'min_salary',     // Gaji minimum
        'max_salary',     // Gaji maksimum
        'description',    // Deskripsi lengkap pekerjaan
    ];

     protected $casts = [
        'benefits' => 'array', // Menggunakan array untuk menyimpan manfaat pekerjaan
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function jobBenefits() {
        return $this->hasMany(JobBenefit::class, 'job_vacancy_id', 'id');
    }
}
