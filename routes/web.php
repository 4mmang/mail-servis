<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DaftarPerbaikanController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GenerateController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'showFormLogin'])->name('login')->middleware('guest');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/login/validation', [AuthController::class, 'login'])->name('login.validation');

Route::get('admin/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');
Route::resource('admin/daftar-perbaikan', DaftarPerbaikanController::class)->middleware('auth');
Route::get('/nota/pdf/{id}', [GenerateController::class, 'generatePDF'])->name('nota.pdf')->middleware('auth');