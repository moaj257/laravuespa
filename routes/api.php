<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\OAuthController;
use App\Http\Controllers\SecretController;
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

Route::group(['middleware' => ['auth:sanctum']], function() {
    Route::get('/me', function (Request $request) {
        return $request->user();
    });
    Route::post('/auth/logout', [AuthController::class, 'logout'])->name('auth.logout');
});

Route::post('/auth/login', [AuthController::class, 'login'])->name('auth.login');
Route::post('/auth/{driver}', [OAuthController::class, 'redirect'])->name('oauth.redirect');
Route::get('/auth/callback/{driver}', [OAuthController::class, 'handleCallback'])->name('oauth.callback');
// Route::get('/auth/secrets', [SecretController::class, 'index'])->name('secret.index');
