<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class TokenExpiration
{
    public function handle(Request $request, Closure $next)
    {


         // Verificar si el usuario está autenticado
         if (!Auth::check()) {
            // Si no está autenticado, devolver un JSON con el mensaje de error
            return response()->json(['message' => 'No autorizado'], 401);
        }

        // Obtener el token del usuario autenticado
        $token = $request->user()->currentAccessToken();

        if ($token) {
            // Obtener la fecha de creación del token
            $createdAt = $token->created_at;

            // Comparar con la hora actual para verificar si ha pasado más de 30 minutos
            $tokenAge = Carbon::parse($createdAt)->diffInMinutes(Carbon::now());

            if ($tokenAge > 30) {
                // Si el token tiene más de 30 minutos, eliminar el token y retornar un error
                //$token->delete();
                // Si el token tiene más de 30 minutos, inhabilitar el token
                $token->update(['is_active' => false]); // Inhabilitar el token
                return response()->json(['message' => 'Token expired'], 401);
            }
        }

        return $next($request);
    }
}
