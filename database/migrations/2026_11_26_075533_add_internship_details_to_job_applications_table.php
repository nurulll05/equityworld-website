<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('job_applications', function (Blueprint $table) {
            $table->string('internship_category', 50)->nullable();
            $table->string('major', 150)->nullable();
            $table->date('internship_start_date')->nullable();
            $table->date('internship_end_date')->nullable();
        });
    }

    public function down()
    {
        Schema::table('job_applications', function (Blueprint $table) {
            $table->dropColumn([
                'internship_category',
                'major',
                'internship_start_date',
                'internship_end_date',
            ]);
        });
    }
};