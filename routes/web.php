<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
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
Route::get('/',[HomeController::class,'index']);
Route::get('/1',[HomeController::class,'index1']);
Route::get('/{cat}', [ProductController::class, 'showCategory'])->name('showCategory');
Route::get('/{cat}/{product_id}',[ProductController::class,'show'])->name('showProduct');
//Route::get('/categories.html',[HomeController::class,'category']);
//Route::get('/', [\App\Http\Controllers\MainController::class, 'index']);