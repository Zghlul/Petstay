<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\RoomController;

Route::get('/', [LandingPageController::class, 'index'])->name('landing');
Route::get('/services', [LandingPageController::class, 'services'])->name('services');
Route::get('/why-us', [LandingPageController::class, 'whyUs'])->name('why-us');
Route::get('/services', [ServiceController::class, 'index'])->name('services');
Route::get('/rooms', [RoomController::class, 'index'])->name('rooms');
