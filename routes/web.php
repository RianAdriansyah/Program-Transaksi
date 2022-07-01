<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BarangController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\SalesDetailController;

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


Route::resource('/barang', BarangController::class);
Route::resource('/customer', CustomerController::class);
Route::resource('/formulir', SalesController::class);
Route::resource('/', SalesDetailController::class);


Route::post('/formulir/tampilCustomer', [SalesController::class, 'tampilCustomer']);
Route::post('/formulir/tampilBarang', [SalesController::class, 'tampilBarang']);
Route::post('/formulir/createBackup', [SalesController::class, 'createBackup']);
Route::put('/formulir/updateBackup/{id}', [SalesController::class, 'updateBackup']);
Route::delete('/formulir/deletebackup/{id}', [SalesController::class, 'deletebackup']);


