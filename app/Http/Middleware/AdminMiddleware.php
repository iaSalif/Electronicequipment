<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next)
    {
        // Vérifie si l'utilisateur est connecté et s'il est un administrateur
        if (Auth::user()->utype != 'ADM') {
            session()->flush();
            // Si l'utilisateur n'est pas admin, redirige vers une autre page
            return redirect()->route('login')->with('error', 'Accès refusé. Vous devez être administrateur.');
           
        }
        return $next($request); // Permet de continuer
    }
}
