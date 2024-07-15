<?php

use App\Http\Controllers\BookingController;
use Illuminate\Support\Facades\Route;



Route::get('/booking', [BookingController::class, 'index'])->name('booking');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', function () {
    return view('home');
});

Route::get('/booking_form', [BookingController::class, 'booking_form'])->name('booking_form');
Route::get('/booking_list', [BookingController::class, 'list'])->name('booking.list');
Route::post('/booking_store', [BookingController::class, 'store'])->name('booking.store');
Route::get('/booking_form/{booking_id}', [BookingController::class, 'edit'])->name('booking_form.edit');
Route::put('/booking_update/{booking_id}', [BookingController::class, 'update'])->name('booking.update');