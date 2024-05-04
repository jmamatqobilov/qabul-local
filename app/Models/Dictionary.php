<?php

namespace App\Models;

use App\Traits\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Dictionary extends Model
{
    use Translatable, SoftDeletes;

    protected $fillable = ['name_ru', 'name_uz', 'code','direction_id'];

    public function direction(){
        return $this->belongsTo('App\Models\Direction');
    }

    public function values(){
        return $this->hasMany('App\Models\DictionaryValue')->orderBy('name_ru')->orderBy('name_uz');
    }
}
