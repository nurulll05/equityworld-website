<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobApplication extends Model
{
    use HasFactory;

    /**
     * Kolom yang dapat diisi melalui mass assignment.
     */
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

        // INFORMASI LAMARAN
        'position',
        'availability',

        // DATA PENDIDIKAN
        'education',
        'university',
        'internship_category',
        'major',
        'semester',

        // PERIODE MAGANG
        'internship_start_date',
        'internship_end_date',

        // DOKUMEN LAMARAN
        'cv_path',
        'ktp_path',
        'transcript_path',
        'photo_path',
        'identity_path',
        'cover_letter_path',
        'supporting_documents',

        // PERSETUJUAN DAN STATUS
        'agreement',
        'status',
    ];

    /**
     * Konversi tipe data.
     */
    protected $casts = [

        'birth_date' => 'date',
        'internship_start_date' => 'date',
        'internship_end_date' => 'date',
        'semester' => 'integer',
        'supporting_documents' => 'array',
        'agreement' => 'boolean',

    ];

    /**
     * Relasi dengan akun Pelamar.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}