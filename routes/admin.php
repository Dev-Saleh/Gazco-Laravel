<?php


use Illuminate\Support\Facades\Route;


Route::get('/test', 'TestController@create');

Route::group(['namespace' => 'dashborad\admin', /*'middleware' => 'auth:admin',*/ 'prefix' => 'admin'], function () {

  
    Route::get('/', 'OverviewController@index')->name('admin.dashboard');  // the first page admin visits if authenticated
   
    ################################## directorate routes ######################################
  //  Route::group(['prefix' => 'directorate'], function () {
    
    // Route::resource('directorate', 'directoratesController');
     Route::group(['prefix' => 'directorate'], function () {
            Route::get('index', 'directoratesController@index')->name('directorate.index');
            Route::post('store', 'directoratesController@store')->name('directorate.store');
            Route::post('edit', 'directoratesController@edit')->name('directorate.edit');
            Route::get('show', 'directoratesController@show')->name('directorate.fetchNewDirectorate');
            Route::post('update', 'directoratesController@update')->name('directorate.update');
            Route::delete('delete/{id?}', 'directoratesController@destroy')->name('directorate.destroy'); 
     });
      Route::group(['prefix' => 'rigon'], function () {
            Route::post('store', 'RigonController@store')->name('rigon.store');
            Route::delete('delete/{id?}', 'RigonController@destroy')->name('rigon.destroy');
            Route::get('edit/{id?}', 'RigonController@edit')->name('rigon.edit');
            Route::get('show_All', 'RigonController@show')->name('rigon.show_all_Data');
            Route::post('update', 'RigonController@update')->name('rigon.update');
      });
      Route::group(['prefix' => 'station'], function () {
        Route::post('store', 'StationController@store')->name('station.store');
        Route::delete('delete/{id?}', 'StationController@destroy')->name('station.destroy');
        Route::get('edit/{id?}', 'StationController@edit')->name('station.edit');
        Route::get('show_All', 'StationController@show')->name('station.show_All');
      
        Route::post('update', 'StationController@update')->name('station.update');
  });
      Route::group(['prefix' => 'agent'], function () {
        Route::get('index', 'AgentController@index')->name('agent.index');
        Route::post('store', 'AgentController@store')->name('agent.store');
        Route::delete('delete/{id?}', 'AgentController@destroy')->name('agent.destroy');
        Route::get('edit/{id?}', 'AgentController@edit')->name('agent.edit');
        Route::get('show_rigons/{id?}', 'AgentController@show_rigons')->name('agent.Show_rigons');
        Route::post('update', 'AgentController@update')->name('agent.update');
        Route::get('show_All', 'AgentController@show_All')->name('agent.show_All');
        
      });
      Route::group(['prefix' => 'observer'], function () {
        Route::get('index', 'ObserverController@index')->name('observer.index');
        Route::post('store', 'ObserverController@store')->name('observer.store');
        Route::delete('delete/{id?}','ObserverController@destroy')->name('observer.destroy');
        Route::get('edit/{id?}', 'ObserverController@edit')->name('observer.edit');
        Route::get('show_rigons/{id?}', 'ObserverController@show_rigons')->name('observer.Show_rigons');
        Route::get('show_Agents/{id?}', 'ObserverController@show_Agents')->name('observer.show_Agents');
        Route::post('update', 'ObserverController@update')->name('observer.update');
        Route::get('show_All', 'ObserverController@show_All')->name('observer.show_All');
        
    });
      Route::group(['prefix' => 'gaz_Logs'], function () {
        Route::get('index',  'gaz_Logs@index')->name('gaz_Logs.index');
        Route::post('store', 'gaz_Logs@store')->name('gaz_Logs.store');
        Route::delete('delete/{id?}','gaz_Logs@destroy')->name('gaz_Logs.destroy');
        Route::get('edit/{id?}', 'gaz_Logs@edit')->name('gaz_Logs.edit');
        Route::get('show_Rigons/{id?}', 'gaz_Logs@show_Rigons')->name('gaz_Logs.show_Rigons');
        Route::get('show_Agents/{id?}', 'gaz_Logs@show_Agents')->name('gaz_Logs.show_Agents');
        Route::post('update', 'gaz_Logs@update')->name('gaz_Logs.update');
        Route::get('show_All', 'gaz_Logs@show_All')->name('gaz_Logs.show_All');
        
    });
    Route::group(['prefix' => 'citizenConfirm'], function () {
      Route::get('index',  'CitizenConfirm@index')->name('citizenConfirm.index');
      Route::delete('delete/{id?}','CitizenConfirm@destroy')->name('citizenConfirm.destroy');
      Route::get('edit/{id?}', 'CitizenConfirm@edit')->name('citizenConfirm.edit');
      Route::get('show', 'CitizenConfirm@show')->name('citizenConfirm.show');
      
    });  
});

 ################################## Observer routes ######################################  


Route::group(['namespace' => 'dashborad\observer', /*'middleware' => 'auth:Employe',*/ 'prefix' => 'observer'], function () {
  Route::get('/', 'DashboradController@index')->name('observer.dashboard');  // the first page Employe visits if authenticated
  
  Route::group(['prefix' => 'citizen'], function () {
    Route::get('index/{id}',  'CitizenController@index')->name('citizen.index');
    Route::post('store', 'CitizenController@store')->name('citizes.store');
    Route::delete('delete/{id?}','CitizenController@destroy')->name('citizen.destroy');
    Route::get('edit/{id?}', 'CitizenController@edit')->name('citizen.edit');
    Route::post('update', 'CitizenController@update')->name('citizen.update');
    Route::get('show_All', 'CitizenController@show_All')->name('citizen.show_All');
    
 });
 
 
 Route::group(['prefix' => 'checkBooking'], function () {
    Route::get('index',  'checkBookingController@index')->name('checkBooking.index');
  });
 
  
  Route::group(['prefix' => 'checkBatch'], function () {
    Route::get('index/{id}', 'checkBatchController@index')->name('checkBatch.index');
    Route::post('update','checkBatchController@update')->name('checkBatch.allowBooking');
    Route::get('show', 'checkBatchController@show')->name('checkBatch.show');
    
  });
});
