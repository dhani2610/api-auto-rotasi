<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * Namespace yang akan digunakan untuk pengontrol di route.
     *
     * @var string|null
     */
    protected $namespace = 'App\\Http\\Controllers';

    /**
     * Tentukan path untuk route "home".
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * Daftarkan setiap route yang diperlukan oleh aplikasi.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
    }

    /**
     * Daftarkan route untuk aplikasi.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();
        $this->mapWebRoutes();
    }

    /**
     * Tentukan route API untuk aplikasi.
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

    /**
     * Tentukan route web untuk aplikasi.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/web.php'));
    }
}
