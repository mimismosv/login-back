<?php

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PasswordResetRequestController;
use App\Http\Controllers\ChangePasswordController;
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



/* Creating a route group with the prefix `api` and then another route group with the prefix `auth` and
then it is creating a route group with the controller `AuthController` and then it is creating a
route with the name `login` and the method `login` and then it is creating a route with the name
`logout` and the method `logout`. */
Route::name('api.')->group(function () {
    Route::name('auth.')->prefix('auth')->group(function () {
        #region Authentication
        Route::controller(AuthController::class)->group(function () {
            Route::post('login', 'login')->name('login');
            Route::post('logout', 'logout')->name('logout');
        });
        #endregion

/* Creating a route group with the controller `PasswordResetRequestController` and then it is creating
a route with the name `forgot-password` and the method `sendEmail`. */
        #region PasswordReset
        Route::controller(PasswordResetRequestController::class)->group(function () {
            Route::post('forgot-password', 'sendEmail')->name('forgot-password');
        });
        #endregion

/* Creating a route group with the controller `ChangePasswordController` and then it is creating
a route with the name `reset-Password` and the method `passwordResetProcess`. */
        #region ChangePassword
        Route::controller(ChangePasswordController::class)->group(function () {
        Route::post('reset-Password', 'passwordResetProcess')->name('reset-Password');
        });
        #endregion

    });
});


/* Creating a route group with the middleware `auth:api` and then it is creating a route
with the name `cities` and the method `index` and then it is creating a route with the name `cities`

and the method `store` and then it is creating a route with the name `cities` and the method `show`
and then it is creating a route with the name `cities` and the method `update` and then it is
creating a route with the name `cities` and the method `destroy`. */
Route::middleware(['auth:api'])->group(function () {
    #region Cities
    Route::apiResource('cities', CityController::class)->only(['index']);
    #endregion
});
