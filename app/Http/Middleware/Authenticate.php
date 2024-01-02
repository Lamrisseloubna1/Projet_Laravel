<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {    
          // Check if the user is authenticated and is an admin
        if (!$request->expectsJson() && auth()->check() && auth()->user()->is_admin) {
            return view('create'); // Return the create.blade.php view
        }

        // Default redirection for unauthenticated users
        return $request->expectsJson() ? null : route('login');
    }
}
