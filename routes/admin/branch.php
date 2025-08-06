<?php
use Illuminate\Support\Facades\Route;

Route::get('/branch/lists', [App\Http\Controllers\BranchController::class, 'lists']);

Route::post('/branch/create', [App\Http\Controllers\BranchController::class, 'create']);

Route::post('/branch/update', [App\Http\Controllers\BranchController::class, 'update']);

Route::post('/branch/delete', [App\Http\Controllers\BranchController::class, 'delete']);
