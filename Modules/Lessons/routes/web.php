<?php
use Illuminate\Support\Facades\Route;
use Modules\Lessons\src\Http\Controllers\LessonsController;

Route::middleware('auth')->prefix('lesson')->name('lesson.')->group(function(){

Route::get('/{id}',[LessonsController::class, 'index'])->name('index');

Route::get('/create/{id}',[LessonsController::class, 'create'])->name('create');

Route::post('/store/{id}',[LessonsController::class, 'store'])->name('store');

 
 });