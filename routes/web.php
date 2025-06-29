<?php

use App\Http\Controllers\AksesController;
use App\Http\Controllers\AkunController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DbadminController;
use App\Http\Controllers\DbuserController;
use App\Http\Controllers\ReservasiController;
use App\Http\Controllers\RiwayatController;
use App\Http\Controllers\RoomController;
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
    return view('layout.master');
});


Route::middleware('guest')->group(function () {
    Route::get('/log', [AuthController::class, 'login'])->name('login');
    Route::post('/log', [AuthController::class, 'loginAction'])->name('login.action');
    Route::get('/login-admin', [AuthController::class, 'showAdminLoginForm'])->name('auth.loginadmin');
    Route::post('/login-admin', [AuthController::class, 'loginAdmin'])->name('login.admin');
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'registerSave'])->name('register.save');
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::resource('dbuser', DbuserController::class);
    Route::resource('dbadmin', DbadminController::class);
    Route::resource('reservasi', ReservasiController::class);
    Route::resource('room', RoomController::class);
    Route::resource('riwayat', RiwayatController::class);
    Route::resource('akun', AkunController::class);
    Route::post('/reservasi/{id}/upload-bukti', [ReservasiController::class, 'uploadBukti'])->name('reservasi.uploadBukti');
    Route::post('/reservasi/{id}/confirm', [ReservasiController::class, 'confirm'])->name('reservasi.confirm');
    Route::post('/reservasi/{id}/checkin', [ReservasiController::class, 'checkin'])->name('reservasi.checkin');
    Route::post('/reservasi/{id}/checkout', [ReservasiController::class, 'checkout'])->name('reservasi.checkout');
    Route::get('/reservasi/{id}/downloadReceipt', [ReservasiController::class, 'downloadReceipt'])->name('reservasi.downloadReceipt');
    Route::get('/riwayat-print', [RiwayatController::class, 'print']);

});
