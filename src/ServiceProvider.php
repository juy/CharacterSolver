<?php

namespace Juy\CharacterSolver;

use Illuminate\Support\ServiceProvider as IlluminateServiceProvider;
use Illuminate\Contracts\Http\Kernel;

class ServiceProvider extends IlluminateServiceProvider
{
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        // Add a new middleware to end of the stack if it does not already exist.
        $this->registerMiddleware(Middleware\CharacterSolver::class);
    }

    /**
     * Register the CharacterSolver middleware.
     *
     * @param  string $middleware
     */
    protected function registerMiddleware($middleware)
    {
        $kernel = $this->app['Illuminate\Contracts\Http\Kernel'];
        $kernel->pushMiddleware($middleware);
    }
}
