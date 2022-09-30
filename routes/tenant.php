<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PasswordResetRequestController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\CityController;

/*
|--------------------------------------------------------------------------
| Tenant Routes
|--------------------------------------------------------------------------
|
| Here you can register the tenant routes for your application.
| These routes are loaded by the TenantRouteServiceProvider.
|
| Feel free to customize them however you want. Good luck!
|
*/

Route::middleware([
    'web',
    InitializeTenancyByDomain::class,
    PreventAccessFromCentralDomains::class,
])->group(function () {
    Route::get('/', function () {
        return 'This is your multi-tenant application. The id of the current tenant is ' . tenant('id');
    });

    Route::name('api.')->group(function () {
        Route::name('auth.')->prefix('auth')->group(function () {
            #region Authentication
            Route::controller(AuthController::class)->group(function () {
                Route::post('login', 'login')->name('login');
                Route::post('logout', 'logout')->name('logout');
            });
            #endregion
            #region PasswordReset
            Route::controller(PasswordResetRequestController::class)->group(function () {
                Route::post('forgot-password', 'sendEmail')->name('forgot-password');
            });
            #endregion
            #region ChangePassword
            Route::controller(ChangePasswordController::class)->group(function () {
            Route::post('reset-Password', 'passwordResetProcess')->name('reset-Password');
            });
            #endregion
        });
    });

    Route::middleware(['auth:api'])->group(function () {
        #region Cities
        Route::apiResource('cities', CityController::class)->only(['index']);
        Route::apiResource('cities', CityController::class)->only(['store']);
        #endregion
    });

});
