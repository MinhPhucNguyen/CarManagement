<?php

use App\Http\Controllers\Api\version1\CarController;
use App\Http\Controllers\Api\version2\CarController as Version2CarController;
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

Route::prefix('version1')->group(function () {
    Route::apiResource('cars', CarController::class)->only(['index', 'show', 'store', 'update', 'destroy']);
});

Route::prefix('version2')->group(function () {
    Route::apiResource('cars', Version2CarController::class)->only(['show']);
});
