<?php

namespace App\Models;

use App\Traits\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Str;

class Direction extends Model
{
    use Translatable, SoftDeletes;

    protected $fillable = [
        'name_ru',
        'name_uz',
        'code'
    ];

    public function object_types(){
        return $this->hasMany('App\Models\DObjectType')->orderBy('id');
    }
    public function dictionaries(){
        return $this->hasMany('App\Models\Dictionary');
    }
    public function applications(){
        return $this->hasMany('App\Models\Application');
    }
    public function objects(){
        return $this->hasManyThrough('App\Models\\'.Str::upper($this->code).'Object', 'App\Models\Application')->withTrashedParents();
    }
    public function endpoints(){
        return $this->hasManyThrough('App\Models\Endpoint', 'App\Models\Application')->withTrashedParents();
    }

    public function users(){
        return $this->hasMany('App\User');
    }
}
