<?php

namespace App\Http\Middleware;

use Closure;

class Delete
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next , $SuperAdmin , $Admin)
    {

        $user = $request->user();
        return($user->hasRole($SuperAdmin)||$user->hasRole($Admin))? $next($request):response(view('errors.401'),401);
        return $next($request);
    }
}
