
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_applications', function (Blueprint $table) {

            // PRIMARY KEY
            $table->id();

            // RELASI DENGAN TABEL USERS
            $table->foreignId('user_id')
                ->constrained('users')
                ->cascadeOnDelete();

            // INFORMASI LOWONGAN
            $table->string('job_type', 30);
            $table->string('branch', 150);

            // DATA DIRI PELAMAR
            $table->string('full_name');
            $table->string('phone', 25);
            $table->string('email');
            $table->string('domicile', 100);

            // POSISI DAN KETERSEDIAAN
            $table->string('position', 150);
            $table->string('availability', 100);

            // PENDIDIKAN
            $table->string('education', 100);
            $table->string('university', 150);

            // DOKUMEN LAMARAN
            $table->string('cv_path');
            $table->string('transcript_path');
            $table->string('photo_path');

            // PERSETUJUAN
            $table->boolean('agreement')->default(false);

            // STATUS LAMARAN
            $table->string('status')->default('submitted');

            // CREATED_AT DAN UPDATED_AT
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('job_applications');
    }
};