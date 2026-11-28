<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('job_applications', function (Blueprint $table) {

            if (!Schema::hasColumn('job_applications', 'birth_place')) {
                $table->string('birth_place', 100)->nullable();
            }

            if (!Schema::hasColumn('job_applications', 'birth_date')) {
                $table->date('birth_date')->nullable();
            }

            if (!Schema::hasColumn('job_applications', 'gender')) {
                $table->string('gender', 30)->nullable();
            }

            if (!Schema::hasColumn('job_applications', 'address')) {
                $table->text('address')->nullable();
            }

            if (!Schema::hasColumn('job_applications', 'ktp_path')) {
                $table->string('ktp_path')->nullable();
            }

            if (!Schema::hasColumn('job_applications', 'supporting_documents')) {
                $table->json('supporting_documents')->nullable();
            }

        });
    }

    public function down()
    {
        // Tidak menghapus kolom agar data yang sudah ada tetap aman.
    }
};
