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

        // DATA PRIBADI
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

        // DOKUMEN LAMARAN
        'cv_path',
        'ktp_path',
        'transcript_path',
        'photo_path',
        'supporting_documents',

        // STATUS LAMARAN
        'agreement',
        'status',
    ];

    protected $casts = [
        'birth_date' => 'date',
        'supporting_documents' => 'array',
        'agreement' => 'boolean',
    ];

    // RELASI DENGAN AKUN PELAMAR
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}