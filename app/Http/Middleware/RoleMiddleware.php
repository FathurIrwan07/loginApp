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
    public function handle(Request $request, Closure $next, string $role): Response
    {
        // Pastikan user sudah login
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        $user = auth()->user();
        
        // Debug: Uncomment untuk melihat role user
        // dd('User role: ' . $user->role . ', Required role: ' . $role);
        
        // Cek apakah user memiliki role yang sesuai
        if ($user->role !== $role) {
            abort(403, 'Unauthorized access. You need ' . $role . ' role.');
        }

        return $next($request);
    }
}