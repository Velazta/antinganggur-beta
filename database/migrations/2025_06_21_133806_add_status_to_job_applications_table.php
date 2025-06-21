<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('job_applications', function (Blueprint $table) {
            Schema::table('job_applications', function (Blueprint $table) {
                // Menambahkan kolom 'status' dengan tipe enum (hanya bisa diisi oleh nilai yang ditentukan)
                // Defaultnya adalah 'pending' saat data baru dibuat.
                // diletakkan setelah kolom 'job_vacancy_id' agar rapi.
                $table->enum('status', ['pending', 'accepted', 'rejected'])->default('pending')->after('job_vacancy_id');
            });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('job_applications', function (Blueprint $table) {
            Schema::table('job_applications', function (Blueprint $table) {
                // Perintah untuk menghapus kolom 'status' jika migrasi di-rollback
                $table->dropColumn('status');
            });
        });
    }
};
