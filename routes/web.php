<?php

use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\TransaksiProsesController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('login', [CustomAuthController::class, 'index'])->name('login');
Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom'); 
Route::get('registration', [CustomAuthController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom'); 
Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');
Route::middleware('auth')->group(function () { 
    Route::get('/transaksi/get_harga', [TransaksiProsesController::class, 'getHarga']);
    Route::get('/transaksi/get_detail', [TransaksiProsesController::class, 'getDetail']);
    Route::get('/pelanggan/fetch_data', [PelangganController::class, 'fetch_data']);
    Route::get('/users/fetch_data', [UsersController::class, 'fetch_data']);
    Route::get('/menu/fetch_data', [MenuController::class, 'fetch_data']);
    Route::get('/laporan/pdf', [TransaksiController::class, 'createPDF']);
    Route::get('/laporan/month', [TransaksiController::class, 'createPDFMonth']);
    Route::delete('/pelanggan/delete/{id}', [PelangganController::class, 'destroy']);
    Route::get('/transaksi/invoice/{pembayaran}', [TransaksiProsesController::class, 'invoice']);
    Route::resource('/dashboard', DashboardController::class);
    Route::resource('/menu', MenuController::class);
    Route::resource('/transaksi', TransaksiProsesController::class);
    Route::resource('/users', UsersController::class);
    Route::resource('/pelanggan', PelangganController::class);
    Route::resource('/laporan', TransaksiController::class);
    Route::delete('/users/delete/{id}', [UsersController::class, 'destroy']);
    Route::delete('/pelanggan/delete/{id}', [PelangganController::class, 'destroy']);
    Route::post('/transaksi/simpanDetail', [TransaksiProsesController::class, 'storeDetail'])->name('transaksi.detail');
    Route::post('/transaksi/updateTransaksi', [TransaksiProsesController::class, 'updateTransaksi'])->name('transaksi.update');
});



