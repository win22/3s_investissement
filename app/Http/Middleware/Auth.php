<?php

namespace App\Http\Middleware;

use Closure;
use \Illuminate\Support\Facades\Auth as basic_auth;
class Auth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(basic_auth::guest())
        {
            return redirect('/investi_admin')
                ->withErrors([
                    'email' => 'Vous devez etre connecté pour acceder à cette page']);
        }
        return $next($request);
    }
}
