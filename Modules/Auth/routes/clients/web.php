<?php


use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Route;
use Modules\Auth\src\Http\Controllers\Clients\BlockController;
use Modules\Auth\src\Http\Controllers\Clients\LoginController;
use Modules\Auth\src\Http\Controllers\Clients\RegisterController;
use Modules\Auth\src\Http\Controllers\Clients\VerifyController;

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('clients.pageLogin');
Route::post('/login', [LoginController::class, 'login'])->name('clients.login');
Route::post('/logout', [LoginController::class, 'logout'])->name('clients.logout');
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('clients.pageRegister');
Route::post('/register', [RegisterController::class, 'register'])->name('clients.register');
Route::get('/forgot-pass', [LoginController::class, 'showForgotForm'])->name('clients.forgot.password');
Route::post('/forgot-password' ,[LoginController::class,'handleForgotPass'])->middleware('guest:students')->name('password.email');
Route::get('/reset-password/{token}', [LoginController::class , 'resetPassword'])->middleware('guest:students')->name('password.reset');
Route::post('/update-password', [LoginController::class , 'updatePassword'])->middleware('guest:students')->name('password.update');

// BLOCK USER
Route::get('/block', [BlockController::class, 'index'])->middleware('auth:students')->name('clients.block');

//EMAIL
Route::get('/email/verify', [VerifyController::class, 'index'])->middleware('auth:students')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/');
})->middleware(['auth:students', 'signed'])->name('verification.verify');

//RESEND MAIL
Route::post('/email/verification-notification', [VerifyController::class , 'resend'])->middleware(['auth:students', 'throttle:2,1'])->name('verification.send');
