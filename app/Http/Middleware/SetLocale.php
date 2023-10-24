<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class SetLocale
{
    public function handle($request, Closure $next)
    {
        if ($locale = $request->session()->get('locale')) {
            app()->setLocale($locale);
        }

        return $next($request);
    }
}
