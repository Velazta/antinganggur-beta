<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});


// Route untuk menampilkan form registrasi
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
// Route untuk memproses data registrasi (POST)
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');

// Route untuk menampilkan form login (GET)
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
// Route untuk memproses data login (POST)
Route::post('/login', [AuthController::class, 'login'])->name('login.submit'); // Perbaikan di sini, harusnya POST

// Route untuk logout (POST lebih aman)
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/show', [ProfileController::class, 'show'])->name('profile.show');


// Jika nanti ada dashboard, bisa diaktifkan kembali bagian ini:
// Route::middleware(['auth'])->group(function () {
//     Route::get('/dashboard', function () {
//         return "Selamat datang di Dashboard, " . Auth::user()->name;
//     })->name('dashboard');
// });
