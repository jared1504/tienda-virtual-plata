<?php

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




Route::resource('user', App\Http\Controllers\UserController::class);

Route::resource('sale', App\Http\Controllers\SaleController::class);
Route::get('salesfilter', [App\Http\Controllers\SaleController::class, 'filter'])->name('sale.filter');
Route::post('salesfilterpost', [App\Http\Controllers\SaleController::class, 'filterpost'])->name('sale.filterpost');

Route::resource('product', App\Http\Controllers\ProductController::class);

Route::resource('category', App\Http\Controllers\CategoryController::class);
