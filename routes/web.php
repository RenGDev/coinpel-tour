<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('login');
});

Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::prefix('home')->group(function (){
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('drivers', fn() => view('home.drivers'))->name('home.drivers');
    Route::get('vehicles', fn() => view('home.vehicles'))->name('home.vehicles');
    Route::get('travels', fn() => view('home.travels'))->name('home.travels');
});