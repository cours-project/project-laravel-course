<?php 
use Illuminate\Support\Facades\Route;
use Modules\Categories\src\Http\Controllers\CategoriesController;

Route::middleware('auth')->prefix('category')->name('category.')->group(function(){

        Route::get('/',[CategoriesController::class , 'index'])->name('index');
        
        Route::get('/data',[CategoriesController::class , 'data'])->name('data');

        Route::get('/create',[CategoriesController::class , 'create'])->name('create');

        Route::post('/store',[CategoriesController::class , 'store'])->name('store');

        Route::get('/edit/{id}',[CategoriesController::class , 'edit'])->name('edit');

        Route::post('/update/{id}',[CategoriesController::class , 'update'])->name('update');

        Route::get('/delete/{id}',[CategoriesController::class , 'delete'])->name('delete');
        
});

