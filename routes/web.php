<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PayController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ReservationController;



//  Public Routes
Auth::routes();
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');

//  Protected Routes (auth required)
Route::middleware('auth')->group(function () {

    //  Cart
    Route::controller(CartController::class)->prefix('cart')->name('cart.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/{id}',  'store')->name('store');
        Route::delete('/{id}', 'delete')->name('delete');
        Route::put('/{id}', 'update')->name('update');
    });

    //Foods
    Route::get('/foods/{id}', [FoodController::class, 'show'])->name('foods.show');

    //  Checkout
    Route::controller(CheckoutController::class)->prefix('checkout')->name('checkout.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/', 'store')->name('store');
    });

    //  Payment
    Route::controller(PayController::class)->prefix('pay')->name('pay.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/success', 'success')->name('success');
    });
    
    //  Reservation
    Route::controller(ReservationController::class)->prefix('reservation')->name('reservation.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/', 'store')->name('store');
    });
    // orders
    Route::controller(OrderController::class)->prefix('orders')->name('orders.')->group(function () {
        Route::get('/', 'index')->name('index');
    });
});


