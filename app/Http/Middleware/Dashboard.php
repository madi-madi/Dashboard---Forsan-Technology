<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class Dashboard
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
// dd($user->hasRole());
        if (Auth::guest()) {
            # code...

       
       return response(view('errors.401'),401);
        

         }else
         {
            return($user->hasRole($SuperAdmin)||$user->hasRole($Admin) && Auth::check())? $next($request):response(view('errors.401'),401);
           
         }
        return $next($request);

    }
}
