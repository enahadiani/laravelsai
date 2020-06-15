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

        $this->mapWebRoutes();

        $this->mapSakuRoutes();

        $this->mapTeluRoutes();

        $this->mapTarbakRoutes();
        
        $this->mapApvRoutes();

        $this->mapSekolahRoutes();
        
        $this->mapMidtransRoutes();
        
        $this->mapDagoRoutes();
        
        $this->mapTokoRoutes();
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

    protected function mapSakuRoutes()
    {
        Route::prefix('saku')
            ->middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/saku.php'));
    }

    protected function mapTeluRoutes()
    {
        Route::prefix('telu')
            ->middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/telu.php'));
    }

    protected function mapTarbakRoutes()
    {
        Route::prefix('tarbak')
            ->middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/tarbak.php'));
    }

    protected function mapApvRoutes()
    {
        Route::prefix('apv')
            ->middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/apv.php'));
    }

    protected function mapSekolahRoutes()
    {
        Route::prefix('sekolah')
            ->middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/sekolah.php'));
    }

    protected function mapMidtransRoutes()
    {
        Route::prefix('midtrans')
            ->middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/midtrans.php'));
    }

    protected function mapDagoRoutes()
    {
        Route::prefix('dago-auth')
            ->middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/dago/auth.php'));

        Route::prefix('dago-dash')
            ->middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/dago/dash.php'));
    
        Route::prefix('dago-master')
            ->middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/dago/master.php'));
    
        Route::prefix('dago-trans')
            ->middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/dago/trans.php'));
    
        Route::prefix('dago-report')
            ->middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/dago/report.php'));
   
    }

    protected function mapTokoRoutes()
    {
        Route::prefix('toko-auth')
            ->middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/toko/auth.php'));

        Route::prefix('toko-dash')
            ->middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/toko/dash.php'));
    
        Route::prefix('toko-master')
            ->middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/toko/master.php'));
    
        Route::prefix('toko-trans')
            ->middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/toko/trans.php'));
    
        Route::prefix('toko-report')
            ->middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/toko/report.php'));
   
    }
}
