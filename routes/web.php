<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\MengajarController;
use App\Http\Controllers\NilaiController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::post('/login', [LoginController::class, 'index'])->name('login');
Route::post('/logout', [LogoutController::class, 'index'])->name('logout')->middleware('checkRole');

Route::get('/', function() {
    return view('welcome');
})->name('welcome');

Route::get('/home', function() {
    return view('home');
})->name('home');

Route::resource('/guru', GuruController::class)->middleware('checkRole');
Route::resource('/mapel', MapelController::class)->middleware('checkRole');
Route::resource('/kelas', KelasController::class)->middleware('checkRole');
Route::resource('/siswa', SiswaController::class)->middleware('checkRole');
Route::resource('/mengajar', MengajarController::class)->middleware('checkRole');
Route::get('/nilai/index', [ NilaiController::class, 'index'])->name('nilai.index')->middleware('checkRole');
Route::get('/nilai/{mengajar}/index', [ NilaiController::class, 'kelasIndex'])->name('nilai.kelas_index')->middleware('checkRole');
Route::get('/nilai/{mengajar}/create', [ NilaiController::class, 'kelasCreate'])->name('nilai.kelas_create')->middleware('checkRole');
Route::post('/nilai/{mengajar}/store', [ NilaiController::class, 'kelasStore'])->name('nilai.kelas_store')->middleware('checkRole');
Route::get('/nilai/{mengajar}/{nilai}/edit', [ NilaiController::class, 'kelasEdit'])->name('nilai.kelas_edit')->middleware('checkRole');
Route::put('/nilai/{mengajar}/{nilai}', [ NilaiController::class, 'kelasUpdate'])->name('nilai.kelas_update')->middleware('checkRole');
Route::get('/nilai/{mengajar}/{nilai}', [ NilaiController::class, 'kelasShow'])->name('nilai.kelas_show')->middleware('checkRole');
Route::delete('/nilai/{mengajar}/{nilai}', [ NilaiController::class, 'kelasDestroy'])->name('nilai.kelas_destroy')->middleware('checkRole');