<?php 
use Illuminate\Support\Facades\Route;
use Modules\Dashboard\src\Http\Controllers\DashboardController;

Route::middleware('auth')->prefix('dashboard')->name('dashboard.')->group(function(){

            Route::get('/',[DashboardController::class , 'index'])->name('index');
            
    });


?>