<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\CvsController;
use App\Http\Controllers\AuthController;

// Public Routes (register and login should be publicly accessible)
Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

// Protected Routes (Requires authentication)
Route::middleware('auth:sanctum')->group(function () {
    Route::post('logout', [AuthController::class, 'logout']);
    Route::get('/check-session', [AuthController::class, 'checkSession']);

    // Applications Routes
    Route::get('/applications', [ApplicationController::class, 'index']);
    
    Route::post('/applications', [ApplicationController::class, 'store']);
    Route::put('/applications/{id}', [ApplicationController::class, 'update']);
    Route::get('/applications/{id}', [ApplicationController::class, 'show']);
    Route::delete('/applications/{id}', [ApplicationController::class, 'destroy']);

    // CV Routes
    Route::get('/cv', [CvsController::class, 'index']);
    Route::post('/cv', [CvsController::class, 'store']);
    Route::put('/cv/{id}', [CvsController::class, 'update']);
    Route::get('/cv/{id}', [CvsController::class, 'show']);
    Route::delete('/cv/{id}', [CvsController::class, 'destroy']);
});
