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
        else{
            if(\Auth::user()->role == 'receptionist')
            {
                return redirect()->back();
            }
        }
        return $next($request);
    }
}
