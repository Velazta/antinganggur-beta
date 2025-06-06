<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

Class Experience extends Model {
    use HasFactory;

     protected $table = 'experiences';

    protected $fillable = [
        'user_id',
        'job_title',
        'company_name',
        'country',
        'city',
        'start_month',
        'start_year',
        'end_month',
        'end_year',
        'current_job',
        'description',
    ];

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }
}

?>
