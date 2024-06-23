<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PengaduanController;

Route::get('/', [HomeController::class,'index'])->name('dashboard');
Route::get('/Pengaduan', [PengaduanController::class,'index'])->name("pengaduan");
Route::get('/Pengaduan/Create', [PengaduanController::class,'create']);
Route::get('/Pengaduan/Approve', [PengaduanController::class,'approveForm'])->name("pengaduan");
Route::get('/Pengaduan/Reject', [PengaduanController::class,'rejectForm'])->name("pengaduan");
