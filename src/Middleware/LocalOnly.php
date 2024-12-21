<?php

namespace Allenjd3\WireLook\Middleware;

use Closure;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class LocalOnly
{
    public function __construct(
        public Application $app,
    ) {}

    public function handle(Request $request, Closure $next): Response
    {
        if ($this->app->environment('production')) {
            abort(403, 'This action is not allowed in production');
        }

        return $next($request);
    }
}
