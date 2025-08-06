<?php
use Illuminate\Support\Facades\Route;

Route::get('/position/lists', [App\Http\Controllers\PositionController::class, 'lists']);

Route::post('/position/create', [App\Http\Controllers\PositionController::class, 'create']);

Route::post('/position/update', [App\Http\Controllers\PositionController::class, 'update']);

Route::post('/position/delete', [App\Http\Controllers\PositionController::class, 'delete']);
