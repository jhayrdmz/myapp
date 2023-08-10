<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        $subdomain = Arr::first(explode('.', request()->getHost()));

        if (in_array($subdomain, ['admin', 'merchant', 'pos'])) {
            return route($subdomain . '.auth.login');
        }

        return $request->expectsJson() ? null : route('login');
    }
}
