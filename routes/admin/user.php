<?php
use Illuminate\Support\Facades\Route;

Route::get('/user/lists', [App\Http\Controllers\UserController::class, 'lists']);

Route::post('/user/create', [App\Http\Controllers\UserController::class, 'create']);

Route::post('/user/update', [App\Http\Controllers\UserController::class, 'update']);

Route::post('/user/delete', [App\Http\Controllers\UserController::class, 'delete']);

