<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\HomeController;

// Route untuk menghapus semua laporan
Route::delete('/laporan/destroy-all', [LaporanController::class, 'destroyAll'])->name('laporan.destroyAll');

// Route untuk halaman welcome
Route::get('/', function () {
    return view('welcome');
});

// Route untuk autentikasi (login, register, dll)
Auth::routes();

// Route untuk halaman home
Route::get('/home', [HomeController::class, 'index'])->name('home');

// Group route yang memerlukan autentikasi
Route::group(['middleware' => 'auth'], function () {
    Route::get('/laporan/pdf', [LaporanController::class, 'exportPdf'])->name('laporan.pdf');
    Route::post('/laporan', [LaporanController::class, 'store'])->name('laporan.store');
    Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');
    Route::get('/laporan/create', [LaporanController::class, 'create'])->name('laporan.create');
    Route::get('/laporan/{laporan}/edit', [LaporanController::class, 'edit'])->name('laporan.edit');
    Route::put('/laporan/{laporan}', [LaporanController::class, 'update'])->name('laporan.update');
    Route::delete('/laporan/{laporan}', [LaporanController::class, 'destroy'])->name('laporan.destroy');
});
