<?php

use App\Http\Controllers\Api\SchoolDataController;
use Illuminate\Support\Facades\Route;

Route::get('/', [SchoolDataController::class, 'index']);
Route::get('/guru', [SchoolDataController::class, 'guru']);
Route::post('/guru', [SchoolDataController::class, 'storeGuru']);
Route::post('/guru/store', [SchoolDataController::class, 'storeGuru']);
Route::get('/mapel', [SchoolDataController::class, 'mapel']);
Route::get('/jadwal', [SchoolDataController::class, 'jadwal']);
Route::get('/agenda', [SchoolDataController::class, 'agenda']);
Route::get('/pengumuman', [SchoolDataController::class, 'pengumuman']);