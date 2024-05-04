<?php

namespace App\Models;

use App\Traits\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ApplicationStatus extends Model
{
    use Translatable, SoftDeletes;

    protected $fillable = [
        'name_ru',
        'name_uz',
        'code',
        'description',
        'class_name',
        'level'
    ];

    public function applications(){
        return $this->hasMany('App\Models\Application');
    }

    public function change_log(){
        return $this->hasMany('App\Models\StatusChange','status_id','id');
    }
}
