<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\UserController;
use App\RoleEnum;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::resource('users', UserController::class)
        ->middleware('can:' . \App\Enums\PermissionEnum::MANAGE_USERS->value);
    Route::resource('customers', CustomerController::class);
    Route::resource('reservations', ReservationController::class);
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

