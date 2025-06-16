<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobApplication extends Model
{
    use HasFactory;

    protected $fillable = [
        'position_id',
        'position_name',
        'full_name',
        'phone_number',
        'email',
        'province',
        'city',
        'education_level',
        'major',
        'experience_level',
        'cv_path',
        'portfolio_path'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
