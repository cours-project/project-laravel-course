<?php 
use Illuminate\Support\Facades\Route;
use Modules\Courses\src\Http\Controllers\ClientCourseController;
    
Route::prefix('course')->name('course.')->group(function(){

    Route::get('/',[ClientCourseController::class , 'index'])->name('index');
    Route::get('/detail/{slug}',[ClientCourseController::class , 'detail'])->name('detail');

    route::prefix('data')->name('data.')->group(function(){
        Route::get('/trial/{lesson_id}',[ClientCourseController::class , 'getTrialVideo'])->name('trial');
    });
    });
?>