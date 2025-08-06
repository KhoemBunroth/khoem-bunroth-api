<?php
use Illuminate\Support\Facades\Route;

Route::get('/invoiceitem/lists', [App\Http\Controllers\InvoiceitemController::class, 'lists']);

Route::post('/invoiceitem/create', [App\Http\Controllers\InvoiceitemController::class, 'create']);

Route::post('/invoiceitem/update', [App\Http\Controllers\InvoiceitemController::class, 'update']);

Route::post('/invoiceitem/delete', [App\Http\Controllers\InvoiceitemController::class, 'delete']);