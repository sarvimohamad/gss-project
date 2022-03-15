<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CaptchaMiddleware
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
        if ($request->method() == 'POST') {

            $rules = ['captcha' => 'required|captcha'];
            $request->validate($rules);
        }
        return $next($request);
    }
}
