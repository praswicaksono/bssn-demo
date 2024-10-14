<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookEventController;
use App\Http\Controllers\CancelBookingController;
use App\Http\Controllers\PayController;

Route::post('/event/book', BookEventController::class);
Route::post('/event/cancel', CancelBookingController::class);
Route::post('/event/pay', PayController::class);
