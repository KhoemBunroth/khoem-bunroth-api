<?php
use Illuminate\Support\Facades\Route;

Route::get('/invoice/lists', [App\Http\Controllers\InvoiceController::class, 'lists']);

Route::post('/invoice/create', [App\Http\Controllers\InvoiceController::class, 'create']);

Route::post('/invoice/update', [App\Http\Controllers\InvoiceController::class, 'update']);

Route::post('/invoice/delete', [App\Http\Controllers\InvoiceController::class, 'delete']);