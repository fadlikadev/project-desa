<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Alert;

class CheckUserVerified
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
        $user = $request->user();

        if($user)
            if($user->status_verifikasi == true){
                return $next($request);
            }else{
                abort(401);
            }
        
        
        return abort(403);
    }
}
