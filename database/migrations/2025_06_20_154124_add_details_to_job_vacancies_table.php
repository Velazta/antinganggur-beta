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
        Schema::table('job_vacancies', function (Blueprint $table) {
            $table->text('location_details')->after('location')->nullable();
            $table->string('work_schedule')->after('type_job')->nullable();
            $table->string('career_level')->after('work_schedule')->nullable();
            $table->string('mobility')->after('career_level')->nullable();
            $table->json('benefits')->after('description')->nullable();
            $table->unsignedBigInteger('open_positions')->after('benefits')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('job_vacancies', function (Blueprint $table) {
            $table->dropColumn([
                'location_detail',
                'work_schedule',
                'career_level',
                'mobility',
                'benefits',
                'open_positions'
            ]);
        });
    }
};
