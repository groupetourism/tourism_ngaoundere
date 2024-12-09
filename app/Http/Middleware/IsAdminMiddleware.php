<?php

namespace App\Http\Middleware;

use App\Http\Traits\ApiResponse;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsAdminMiddleware
{
    use ApiResponse;
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();
        if (!$user->is_admin){
            return $this->respondError('vous n\'avez pas le role et les permissions requise pour accéder a la resource', Response::HTTP_FORBIDDEN);
        }
        return $next($request);
    }
}
