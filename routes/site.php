<?php

use Illuminate\Support\Facades\Route;
Route::group(['namespace' => 'front', /*'middleware' => 'auth:Observer',*/ 'prefix' => 'Observer'], function () {
    Route::get('/', 'frontController@index')->name('Main.front');  // the first page Observer visits if authenticated
   
    ################################## Citizen routes ######################################
    Route::group(['prefix' => 'Citizen'], function () {
    
    });
    ################################## Citizen routes ######################################
    ################################## Booking routes ######################################
     Route::group(['prefix' => 'Booking'], function () {
    
    });
    ################################## Booking routes ######################################
    ################################## Complaints routes ######################################
    Route::group(['prefix' => 'Complaints'], function () {
    
     });
    ################################## Complaints routes ######################################
 
});










Route::group(['namespace' => 'front', /*'middleware' => 'auth:Citizen',*/ 'prefix' => 'Citizen'], function () {
    Route::get('/', 'frontController@index')->name('Main.front');  // the first page Observer visits if authenticated
     ################################## Settings routes ######################################
     Route::group(['prefix' => 'Settings'], function () {
    
     });
     ################################## Settings routes ######################################
     ################################## Citizen routes ######################################
     Route::group(['prefix' => 'Rescriptions'], function () {
    
    });
    ################################## Citizen routes ######################################
     ################################## Citizen routes ######################################
     Route::group(['prefix' => 'Rescriptions'], function () {
    
    });
    ################################## Citizen routes ######################################
     ################################## Booking routes ######################################
     Route::group(['prefix' => 'Booking'], function () {
    
    });
    ################################## Booking routes ######################################
    
    
});