<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @mixin IdeHelperProfile
 */
class Profile extends Model {
    use HasFactory;

    protected $fillable = [
        'user_id',
        'phone_number',
        'country',
        'province',
        'city',
        'date_of_birth',
        'gender',
        'address',
        'bio',
        'profile_photo_path',
    ];

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }
}
?>
