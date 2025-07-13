<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/foods/{id}',[FoodController::class, 'show'])->name('foods.show');
Route::post('/foods/{id}',[FoodController::class, 'addToCart'])->name('cart.store');

