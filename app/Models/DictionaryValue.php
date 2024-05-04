<?php

namespace App\Models;

use App\Traits\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DictionaryValue extends Model
{
    use Translatable, SoftDeletes;

    protected $fillable = [
        'name_ru',
        'name_uz',
        'code',
        'dictionary_id'
    ];

    public function dictionary(){
        return $this->belongsTo('App\Models\Dictionary');
    }

    public function endpoints(){
        return $this->hasMany('App\Models\DictionaryValue');
    }
}
