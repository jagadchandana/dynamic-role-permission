<?php

namespace JCS\RolePermission\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class UserController extends Controller
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = app(config('rolepermission.user_model'));
    }

    public function assignRoles(Request $request, $userId)
    {
        $request->validate(['roles' => 'required|array']);

        $user = $this->userModel::findOrFail($userId);
        $user->roles()->sync($request->roles);

        return response()->json(['message' => 'Roles assigned.']);
    }

    public function roles($userId)
    {
        $user = $this->userModel::findOrFail($userId);
        return response()->json($user->roles);
    }
}
