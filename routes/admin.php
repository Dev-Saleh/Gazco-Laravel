<?php


use Illuminate\Support\Facades\Route;


Route::group(['namespace' => 'dashborad\admin', /*'middleware' => 'auth:admin',*/ 'prefix' => 'admin'], function () {

  
    Route::get('/', 'OverviewController@index')->name('admin.dashboard');  // the first page admin visits if authenticated
   
    ################################## directorate routes ######################################
  //  Route::group(['prefix' => 'directorate'], function () {
    
     Route::resource('directorate', 'DirectorateController');
     
     Route::group(['prefix' => 'directorate'], function () {
     Route::post('edit', 'DirectorateController@edit')->name('directorate.edit');
     Route::post('fetch', 'DirectorateController@show')->name('directorate.fetch_all_Data');
     Route::post('update', 'DirectorateController@update')->name('directorate.update');
     ///////////
     
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
     // Route::get('show_rigons/{id?}', 'AgentController@show_rigons')->name('agent.Show_rigons');
      //Route::post('update', 'AgentController@update')->name('agent.update');
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
  
    
    
    // Route::resource('agent', 'AgentController');
    // Route::resource('observer', 'ObserverController');
    // Route::resource('log', 'gaz_Logs');
     Route::resource('citizenconfirm', 'CitizenConfirm');
    
   // });
    ################################## directorate routes ######################################
    ################################## Rigon routes ######################################
  //  Route::group(['prefix' => 'directorate/Rigon'], function () {
   
        
  //  });
    ################################## Rigon routes ######################################
    ################################## Agent routes ######################################
    // Route::group(['prefix' => 'Agent'], function () {
    //   Route::resource('Agent', 'AgentController');
    // });


    ################################## Agent routes ######################################
    ################################## Employe routes ######################################
    // Route::group(['prefix' => 'Employe'], function () {
        
    // });
    ################################## Employe routes ######################################
    ################################## Observer routes ######################################
    //  Route::group(['prefix' => 'Observer'], function () {
        
    // });
    ################################## Observer routes ######################################  
     ################################## Reports routes ######################################
    //  Route::group(['prefix' => 'Reports'], function () {
        
    // });
    ################################## Reports routes ######################################    
});

Route::group(['namespace' => 'dashborad\observer', /*'middleware' => 'auth:Employe',*/ 'prefix' => 'observer'], function () {
  Route::get('/', 'DashboradController@index')->name('observer.dashboard');  // the first page Employe visits if authenticated
  //Route::resource('citizen', 'CitizenController');
  Route::group(['prefix' => 'citizen'], function () {
    Route::get('index/{id}',  'CitizenController@index')->name('citizen.index');
    Route::post('store', 'CitizenController@store')->name('citizes.store');
    Route::delete('delete/{id?}','CitizenController@destroy')->name('citizen.destroy');
    Route::get('edit/{id?}', 'CitizenController@edit')->name('citizen.edit');
    Route::post('update', 'CitizenController@update')->name('citizen.update');
    Route::get('show_All', 'CitizenController@show_All')->name('citizen.show_All');
    
 });
  

  ################################## Rescriptions routes ######################################
  //  Route::group(['prefix' => 'Rescriptions'], function () {
    
  // });
  ################################## Rescriptions routes ######################################
  ################################## Verification routes ######################################
  //  Route::group(['prefix' => 'Verification'], function () {
    
  // });
  ################################## Verification routes ######################################

   ################################## Complaints routes ######################################
  //  Route::group(['prefix' => 'Complaints'], function () {
    
  // });
  ################################## Complaints routes ######################################
   
});
