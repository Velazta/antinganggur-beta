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
        Schema::create('job_applications', function (Blueprint $table) {
            $table->id();
            $table->string('position_id');
            $table->string('position_name');
            $table->string('full_name');
            $table->string('phone_number');
            $table->string('email');
            $table->string('province');
            $table->string('city');
            $table->string('education_level');
            $table->string('major');
            $table->string('experience_level');
            $table->string('cv_path');
            $table->string('portfolio_path')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_applications');
    }
};
