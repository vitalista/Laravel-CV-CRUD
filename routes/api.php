<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::get('/tasks/{id}', [TaskController::class, 'get'])->where('id', '[1-9][0-9]*');