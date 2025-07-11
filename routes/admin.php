<?php
// routes/admin.php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\LoginController as AdminLoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\InboxController;
use App\Http\Controllers\Admin\JobVacancyController;
use App\Http\Controllers\Admin\ApplicantController;

/*
|--------------------------------------------------------------------------
| Rute Admin
|--------------------------------------------------------------------------
*/

// Rute untuk login admin
Route::get('/login', [AdminLoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AdminLoginController::class, 'login'])->name('login.submit');
Route::post('/logout', [AdminLoginController::class, 'logout'])->name('logout');


// Rute yang memerlukan login admin
Route::middleware(['auth.admin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/logout', [AdminLoginController::class, 'logout'])->name('logout');

    Route::get('/manajemen-lowongan', [JobVacancyController::class, 'index'])->name('manajemen.lowongan');
    Route::get('/manajemen-lowongan/create', [JobVacancyController::class, 'create'])->name('manajemen.lowongan.create');
    Route::post('/manajemen-lowongan', [JobVacancyController::class, 'store'])->name('manajemen.lowongan.store');
    Route::get('/manajemen-lowongan/{jobVacancy}/edit', [JobVacancyController::class, 'edit'])->name('manajemen.lowongan.edit');
    Route::put('/manajemen-lowongan/{jobVacancy}', [JobVacancyController::class, 'update'])->name('manajemen.lowongan.update');
    Route::get('/manajemen-lowongan/{jobVacancy}', [JobVacancyController::class, 'show'])->name('manajemen.lowongan.show');
    Route::delete('/manajemen-lowongan/{jobVacancy}', [JobVacancyController::class, 'destroy'])->name('manajemen.lowongan.destroy');

    Route::get('/manajemen-pelamar', [ApplicantController::class, 'index'])->name('manajemen.pelamar');
    Route::get('/manajemen-pelamar/{application}', [ApplicantController::class, 'showApplication'])->name('manajemen.pelamar.show');
    Route::patch('/manajemen-pelamar/{application}/status', [ApplicantController::class, 'updateStatus'])->name('manajemen.pelamar.updateStatus');
    Route::get('/manajemen-pelamar/{application}/hubungi', [ApplicantController::class, 'showContactForm'])->name('manajemen.pelamar.contact');
    Route::post('/manajemen-pelamar/{application}/kirim-pesan', [ApplicantController::class, 'sendMessage'])->name('manajemen.pelamar.sendMessage');
    // Route::get('/manajemen-pelamar', function() {
    //     return view('admin.pelamar.manajemenpelamar');
    // })->name('manajemen.pelamar');

    Route::get('/inbox', [InboxController::class, 'inbox'])->name('inbox');
});
