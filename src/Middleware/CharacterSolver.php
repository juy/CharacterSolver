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
        $response = $next($request);

        $response->setContent(str_replace(
            ['&ccedil;', '&Ccedil;', '&ouml;', '&Ouml;', '&uuml;', '&Uuml;'],
            ['ç',        'Ç',        'ö',      'Ö',      'ü',      'Ü'],
            $response->getContent()
        ));

        return $response;
    }

}
