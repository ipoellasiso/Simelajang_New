<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\OpdController;
use App\Http\Controllers\TarikpajakController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('Halaman_Depan.index');
});

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/cek_login', [AuthController::class, 'cek_login']);
Route::get('/logout', [AuthController::class, 'logout']);

Route::get('/dashboard', [BerandaController::class, 'index'])->middleware('auth:web','checkRole:Admin,Verifikasi,User');

// ======= DATA TARIK PAJAK SIPD RI =======
Route::get('/tarikpajaksipdri', [TarikpajakController::class, 'index'])->middleware('auth:web','checkRole:Admin');
Route::get('/tarikpajaksipdrigu', [TarikpajakController::class, 'indexgu'])->middleware('auth:web','checkRole:Admin');
Route::post('/simpanjson', [TarikpajakController::class, 'save_json'])->middleware('auth:web','checkRole:Admin');
Route::post('/simpanjsongu', [TarikpajakController::class, 'save_jsongu'])->middleware('auth:web','checkRole:Admin');
// Route::get('/tampilpajakls', [UserController::class, 'index'])->middleware('auth:web','checkRole:Admin');

// ======= DATA USER =======
Route::get('/tampiluser', [UserController::class, 'index'])->middleware('auth:web','checkRole:Admin');
Route::post('/user/store', [UserController::class, 'store'])->middleware('auth:web','checkRole:Admin');
Route::get('/user/edit/{id}', [UserController::class, 'edit'])->middleware('auth:web','checkRole:Admin');
Route::delete('/user/destroy/{id}', [UserController::class, 'destroy'])->middleware('auth:web','checkRole:Admin');
Route::post('/user/aktif/{id}', [UserController::class, 'aktif'])->middleware('auth:web','checkRole:Admin');
Route::post('/user/nonaktif/{id}', [UserController::class, 'nonaktif'])->middleware('auth:web','checkRole:Admin');

// ======= DATA OPD =======
Route::get('/tampilopd', [OpdController::class, 'index'])->middleware('auth:web','checkRole:Admin');
Route::post('/opd/store', [OpdController::class, 'store'])->middleware('auth:web','checkRole:Admin');
Route::get('/opd/edit/{id}', [OpdController::class, 'edit'])->middleware('auth:web','checkRole:Admin');
Route::delete('/opd/destroy/{id}', [OpdController::class, 'destroy'])->middleware('auth:web','checkRole:Admin');
