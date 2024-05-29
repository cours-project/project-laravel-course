<?php 
use Illuminate\Support\Facades\Route;
use Modules\Courses\src\Http\Controllers\CoursesController;

Route::middleware('auth')->prefix('course')->name('course.')->group(function(){

            
            Route::get('/',[CoursesController::class , 'index'])->name('index');

            Route::get('/data',[CoursesController::class , 'data'])->name('data');

            Route::get('/create',[CoursesController::class , 'create'])->name('create');

            Route::post('/store',[CoursesController::class , 'store'])->name('store');

            Route::get('/edit/{id}',[CoursesController::class , 'edit'])->name('edit');

            Route::post('/update/{id}',[CoursesController::class , 'uodate'])->name('update');

            Route::get('/delete/{id}',[CoursesController::class , 'delete'])->name('delete');
        });


    Route::group(['prefix' => 'filemanager'], function () {
        \UniSharp\LaravelFilemanager\Lfm::routes();
    });

?>