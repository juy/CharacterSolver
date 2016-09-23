<?php

namespace Juy\CharacterSolver\Middleware;

use Closure;
use Illuminate\Foundation\Application;

/**
 * CharacterSolver Middleware
 * @link https://gist.github.com/blueskan/2d82af0204b4fc4b0f14
 * @package App\Http\Middleware
 */
class CharacterSolver {

    /**
     * Create a new middleware instance
     *
     * @param Application $app
     */
    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    /**
     * Handle an incoming request
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $response = $next($request);
        $response->setContent(
            strtr($response->getContent(), $this->app['config']->get('charactersolver.translate'))
        );

        return $response;
    }

}
