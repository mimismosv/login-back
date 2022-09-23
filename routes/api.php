<?php

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CityController;
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
|  Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
|    return $request->user();
|  });
*/



Route::name('api.')->group(function () {
    Route::name('auth.')->prefix('auth')->group(function () {
        #region Authentication
        Route::controller(AuthController::class)->group(function () {
            Route::post('login', 'login')->name('login');
            Route::post('logout', 'logout')->name('logout');
            //Route::apiResource('cities', CityController::class)->only(['index']);
        });
        #endregion
    });
});


Route::middleware(['auth:api'])->group(function () {
    #region Cities
    Route::apiResource('cities', CityController::class)->only(['index']);
    #endregion
});
