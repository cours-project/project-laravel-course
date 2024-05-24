<?php 
use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'Modules\User\src\Http\Controllers','middleware'=>'web'], function(){
    Route::prefix('admin')->name('admin.')->group(function(){
        Route::prefix('user')->name('user.')->group(function(){
            Route::get('/','UserController@index')->name('index');

            Route::get('/data','UserController@data')->name('data');

            Route::get('/create','UserController@create')->name('create');

            Route::post('/store','UserController@store')->name('store');

            Route::get('/edit/{id}','UserController@edit')->name('edit');

            Route::post('/update/{id}','UserController@update')->name('update');

            Route::get('/delete/{id}','UserController@delete')->name('delete');


        });
    });
})

?>