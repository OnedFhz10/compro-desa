<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        if (! $request->user() || ! $request->user()->role) {
            abort(403, 'Unauthorized action.');
        }

        // Jika user memiliki salah satu dari role yang diizinkan
        if (in_array($request->user()->role->name, $roles)) {
            return $next($request);
        }

        abort(403, 'User does not have the right roles.');
    }
}
