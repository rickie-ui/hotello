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
     * The path to your application's "home" route.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = '/admin/dashboard';


     /**
     * The path to the "admin" home page.
     *
     * @var string
     */
    public const GUEST_HOME = '/user/dashboard';


    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     */
    public function boot(): void
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });

        $this->routes(function () {
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
                ->group(base_path('routes/web.php'));
        });
    }

    /**
     * Get the path the user should be redirected to after login.
     *
     * @return string
     */
    protected function redirectTo(): string
    {
         if (auth()->check()) {
            // Check user role and redirect to the appropriate home page
            if (auth()->user()->role == 'admin') {
                return RouteServiceProvider::HOME;
            } elseif (auth()->user()->role == 'guest') {
                return RouteServiceProvider::GUEST_HOME;
            }
        }

        // Default redirect path if user role is not recognized
        return RouteServiceProvider::GUEST_HOME;
    }
}
