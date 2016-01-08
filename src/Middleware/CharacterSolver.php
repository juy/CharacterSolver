<?php

namespace Juy\CharacterSolver\Middleware;

use Closure;

/**
 * CharacterSolverMiddleware
 * @link https://gist.github.com/blueskan/2d82af0204b4fc4b0f14
 * @package App\Http\Middleware
 */
class CharacterSolver {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Meybe need to move a config file
        $translate = [
            '&ccedil;'  => 'ç',
            '&Ccedil;'  => 'Ç',
            '&ouml;'    => 'ö',
            '&Ouml;'    => 'Ö',
            '&uuml;'    => 'ü',
            '&Uuml;'    => 'Ü',
        ];
        
        $response = $next($request);
        $response->setContent(strtr($response->getContent(), $translate));
        
        return $response;
    }

}
