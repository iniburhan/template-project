<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\FileAttachmentController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/file_attachments', [App\Http\Controllers\FileAttachmentController::class, 'index']);
Route::post('/file_attachments', [App\Http\Controllers\FileAttachmentController::class, 'store']);
Route::get('/file_attachments/{id}', [App\Http\Controllers\FileAttachmentController::class, 'show']);
Route::post('/file_attachments/{id}', [App\Http\Controllers\FileAttachmentController::class, 'update']);
Route::delete('/file_attachments/{id}', [App\Http\Controllers\FileAttachmentController::class, 'destroy']);

// Route::middleware('auth:sanctum')->group(function () {
//     // Rute untuk mendapatkan informasi pengguna yang diotentikasi
//     Route::get('/user', function (Request $request) {
//         return $request->user();
//     });

//     // Rute-rute terkait file attachment yang dijaga oleh middleware auth:sanctum
//     Route::get('/file_attachments', [FileAttachmentController::class, 'index']);
//     Route::post('/file_attachments', [FileAttachmentController::class, 'store']);
//     Route::get('/file_attachments/{id}', [FileAttachmentController::class, 'show']);
//     Route::put('/file_attachments/{id}', [FileAttachmentController::class, 'update']);
//     Route::delete('/file_attachments/{id}', [FileAttachmentController::class, 'destroy']);
// });
