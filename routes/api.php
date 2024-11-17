<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TaskController;

Route::get('tasks', [TaskController::class, 'getAll']);
Route::get('tasks/{id}', [TaskController::class, 'get']);
Route::post('tasks', [TaskController::class, 'create']);
Route::put('tasks/{id}', [TaskController::class, 'update']);
Route::delete('tasks/{id}', [TaskController::class, 'delete']);