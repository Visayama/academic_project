<?php

use App\Http\Controllers\DashboardDosenController;
use App\Http\Controllers\DashboardJabatanController;
use App\Http\Controllers\DashboardMahasiswaController;
use App\Http\Controllers\DashboardMataKuliahController;
use App\Http\Controllers\DashboardProdiController;
use App\Http\Controllers\DashboardUserController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\LoginControler;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MahasiwaController;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\RegisterController;
use App\Models\DashboardUser;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function(){
    return view('home');
});

Route::get('/dashboard', function(){
    return view('dashboard.index');
})->middleware('auth');


Route::get('cetak-pdf', [DashboardMahasiswaController::class, 'cetakPdf']);
Route::get('cetak-pdf', [DashboardDosenController::class, 'cetakPdf']);
Route::get('cetak-pdf', [DashboardProdiController::class, 'cetakPdf']);

Route::get('/mahasiswa', [MahasiwaController::class, 'index']);
Route::resource('/dashboard-mahasiswa', DashboardMahasiswaController::class)->middleware(['admin','auth']);
Route::get('/dosen', [DosenController::class, 'index']);
Route::resource('/dashboard-dosen', DashboardDosenController::class)->middleware('auth');
Route::get('/prodi', [ProdiController::class, 'index']);
Route::resource('/dashboard-prodi', DashboardProdiController::class)->middleware('auth');
Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);
Route::get('/dashboard', function () {
    return view('dashboard.index');
});

Route::get('/register', [RegisterController::class, 'index']);
Route::resource('/register', RegisterController::class);

Route::get('/user', [DashboardUser::class, 'index']);
Route::resource('/dashboard-user', DashboardUserController::class)-> middleware('auth');

Route::resource('/dashboard-matakuliah', DashboardMataKuliahController::class)->middleware(['admin','auth']);
Route::resource('/dashboard-jabatan', DashboardJabatanController::class)->middleware(['admin','auth']);




