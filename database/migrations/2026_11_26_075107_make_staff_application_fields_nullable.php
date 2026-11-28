<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up()
    {
        DB::statement("ALTER TABLE job_applications MODIFY domicile VARCHAR(100) NULL");
        DB::statement("ALTER TABLE job_applications MODIFY availability VARCHAR(100) NULL");
        DB::statement("ALTER TABLE job_applications MODIFY education VARCHAR(100) NULL");
        DB::statement("ALTER TABLE job_applications MODIFY university VARCHAR(150) NULL");
    }

    public function down()
    {
        // Kolom tetap nullable agar data lamaran Staff tidak terganggu.
    }
};