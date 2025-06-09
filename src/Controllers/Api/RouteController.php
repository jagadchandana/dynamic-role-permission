<?php

namespace JCS\RolePermission\Controllers\Api;

use Illuminate\Http\Request;
use JCS\RolePermission\Models\Permission;
use JCS\RolePermission\Models\PermissionRoute;
use Illuminate\Routing\Controller;

class RouteController extends Controller
{
    public function assignRoutes(Request $request, Permission $permission)
    {
        $request->validate(['routes' => 'required|array']);
        $permission->routes()->delete();

        foreach ($request->routes as $route) {
            PermissionRoute::create([
                'permission_id' => $permission->id,
                'route_name' => $route,
            ]);
        }

        return response()->json(['message' => 'Routes assigned.']);
    }
}
