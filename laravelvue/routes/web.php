<?php

use App\Http\Controllers\BookingController;
use Illuminate\Support\Facades\Route;



Route::get('/booking', [BookingController::class, 'index'])->name('booking');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', function () {
    return view('home');
});

Route::get('/test', [App\Http\Controllers\ReviewController::class, 'show'])->name('example-component');
