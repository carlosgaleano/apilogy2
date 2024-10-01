<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckEnvironment
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Permitir el acceso a las rutas de prueba si el entorno es local o testing
        if (app()->environment(['local', 'testing'])) {
            return $next($request);
        }

        // Si no está en local o testing, se puede devolver un 403 o redirigir
        abort(403, 'Acceso denegado');
    }
}
