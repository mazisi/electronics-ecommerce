<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Dashboard\ProductController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\DashboardController;


Route::get('/', [HomeController::class,'index'])->name('home');

Route::get('/login', [LoginController::class,'index'])->name('login');

//All  products for  frontend 
Route::get('/all-products', function () { return view('store.all-product');});

//frontend view product
Route::get('/store/product-detail', [ProductController::class,'productDetails']);

Route::get('/cart', function () { return view('store.cart');});

Route::get('/electronics', function () { return view('store.electronic');});

Route::group(['middleware' => 'auth'], function (){

        Route::get('/admin-dashboard', [DashboardController::class,'index'])->name('dashboard');
        Route::controller(CategoryController::class)->group(function () {
            Route::get('/categories', 'index')->name('categories');
            Route::get('categories/create', 'create')->name('category.create');
        });

        Route::controller(ProductController::class)->group(function () {
            Route::get('/admin-products', function () { return view('admin.products');});
            Route::get('/view-product', 'show')->name('product.show');
        });

        Route::controller(OrderController::class)->group(function () {
            Route::get('/orders', 'index')->name('orders');
            Route::get('/pending-orders', 'pendingOrders')->name('pending_orders');
            Route::get('/paid-orders', 'paidOrders')->name('paid_orders');
            Route::get('/declined-orders', 'declinedOrders')->name('declined_orders');
            Route::get('/view-order', 'viewOrder')->name('view_order');
        });


        Route::controller(BrandController::class)->group(function () {
            Route::get('/frontend-brands', 'frontEnd')->name('frontEndBrands');
            Route::get('/brands', 'index')->name('brands');
        });

        Route::get('/error', function () { return view('admin.error');});
        Route::get('/page-not-found', function () {return view('admin._404');});

        Route::get('/logout', function () { 
            Auth::logout();
            session()->invalidate();
            session()->regenerateToken();
            return to_route('home');
        });

});



