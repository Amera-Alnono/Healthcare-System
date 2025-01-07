<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserTypeMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check the user type and redirect accordingly
        if (auth()->check()) {
            $user = auth()->user();

            switch ($user->user_type) {
                case 'patient':
                    return redirect('/patient/dashboard');
                case 'doctor':
                    return redirect('/doctor/dashboard');
                case 'admin':
                    return redirect('/admin/dashboard');
            }
        }

        return $next($request);
    }
}
