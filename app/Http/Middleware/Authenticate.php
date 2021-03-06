<?php

namespace App\Http\Middleware;

use App\Exceptions\ApiException;
use Closure;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Contracts\Auth\Factory as Auth;
use Illuminate\Support\Facades\Config;

class Authenticate
{

    /**
     * The authentication guard factory instance.
     *
     * @var \Illuminate\Contracts\Auth\Factory
     */
    protected $auth;

    /**
     * Create a new middleware instance.
     *
     * @param  \Illuminate\Contracts\Auth\Factory  $auth
     *
     * @return void
     */
    public function __construct(Auth $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     *
     * @return mixed
     */
    public function handle(\Illuminate\Http\Request $request, Closure $next, $guard = null)
    {
        if ($this->auth->guard($guard)->guest()) {
            throw  new ApiException(\response()->json([
                'status' => 401,
            ]));
        }


        return $next($request);
    }

}
