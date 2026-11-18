<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobApplication extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'job_type',
        'branch',
        'full_name',
        'phone',
        'email',
        'domicile',
        'position',
        'availability',
        'education',
        'university',
        'cv_path',
        'transcript_path',
        'photo_path',
        'agreement',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}