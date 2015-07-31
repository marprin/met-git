<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use Session;
use Illuminate\Contracts\Auth\Guard;

class CustomMiddleware
{
    protected $auth;
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if($this->auth->guest())
        {
            return redirect()->guest('auth/login');
        }
        if($request->user()->role == 'Receptionist')
        {
            return redirect()->action('HomeController@getIndex');
        }
        return $next($request);
    }
}
