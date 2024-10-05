<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'changeLangMiddleware'], function () {


    Route::get('/change/lnag/{lang_name}', [DashboardController::class, 'changeLang'])->name('change.lang');

    // Route::group(['prefix'=>'admin'],function(){

    Route::get('/login', [AuthenticationController::class, 'loginForm'])->name('login');
    Route::post('do-login', [AuthenticationController::class, 'doLogin'])->name('do.login');

    Route::group(['middleware' => 'auth'], function () {
        Route::get('logout', [AuthenticationController::class, 'logout'])->name('logout');
        Route::get('/', [DashboardController::class, 'dashboard'])->name('dashboard');
        Route::get('/category-list', [CategoryController::class, 'list'])->name('category.list');
        Route::get('/category-form', [CategoryController::class, 'form'])->name('category.form');
        Route::post('/category-store', [CategoryController::class, 'store'])->name('category.store');
        Route::get('/product-list', [ProductController::class, 'list'])->name('product.list');
        Route::get('/product-form', [ProductController::class, 'form'])->name('product.form');
        Route::post('/product-store', [ProductController::class, 'store'])->name('product.store');
        Route::get('/product/delete/{p_id}', [ProductController::class, 'delete'])->name('product.delete');
        Route::get('/product/view/{p_id}', [ProductController::class, 'viewProduct'])->name('product.view');
        Route::get('/product/edit/{p_id}', [ProductController::class, 'edit'])->name('product.edit');
        Route::post('/product/update/{p_id}', [ProductController::class, 'update'])->name('product.update');
        Route::get('/customer-list', [CustomerController::class, 'customerList'])->name('customer.list');
        Route::get('/order-list', [OrderController::class, 'orderList'])->name('admin.order');
    });
});
// });
