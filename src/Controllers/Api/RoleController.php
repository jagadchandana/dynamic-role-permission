<?php
namespace JCS\RolePermission\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use JCS\RolePermission\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        return Role::all();
    }
    public function store(Request $request)
    {
        return Role::create($request->only('name'));
    }
    public function show(Role $role)
    {
        return $role;
    }
    public function update(Request $request, Role $role)
    {
        $role->update($request->only('name'));
        return $role;
    }
    public function destroy(Role $role)
    {
        $role->delete();
        return response()->noContent();
    }

    public function assignPermissions(Request $request, Role $role)
    {
        $role->permissions()->sync($request->input('permission_ids', []));
        return $role->load('permissions');
    }

    public function assignUsers(Request $request, Role $role)
    {
        $role->users()->sync($request->input('user_ids', []));
        return $role->load('users');
    }
}