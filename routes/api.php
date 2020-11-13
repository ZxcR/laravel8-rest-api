<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\CategoryController;
use App\Http\Controllers\Api\V1\ProductController;
use App\Http\Controllers\Api\Auth\AuthController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('categories')->group(function () {

    Route::get('/{limit?}/{offset?}', [CategoryController::class, 'getCategories']);
    Route::get('/{category_id}/products/{limit?}/{offset?}', [ProductController::class, 'getProductsByCategory']);
    Route::post('/', [CategoryController::class, 'create']);
    Route::put('/{category_id}', [CategoryController::class, 'update']);
    Route::delete('/{category_id}', [CategoryController::class, 'delete']);
});

Route::prefix('products')->group(function () {
	Route::get('/{limit?}/{offset?}', [ProductController::class, 'getProducts']);
	Route::post('/', [ProductController::class, 'create']);
	Route::put('/{product_id}', [ProductController::class, 'update']);
	Route::delete('/{product_id}', [ProductController::class, 'delete']);
	
});



Route::group([
    'prefix' => 'auth'

], function () {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);
});

