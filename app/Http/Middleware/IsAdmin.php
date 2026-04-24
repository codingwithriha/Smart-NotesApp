<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // ← This one import fixes ALL 4 errors
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    /**
     * Handle an incoming request.
     * This runs before every /admin/* route.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the user is logged in AND is an admin
        if (!Auth::check() || !Auth::user()->is_admin) {
            abort(403, 'Unauthorized - Admin access only');
        }

        // Check if the admin account has been blocked somehow
        if (Auth::user()->is_blocked) {
            Auth::logout();
            return redirect()->route('login')->with('error', 'Your account has been blocked.');
        }

        // All checks passed — let the request through
        return $next($request);
    }
}