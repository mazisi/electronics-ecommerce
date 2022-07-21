<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Dashboard\ProductController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\DashboardController;

Route::get('/error', function () { return view('admin.error');});
Route::get('/page-not-found', function () {return view('admin._404');});

Route::get('/', function () { return view('welcome');});

Route::get('/login', [LoginController::class,'index'])->name('login');


Route::get('/admin-dashboard', [DashboardController::class,'index'])->name('dashboard');

Route::controller(CategoryController::class)->group(function () {
    Route::get('/categories', 'index')->name('categories');
    Route::get('categories/create', 'create')->name('category.create');
});

Route::controller(ProductController::class)->group(function () {
    Route::get('/all-products', 'index')->name('all_products');
    Route::get('/view-product', 'show')->name('product.show');
});
