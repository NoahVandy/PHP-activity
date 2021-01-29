<?php

namespace App\Http\Middleware;

use Closure;
use App\Services\Utility\MyLogger1;
use App\Services\Utility\MyLogger2;
use Illuminate\Support\Facades\Cache;

class MySecurityMiddleware
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
        $path = $request->path();
        MyLogger2::info("Entering My Security Middlewaare in handle() at path: " . $path);
        
        $secureCheck = true;
        if($request->is('/') ||
            $request->is('login5') || 
            $request->is('doLogin') ||
            $request->is('usersrest') ||
            $request->is('usersrest/*'))
        {
            $secureCheck = false;
        }
        MyLogger2::info($secureCheck ? "Entering My security Middleware in handle() security required" :  "Entering My security Middleware in handle() no security require");
        
        $enable = false;
        if($enable && $secureCheck)
        {
            MyLogger2::info("Leaving my security middleware in handle() doing a redirect back to login()");
            return redirect('/login5');
        }
        return $next($request);
        
    }
}
