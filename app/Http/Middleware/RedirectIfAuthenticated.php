<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        // Nếu không có guard nào được chỉ định, sử dụng guard mặc định
        if (empty($guards)) {
            $guards = ['web'];
        }

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                // Có thể redirect theo vai trò người dùng
                $role = Auth::user()->role;

                return redirect(match ($role) {
                    'admin' => '/admin/dashboard',
                    // 'employer' => '/employer/dashboard',
                    // 'candidate' => '/candidate/dashboard',
                    default => '/',
                });
            }
        }

        return $next($request);
    }
}
