<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class TeamTingDiamond
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

        if (! $request->user()) {
            // dd(auth()->viaRequest('user'));
            return redirect(app()->getLocale() .'/login');

        }
        // dd($request->user());
        if ( $request->user()->isTeamTingDiamond()) {

            if (! strpos(url()->current(), '/adm')) {
                return redirect('/adm');            
            }
        }else{

            if (! strpos(url()->current(), '/account')) {
                return redirect(app()->getLocale() .'/account');            
            }
        }

        return $next($request);
    }
}
