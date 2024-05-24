<?php 
use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'Modules\User\src\Http\Controllers','middleware'=>'web'], function(){
    Route::prefix('admin')->group(function(){
        Route::prefix('user')->group(function(){
            Route::get('/','UserController@index')->name('admin.user.index');

            Route::get('/data','UserController@data')->name('admin.user.data');

            Route::get('/create','UserController@create')->name('admin.user.create');

            Route::post('/store','UserController@store')->name('admin.user.store');

            Route::get('/edit/{id}','UserController@edit')->name('admin.user.edit');

            Route::post('/update/{id}','UserController@update')->name('admin.user.update');


        });
    });
})

?>