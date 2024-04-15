<?php

use App\Http\Controllers\v1\AuthController;
use App\Http\Controllers\v1;
use Illuminate\Http\Request;
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
        Route::apiResource('region', v1\RegionController::class);
        Route::get('user', [v1\UserController::class, 'account']);
        Route::get('users/{search?}', [v1\UserController::class, 'index']);
        Route::get('user/{user:id}', [v1\UserController::class, 'show']);
        Route::apiResource('certification_request', v1\CertificationRequestController::class);
        Route::apiResource('chat', v1\ChatController::class);
        Route::apiResource('message', v1\MessageController::class);
        Route::apiResource('sanction', v1\SanctionController::class);      //|[ŧ]
        Route::apiResource('report', v1\ReportController::class);
    });
});

