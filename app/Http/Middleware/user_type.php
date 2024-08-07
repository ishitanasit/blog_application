<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class user_type
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
       // Check if the user is authenticated and is an admin
    if(auth()->check() && auth()->user()->user_type == 1){
        return $next($request); 
    }
    
    
    return redirect('')->with('error', "You don't have admin access.");
        
    }
}