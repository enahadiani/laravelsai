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

        $this->mapSekolahRoutes();
        
        $this->mapAdmGinasRoutes();

        $this->mapSiloRoutes();
        
        $this->mapTsRoutes();
        
        $this->mapSiagaRoutes();

        $this->mapWebesakuRoutes();
        
        $this->mapWebJavav2Routes();

        $this->mapJavaRoutes();

        $this->mapMobileTSRoutes();

        $this->mapMobileTarbakRoutes();

        $this->mapAdmJavaRoutes();
        
        $this->mapMobileDashRoutes();
        
        $this->mapSimaRoutes();

        $this->mapWebTelkomPropertyRoutes();

        $this->mapBangtelRoutes();
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

    protected function mapAdmJavaRoutes()
    {
        Route::prefix('admjava-auth')
            ->middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/admjava/auth.php'));

        Route::prefix('admjava-content')
            ->middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/admjava/content.php'));
    }

    protected function mapJavaRoutes()
    {
        Route::prefix('java-auth')
            ->middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/java/auth.php'));

        Route::prefix('java-dash')
            ->middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/java/dash.php'));
    
        Route::prefix('java-master')
            ->middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/java/master.php'));
    
        Route::prefix('java-trans')
            ->middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/java/trans.php'));
    
        Route::prefix('java-report')
            ->middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/java/report.php'));
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
            ->group(base_path('routes/telu/auth.php'));
        Route::prefix('telu-master')
            ->middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/telu/master.php'));
        Route::prefix('telu-trans')
            ->middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/telu/trans.php'));
        Route::prefix('telu-report')
            ->middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/telu/report.php'));
        Route::prefix('telu-dash')
            ->middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/telu/dash.php'));
        
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
        
        Route::prefix('webginas2')
            ->middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/webginas/web2.php'));
   
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
            ->group(base_path('routes/yakes/auth.php'));

        Route::prefix('yakes-dash')
            ->middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/yakes/dash.php'));
    
        Route::prefix('yakes-master')
            ->middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/yakes/master.php'));
    
        Route::prefix('yakes-trans')
            ->middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/yakes/trans.php'));
    
        Route::prefix('yakes-report')
            ->middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/yakes/report.php'));
   
    }

    protected function mapSekolahRoutes()
    {
        Route::prefix('sekolah-auth')
            ->middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/sekolah/auth.php'));

        Route::prefix('sekolah-dash')
            ->middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/sekolah/dash.php'));
    
        Route::prefix('sekolah-master')
            ->middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/sekolah/master.php'));
    
        Route::prefix('sekolah-trans')
            ->middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/sekolah/trans.php'));
    
        Route::prefix('sekolah-report')
            ->middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/sekolah/report.php'));
   
    }

    protected function mapTsRoutes()
    {
        Route::prefix('ts-auth')
            ->middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/ts/auth.php'));

        Route::prefix('ts-dash')
            ->middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/ts/dash.php'));
    
        Route::prefix('ts-master')
            ->middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/ts/master.php'));
    
        Route::prefix('ts-trans')
            ->middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/ts/trans.php'));
    
        Route::prefix('ts-report')
            ->middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/ts/report.php'));
   
    }

    protected function mapAdmGinasRoutes()
    {
        Route::prefix('admginas-auth')
            ->middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/admginas/auth.php'));

        Route::prefix('admginas-dash')
            ->middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/admginas/dash.php'));
    
        Route::prefix('admginas-master')
            ->middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/admginas/master.php'));
    
        Route::prefix('admginas-trans')
            ->middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/admginas/trans.php'));
    
        Route::prefix('admginas-report')
            ->middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/admginas/report.php'));
   
    }

    protected function mapSiloRoutes()
    {
        Route::prefix('silo-auth')
            ->middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/silo/auth.php'));

        Route::prefix('silo-dash')
            ->middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/silo/dash.php'));
    
        Route::prefix('silo-master')
            ->middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/silo/master.php'));
    
        Route::prefix('silo-trans')
            ->middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/silo/trans.php'));
    
        Route::prefix('silo-report')
            ->middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/silo/report.php'));
   
    }

    protected function mapSiagaRoutes()
    {
        Route::prefix('siaga-auth')
            ->middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/siaga/auth.php'));

        Route::prefix('siaga-dash')
            ->middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/siaga/dash.php'));
    
   
    }

    protected function mapWebesakuRoutes()
    {
        Route::prefix('webesaku')
            ->middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/webesaku/web.php'));
    }

    protected function mapWebJavav2Routes()
    {
        Route::prefix('webjava-v2')
            ->middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/webjava/web-routes.php'));
    }

    protected function mapMobileTSRoutes()
    {
        Route::prefix('mobile-ts')
            ->middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/mobile_ts/auth.php'));
    }

    protected function mapMobileTarbakRoutes()
    {
        Route::prefix('mobile-tarbak')
            ->middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/mobile_tarbak/auth.php'));
    }

    protected function mapMobileDashRoutes()
    {
        Route::prefix('mobile-dash')
            ->middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/mobile_dash/auth.php'));
    }

    
    protected function mapSimaRoutes()
    {
        Route::prefix('sima-auth')
            ->middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/sima/auth.php'));

        Route::prefix('sima-dash')
            ->middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/sima/dash.php'));
    
        Route::prefix('sima-master')
            ->middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/sima/master.php'));
    
        Route::prefix('sima-trans')
            ->middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/sima/trans.php'));
    
        Route::prefix('sima-report')
            ->middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/sima/report.php'));
   
    }

    protected function mapWebTelkomPropertyRoutes()
    {
        Route::prefix('telkom-property')
            ->middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/webtelprop/web-routes.php'));
    }

    protected function mapBangtelRoutes()
    {
        Route::prefix('bangtel-auth')
            ->middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/bangtel/auth.php'));

        Route::prefix('bangtel-dash')
            ->middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/bangtel/dash.php'));
    
        Route::prefix('bangtel-master')
            ->middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/bangtel/master.php'));
    
        Route::prefix('bangtel-trans')
            ->middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/bangtel/trans.php'));
    
        Route::prefix('bangtel-report')
            ->middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/bangtel/report.php'));
   
    }

}
