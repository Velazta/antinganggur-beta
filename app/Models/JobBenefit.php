<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobBenefit extends Model
{
    protected $table = 'job_benefits';

    protected $fillable = [
        'job_vacancy_id',
        'benefits_name',
    ];

    public function jobVacancy()
    {
        return $this->belongsTo(JobVacancy::class);
    }
}
