<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckUserType
{
    public function handle(Request $request, Closure $next, ...$types)
    {
        $user = Auth::user();

        if ($user && in_array($user->tipo, $types)) {
            return $next($request);
        }

        return redirect('/dashboard')->with('error', 'No tienes permiso para acceder a esta página.');
    }
}
