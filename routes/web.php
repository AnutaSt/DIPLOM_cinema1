<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\TicketController;

Route::get('/', fn() => view('welcome'))->name('welcome');
Route::get('/booking/{id}', BookingController::class)->name('booking');
Route::post('/ticket', TicketController::class)->name('ticket');
