<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\jenisrokokController;

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