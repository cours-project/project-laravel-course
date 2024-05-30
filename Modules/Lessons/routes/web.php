<?php
use Illuminate\Support\Facades\Route;
use Modules\Lessons\src\Http\Controllers\LessonsController;

Route::middleware('auth')->prefix('lesson')->name('lesson.')->group(function(){

Route::get('/{id}',[LessonsController::class, 'index'])->name('index');

Route::get('/create/{id}',[LessonsController::class, 'create'])->name('create');

Route::post('/store/{id}',[LessonsController::class, 'store'])->name('store');

Route::get('/data/{id}',[LessonsController::class , 'data'])->name('data');

Route::get('/edit/{id}',[LessonsController::class , 'edit'])->name('edit');

Route::get('/delete/{id}',[LessonsController::class , 'delete'])->name('delete');




 
 });