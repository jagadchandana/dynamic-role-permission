<?php

namespace JCS\RolePermission\Traits;

use JCS\RolePermission\Models\Role;

trait HasRoles
{
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_user');
    }

    // Optional helper methods
    public function hasRole($roleName)
    {
        return $this->roles()->where('name', $roleName)->exists();
    }

    public function assignRole($role)
    {
        if (is_string($role)) {
            $role = Role::where('name', $role)->firstOrFail();
        }
        return $this->roles()->syncWithoutDetaching($role);
    }

    // Add other permission helpers if you want
}
