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

    });

    //User Portal Routes
    Route::middleware([People::class])->group(function () {
        Route::get('/people', [App\Http\Controllers\PeopleController::class, 'index'])->name('people');
        
        // Vue Page Products
        Route::get('/people/products/{any?}', function() {
            return view('layouts.products');
          })->where('any', '.*')->name('people_products');
        


    });
});
