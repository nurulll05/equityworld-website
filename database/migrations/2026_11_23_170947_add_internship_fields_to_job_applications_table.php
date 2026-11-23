<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('job_applications', function (Blueprint $table) {

            // INFORMASI PENDIDIKAN MAGANG
            $table->string('major', 100)->nullable();
            $table->unsignedTinyInteger('semester')->nullable();

            // PERIODE MAGANG
            $table->date('internship_start_date')->nullable();
            $table->date('internship_end_date')->nullable();

            // DOKUMEN KHUSUS MAGANG
            $table->string('cover_letter_path')->nullable();
            $table->string('identity_path')->nullable();

        });
    }

    public function down(): void
    {
        Schema::table('job_applications', function (Blueprint $table) {

            $table->dropColumn([
                'major',
                'semester',
                'internship_start_date',
                'internship_end_date',
                'cover_letter_path',
                'identity_path',
            ]);

        });
    }
};