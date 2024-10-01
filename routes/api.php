<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PartRequestController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TestAuthController;
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






// Rutas API
Route::post('/login', [AuthController::class, 'login']);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::post('prCreate', [PartRequestController::class, 'prCreate']);
    Route::put('prUpdate/{id}', [PartRequestController::class, 'prUpdate']);
    Route::delete('prCancel/{id}', [PartRequestController::class, 'prCancel']);
    Route::put('updateCase', [PartRequestController::class, 'updateCase']);
    Route::post('acknowledge', [PartRequestController::class, 'acknowledge']);
});

// Rutas de prueba
Route::middleware('check.env')->group(function () {
    Route::post('test/login', [TestAuthController::class, 'login']);
});

/* if (app()->environment('testing')) {
    Route::post('test/login', [AuthController::class, 'login']);

    Route::middleware(['auth:sanctum', 'token.expiration'])->group(function () {
        Route::post('test/prCreate', [PartRequestController::class, 'prCreate']);
        Route::put('test/prUpdate/{id}', [PartRequestController::class, 'prUpdate']);
        Route::delete('test/prCancel/{id}', [PartRequestController::class, 'prCancel']);
        Route::put('test/updateCase', [PartRequestController::class, 'updateCase']);
        Route::post('test/acknowledge', [PartRequestController::class, 'acknowledge']);
    });
}
 */
