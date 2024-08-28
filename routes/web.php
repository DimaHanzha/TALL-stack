<?php

use App\Http\Controllers\SubscriberController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('/subscribers/verify{subscriber}', [SubscriberController::class, 'verify'])
    ->middleware('signed')
    ->name('subscribers.verify');

require __DIR__.'/auth.php';
