<?php

namespace App\Models;

use Laratrust\Models\LaratrustPermission;

class Permission extends LaratrustPermission
{
    public $guarded = [];

    public function module(){
        return $this->belongsTo('App\Models\Module');
    }

    public function permission_role()
    {
        return $this->hasMany('App\Models\PermissionRole');
    }

    public function permission_with_role($permission_id, $role_id)
    {
        return PermissionRole::where('permission_id', $permission_id)
            ->where('role_id', $role_id)->first();
    }
}
