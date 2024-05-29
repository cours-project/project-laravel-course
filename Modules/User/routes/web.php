<?php 
use Illuminate\Support\Facades\Route;
use Modules\User\src\Http\Controllers\UserController;


    Route::middleware('auth')->prefix('user')->name('user.')->group(function(){
        Route::get('/',[UserController::class, 'index'])->name('index');

        Route::get('/data',[UserController::class, 'data'])->name('data');

        Route::get('/create',[UserController::class, 'create'])->name('create');

        Route::post('/store',[UserController::class, 'store'])->name('store');

        Route::get('/edit/{id}',[UserController::class, 'edit'])->name('edit');

        Route::post('/update/{id}',[UserController::class, 'update'])->name('update');

        Route::get('/delete/{id}',[UserController::class, 'delete'])->name('delete');

    });


?>