<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('job_applications', function (Blueprint $table) {
            // Hapus kolom position_name yang tidak perlu
            $table->dropColumn('position_name');

            // Ubah nama kolom position_id menjadi job_vacancy_id
            $table->renameColumn('position_id', 'job_vacancy_id');

            // Ubah nama kolom path file agar konsisten
            $table->renameColumn('cv_path', 'cv_file');
            $table->renameColumn('portfolio_path', 'portfolio_file');
        });
    }

    public function down(): void
    {
        Schema::table('job_applications', function (Blueprint $table) {
            // Kode untuk mengembalikan jika migrasi di-rollback
            $table->string('position_name');
            $table->renameColumn('job_vacancy_id', 'position_id');
            $table->renameColumn('cv_file', 'cv_path');
            $table->renameColumn('portfolio_file', 'portfolio_path');
        });
    }
};
