<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @param  mixed  $roles
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        if (!Auth::check()) {
            // Jika pengguna tidak terautentikasi, lakukan redirect ke halaman login
            return redirect('/login');
        }

        $userRoles = Auth::user()->role;

        foreach ($roles as $role) {
            if ($userRoles === $role) {
                return $next($request);
            }
        }

        // Jika pengguna tidak memiliki peran yang sesuai, tampilkan halaman error atau redirect ke halaman tertentu
        // abort(403, 'Unauthorized');
        return redirect('/dashboard');
    }
}