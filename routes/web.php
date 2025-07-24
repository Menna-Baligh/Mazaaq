<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PayController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ReservationController;



Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/foods/{id}', [FoodController::class, 'show'])->name('foods.show');

    Route::controller(CartController::class)->group(function () {
        Route::get('/cart', 'index')->name('cart.index');
        Route::post('/cart/{id}',  'store')->name('cart.store');
        Route::delete('/cart/{id}', 'delete')->name('cart.delete');
        Route::put('/cart/{id}', 'update')->name('cart.update');
    });

    Route::controller(CheckoutController::class)->group(function () {
        Route::get('/checkout', 'index')->name('checkout.index');
        Route::post('/checkout', 'store')->name('checkout.store');
    });
    Route::get('/pay', [PayController::class, 'index'])->name('pay.index');
    Route::get('/pay/success', [PayController::class, 'success'])->name('pay.success');

    Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');

    Route::post('/reservation', [ReservationController::class, 'store'])->name('reservation.store');

});

