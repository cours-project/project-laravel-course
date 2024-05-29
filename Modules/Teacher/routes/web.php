<?php 
use Illuminate\Support\Facades\Route;
use Modules\Teacher\src\Http\Controllers\TeacherController;

Route::middleware('auth')->prefix('teacher')->name('teacher.')->group(function(){

            Route::get('/',[TeacherController::class , 'index'])->name('index');

            Route::get('/data',[TeacherController::class , 'data'])->name('data');

            Route::get('/create',[TeacherController::class , 'create'])->name('create');

            Route::post('/store',[TeacherController::class , 'store'])->name('store');

            Route::get('/edit/{id}',[TeacherController::class , 'edit'])->name('edit');

            Route::post('/update/{id}',[TeacherController::class , 'update'])->name('update');

            Route::get('/delete/{id}',[TeacherController::class , 'delete'])->name('delete');


    });


?>