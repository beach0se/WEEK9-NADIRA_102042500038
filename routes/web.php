<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth');
Route::get('/dashboard', fn () => view('dashboard'))->middleware('auth');
});

// Semua pengguna yang sudah login
Route::middleware('auth')->group(function () {
    Route::get('/materi', fn () => 'Lihat Materi (semua role)');
});

// Contoh dari slide 14
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin', fn () => 'Halaman Admin');
});

Route::middleware(['auth', 'role:dosen'])->group(function () {
    Route::get('/dosen', fn () => 'Dashboard Dosen');
});

Route::middleware(['auth', 'role:mahasiswa'])->group(function () {
    Route::get('/mahasiswa', fn () => 'Dashboard Mahasiswa');
});

// Manajemen pengguna: hanya admin
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/pengguna', fn () => 'Manajemen Pengguna');
});

// Kelola materi dan nilai: admin dan dosen
Route::middleware(['auth', 'role:admin,dosen'])->group(function () {
    Route::get('/kelola-materi', fn () => 'Kelola Materi');
    Route::get('/kelola-nilai', fn () => 'Kelola Nilai');
});

// Lihat nilai pribadi: admin dan mahasiswa
Route::middleware(['auth', 'role:admin,mahasiswa'])->group(function () {
    Route::get('/nilai-saya', fn () => 'Nilai Saya');
});

require __DIR__.'/auth.php';
