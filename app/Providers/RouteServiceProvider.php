<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

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

        $this->mapWebRoutes();

        $this->mapEmployeRoutes();

        $this->mapSuperieurRoutes();

        //
    }

    /**
     * Define the "superieur" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapSuperieurRoutes()
    {
        Route::group([
            'middleware' => ['web', 'superieur', 'auth:superieur'],
            'prefix' => 'superieur',
            'as' => 'superieur.',
            'namespace' => $this->namespace,
        ], function ($router) {
            require base_path('routes/superieur.php');
        });
    }

    /**
     * Define the "employe" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapEmployeRoutes()
    {
        Route::group([
            'middleware' => ['web', 'employe', 'auth:employe'],
            'prefix' => 'employe',
            'as' => 'employe.',
            'namespace' => $this->namespace,
        ], function ($router) {
            require base_path('routes/employe.php');
        });
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/web.php'));
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
