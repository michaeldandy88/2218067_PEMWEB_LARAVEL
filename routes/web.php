<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\jenisrokokController;
use App\Http\Controllers\transaksirokokController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\shopController;

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
    return view('welcome');
});

Route::get('/shop', function () {
    return view('shop');
})->name('shop');

Route::resource('/jenisrokok', \App\Http\Controllers\jenisrokokController::class);
Route::resource('/transaksi', \App\Http\Controllers\transaksirokokController::class)->except(['show']);
Route::post('/Order', [ShopController::class, 'CreateTransaction'])->name('transaksirokok');
Route::get('/', [ShopController::class, 'index']);
Route::get('/transaksi/transaksi-cetak', [transaksirokokController::class, 'cetak'])->name('transaksi.cetak');