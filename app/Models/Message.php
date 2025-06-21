<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'admin_id',
        'user_id',
        'job_application_id',
        'subject',
        'body',
        'read_at'
    ];

    /**
     * Mendapatkan admin yang mengirim pesan.
     */
    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    /**
     * Mendapatkan user (kandidat) yang menerima pesan.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Mendapatkan lamaran pekerjaan yang terkait dengan pesan ini.
     */
    public function jobApplication()
    {
        return $this->belongsTo(JobApplication::class);
    }
}
