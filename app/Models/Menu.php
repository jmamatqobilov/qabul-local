<?php

namespace App\Models;

use App\Traits\Translatable;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use Translatable;

    protected $fillable = [
        'name_ru',
        'name_uz',
        'path',
        'parent',
        'role_id'
    ];

    public function getFillable()
    {
        return $this->fillable;
    }

    public function role(){
        return $this->belongsTo('App\Role');
    }
}
