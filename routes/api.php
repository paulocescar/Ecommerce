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
Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login']);

Route::get('/sendmail', [App\Http\Controllers\SendMailController::class, 'sendMail']);

Route::middleware('auth:sanctum')->group(function () {
    Route::prefix('clients')->group(function () {
        Route::get('/', [App\Http\Controllers\ClientsController::class, 'get']);
        Route::post('', [App\Http\Controllers\ClientsController::class, 'store']);
        Route::get('/{id}', [App\Http\Controllers\ClientsController::class, 'getById']);
        Route::put('/{id}', [App\Http\Controllers\ClientsController::class, 'updateById']);
        Route::delete('/{id}', [App\Http\Controllers\ClientsController::class, 'deleteById']);
    });

    Route::prefix('bling')->group(function () {
        Route::get('/', [App\Http\Controllers\BiingController::class, 'get']);
        Route::post('', [App\Http\Controllers\BiingController::class, 'store']);
        Route::get('/user', [App\Http\Controllers\BiingController::class, 'getByUser']);
        Route::get('/{id}', [App\Http\Controllers\BiingController::class, 'getById']);
        Route::put('/{id}', [App\Http\Controllers\BiingController::class, 'updateById']);
        Route::delete('/{id}', [App\Http\Controllers\BiingController::class, 'deleteById']);
    });

    Route::prefix('categories')->group(function () {
        Route::get('/pages/{pages}', [App\Http\Controllers\CategoryProductsController::class, 'get']);
        Route::get('/', [App\Http\Controllers\CategoryProductsController::class, 'get']);
        Route::post('', [App\Http\Controllers\CategoryProductsController::class, 'store']);
        Route::get('/{id}', [App\Http\Controllers\CategoryProductsController::class, 'getById']);
        Route::put('/{id}', [App\Http\Controllers\CategoryProductsController::class, 'updateById']);
        Route::delete('/{id}', [App\Http\Controllers\CategoryProductsController::class, 'deleteById']);
    });

    Route::prefix('products')->group(function () {
        Route::get('/', [App\Http\Controllers\ProductsController::class, 'get']);
        Route::post('', [App\Http\Controllers\ProductsController::class, 'store']);
        Route::get('/{id}', [App\Http\Controllers\ProductsController::class, 'getById']);
        Route::get('/category/{id}', [App\Http\Controllers\ProductsController::class, 'getByCategory']);
        Route::put('/{id}', [App\Http\Controllers\ProductsController::class, 'updateById']);
        Route::delete('/{id}', [App\Http\Controllers\ProductsController::class, 'deleteById']);
    });

    Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
        return $request->user();
    });

});