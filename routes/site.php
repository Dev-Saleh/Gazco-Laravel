<?php

use Illuminate\Support\Facades\Route;
Route::group(['namespace' => 'front', /*'middleware' => 'auth:Observer',*/ 'prefix' => 'home'], function () {
    Route::get('/', 'homeController@index')->name('Main.front');  // the first page Observer visits if authenticated
   
    ################################## Citizen routes ######################################
    Route::group(['prefix' => 'Citizen'], function () {
   
    });
    ################################## Citizen routes ######################################
    ################################## Booking routes ######################################
     Route::group(['prefix' => 'Booking'], function () {
        Route::get('show/{id?}', 'homeController@show')->name('Main.show');
        Route::post('store', 'homeController@store')->name('logBookings.store');
        
    });
    Route::group(['prefix' => 'checkBooking'], function () {
        Route::get('index', 'checkBookingController@index')->name('citizencheckBooking.index');
        Route::get('show', 'checkBookingController@show')->name('citizencheckBooking.show');
        //Route::post('store', 'homeController@store')->name('logBookings.store');
        
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