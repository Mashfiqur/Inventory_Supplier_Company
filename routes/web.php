<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\People;
use App\Http\Middleware\Supplier;

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
Route::get('/denied',[App\Http\Controllers\HomeController::class, 'denied'])->name('denied');
Route::get('/mashfiq', [App\Http\Controllers\PeopleController::class, 'mas']);

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    // Supplier Portal Routes 
    Route::middleware([Supplier::class])->group(function () {
        Route::get('/supplier', [App\Http\Controllers\SupplierController::class, 'index'])->name('supplier');
        Route::get('/supplier/open-orders', [App\Http\Controllers\SupplierController::class, 'open_orders']);
        Route::get('/supplier/closed-orders', [App\Http\Controllers\SupplierController::class, 'closed_orders']);

    });

    //User Portal Routes
    Route::middleware([People::class])->group(function () {
        Route::get('/people', [App\Http\Controllers\PeopleController::class, 'index'])->name('people');
        
        // Vue Page Products. Try to do this through vue js.But Can't finish for the short time being.
        // Route::get('/people/products/{any?}', function() {
        //     return view('layouts.products');
        //   })->where('any', '.*')->name('people_products');

    //Products
        Route::get('/people/products', [App\Http\Controllers\ProductController::class, 'index'])->name('products');
        Route::post('product/create' , [App\Http\Controllers\ProductController::class, 'create']);
        Route::post('/product/delete', [App\Http\Controllers\ProductController::class, 'destroy']);
        Route::post('product/update' , [App\Http\Controllers\ProductController::class, 'update']);

        //Orders
        Route::get('/people/orders', [App\Http\Controllers\OrderController::class, 'index'])->name('orders');
        Route::get('/people/order/create', [App\Http\Controllers\OrderController::class, 'new']);
        Route::post('/order/create', [App\Http\Controllers\OrderController::class, 'store']);
        Route::post('/order/delete', [App\Http\Controllers\OrderController::class, 'destroy']);
        Route::post('/order/update' , [App\Http\Controllers\OrderController::class, 'update']);

    });
});
