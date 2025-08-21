<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\TravelController;
use App\Http\Controllers\StatisticController;
use App\Http\Controllers\TravelSubscriptionController;

Route::get('/', function () {
    return view('login');
});

Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::post('/password/change', [AuthController::class, 'changePassword'])->name('password.update');

Route::middleware(['auth'])->prefix('home')->group(function () {

    Route::middleware(['is_admin'])->group(function (){
        Route::get('users', [UserController::class, 'index'])->name('users.index');
        Route::delete('users/destroy/{id}', [UserController::class, 'destroy'])->name('users.destroy');
        Route::post('users/store', [UserController::class, 'store'])->name('users.store');
        Route::put('users/{id}', [UserController::class, 'update'])->name('users.update');
        Route::patch('users/block/{id}', [UserController::class, 'toggleBlock'])->name('users.toggleBlock');

        Route::get('drivers', [DriverController::class, 'index'])->name('drivers.index');
        Route::delete('drivers/destroy/{id}', [DriverController::class, 'destroy'])->name('drivers.destroy');
        Route::post('drivers/store', [DriverController::class, 'store'])->name('drivers.store');
        Route::put('drivers/{id}', [DriverController::class, 'update'])->name('drivers.update');
        
        Route::get('vehicles', [VehicleController::class, 'index'])->name('vehicles.index');
        Route::delete('vehicles/destroy/{id}', [VehicleController::class, 'destroy'])->name('vehicles.destroy');
        Route::post('vehicles/store', [VehicleController::class, 'store'])->name('vehicles.store');
        Route::put('vehicles/{id}', [VehicleController::class, 'update'])->name('vehicles.update');

        Route::get('travels', [TravelController::class, 'index'])->name('travels.index');
        Route::resource('travels', TravelController::class);
        Route::post('travels/store', [TravelController::class, 'store'])->name('travels.store');
        Route::delete('travels/destroy/{id}', [TravelController::class, 'destroy'])->name('travels.destroy');

        Route::get('/estatisticas', [StatisticController::class, 'index'])
        ->name('statistics.index');
    });

    Route::get('pacotes', [TravelSubscriptionController::class, 'index'])->name('travels.packages');
    Route::get('contracts', [TravelSubscriptionController::class, 'show'])->name('travels.contracts');
    Route::post('pacotes/{id}/subscribe', [TravelSubscriptionController::class, 'subscribe'])->name('travels.subscribe');
    Route::post('pacotes/{id}/unsubscribe', [TravelSubscriptionController::class, 'unsubscribe'])->name('travels.unsubscribe');
});