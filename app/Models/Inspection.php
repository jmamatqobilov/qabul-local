<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Inspection extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'date',
        'employees',
        'inspection_act',
        'application_id',
        't_object_id',
        's_object_id',
        'r_object_id',
        'm_object_id'
    ];

    public function application(){
        return $this->belongsTo('App\Models\Application','application_id','id')->withTrashed();
    }

    public function photos(){
        return $this->hasMany('App\Models\Photo','inspection_id','id');
    }

    public function object(){
        $object = $this->application->direction->code.'_object';
        return $this->$object();
    }

    public function t_object(){
        return $this->belongsTo('App\Models\TObject','t_object_id','id');
    }
    public function s_object(){
        return $this->belongsTo('App\Models\SObject','s_object_id','id');
    }
    public function r_object(){
        return $this->belongsTo('App\Models\RObject','r_object_id','id');
    }
    public function m_object(){
        return $this->belongsTo('App\Models\MObject','m_object_id','id');
    }
}
