<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\StokPengeringan;
use App\Http\Controllers\AccAdminController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AccKaryawanController;
use App\Http\Controllers\AccPerusahaanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StokGabahController;
use App\Http\Controllers\StokPengeringanController;
use App\Http\Controllers\StokPenggilinganController;

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

Route::middleware(['guest'])->group(function () {
  Route::get('/login', [LoginController::class, 'login'])->name('login');
  Route::post('/login', [LoginController::class, 'authenticate']);
});

Route::middleware(['auth'])->group(function () {
  Route::get('/logout', [LoginController::class, 'logout']);
  Route::get('/dashboard', [DashboardController::class, 'index'])->name('db');

  Route::resource('/account/perusahaan', AccPerusahaanController::class)->except(['show', 'destroy']);

  Route::get('/account/admin', [AccAdminController::class, 'index'])->name('adminAcc');
  Route::get('/account/admin/create', [AccAdminController::class, 'createData'])->name('createAccount');
  Route::post('/account/admin/createData', [AccAdminController::class, 'createDataAcc'])->name('createDataAccount');
  Route::get('/account/admin/{id}/edit', [AccAdminController::class, 'edit'])->name('editAccount');
  Route::post('/account/admin/{id}/editData', [AccAdminController::class, 'editData'])->name('editDataAccount');
  Route::get('/account/admin/{id}/delete', [AccAdminController::class, 'delete'])->name('deleteAccount');

  Route::get('/account/karyawan', [AccKaryawanController::class, 'index'])->name('karyawanAcc');
  Route::get('/account/karyawan/create', [AccKaryawanController::class, 'createData'])->name('createKaryawan');
  Route::post('/account/karyawan/createData', [AccKaryawanController::class, 'createDataAcc'])->name('createDataKaryawan');
  Route::get('/account/karyawan/{id}/edit', [AccKaryawanController::class, 'edit'])->name('editKaryawan');
  Route::post('/account/karyawan/{id}/editData', [AccKaryawanController::class, 'editData'])->name('editDataKaryawan');
  Route::get('/account/karyawan/{id}/delete', [AccKaryawanController::class, 'delete'])->name('deleteKaryawan');

  Route::resource('/stock/gabah', StokGabahController::class)->except(['show', 'destroy']);

  Route::get('/stok/pengeringan', [StokPengeringanController::class, 'index'])->name('stok-pengeringan');
  Route::get('/stock/pengeringan/create', [StokPengeringanController::class, 'createData'])->name('createPengeringan');
  Route::post('/stock/pengeringan/createData', [StokPengeringanController::class, 'createDataPengeringan'])->name('createDataPengeringan');
  Route::get('/stock/pengeringan/{id}/delete', [StokPengeringanController::class, 'delete'])->name('deletePengeringan');
  Route::get('/stock/pengeringan/{id}/edit', [StokPengeringanController::class, 'edit'])->name('editPengeringan');
  Route::post('/stock/pengeringan/{id}/editData', [StokPengeringanController::class, 'editData'])->name('editDataPengeringan');

  Route::get('/stok/penggilingan', [StokPenggilinganController::class, 'index'])->name('stok-penggilingan');
  Route::get('/stock/penggilingan/create', [StokPenggilinganController::class, 'createData'])->name('createPenggilingan');
  Route::post('/stock/penggilingan/createData', [StokPenggilinganController::class, 'createDataPenggilingan'])->name('createDataPenggilingan');
  Route::get('/stock/penggilingan/{id}/delete', [StokPenggilinganController::class, 'delete'])->name('deletePenggilingan');
  Route::get('/stock/penggilingan/{id}/edit', [StokPenggilinganController::class, 'edit'])->name('editPenggilingan');
  Route::post('/stock/penggilingan/{id}/editData', [StokPenggilinganController::class, 'editData'])->name('editDataPenggilingan');

  Route::get('account/profile', [ProfileController::class, 'index'])->name('profile');
  Route::post('account/profile/edit', [ProfileController::class, 'update'])->name('profile.update');
});
