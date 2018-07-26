<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class ClearanceMiddleware {
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        if (Auth::user()->hasPermissionTo('Administer roles & permissions')) //If user has this //permission
        {
            return $next($request);
        }

        if($request->is("registration")){
            if(!Auth::user()->hasPermissionTo("CreateMobileUser")){
                abort("401");
            }else{
                return $next($request);
            }
        }

        if($request->is("lookup")){
            if(!Auth::user()->hasPermissionTo("lookup")){
                abort("401");
            }else{
                return $next($request);
            }
        }





        return $next($request);
    }
}