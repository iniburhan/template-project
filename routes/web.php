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

Auth::routes();

Route::group(['middleware' => ['auth']], function () {

    // route home
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);

    // Blog
    // route Artikel
    Route::get('/artikel', [App\Http\Controllers\Blog\Admin\MsArtikelController::class, 'index']);
    Route::get('/artikel/create', [App\Http\Controllers\Blog\Admin\MsArtikelController::class, 'create']);
    Route::post('/artikel/store', [App\Http\Controllers\Blog\Admin\MsArtikelController::class, 'store']);
    Route::get('/artikel/edit/{id}', [App\Http\Controllers\Blog\Admin\MsArtikelController::class, 'edit']);
    Route::post('/artikel/update/{id}', [App\Http\Controllers\Blog\Admin\MsArtikelController::class, 'update']);
    Route::post('/artikel/delete', [App\Http\Controllers\Blog\Admin\MsArtikelController::class, 'destroy']);
    Route::get('/artikel/trash', [App\Http\Controllers\Blog\Admin\MsArtikelController::class, 'trash']);
    Route::post('/artikel/restore', [App\Http\Controllers\Blog\Admin\MsArtikelController::class, 'restore']);
    // Route::get('/products/get-all-product', [App\Http\Controllers\POS\Admin\MsProductsController::class, 'getAllProduct']);
    // Route::get('/products/get-product-show', [App\Http\Controllers\POS\Admin\MsProductsController::class, 'getProductShow']);


    // route Kategori
    Route::get('/kategori', [App\Http\Controllers\Blog\Admin\MsKategoriController::class, 'index']);
    Route::post('/kategori/store', [App\Http\Controllers\Blog\Admin\MsKategoriController::class, 'store']);
    Route::post('/kategori/update', [App\Http\Controllers\Blog\Admin\MsKategoriController::class, 'update']);
    Route::post('/kategori/delete', [App\Http\Controllers\Blog\Admin\MsKategoriController::class, 'destroy']);
    Route::get('/kategori/trash', [App\Http\Controllers\Blog\Admin\MsKategoriController::class, 'trash']);
    Route::post('/kategori/restore', [App\Http\Controllers\Blog\Admin\MsKategoriController::class, 'restore']);

    Route::get('/trash', [App\Http\Controllers\HomeController::class, 'trash']);

});

