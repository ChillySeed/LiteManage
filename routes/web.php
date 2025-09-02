<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\SaleItemController;
use App\Http\Controllers\DashboardController;

Route::resource('customers', CustomerController::class);
Route::resource('products', ProductController::class);
Route::resource('sales', SaleController::class);
Route::resource('sale_items', SaleItemController::class);
Route::resource('dashboard', DashboardController::class);

Route::get('/', function () {
    return view('about');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/test', function () {
    return view('test');
});

/*
Route::resource('products', ProductController::class);

Route::resource('customers', CustomerController::class);

Route::get('/sales/create', [SaleController::class, 'create'])->name('sales.create');

Route::post('/sales', [SaleController::class, 'store'])->name('sales.store');

Route::get('/dashboard', fn() => view('dashboard'))->name('dashboard'); 
*/