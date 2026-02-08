<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VacancyApplication extends Model
{
    use HasFactory;

    protected $fillable = [
        'job_post_id',
        'name',
        'email',
        'mobile',
        'resume',
        'message',
        'status',
    ];

    protected $casts = [
        'status' => 'string',
    ];

    /* ======================
       RELATIONSHIPS
    ====================== */
    public function jobPost()
    {
        return $this->belongsTo(JobPost::class);
    }
}
