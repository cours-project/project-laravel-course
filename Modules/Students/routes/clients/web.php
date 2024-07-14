<?php
use Illuminate\Support\Facades\Route;
use Modules\Students\src\Http\Controllers\Clients\AccountController;

Route::middleware('auth:students')->prefix('account')->name('account.')->group(function(){
    Route::get('/',[AccountController::class, 'index'])->name('index');
    Route::post('/account-update',[AccountController::class, 'updateAccount'])->name('update');
    Route::get('/my_courses',[AccountController::class, 'myCourses'])->name('myCourses');
    Route::get('/my_orders',[AccountController::class, 'myOrders'])->name('myOrders');
    Route::get('/change_my_pass',[AccountController::class, 'changeMyPass'])->name('changeMyPass');
    Route::post('/change_my_pass',[AccountController::class, 'updatePass'])->name('updatePass');

 });