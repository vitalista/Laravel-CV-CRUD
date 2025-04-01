<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\CvsController;

Route::get('/applications', [ ApplicationController::class, 'index']);
Route::post('/applications', [ApplicationController::class, 'store']);
Route::put('/applications/{id}', [ApplicationController::class, 'update']);
Route::get('/applications/{id}', [ApplicationController::class, 'show']);
Route::delete('/applications/{id}', [ApplicationController::class, 'destroy']);

Route::get('/cv', [ CvsController::class, 'index']);
Route::post('/cv', [CvsController::class, 'store']);
Route::put('/cv/{id}', [CvsController::class, 'update']);
Route::get('/cv/{id}', [CvsController::class, 'show']);
Route::delete('/cv/{id}', [CvsController::class, 'destroy']);