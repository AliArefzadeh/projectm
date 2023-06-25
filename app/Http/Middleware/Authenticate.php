<?php

namespace App\Http\Middleware;

use App\Models\Alarms;
use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */

    /*public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            return back()->with('alert_e', __('messages.auth'));
        }

        return null;
    }*/

    protected function redirectTo(Request $request): ?string
    {
        return $request->expectsJson() ? null : route('login');


    }
}
