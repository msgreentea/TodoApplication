<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;
// use App\Http\Middleware\CheckContentMiddleware;


Route::get('/', [TodoController::class, 'index']);
Route::post('/todo/create', [TodoController::class, 'create']);
Route::get('/todo/update', [Todoontroller::class, 'edit']);
Route::post('/todo/update', [TodoController::class, 'update']);
Route::get('/todo/delete', [Todoontroller::class, 'delete']);
Route::post('/todo/delete', [TodoController::class, 'remove']);