<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PembeliController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TransaksiController;
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

Route::group(['middleware' => 'guest'], function () {
    Route::get('/', [AuthController::class, 'login'])->name('login');
    Route::post('/', [AuthController::class, 'authenticate']);
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/pembeli', [PembeliController::class, 'index'])->name('pembeli');
    Route::get('/pembeli/create', [PembeliController::class, 'create'])->name('pembeli.create');
    Route::post('/pembeli/create', [PembeliController::class, 'store']);
    Route::get('/pembeli/edit/{id}', [PembeliController::class, 'edit'])->name('pembeli.edit');
    Route::put('/pembeli/edit/{id}', [PembeliController::class, 'update']);
    Route::delete('/pembeli/delete/{id}', [PembeliController::class, 'destroy'])->name('pembeli.delete');

    Route::get('/obat', [ObatController::class, 'index'])->name('obat');
    Route::get('/obat/create', [ObatController::class, 'create'])->name('obat.create');
    Route::post('/obat/create', [ObatController::class, 'store']);
    Route::get('/obat/edit/{id}', [ObatController::class, 'edit'])->name('obat.edit');
    Route::put('/obat/edit/{id}', [ObatController::class, 'update']);
    Route::delete('/obat/delete/{id}', [ObatController::class, 'destroy'])->name('obat.delete');


    Route::get('/user', [UserController::class, 'index'])->name('user');
    Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/user/create', [UserController::class, 'store']);
    Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/user/edit/{id}', [UserController::class, 'update']);
    Route::delete('/user/delete/{id}', [UserController::class, 'destroy'])->name('user.delete');

    Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi');
    Route::get('/transaksi/create', [TransaksiController::class, 'create'])->name('transaksi.create');
    Route::post('/transaksi/create', [TransaksiController::class, 'store']); // Perbaikan URL
    Route::get('/transaksi/edit/{id}', [TransaksiController::class, 'edit'])->name('transaksi.edit');
    Route::put('/transaksi/edit/{id}', [TransaksiController::class, 'update']); // Perbaikan URL
    Route::delete('/transaksi/delete/{id}', [TransaksiController::class, 'destroy'])->name('transaksi.delete');

});
