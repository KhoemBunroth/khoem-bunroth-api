<?php
use Illuminate\Support\Facades\Route;

Route::get('/product/lists', [App\Http\Controllers\ProductController::class, 'lists']);


Route::post('/product/create', [App\Http\Controllers\ProductController::class, 'create']);

Route::post('/product/update', [App\Http\Controllers\ProductController::class, 'update']);

Route::post('/product/delete', [App\Http\Controllers\ProductController::class, 'delete']);
