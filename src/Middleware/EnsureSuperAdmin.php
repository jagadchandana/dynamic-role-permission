<?php

namespace JCS\RolePermission\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureSuperAdmin
{
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();

        if (!$user || !$user->hasRole(config('rolepermission.super_admin_role'))) {
            return response()->json(['message' => 'Forbidden. Super Admins only.'], 403);
        }

        return $next($request);
    }
}
