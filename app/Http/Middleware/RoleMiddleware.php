<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {   
        //en este if lo que hacmeos es que el in_array recorre el array de roles
        //comparandolo con el que tiene el usuario y si no es uno de ellos 
        //no da acceso 
        if(!in_array($request->user()->rol->nombre, $roles)){
            return response()->json([
                'messege' => 'No autorizado'
            ],403);
        }
        return $next($request);
    }
}
