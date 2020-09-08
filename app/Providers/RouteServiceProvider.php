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
        
        $this->mapMidtransRoutes();
        
        $this->mapDagoRoutes();
        
        $this->mapTokoRoutes();

        $this->mapRtrwRoutes();

        $this->mapSaiRoutes();
        
        $this->mapDashTeluRoutes();
        
        $this->mapEsakuRoutes();

        $this->mapWebjavaRoutes();

        $this->mapWebginasRoutes();
        
        $this->mapWisataRoutes();

        $this->mapYakesRoutes();

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

    protected function mapDashTeluRoutes()
    {
        Route::prefix('dash-telu')
            ->middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/dash_telu.php'));
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

    protected function mapRtrwRoutes()
    {
        Route::prefix('rtrw-auth')
            ->middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/rtrw/auth.php'));
        Route::prefix('rtrw-master')
            ->middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/rtrw/master.php'));
    }

    protected function mapSaiRoutes()
    {
        Route::prefix('sai-auth')
            ->middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/sai/auth.php'));

        Route::prefix('sai-dash')
            ->middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/sai/dash.php'));
    
        Route::prefix('sai-master')
            ->middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/sai/master.php'));
    
        Route::prefix('sai-trans')
            ->middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/sai/trans.php'));
    
        Route::prefix('sai-report')
            ->middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/sai/report.php'));
   
    }

    protected function mapEsakuRoutes()
    {
        Route::prefix('esaku-auth')
            ->middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/esaku/auth.php'));

        Route::prefix('esaku-dash')
            ->middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/esaku/dash.php'));
    
        Route::prefix('esaku-master')
            ->middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/esaku/master.php'));
    
        Route::prefix('esaku-trans')
            ->middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/esaku/trans.php'));
    
        Route::prefix('esaku-report')
            ->middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/esaku/report.php'));
   
    }

    protected function mapWebjavaRoutes()
    {
        Route::prefix('webjava')
            ->middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/webjava/web.php'));
   
    }

    protected function mapWebginasRoutes()
    {
        Route::prefix('webginas')
            ->middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/webginas/web.php'));
   
    }

    protected function mapWisataRoutes()
    {
        Route::prefix('wisata-auth')
            ->middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/wisata/auth.php'));

        Route::prefix('wisata-dash')
            ->middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/wisata/dash.php'));
    
        Route::prefix('wisata-master')
            ->middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/wisata/master.php'));
    
        Route::prefix('wisata-trans')
            ->middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/wisata/trans.php'));
    
        Route::prefix('wisata-report')
            ->middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/wisata/report.php'));
   
    }

    protected function mapYakesRoutes()
    {
        Route::prefix('yakes-auth')
            ->middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/Yakes/auth.php'));

        Route::prefix('yakes-dash')
            ->middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/Yakes/dash.php'));
    
        Route::prefix('yakes-master')
            ->middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/Yakes/master.php'));
    
        Route::prefix('yakes-trans')
            ->middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/Yakes/trans.php'));
    
        Route::prefix('yakes-report')
            ->middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/Yakes/report.php'));
   
    }

}
