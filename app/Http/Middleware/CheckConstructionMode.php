<?php

namespace App\Http\Middleware;

use App\Models\Alarms;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckConstructionMode
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $alarms = Alarms::latest()->first();
        if ($alarms && $alarms->construction == 1) {
            return redirect()->route('humidity.create')->with('alert_e', __('messages.constructionsIsOn'));
        }
        return $next($request);
    }
}
