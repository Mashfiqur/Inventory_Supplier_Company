<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
//Products Routes
Route::middleware('api')->group(function () {
Route::get('/products', [App\Http\Controllers\ProductController::class, 'index']);
Route::group(['prefix' => 'product'], function () {
    Route::post('add', [App\Http\Controllers\ProductController::class, 'add']);
    Route::get('edit/{id}', [App\Http\Controllers\ProductController::class, 'edit']);
    Route::post('update/{id}', [App\Http\Controllers\ProductController::class, 'update']);
    Route::delete('delete/{id}', [App\Http\Controllers\ProductController::class, 'delete']);
});

});
