<?php
namespace JCS\RolePermission\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use JCS\RolePermission\Models\Permission;

class PermissionController extends Controller
{
    public function index()
    {
        return Permission::all();
    }
    public function store(Request $request)
    {
        return Permission::create($request->only('name'));
    }
    public function show(Permission $permission)
    {
        return $permission;
    }
    public function update(Request $request, Permission $permission)
    {
        $permission->update($request->only('name'));
        return
            $permission;
    }
    public function destroy(Permission $permission)
    {
        $permission->delete();
        return response()->noContent();
    }
}