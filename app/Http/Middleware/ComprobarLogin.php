<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ComprobarLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //Si el usuario esta logueado todo sigue normal
        if(Auth::check()){
            return $next($request);
        }
        
        return response() -> json([
            'error' => 'El usuario no ha iniciado sesión'
        ]);

    }
}
