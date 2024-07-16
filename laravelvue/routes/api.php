<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/**
 * route "/user"
 * @method "GET"
 */
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/**
 * route "/login"
 * @method "POST"
 */
Route::post('/login', App\Http\Controllers\Api\LoginController::class)->name('login');


/**
 * route "/logout"
 * @method "POST"
 */
Route::post('/logout', App\Http\Controllers\Api\LogoutController::class)->name('logout');


/**
 * route "/register"
 * @method "POST"
 */
Route::post('/register', App\Http\Controllers\Api\RegisterController::class)->name('register');



Route::post('/order', [App\Http\Controllers\Api\BookingController::class, 'store'])->name('order');
Route::get('/list', [App\Http\Controllers\Api\BookingController::class, 'list'])->name('list');