<?php

use App\Http\Controllers\AdoptPetController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\FoundPetController;
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

// Публичные маршруты
Route::post('/login', [AuthController::class, 'login']);
Route::post('/forgot-password', [AuthController::class, 'forgotPassword']);
Route::post('/reset-password', [AuthController::class, 'resetPassword']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/user', [AuthController::class, 'user']);
});


//// Found pets routes
Route::apiResource('found-pets', FoundPetController::class);

// Get recent pets
Route::get('recent-pets', [FoundPetController::class, 'getRecentPets']);

// Adopt pets routes
Route::apiResource('adopt-pets', AdoptPetController::class);

// Adopt get recent pets
Route::get('adopt-recent-pets', [AdoptPetController::class, 'getRecentPets']);
