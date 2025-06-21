<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Profile; // Ini sudah benar
use Illuminate\Database\Eloquent\Relations\HasOne; // Ini sudah benar
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @mixin IdeHelperUser
 */
class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }


    // Mendefinisikan relasi 1 to 1 ke model profile
    public function profile(): HasOne
    {
        return $this->hasOne(Profile::class); // <--- PERBAIKI DI SINI
    }

    // Mendefinisikan relasi 1 to many kke model experience
    public function experiences(): HasMany
    {
        return $this->hasMany(Experience::class)->orderBy('start_year', 'desc');
    }

    // Mendefinisikan relasi 1 to many ke model education
    public function educations(): HasMany
    {
        return $this->hasMany(Education::class)->orderBy('start_year', 'desc');
    }

    public function cvs()
    {
        return $this->hasMany(Cv::class);
    }

     public function jobApplications()
    {
        return $this->hasMany(JobApplication::class);
    }
}
