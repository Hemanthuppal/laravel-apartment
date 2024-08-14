<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();

        // Check if the user is not an admin
        if ($user->usertype != 'admin') {
            // Redirect to manager dashboard if user is a manager
            if ($user->usertype == 'manager') {
                return redirect()->route('manager.dashboard');
            }
            if ($user->usertype == 'resident') {
                return redirect()->route('resident.dashboard');
            }
            if ($user->usertype == 'superadmin') {
                return redirect()->route('superadmin.dashboard');
            }
            if ($user->usertype == 'watchman') {
                return redirect()->route('watchman.dashboard');
            }
            // Otherwise, redirect to general dashboard
            return redirect('dashboard');
        }

        return $next($request); // Allow the request to proceed for admin
    }
}
