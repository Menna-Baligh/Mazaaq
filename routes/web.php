<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\HomeController;



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
});

