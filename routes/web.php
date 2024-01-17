<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\SiswaController;

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
