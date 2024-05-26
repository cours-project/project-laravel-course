<?php 
use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'Modules\Courses\src\Http\Controllers','middleware'=>'web'], function(){
    Route::prefix('admin')->name('admin.')->group(function(){
        Route::prefix('course')->name('course.')->group(function(){
            Route::get('/','CoursesController@index')->name('index');

            Route::get('/data','CoursesController@data')->name('data');

            Route::get('/create','CoursesController@create')->name('create');

            Route::post('/store','CoursesController@store')->name('store');

            Route::get('/edit/{id}','CoursesController@edit')->name('edit');

            Route::post('/update/{id}','CoursesController@update')->name('update');

            Route::get('/delete/{id}','CoursesController@delete')->name('delete');


        });
    });
});

Route::group(['prefix' => 'filemanager'], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

?>