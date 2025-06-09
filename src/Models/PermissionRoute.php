<?php

namespace JCS\RolePermission\Models;

use Illuminate\Database\Eloquent\Model;

class PermissionRoute extends Model
{
    protected $fillable = ['permission_id', 'route_name'];

    public function permission()
    {
        return $this->belongsTo(Permission::class);
    }
}
