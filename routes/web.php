<?php

use App\Http\Controllers\AccAdminController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

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

Route::get('/', [LoginController::class, 'logout']);

Route::get('/login', [LoginController::class, 'login']);
Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('/logout', [LoginController::class, 'logout']);

Route::get('/register/admin', [RegisterController::class, 'index']);
Route::post('/register/admin', [RegisterController::class, 'index']);

Route::get('/dashboard', [DashboardController::class, 'index']);
Route::get('/acc-admin', [AccAdminController::class, 'index']);
Route::post('/acc-admin/{id}', [AccAdminController::class], 'index');

Route::middleware(['auth'])->group(function () {
    
});