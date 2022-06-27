<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BarangController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\SalesController;
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
    return view('index');
});
Route::get('/formulir', function () {
    return view('formulir');
});

// Route::resource('/barang', 'BarangController');

// Route::get('/barang', [BarangController::class, 'index']);
// Route::post('/barang', [BarangController::class, 'store']);

// Route::get('/customer', [CustomerController::class, 'index']);
// Route::post('/customer', [CustomerController::class, 'store']);

Route::resource('/barang', BarangController::class);
Route::resource('/customer', CustomerController::class);
Route::resource('/formulir', SalesController::class);
// Route::post('/formulir/tampilcustomer','SalesController@tampilcustomer');

Route::post('/formulir/tampilCustomer', [SalesController::class, 'tampilCustomer']);
Route::post('/formulir/tampilBarang', [SalesController::class, 'tampilBarang']);


// Route::get('/customer', function () {
//     return view('customer');
// });
