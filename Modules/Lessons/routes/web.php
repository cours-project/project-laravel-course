<?php
use Illuminate\Support\Facades\Route;
use Modules\Lessons\src\Http\Controllers\LessonsController;

Route::middleware('auth')->prefix('lesson')->name('lesson.')->group(function(){

Route::get('/{id}',[LessonsController::class, 'index'])->name('index');
 
 });