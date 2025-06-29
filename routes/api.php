<?php

use App\Http\Controllers\Api\ExperienceController;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\EducationController;
use App\Http\Controllers\Api\CvController;
use App\Http\Controllers\GuestAuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Rute Publik untuk registrasi guest
Route::post('/auth/register-guest', [GuestAuthController::class, 'register']);

// Grup Rute Terproteksi yang memerlukan token
Route::middleware('auth:sanctum')->group(function () {

    // Endpoint untuk mengambil data profil lengkap
    Route::get('/user/profile', [ProfileController::class, 'show']);

    // Endpoint untuk menyimpan/update data profil
    Route::post('/user/profile', [ProfileController::class, 'store']);
    Route::post('/user/profile/photo', [ProfileController::class, 'updatePhoto']);

    Route::get('/user/experiences', [ExperienceController::class, 'index']);
    Route::post('/user/experiences', [ExperienceController::class, 'store']);
    Route::get('/user/experiences/{experience}', [ExperienceController::class, 'show']);
    Route::put('/user/experiences/{experience}', [ExperienceController::class, 'update']);
    Route::delete('/user/experiences/{experience}', [ExperienceController::class, 'destroy']);

    Route::get('/user/educations', [EducationController::class, 'index']);
    Route::post('/user/educations', [EducationController::class, 'store']);
    Route::put('/user/educations/{education}', [EducationController::class, 'update']);
    Route::delete('/user/educations/{education}', [EducationController::class, 'destroy']);

    Route::get('/user/cvs', [CvController::class, 'index']);
    Route::post('/user/cv', [CvController::class, 'store']); // Upload CV baru
    Route::delete('/user/cv/{cv}', [CvController::class, 'destroy']); // Hapus CV
    Route::get('/user/cv/download/{cv}', [CvController::class, 'download']);
    // Nanti tambahkan rute untuk experience, education, dan cv di sini...
    // Contoh:
    // Route::get('/user/experiences', [ExperienceController::class, 'index']);
    // Route::post('/user/experiences', [ExperienceController::class, 'store']);
});
