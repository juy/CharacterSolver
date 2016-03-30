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
        // Default package configuration
        $this->mergeConfigFrom(
            __DIR__.'/../config/charactersolver.php', 'charactersolver'
        );
    }

    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        // Publish the config file
        $this->publishConfig();

        // If running in console
        if ($this->app->runningInConsole())
        {
            return;
        }

        // If CharacterSolver is disabled
        if (!$this->app['config']->get('charactersolver.enabled'))
        {
            return;
        }

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

    /**
     * Publish the config file.
     */
    protected function publishConfig()
    {
        // php artisan vendor:publish --provider="Juy\Providers\CharacterSolver" --tag="config" --force
        $this->publishes([
            __DIR__.'/../config/charactersolver.php' => config_path('charactersolver.php')
        ], 'config');
    }
}
