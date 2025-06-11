<?php
// routes/admin.php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\LoginController as AdminLoginController;
use App\Http\Controllers\Admin\DashboardController;

/*
|--------------------------------------------------------------------------
| Rute Admin
|--------------------------------------------------------------------------
| Rute ini dimuat oleh AppServiceProvider dan secara otomatis
| akan diberi prefix 'admin' dan nama 'admin.'.
*/

// Rute untuk login admin
Route::get('/login', [AdminLoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AdminLoginController::class, 'login'])->name('login.submit');
Route::post('/logout', [AdminLoginController::class, 'logout'])->name('logout');


// Rute yang memerlukan login admin
Route::middleware(['auth.admin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/logout', [AdminLoginController::class, 'logout'])->name('logout');
    // Tambahkan rute admin lainnya di sini...

    Route::get('/manajemen-lowongan', function() {
        return view('admin.manajemen_lowongan.manajemenlowongan');
    })->name('manajemen.lowongan');
});
