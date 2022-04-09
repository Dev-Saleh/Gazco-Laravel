<?php


use Illuminate\Support\Facades\Route;


Route::group(['namespace' => 'dashborad\admin', /*'middleware' => 'auth:admin',*/ 'prefix' => 'admin'], function () {

  
    Route::get('/', 'OverviewController@index')->name('admin.dashboard');  // the first page admin visits if authenticated
   
    ################################## directorate routes ######################################
  //  Route::group(['prefix' => 'directorate'], function () {
    
     Route::resource('directorate', 'DirectorateController');
     
     Route::group(['prefix' => 'directorate'], function () {

     Route::post('Ddelete', 'DirectorateController@destroy')->name('directorate.destroy');
     Route::post('Dedit', 'DirectorateController@edit')->name('directorate.edit');
     Route::post('Dfetch', 'DirectorateController@show')->name('directorate.fetch_all_Data');
     Route::post('Dupdate', 'DirectorateController@update')->name('directorate.update');
     ///////////
     Route::post('Rstore', 'RigonController@store')->name('rigon.store');
     Route::post('Rdelete', 'RigonController@destroy')->name('rigon.destroy');
     Route::post('Redit', 'RigonController@edit')->name('rigon.edit');
     Route::post('Rfetch', 'RigonController@show')->name('rigon.fetch_all_Data');
     Route::post('Rupdate', 'RigonController@update')->name('rigon.update');
  
    
     
     });
    
    
     Route::resource('agent', 'AgentController');
     Route::resource('observer', 'ObserverController');
     Route::resource('log', 'LocksController');
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
  Route::resource('citizen', 'CitizenController');

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
