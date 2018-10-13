<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use App\Service;
use App\Work;

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
        
        
        Route::group(['prefix' => '/','namespace' => '\App\Http\Controllers\Site'
            ], function() {
                $services = Service::all();
                $works = Work::all();
                // роуты для сервисов
                foreach($services as $service) {
                    Route::get($service->uri,'ServiceController@index',['as' => $service->id])->name('site.service.'.$service->uri);
                }
                // роуты для наших работ
                foreach($works as $work) {
                    Route::get('work/'.$work->uri,'WorkController@one',['as' => $work->id])->name('site.work.'.$work->uri);
                }
        });
        
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

        //
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
