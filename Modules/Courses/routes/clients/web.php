<?php 
use Illuminate\Support\Facades\Route;
use Modules\Lessons\src\Http\Controllers\ClientLessonController;

Route::prefix('lesson')->name('lesson.')->group(function(){

    Route::get('/{slug}',[ClientLessonController::class , 'index'])->name('index');
 
    });
?>