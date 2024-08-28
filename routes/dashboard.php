<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubscriberController;

Route::view('/', 'dashboard')->name('dashboard');

Route::get('subscribers', [SubscriberController::class, 'index'])->name('subscribers');
