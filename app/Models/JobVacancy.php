<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JobVacancy extends Model
{
    use HasFactory;

    protected $table = 'job_vacancies';

    protected $fillable = [
        'title',          // Judul lowongan
        'company_name',   // Nama perusahaan
        'job_logo',       // Path atau nama file logo pekerjaan
        'location',       // Lokasi pekerjaan
        'type_job',       // Tipe pekerjaan (nama kolom baru yang Anda inginkan)
        'min_salary',     // Gaji minimum
        'max_salary',     // Gaji maksimum
        'description',    // Deskripsi lengkap pekerjaan
    ];

     protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
