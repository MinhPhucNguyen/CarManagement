<?php

use App\Http\Controllers\Api\v1\CarController;
use App\Http\Controllers\Api\v2\CarController as Version2CarController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->group(function () {
    Route::apiResource('cars', CarController::class)->only(['index', 'show', 'store', 'update', 'destroy']);
});

Route::prefix('v2')->group(function () {
    Route::get('cars', [Version2CarController::class, 'index']);
    Route::get('cars/randomCars', [Version2CarController::class, 'getRandomCars']);
    Route::get('cars/{id}', [Version2CarController::class, 'show']);
});
