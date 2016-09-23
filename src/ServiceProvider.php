<?php

namespace Juy\CharacterSolver;

use Illuminate\Support\ServiceProvider as IlluminateServiceProvider;

class ServiceProvider extends IlluminateServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Register the application services
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Perform post-registration booting of services
     *
     * @return void
     */
    public function boot()
    {
        // Register configurations
        $this->registerConfigurations();

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

        // Add a new middleware to end of the stack if it does not already exist
        $this->registerMiddleware(Middleware\CharacterSolver::class);
    }

    /**
     * Register the CharacterSolver middleware
     *
     * @param  string $middleware
     */
    protected function registerMiddleware($middleware)
    {
        $kernel = $this->app['Illuminate\Contracts\Http\Kernel'];
        $kernel->pushMiddleware($middleware);
    }

    /**
     * Register configurations
     *
     * @return void
     */
    protected function registerConfigurations()
    {
        // Default package configuration
        $this->mergeConfigFrom(
            __DIR__ . '/../config/charactersolver.php', 'charactersolver'
        );

        // Publish the config file
        $this->publishes([
            __DIR__ . '/../config/charactersolver.php' => config_path('charactersolver.php')
        ], 'config');
    }

}
