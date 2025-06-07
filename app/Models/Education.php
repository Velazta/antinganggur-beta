<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Education extends Model {
    use HasFactory;

    protected $table = 'educations';

    protected $fillable = [
        'user_id',
        'university_name',
        'degree',
        'major',
        'country',
        'city',
        'start_month',
        'start_year',
        'end_month',
        'end_year',
        'currently_studying',
        'ipk',
        'description',
    ];

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }
}
