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




use App\Http\Controllers\PartRequestController;
use App\Http\Controllers\AuthController;

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
