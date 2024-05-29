<?php 
use Illuminate\Support\Facades\Route;
use Modules\Auth\src\Http\Controllers\Admin\LoginController;

    Route::get('/login',[LoginController::class , 'showLoginForm'])->name('pageLogin');
    Route::post('/login',[LoginController::class , 'login'])->name('login');
    Route::post('/logout',[LoginController::class , 'logout'])->name('logout');