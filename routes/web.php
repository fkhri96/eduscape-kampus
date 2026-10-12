<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\UserController;

// ========================================
// HALAMAN UTAMA
// ========================================
Route::get('/', function () {
    return redirect()->route(
        auth()->check() ? 'dashboard' : 'login'
    );
});

// ========================================
// LOGIN
// ========================================
Route::middleware('guest')->group(function () {

    Route::get('/login', [AuthController::class, 'showLogin'])
        ->name('login');

    Route::post('/login', [AuthController::class, 'login'])
        ->name('login.process');

});

// ========================================
// DASHBOARD DAN LOGOUT
// ========================================
Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('logout');

});

// ========================================
// MENU ADMIN
// ========================================
Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        // Menampilkan daftar pengguna
        Route::get('/users', [UserController::class, 'index'])
            ->name('users.index');

        // Form tambah pengguna
        Route::get('/users/create', [UserController::class, 'create'])
            ->name('users.create');

        // Menyimpan pengguna baru
        Route::post('/users', [UserController::class, 'store'])
            ->name('users.store');

Route::get('/users/{user}/edit', [UserController::class, 'edit'])
    ->name('users.edit');

Route::put('/users/{user}', [UserController::class, 'update'])
    ->name('users.update');

        // Menghapus pengguna
        Route::delete('/users/{user}', [UserController::class, 'destroy'])
            ->name('users.destroy');

    });

// ========================================
// MENU DOSEN
// ========================================
Route::middleware(['auth', 'role:dosen'])
    ->prefix('dosen')
    ->name('dosen.')
    ->group(function () {

        // Route dosen ditambahkan nanti.

    });

// ========================================
// MENU MAHASISWA
// ========================================
Route::middleware(['auth', 'role:mahasiswa'])
    ->prefix('mahasiswa')
    ->name('mahasiswa.')
    ->group(function () {

        // Route mahasiswa ditambahkan nanti.

    });