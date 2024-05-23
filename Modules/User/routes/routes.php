<?php

use Illuminate\Support\Facades\Route;
use Modules\User\src\Models\User;
use Modules\User\src\Http\Controllers\UserController;

Route::group(['namespace' => 'Modules\User\src\Http\Controllers'],function(){
    Route::prefix('/user')->group(function(){
        Route::get('/',[UserController::class, 'index']);
        Route::get('/detail',[UserController::class, 'detail']);
        Route::get('/create',[UserController::class, 'create']);

    });

});