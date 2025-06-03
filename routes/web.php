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
// Untuk menampilkan form profil (Biodata Diri)
Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
// Untuk mengupdate profil
Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');

// Route untuk halaman lainnya (experience, education, cv)
Route::get('/profile/experience', [ProfileController::class, 'experience'])->name('profile.experience'); // Anda perlu membuat method 'experience'
Route::get('/profile/education', [ProfileController::class, 'education'])->name('profile.education'); // Anda perlu membuat method 'education'
Route::get('/profile/cv', [ProfileController::class, 'cv'])->name('profile.cv'); // Anda perlu membuat method 'cv'

// Untuk mengupdate info experience, education, cv

Route::get('/aboutus', function() {
    return view('aboutus');
});

Route::get('/contact', function() {
    return view('contact');
});


// Jika nanti ada dashboard, bisa diaktifkan kembali bagian ini:
// Route::middleware(['auth'])->group(function () {
//     Route::get('/dashboard', function () {
//         return "Selamat datang di Dashboard, " . Auth::user()->name;
//     })->name('dashboard');
// });
