<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\KontakController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('project', function () {
        return view('project');
    })->name('project');
    Route::get('calendar', function () {
        return view('calendar');
    })->name('calendar');
    Route::get('team', function () {
        return view('team');
    })->name('team');
    Route::get('report', function () {
        return view('report');
    })->name('report');

    Route::get('logout', [AuthController::class, 'logout'])->name('logout');

    Route::resource('kontak', KontakController::class);
});

Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('register', [AuthController::class, 'post_register'])->name('register');
Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'post_login'])->name('login');
