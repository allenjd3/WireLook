<?php

namespace Allenjd3\WireLook\Middleware;

use Closure;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

class LocalOnly
{
    public function __construct(
        public Application $app,
    ) {
    }

    public function handle(Request $request, Closure $next)
    {
        if ($this->app->environment('production')) {
            abort(403, "This action is not allowed in production");
        }

        return $next($request);
    }
}
