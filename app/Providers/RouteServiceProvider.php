<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * The path to the "home" route for your application.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //
        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

    
        $this->mapadminRoutes();
        $this->mapsiteRoutes();

        //
    }

   
      /**
     * Define the "admin" routes for the Dashborad Admin.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapadminRoutes()
    {
       
         Route::/* middleware('web') -> */
              //prefix('admin')
              namespace($this->namespace)
             ->group(base_path('routes/admin.php'));
    }
    /**
    * Define the "admin" routes for the Dashborad Admin.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapsiteRoutes()
    {
       
        Route::/* middleware('site') -> */
        
       namespace($this->namespace)
       ->group(base_path('routes/site.php'));
    }

    /**
     
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/api.php'));
    }
}
