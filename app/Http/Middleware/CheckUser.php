<?php

namespace App\Http\Middleware;

use Closure;

class CheckUser
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
        if($request->session()->has('user'))
        {
            if($request->session()->get('user')->level == 1){
             return $next($request);
            }
            
            else{
              return redirect()->route('home');  
            }
        }
        return redirect()->route('login');
    }
}
