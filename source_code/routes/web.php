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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('admin/home', [App\Http\Controllers\HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');
Route::group(array('middleware'=>'auth'),function()
{
	Route::get('/admin', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
	Route::get('/admin/products', [App\Http\Controllers\ProductController::class, 'index'])->name('products');
	Route::get('/admin/add_product', [App\Http\Controllers\ProductController::class, 'create'])->name('create_product');
	Route::post('/admin/save_product', [App\Http\Controllers\ProductController::class, 'store'])->name('save_product');
	Route::get('/admin/edit_product/{id}', [App\Http\Controllers\ProductController::class, 'edit'])->name('edit_product');
	Route::post('/admin/update_product/{id}', [App\Http\Controllers\ProductController::class, 'update'])->name('update_product');
	Route::get('/admin/delete_product/{id}', [App\Http\Controllers\ProductController::class, 'destroy'])->name('destroy_product');	
});
Auth::routes();
Route::get('/', [App\Http\Controllers\ProductController::class, 'product_list'])->name('product_list');
Route::get('/products', [App\Http\Controllers\ProductController::class, 'product_list'])->name('product_list');
Route::get('/products/buy/{id}', [App\Http\Controllers\CartController::class, 'buy_product'])->name('buy');
Route::get('/cart/list', [App\Http\Controllers\CartController::class, 'index'])->name('cart');