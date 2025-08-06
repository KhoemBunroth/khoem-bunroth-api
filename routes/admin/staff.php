<?php
use Illuminate\Support\Facades\Route;

Route::get('/staff/lists', [App\Http\Controllers\StaffController::class, 'lists']);


Route::post('/staff/create', [App\Http\Controllers\StaffController::class, 'create']);

Route::post('/staff/update', [App\Http\Controllers\StaffController::class, 'update']);

Route::post('/staff/delete', [App\Http\Controllers\StaffController::class, 'delete']);