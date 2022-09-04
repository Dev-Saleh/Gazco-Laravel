<?php

use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'auth'],function(){

    Route::get('login', 'loginCitizenController@login')->name('login'); 
    Route::get('logout', 'loginCitizenController@logout')->name('logout'); 
    Route::post('check', 'loginCitizenController@checkCitizen')->name('checkCitizen'); 


});

  


Route::group(['namespace' => 'front', 'middleware' => 'authCitizen', 'prefix' => ''], function () {
    Route::get('/', 'homeController@index')->name('Main.front');  // the first page Observer visits if authenticated
    ################################## Profile routes ######################################
    
    Route::get('/profile', 'myProfileController@index')->name('myProfile.index');
    
    ################################## my Booking routes ######################################
    
    Route::get('/myBooking', 'myBookingController@index')->name('myBooking.index');
   
    
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
