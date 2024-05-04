<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public function users(){
        return $this->belongsToMany('App\User','role_user');
    }

    public function permissions(){
        return $this->belongsToMany('App\Permission','permission_role');
    }

    public function menus(){
        return $this->hasMany('App\Models\Menu', 'role_id','id')->orderBy('sort','asc')->orderBy('id','asc');
    }

    public function assignPermission(Permission $permission)
    {
        return $this->permissions()->save($permission);
    }
}
