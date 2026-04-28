<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/products', [ProductController::class, 'index']);
Route::get('/insert', [ProductController::class, 'insert'])->name('insert');
Route::get('/update', [ProductController::class, 'update'])->name('update');
Route::get('/delete', [ProductController::class, 'delete'])->name('delete');