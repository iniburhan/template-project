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

    // Routes for Blog App
    Route::prefix('blog')->group(function () {
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
    });
    

    // Routes for Personal Finance App (PFA)
    Route::prefix('pfa')->group(function () {
        
        // route Income
        Route::get('/pfa-income', [App\Http\Controllers\PFA\Admin\MsIncomeController::class, 'index']);
        // Route::get('/pfa-income/create', [App\Http\Controllers\PFA\Admin\MsIncomeController::class, 'create']);
        Route::post('/pfa-income/store', [App\Http\Controllers\PFA\Admin\MsIncomeController::class, 'store']);
        // Route::get('/pfa-income/edit', [App\Http\Controllers\PFA\Admin\MsIncomeController::class, 'edit']);
        Route::post('/pfa-income/update', [App\Http\Controllers\PFA\Admin\MsIncomeController::class, 'update']);
        Route::post('/pfa-income/delete', [App\Http\Controllers\PFA\Admin\MsIncomeController::class, 'destroy']);
        Route::get('/pfa-income/trash', [App\Http\Controllers\PFA\Admin\MsIncomeController::class, 'trash']);
        Route::post('/pfa-income/restore', [App\Http\Controllers\PFA\Admin\MsIncomeController::class, 'restore']);

        // route Outcome
        Route::get('/pfa-outcome', [App\Http\Controllers\PFA\Admin\MsOutcomeController::class, 'index']);
        // Route::get('/pfa-outcome/create', [App\Http\Controllers\PFA\Admin\MsOutcomeController::class, 'create']);
        Route::post('/pfa-outcome/store', [App\Http\Controllers\PFA\Admin\MsOutcomeController::class, 'store']);
        // Route::get('/pfa-outcome/edit', [App\Http\Controllers\PFA\Admin\MsOutcomeController::class, 'edit']);
        Route::post('/pfa-outcome/update', [App\Http\Controllers\PFA\Admin\MsOutcomeController::class, 'update']);
        Route::post('/pfa-outcome/delete', [App\Http\Controllers\PFA\Admin\MsOutcomeController::class, 'destroy']);
        Route::get('/pfa-outcome/trash', [App\Http\Controllers\PFA\Admin\MsOutcomeController::class, 'trash']);
        Route::post('/pfa-outcome/restore', [App\Http\Controllers\PFA\Admin\MsOutcomeController::class, 'restore']);

        // route Transaction
        Route::get('/pfa-transaction', [App\Http\Controllers\PFA\Admin\TrxTransactionController::class, 'indexTrx']);
        // Route::get('/pfa-transaction/create', [App\Http\Controllers\PFA\Admin\TrxTransactionController::class, 'createTrx']);
        Route::post('/pfa-transaction/store', [App\Http\Controllers\PFA\Admin\TrxTransactionController::class, 'storeTrx']);
        // Route::get('/pfa-transaction/edit', [App\Http\Controllers\PFA\Admin\TrxTransactionController::class, 'editTrx']);
        Route::post('/pfa-transaction/update', [App\Http\Controllers\PFA\Admin\TrxTransactionController::class, 'updateTrx']);
        Route::post('/pfa-transaction/delete', [App\Http\Controllers\PFA\Admin\TrxTransactionController::class, 'destroyTrx']);
        Route::get('/pfa-transaction/trash', [App\Http\Controllers\PFA\Admin\TrxTransactionController::class, 'trashTrx']);
        Route::post('/pfa-transaction/restore', [App\Http\Controllers\PFA\Admin\TrxTransactionController::class, 'restoreTrx']);

        // route Transaction
        Route::get('/pfa-transaction-detail/{id}', [App\Http\Controllers\PFA\Admin\TrxTransactionController::class, 'indexTrxDetail']);
        // Route::get('/pfa-transaction-detail/create', [App\Http\Controllers\PFA\Admin\TrxTransactionController::class, 'create']);
        Route::post('/pfa-transaction-detail/store', [App\Http\Controllers\PFA\Admin\TrxTransactionController::class, 'store']);
        // Route::get('/pfa-transaction-detail/edit', [App\Http\Controllers\PFA\Admin\TrxTransactionController::class, 'edit']);
        Route::post('/pfa-transaction-detail/update', [App\Http\Controllers\PFA\Admin\TrxTransactionController::class, 'update']);
        Route::post('/pfa-transaction-detail/delete', [App\Http\Controllers\PFA\Admin\TrxTransactionController::class, 'destroy']);
        Route::get('/pfa-transaction-detail/trash', [App\Http\Controllers\PFA\Admin\TrxTransactionController::class, 'trash']);
        Route::post('/pfa-transaction-detail/restore', [App\Http\Controllers\PFA\Admin\TrxTransactionController::class, 'restore']);
    });
    

    Route::get('/trash', [App\Http\Controllers\HomeController::class, 'trash']);

});

