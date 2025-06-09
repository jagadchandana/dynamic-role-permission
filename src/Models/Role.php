<?php
namespace JCS\RolePermission\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
protected $fillable = ['name'];

public function permissions()
{
return $this->belongsToMany(Permission::class);
}

public function users()
{
return $this->belongsToMany(config('rolepermission.user_model'));
}
}