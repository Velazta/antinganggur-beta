<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\JobApplicationController;
use App\Http\Controllers\LowonganController;
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
// Route untuk menyimpan data experience job seeker
Route::post('/profile/experience', [ProfileController::class, 'storeExperience'])->name('profile.experience.store');
Route::get('/profile/experience/{experience}/edit', [ProfileController::class, 'editExperience'])->name('profile.experience.edit');
Route::put('/profile/experience/{experience}', [ProfileController::class, 'updateExperience'])->name('profile.experience.update');
// Route untuk menghapus data experience job seeker
Route::delete('/profile/experience/{experience}', [ProfileController::class, 'deleteExperience'])->name('profile.experience.delete');

Route::get('/profile/education', [ProfileController::class, 'education'])->name('profile.education'); // Anda perlu membuat method 'education'
Route::post('/profile/education', [ProfileController::class, 'storeEducation'])->name('profile.education.store');
Route::get('/profile/education/{education}/edit', [ProfileController::class, 'editEducation'])->name('profile.education.edit');
Route::put('/profile/education/{education}', [ProfileController::class, 'updateEducation'])->name('profile.education.update');
Route::delete('/profile/education/{education}', [ProfileController::class, 'deleteEducation'])->name('profile.education.delete');

Route::get('/profile/cv', [ProfileController::class, 'cv'])->name('profile.cv'); // Anda perlu membuat method 'cv'
Route::post('/profile/cv', [ProfileController::class, 'storeCv'])->name('profile.cv.store');
Route::get('/profile/cv/download/{cv}', [ProfileController::class, 'downloadCv'])->name('profile.cv.download');
Route::delete('/profile/cv/{cv}', [ProfileController::class, 'deleteCv'])->name('profile.cv.delete');

// Untuk mengupdate info experience, education, cv

// Route::get('/aboutus', function() {
//     return view('aboutus');
// });

Route::view('/aboutus','aboutus')->name('aboutus');
Route::view('/team/ravelin-lutfhan','team.ceo')->name('team.ceo');
Route::view('/team/rizky-amalia','team.cto')->name('team.cto');
Route::view('/team/rafi-amirudin','team.hrmanager')->name('team.hrmanager');

Route::get('/contact', function() {
    return view('contact');
});

//Route untuk mengirim pesan kontak
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::get('/lowongan', [LowonganController::class, 'index'])->name('lowongan');

Route::get('/lamar', [JobApplicationController::class, 'create'])->name('lamar.create');
Route::post('/lamar', [JobApplicationController::class, 'store'])->name('lamar.store');
Route::get('/api/positions', [JobApplicationController::class, 'getPositions'])->name('lamar.positions');

Route::view('/portofolio','portofolio')->name('portofolio');

// Jika nanti ada dashboard, bisa diaktifkan kembali bagian ini:
// Route::middleware(['auth'])->group(function () {
//     Route::get('/dashboard', function () {
//         return "Selamat datang di Dashboard, " . Auth::user()->name;
//     })->name('dashboard');
// });

