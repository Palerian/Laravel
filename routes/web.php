<?php

use App\Http\Controllers\GuruController;
use App\Http\Controllers\Admin\AnalisisNilaiController;
use App\Http\Controllers\Admin\GuruController as AdminGuruController;
use App\Http\Controllers\Admin\JadwalController;
use App\Http\Controllers\Admin\MapelController;
use App\Http\Controllers\Admin\NilaiController;
use App\Http\Controllers\Admin\PenggunaController;
use App\Http\Controllers\Admin\SiswaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Guru\DashboardController as GuruDashboardController;
use App\Http\Controllers\Guru\NilaiController as GuruNilaiController;
use App\Http\Controllers\Murid\DashboardController as MuridDashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProfileShowController;
use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;

// --- PUBLIC ROUTES (SMK Miyamasuzaka Girls Academy / 宮益坂女子学園) ---
Route::get('/', [PublicController::class, 'index'])->name('home');
Route::get('/profil', [PublicController::class, 'profil'])->name('public.profil');
Route::get('/jurusan', [PublicController::class, 'jurusan'])->name('public.jurusan');
Route::get('/guru', [PublicController::class, 'guru'])->name('public.guru');
Route::get('/kontak', [PublicController::class, 'kontak'])->name('public.kontak');

Route::get('/guru' ,[GuruController::class, 'index']); 
Route::get('/guru/create' ,[GuruController::class, 'create']); 
Route::get('/guru/edit/{id}' ,[GuruController::class, 'edit']); 
Route::post('/guru/store' ,[GuruController::class, 'store']); 
Route::get('/guru/{id}' ,[GuruController::class, 'show']); 
Route::put('/guru/{id}' ,[GuruController::class, 'update']); 
Route::delete('/guru/{id}' ,[GuruController::class, 'destroy']); 
Route::get('/api/guru' ,[GuruController::class, 'api']); 
Route::get('/simpan' ,[GuruController::class, 'simpan']);

Route::get('/dashboard', DashboardController::class)
    ->middleware(['auth'])
    ->name('dashboard');

// --- AUTHENTICATED USERS ROUTES ---
Route::middleware('auth')->group(function () {
    Route::get('/profile/{id}', [ProfileShowController::class, 'show'])->name('profile.show');
    Route::put('/profile/{id}', [ProfileShowController::class, 'update'])->name('profile.update.user');

    Route::get('/account/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/account/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/account/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Admin & Staff & Guru Shared Management Group
    Route::prefix('admin')->name('admin.')->group(function () {
        
        // 1. Modul Terkait Siswa / Kesiswaan
        Route::middleware('role:admin,staff,guru')->group(function () {
            Route::resource('siswa', SiswaController::class);
        });

        // 2. Modul Tingkat Administrator
        Route::middleware('role:admin_level')->group(function () {
            Route::resource('guru', GuruController::class);
            Route::resource('mapel', MapelController::class);
            Route::resource('jadwal', JadwalController::class);
            Route::get('nilai/analisis', [AnalisisNilaiController::class, 'index'])->name('nilai.analisis');
            Route::get('nilai/export', [AnalisisNilaiController::class, 'exportCsv'])->name('nilai.export');
            Route::resource('nilai', NilaiController::class);

            Route::get('pengguna/guru', [PenggunaController::class, 'guru'])->name('pengguna.guru');
            Route::get('pengguna/murid', [PenggunaController::class, 'murid'])->name('pengguna.murid');
        });
    });

    // Guru Group
    Route::prefix('guru')->name('guru.')->middleware('role:guru')->group(function () {
        Route::get('/dashboard', GuruDashboardController::class)->name('dashboard');
        Route::resource('nilai', GuruNilaiController::class)->except(['show']);
    });

    // Murid Group
    Route::prefix('murid')->name('murid.')->middleware('role:murid')->group(function () {
        Route::get('/dashboard', MuridDashboardController::class)->name('dashboard');
    });
});

require __DIR__.'/auth.php';
