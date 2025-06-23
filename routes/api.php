<?php

use App\Http\Controllers\Api\ProfileController;
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

    // Nanti tambahkan rute untuk experience, education, dan cv di sini...
    // Contoh:
    // Route::get('/user/experiences', [ExperienceController::class, 'index']);
    // Route::post('/user/experiences', [ExperienceController::class, 'store']);
});
