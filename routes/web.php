<?php

use App\Http\Controllers\DivisiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginContoller;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\TindakanController;


//punya back office
Route::get('/Login', [LoginContoller::class,'login'])->name('login');
Route::post('/Login', [LoginContoller::class,'authenticate'])->name('login');
Route::get('/Register', [LoginContoller::class,'register'])->middleware('auth.basic')->name('register');
Route::post('/Register', [LoginContoller::class,'store'])->name('register');
Route::get('/Logout', [LoginContoller::class,'logout'])->name('logout');

Route::get('/BO', [HomeController::class,'index'])->middleware('auth')->name('dashboard');

Route::get('/BO/Pengaduan', [PengaduanController::class,'index'])->middleware('auth')->name("pengaduan");
Route::get('/BO/Pengaduan/Approve/{id}', [PengaduanController::class,'approveForm'])->middleware('auth')->name("pengaduan.approve.get");
Route::post('/BO/Pengaduan/Approve', [PengaduanController::class,'approve'])->middleware('auth')->name("pengaduan.approve.post");
Route::get('/BO/Pengaduan/Reject/{id}', [PengaduanController::class,'rejectForm'])->middleware('auth')->name("rejectpengaduan");
Route::post('/BO/Pengaduan/Reject', [PengaduanController::class,'reject'])->middleware('auth')->name("pengaduan.reject.post");
Route::get('/download/{pengaduan_id}', [PengaduanController::class, 'downloadImage'])->name('download.image');

Route::get('/BO/Tindakan/Approve/{id}', [TindakanController::class,'approveForm'])->middleware('auth')->name("tindakan.approve.form");
Route::post('/BO/Tindakan/Approve', [TindakanController::class,'approve'])->middleware('auth')->name("tindakan.approve.post");
Route::get('/BO/Tindakan/Reject/{id}', [TindakanController::class,'rejectForm'])->middleware('auth')->name("rejecttindakan");
Route::post('/BO/Tindakan/Reject', [TindakanController::class,'reject'])->middleware('auth')->name("tindakan.reject.post");
Route::get('/download/{tindakan_id}', [TindakanController::class, 'downloadImage'])->name('download.tindakan.image');

//punya masyarakat
Route::get('/', [HomeController::class,'indexMasyarakat'])->name("indexMasyarakat");
Route::get('/Pengaduan/Create', [PengaduanController::class,'create'])->name('createlaporan');
Route::post('/Pengaduan/Create', [PengaduanController::class,'store'])->name('createlaporan');

Route::get('/Pengaduan/PeriksaStatusPengaduan', [PengaduanController::class,'show']);
Route::post('/Pengaduan/PeriksaStatusPengaduan', [PengaduanController::class,'show']);

Route::get('/BO/Pengaduan/Detail/{pengaduan_id}', [PengaduanController::class,'detail'])->name("pengaduan.detail");
//common
Route::post('/getUserByDivision', DivisiController::class);

/*
    buat alur untuk masyarakat
    dengan route / di bagian dpean
    page nya ada 3 secara garis besar
    - dashboard
    - pengaduan
    - cek Pendaduan

    backend nya butuh
    create pengaduan
    select pengaduan


*/
