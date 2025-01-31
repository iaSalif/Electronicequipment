<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    public function handle(Request $request, Closure $next)
    {
        // Vérifie si l'utilisateur est authentifié et si son rôle est 'admin'
        if (auth()->check() && auth()->user()->role == 'admin') {
            return $next($request);
        }

        return redirect('/'); // Redirige vers la page d'accueil si non admin
    }
}

