<?php

namespace Juy\CharacterSolver;

use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Http\Kernel;

class CharacterSolverServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @param \Illuminate\Contracts\Http\Kernel $kernel

     * @return void
     */
    public function boot(Kernel $kernel)
    {
        // Global middleware
        // Add a new middleware to end of the stack if it does not already exist.
        // https://github.com/laravel/framework/blob/5.1/src/Illuminate/Foundation/Http/Kernel.php#L205
        $kernel->pushMiddleware(Middleware\CharacterSolver::class);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
