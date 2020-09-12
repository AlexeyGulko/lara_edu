<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RedirectTo
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, string $routeName)
    {
        $response = $next($request);
        if ($response->exception) {
            return $response;
        }
        return redirect()->route($routeName);
    }
}
