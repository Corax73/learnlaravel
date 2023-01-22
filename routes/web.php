<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
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

/* Route::get('/', function () {
    return view('home.index');
}); */
Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('/1',[HomeController::class,'index1']);
Route::get('/category={cat}', [ProductController::class, 'showCategory'])->name('showCategory');
Route::get('/category={cat}/{product_id}',[ProductController::class,'show'])->name('showProduct');
Route::get('/cart', [CartController::class, 'index']);
Route::post('/add-to-cart', [CartController::class, 'addToCart'])->name('addToCart');