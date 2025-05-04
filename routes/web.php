<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [ProductController::class, 'index']);
Route::resource('products', ProductController::class);

Route::get('/cart', [ProductController::class, 'cart'])->name('cart.index');
Route::post('/cart/add/{id}', [ProductController::class, 'addToCart'])->name('cart.add');
Route::post('/checkout', [App\Http\Controllers\OrderController::class, 'processCheckout'])->name('checkout.process');

Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
Route::post('/checkout', [OrderController::class, 'processCheckout'])->name('checkout.process');

