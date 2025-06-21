<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobBenefit extends Model
{
    protected $table = 'job_benefits';

    protected $fillable = [
        'job_vacancy_id', // ID lowongan pekerjaan yang terkait
        'benefits_name',   // Nama benefit, misalnya "Asuransi Kesehatan", "Cuti Tahunan", dll.
    ];

    public function jobVacancy()
    {
        return $this->belongsTo(JobVacancy::class);
    }
}
