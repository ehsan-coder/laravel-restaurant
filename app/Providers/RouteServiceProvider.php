<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;


class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * This is used by Laravel authentication to redirect users after login.
     *
     * @var string
     */
    public const HOME = '/home';
    

    /**
     * The controller namespace for the application.
     *
     * When present, controller route declarations will automatically be prefixed with this namespace.
     *
     * @var string|null
     */
     protected $namespaceAdmin = 'App\\Http\\Controllers\\AdminControllers';
     protected $namespaceCasher = 'App\\Http\\Controllers\\CasherControllers';
     protected $namespaceChief = 'App\\Http\\Controllers\\ChiefControllers';
     protected $namespaceDeliveryMan = 'App\\Http\\Controllers\\DeliveryManControllers';
     protected $namespaceCustomer = 'App\\Http\\Controllers\\CustomerControllers';
     protected $namespaceWaiter = 'App\\Http\\Controllers\\WaiterControllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            Route::prefix('api')
                ->middleware('api')
                ->namespace($this->namespace)
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/web.php'));

                Route::prefix('admin')
                ->middleware('api')
                ->namespace($this->namespaceAdmin)
                ->group(base_path('routes/apiAdmin.php'));

                Route::prefix('casher')
                ->middleware('api')
                ->namespace($this->namespaceCasher)
                ->group(base_path('routes/apiCasher.php'));

                Route::prefix('chief')
                ->middleware('api')
                ->namespace($this->namespaceChief)
                ->group(base_path('routes/apiChief.php'));
                
                Route::prefix('deliveryman')
                ->middleware('api')
                ->namespace($this->namespaceDeliveryMan)
                ->group(base_path('routes/apiDeliveryMan.php'));

                Route::prefix('customer')
                ->middleware('api')
                ->namespace($this->namespaceCustomer)
                ->group(base_path('routes/apiCustomer.php'));

                Route::prefix('waiter')
                ->middleware('api')
                ->namespace($this->namespaceWaiter)
                ->group(base_path('routes/apiWaiter.php'));
        });
    }

    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by(optional($request->user())->id ?: $request->ip());
        });
    }
}
