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
            // Tambahkan kolom user_id setelah kolom id
            $table->foreignId('user_id')
                  ->after('id') // Opsional, agar rapi
                  ->constrained('users') // Terhubung ke tabel 'users'
                  ->onDelete('cascade'); // Jika user dihapus, lamarannya juga ikut terhapus
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('job_applications', function (Blueprint $table) {
            // Hapus foreign key dan kolomnya jika migrasi di-rollback
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });
    }
};
