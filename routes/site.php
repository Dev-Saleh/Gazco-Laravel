<?php

use Illuminate\Support\Facades\Route;

Route::get('login', 'auth\loginCitizenController@login')->name('login'); 
Route::get('logout', 'auth\loginCitizenController@logout')->name('logout'); 
Route::post('check', 'auth\loginCitizenController@checkCitizen')->name('checkCitizen'); 
Route::group(['namespace' => 'front', 'middleware' => 'authCitizen', 'prefix' => 'home'], function () {
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
