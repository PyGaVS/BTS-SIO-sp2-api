<?php

use App\Http\Controllers\v1\AuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::prefix('v1')->group(function () {
    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);
//    Route::post('operation,' ,[V1\OperationController::class, 'create'])->name('operation');

    Route::middleware('auth:sanctum')->group(function () {
        Route::apiResource('region', \App\Http\Controllers\v1\RegionController::class);
        Route::get('user/{user:id}', [\App\Http\Controllers\v1\UserController::class, 'show']);
    });
});

