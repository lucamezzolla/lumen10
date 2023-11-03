<?php
namespace App\Http\Middleware;
use Closure;

class RoleMiddleware
{
    
    
    public function handle($request, Closure $next, $role)
    {
        if ($request->user() && $request->user()->role === $role) {
            return $next($request);
        }
        
        return response('Non autorizzato.', 403);
    }
    
}
