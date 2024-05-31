<?php
use Illuminate\Support\Facades\Route;
use Modules\Students\src\Http\Controllers\StudentsController;

Route::middleware('auth')->prefix('student')->name('student.')->group(function(){

    Route::get('/',[StudentsController::class, 'index'])->name('index');

    Route::get('/data',[StudentsController::class, 'data'])->name('data');

    Route::get('/create',[StudentsController::class, 'create'])->name('create');

    Route::post('/store',[StudentsController::class, 'store'])->name('store');

    Route::get('/edit/{studentId}',[StudentsController::class, 'edit'])->name('edit');

    Route::post('/update/{studentId}',[StudentsController::class, 'update'])->name('update');

    Route::get('/delete/{studentId}',[StudentsController::class, 'delete'])->name('delete');

 });