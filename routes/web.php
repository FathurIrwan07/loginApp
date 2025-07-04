<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\AdminPengaduansController;
use App\Http\Controllers\UserPengaduansController;

// ==========================
// HOME / WELCOME
// ==========================
Route::get('/', function () {
    return view('welcome');
});

// ==========================
// REDIRECT SETELAH LOGIN
// ==========================
Route::get('/dashboard', function () {
    if (auth()->user()->isAdmin()) {
        return redirect()->route('admin.dashboard');
    }
    return redirect()->route('user.dashboard');
})->middleware(['auth'])->name('dashboard');

// ==========================
// ADMIN ROUTES
// ==========================
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/users', [AdminController::class, 'users'])->name('users');
    Route::get('/settings', [AdminController::class, 'settings'])->name('settings');

    // CRUD untuk pengaduan
    Route::resource('pengaduans', AdminPengaduansController::class);

    // Konfirmasi status pengaduan (terima/tolak)
    Route::put('/pengaduans/{id}/konfirmasi', [AdminPengaduansController::class, 'konfirmasi'])->name('pengaduans.konfirmasi');

});

// ==========================
// USER ROUTES
// ==========================
Route::middleware(['auth', 'user'])->prefix('user')->name('user.')->group(function () {
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
    Route::get('/profile', [UserController::class, 'profile'])->name('profile');
});

// ==========================
// PROFILE (Umum)
// ==========================
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// ==========================
// PENGADUAN (User)
// ==========================
Route::middleware('auth')->prefix('pengaduan')->name('pengaduan.')->group(function () {
    Route::get('/create', [PengaduanController::class, 'create'])->name('create');
    Route::post('/', [PengaduanController::class, 'store'])->name('store');
    Route::get('/history', [PengaduanController::class, 'history'])->name('history');
    Route::get('/status', [PengaduanController::class, 'status'])->name('status');
});

// ==========================
// AUTH ROUTES
// ==========================
require __DIR__ . '/auth.php';
