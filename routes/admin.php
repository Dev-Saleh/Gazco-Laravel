<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SendSMSController;

 


Route::get('/test', 'ReeportController@index')->name('Test');

Route::group(['namespace' => 'auth'],function(){

  Route::get('adminLogin', 'loginAdminController@login')->name('adminLogin'); 
  Route::get('adminLogout', 'loginAdminController@logout')->name('adminLogout'); 
  Route::post('adminCheck', 'loginAdminController@checkAdmin')->name('adminCheckAdmin'); 
});


Route::group(['namespace' => 'dashborad\admin','middleware' => 'authAdmin', 'prefix' => 'admin'], function () {

  
   // the first page admin visits if authenticated
   Route::get('/', 'OverviewController@index')->name('admin.dashboard'); 
   Route::get('settings', 'settingsController@index')->name('admin.settings'); 
   Route::get('profile', 'profileController@index')->name('admin.profile'); 
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
        Route::post('search', 'AgentController@search')->name('agent.search');
        
      });
      Route::group(['prefix' => 'employee'], function () {
        Route::get('index', 'EmployeeController@index')->name('employee.index');
        Route::post('store', 'EmployeeController@store')->name('employee.store');
        Route::delete('delete/{id?}', 'EmployeeController@destroy')->name('employee.destroy');
        Route::get('edit/{id?}', 'EmployeeController@edit')->name('employee.edit');
        Route::post('update', 'EmployeeController@update')->name('employee.update');
        Route::get('show', 'EmployeeController@show')->name('employee.show');
        Route::post('search', 'EmployeeController@search')->name('employee.search');
        
      });
      Route::group(['prefix' => 'observer'], function () {
        Route::get('index', 'ObserverController@index')->name('observer.index');
        Route::post('store', 'ObserverController@storeObservers')->name('observer.store');
        Route::delete('delete/{id?}','ObserverController@destroyObservers')->name('observer.destroy');
        Route::get('edit/{id?}', 'ObserverController@editObservers')->name('observer.edit');
        Route::get('showRigons/{id?}', 'ObserverController@showRigons')->name('observer.Show_rigons');
        Route::get('showAgents/{id?}', 'ObserverController@showAgents')->name('observer.show_Agents');
        Route::post('update', 'ObserverController@updateObservers')->name('observer.update');
        Route::get('showAllObservers', 'ObserverController@showAllObservers')->name('observer.show_All');
        Route::post('search', 'ObserverController@search')->name('observer.search');
        
    });
      Route::group(['prefix' => 'gazLogs'], function () {
        Route::get('index',  'gazLogsController@index')->name('gazLogs.index');
        Route::post('store', 'gazLogsController@store')->name('gazLogs.store');
        Route::delete('delete/{id?}','gazLogsController@destroy')->name('gazLogs.destroy');
        Route::get('edit/{id?}', 'gazLogsController@edit')->name('gazLogs.edit');
        Route::get('showRigons/{id?}', 'gazLogsController@showRigons')->name('gazLogs.showRigons');
        Route::get('showAgents/{id?}', 'gazLogsController@showAgents')->name('gazLogs.showAgents');
        Route::post('update', 'gazLogsController@update')->name('gazLogs.update');
        Route::post('search', 'gazLogsController@search')->name('gazLogs.search');
        
    });
    Route::group(['prefix' => 'citizenConfirm'], function () {
      Route::get('index',  'CitizenConfirm@index')->name('citizenConfirm.index');
      Route::delete('delete/{id?}','CitizenConfirm@destroy')->name('citizenConfirm.destroy');
      Route::get('show', 'CitizenConfirm@show')->name('citizenConfirm.show');
      Route::post('update', 'CitizenConfirm@update')->name('citizenConfirm.update');
      Route::post('search', 'CitizenConfirm@search')->name('citizenConfirm.search');
      
    });  
    Route::group(['prefix' => 'reports'], function () 
    {
      Route::group(['prefix' => 'Batch'], function ()
      {
        Route::get('index',  'batchReportsController@index')->name('batchReports.index');
        Route::Post('show',  'batchReportsController@show')->name('batchReport.show');
        Route::get('showRigon/{id?}', 'batchReportsController@showRigons')->name('batchReports.showRigons');
        Route::post('exportExcel', 'batchReportsController@exportExcelBatch')->name('batchReports.exportExcelBatch');
        Route::get('showAgent/{id?}', 'batchReportsController@showAgents')->name('batchReports.showAgents');
      }
       
      
     );
      Route::group(['prefix' => 'citizen'], function ()
      {
          Route::get('citizenReport',  'ReportsController@citizenReport')->name('reports.citizenReport');
      }
    );
    });  
      
});

 ################################## Observer routes ######################################  
 Route::group(['namespace' => 'auth'],function(){

  Route::get('observerLogin', 'loginObserverController@login')->name('observerLogin'); 
  Route::get('observerLogout', 'loginObserverController@logout')->name('observerLogout'); 
  Route::post('observerCheck', 'loginObserverController@checkObserver')->name('checkObserver'); 


});

Route::group(['namespace' => 'dashborad\observer','middleware' => 'authObserver', 'prefix' => 'observer'], function () {
  Route::get('/', 'OverviewController@index')->name('observer.dashboard');  // the first page Employe visits if authenticated
  
  Route::group(['prefix' => 'citizen'], function () {
    Route::get('index',  'CitizenController@index')->name('citizen.index');
    Route::post('store', 'CitizenController@store')->name('citizes.store');
    Route::delete('delete/{id?}','CitizenController@destroy')->name('citizen.destroy');
    Route::get('edit/{id?}', 'CitizenController@edit')->name('citizen.edit');
    Route::post('update', 'CitizenController@update')->name('citizen.update');
    Route::get('show_All', 'CitizenController@show_All')->name('citizen.show_All');
    
 });
 
 
 Route::group(['prefix' => 'checkBooking'], function () {
    Route::get('index',  'checkBookingController@index')->name('checkBooking.index');
    Route::get('show',  'checkBookingController@show')->name('checkBooking.show');
    Route::post('update',  'checkBookingController@update')->name('checkBooking.update');
    Route::post('sendSms',  'SendingMessageController@sendSms')->name('sendSms');
    Route::post('search', 'checkBookingController@search')->name('checkBooking.search');
    Route::post('citSearch', 'checkBookingController@citSearch')->name('checkBooking.citSearch');
  
    
  });
 
  
  Route::group(['prefix' => 'checkBatch'], function () {
    Route::get('index', 'checkBatchController@index')->name('checkBatch.index');
    Route::post('update','checkBatchController@update')->name('checkBatch.allowBooking');
    Route::get('show', 'checkBatchController@show')->name('checkBatch.show');
    
  });

  


});
