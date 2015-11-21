<?php
namespace Koter84\SolAuth\Http;

use Closure;
use Illuminate\Support\Facades\Session;

class SolLogin
{
    /**
     * Handle an incoming request and check for playerId in the session
     * If it cannot be found it will redirect the the URL in the config
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Session::has('email')) {
            return $next($request);
        }
        return redirect('/'.config('sol.loginUrl', 'sollogin'));
    }
}
