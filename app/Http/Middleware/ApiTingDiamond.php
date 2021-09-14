<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ApiTingDiamond
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // if (! $request->user()->isTeamTingDiamond()) {
        //     return abort(403, 'Unauthorized.', $headers);
        // }

        return $next($request);
    }
}
