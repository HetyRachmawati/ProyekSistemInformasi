<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  mixed  ...$roles
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        $user = Auth::user();

        // Cek jika user login dan perannya sesuai dengan salah satu yang diizinkan
        if ($user && in_array($user->role, $roles)) {
            return $next($request);
        }

        // Jika tidak sesuai, tampilkan halaman 403 (Forbidden)
        abort(403, 'Anda tidak memiliki akses ke halaman ini.');
    }
}
