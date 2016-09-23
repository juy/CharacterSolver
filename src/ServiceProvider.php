<?php

namespace Juy\CharacterSolver;

use Illuminate\Support\ServiceProvider as IlluminateServiceProvider;

/**
 * Class ServiceProvider
 * 
 * @package Juy\CharacterSolver
 */
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
        // Default package configuration
        $this->mergeConfig();
    }

    /**
     * Perform post-registration booting of services
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
     * Default package configuration
     *
     * @return void
     */
    protected function mergeConfig()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/charactersolver.php', 'charactersolver'
        );
    }

    /**
     * Publish the config file
     *
     * @return void
     */
    protected function publishConfig()
    {
        $this->publishes([
            __DIR__ . '/../config/charactersolver.php' => config_path('charactersolver.php')
        ], 'config');
    }

}
