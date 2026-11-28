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
        'birth_place',
        'birth_date',
        'gender',
        'phone',
        'email',
        'domicile',
        'address',
        'position',
        'availability',
        'education',
        'university',
        'internship_category',
        'major',
        'semester',
        'internship_start_date',
        'internship_end_date',
        'cv_path',
        'ktp_path',
        'transcript_path',
        'photo_path',
        'supporting_documents',
        'agreement',
        'status',
    ];

    protected $casts = [
        'birth_date' => 'date',
        'internship_start_date' => 'date',
        'internship_end_date' => 'date',
        'semester' => 'integer',
        'supporting_documents' => 'array',
        'agreement' => 'boolean',
    ];

    // RELASI DENGAN AKUN PELAMAR
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
