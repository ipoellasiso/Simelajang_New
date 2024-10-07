<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BerandaController;
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

Route::get('/dashboard', [BerandaController::class, 'index']);
Route::get('/login', [AuthController::class, 'index']);

// ======= DATA USER =======
Route::get('/tampiluser', [UserController::class, 'index']);
Route::post('/user/store', [UserController::class, 'store']);
Route::get('/user/edit/{id}', [UserController::class, 'edit']);
Route::delete('/user/destroy/{id}', [UserController::class, 'destroy']);
