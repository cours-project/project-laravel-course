<?php 
use Illuminate\Support\Facades\Route;
Route::group(['namespace' => 'Modules\Categories\src\Http\Controllers','middleware'=>'web'], function(){
    Route::prefix('admin')->name('admin.')->group(function(){
        Route::prefix('categories')->name('categories.')->group(function(){
            Route::get('/','CategoriesController@index')->name('index');

            Route::get('/data','CategoriesController@data')->name('data');

            Route::get('/create','CategoriesController@create')->name('create');

            Route::post('/store','CategoriesController@store')->name('store');

            Route::get('/edit/{id}','CategoriesController@edit')->name('edit');

            Route::post('/update/{id}','CategoriesController@update')->name('update');

            Route::get('/delete/{id}','CategoriesController@delete')->name('delete');
            
        });
    });
});