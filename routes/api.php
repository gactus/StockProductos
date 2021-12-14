<?php

use App\Http\Controllers\ProductApiController;
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

Route::put('products/byFilters', [\App\Http\Controllers\Api\ProductController::class, 'updateByFilters'])->name('product.update_by_filters');
Route::get('products/deleted',[\App\Http\Controllers\api\ProductController::class, 'deleted']);
Route::delete('products/{deleteType}/byFilters', [\App\Http\Controllers\Api\ProductController::class, 'deleteByFilters'])->name('product.delete_by_filters');
Route::delete('products/{product}/force',[\App\Http\Controllers\api\ProductController::class, 'forceDestroy'])->name('products.forceDestroy');
Route::resource('products', \App\Http\Controllers\Api\ProductController::class);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


