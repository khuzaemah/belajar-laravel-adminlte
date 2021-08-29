<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GuestController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index']);

Route::get('/mahasiswa', [MahasiswaController::class, 'index']);

// Route::get('/home/about/{id}', [HomeController::class, 'about']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['middleware' => 'admin'], function () {
    Route::get('/dosen', [DosenController::class, 'index'])->name('dosen');
    Route::get('/dosen/detail/{id_dosen}', [DosenController::class, 'detail']);
    Route::get('/dosen/add/', [DosenController::class, 'add']);
    Route::post('/dosen/insert', [DosenController::class, 'insert']);
    Route::get('/dosen/edit/{id_dosen}', [DosenController::class, 'edit']);
    Route::post('/dosen/update/{id_dosen}', [DosenController::class, 'update']);
    Route::get('/dosen/delete/{id_dosen}', [DosenController::class, 'delete']);

    Route::get('/mahasiswa', [MahasiswaController::class, 'index']);
    Route::get('/mahasiswa/add/', [MahasiswaController::class, 'add']);
    Route::get('/mahasiswa/print', [MahasiswaController::class, 'print']);
    Route::get('/mahasiswa/printpdf', [MahasiswaController::class, 'printpdf']);
});


Route::group(['middleware' => 'user'], function () {
    //user
    Route::get('/user', [UserController::class, 'index'])->name('user');
});


Route::group(['middleware' => 'guest'], function () {
    //guest
    Route::get('/guest', [GuestController::class, 'index'])->name('guest');
});
