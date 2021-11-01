<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\ProductController;

use Illuminate\Support\Facades\Route;

Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

// menu routs
Route::resource('/categories', CategoryController::class)->except(['show']);
Route::resource('/products', ProductController::class)->except(['show']);
