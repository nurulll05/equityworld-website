
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('job_applications', function (Blueprint $table) {

            // DATA PRIBADI TAMBAHAN
            $table->string('birth_place', 100)->nullable();
            $table->date('birth_date')->nullable();
            $table->string('gender', 20)->nullable();
            $table->text('address')->nullable();

            // DOKUMEN TAMBAHAN
            $table->string('ktp_path')->nullable();
            $table->json('supporting_documents')->nullable();

        });
    }

    public function down(): void
    {
        Schema::table('job_applications', function (Blueprint $table) {

            $table->dropColumn([
                'birth_place',
                'birth_date',
                'gender',
                'address',
                'ktp_path',
                'supporting_documents',
            ]);

        });
    }
};