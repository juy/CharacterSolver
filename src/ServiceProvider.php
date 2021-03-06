<?php
/**
 * This file is part of the <CharacterSolver> laravel package.
 *
 * @author Juy Software <package@juysoft.com>
 * @copyright (c) 2016 Juy Software <package@juysoft.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Juy\CharacterSolver;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;

/**
 * Class ServiceProvider
 * 
 * @package Juy\CharacterSolver
 */
class ServiceProvider extends BaseServiceProvider
{
    /**
     * Package name
     *
     * @var string
     */
    protected $package = 'charactersolver';

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
            $this->packagePath('config/config.php'), $this->package
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
            $this->packagePath('config/config.php') => config_path($this->package . '.php')
        ], 'config');
    }
    
    /**
     * Loads a path relative to the package base directory
     *
     * @param string $path
     * @return string
     */
    protected function packagePath($path = '')
    {
        return sprintf('%s/../%s', __DIR__, $path);
    }

}
