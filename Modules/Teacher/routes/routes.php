<?php 
use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'Modules\Teacher\src\Http\Controllers','middleware'=>'web'], function(){
    Route::prefix('admin')->name('admin.')->group(function(){
        Route::prefix('teacher')->name('teacher.')->group(function(){
            Route::get('/','TeacherController@index')->name('index');

            Route::get('/data','TeacherController@data')->name('data');

            Route::get('/create','TeacherController@create')->name('create');

            Route::post('/store','TeacherController@store')->name('store');

            Route::get('/edit/{id}','TeacherController@edit')->name('edit');

            Route::post('/update/{id}','TeacherController@update')->name('update');

            Route::get('/delete/{id}','TeacherController@delete')->name('delete');


        });
    });
})

?>