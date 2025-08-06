<?php
use Illuminate\Support\Facades\Route;

Route::get('/category/lists', [App\Http\Controllers\CategoryController::class, 'lists']);


Route::post('/category/create', [App\Http\Controllers\CategoryController::class, 'create']);

Route::post('/category/update', [App\Http\Controllers\CategoryController::class, 'update']);

Route::post('/category/delete', [App\Http\Controllers\CategoryController::class, 'delete']);