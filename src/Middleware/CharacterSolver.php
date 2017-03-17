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

namespace Juy\CharacterSolver\Middleware;

use Closure;
use Illuminate\Foundation\Application;

/**
 * CharacterSolver Middleware
 *
 * @link https://gist.github.com/blueskan/2d82af0204b4fc4b0f14
 * @package Juy\CharacterSolver
 */
class CharacterSolver
{
    /**
     * Application
     *
     * @var Application
     */
    protected $app;
    
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
        
        if ('strtr' === $this->app['config']->get('charactersolver.default'))
        {
            $response->setContent(
                strtr($response->getContent(), $this->app['config']->get('charactersolver.translate'))
            );
        }
        else
        {
            $response->setContent(
                html_entity_decode($response->getContent(), ENT_COMPAT, 'UTF-8')
            );
        }

        return $response;
    }
    
}
