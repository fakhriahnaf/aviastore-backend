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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'App\Http\Controllers\DashboardController@index');
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

route::get('products/{id}/gallery' , 'App\Http\Controllers\ProductController@gallery')->name('products.gallery');

//Auth::routes(['register' => false]);

//Route::get('/products', 'App\Http\Controllers\ProductController@index');
Route::resource('products', 'App\Http\Controllers\ProductController');
Route::resource('product-galleries', 'App\Http\Controllers\ProductGalleryController');

Route::resource('transactions', 'App\Http\Controllers\TransactionController');

route::get('products/{id}/set-status' , 'App\Http\Controllers\TransactionController@setStatus')->name('transactions.status');