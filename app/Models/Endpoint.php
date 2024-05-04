<?php

namespace App\Models;

use Collective\Html\Eloquent\FormAccessible;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Endpoint extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'application_id',
        'object_type_id',
        'endpoint_type',
        'vendor_name',
        'model',
        'vendor_country',
        'produce_year',
        'ts_assembly_value',
        'ts_cable_length',
        'ts_cable_length_',
        'ts_cable_type_new',
        'ts_cable_vols',
        'rm_broadcasting_standard',
        'rm_station_power',
        'rm_station_purpose',
        'rm_antenna_type',
        'rm_antenna_suspension_height',
        'rm_transceivers_count',
        'deny_comment',
        't_object_id',
        's_object_id',
        'r_object_id',
        'm_object_id',
        'qol_soha',
    ];

    public function application(){
        return $this->belongsTo('App\Models\Application','application_id','id')->withTrashed();
    }
    public function object_type(){
        return $this->belongsTo('App\Models\DObjectType','object_type_id','id');
    }
    public function cable_type(){
        return $this->belongsTo('App\Models\DictionaryValue', 'ts_cable_type_new', 'id');
    }
    public function cable_vols(){
        return $this->belongsTo('App\Models\DictionaryValue', 'ts_cable_vols', 'id');
    }
    public function broadcasting_standard(){
        return $this->belongsTo('App\Models\DictionaryValue', 'rm_broadcasting_standard', 'id');
    }
    public function station_purpose(){
        return $this->belongsTo('App\Models\DictionaryValue', 'rm_station_purpose', 'id');
    }
    public function antenna_type(){
        return $this->belongsTo('App\Models\DictionaryValue', 'rm_antenna_type', 'id');
    }

    public function object(){
        $object = $this->application->direction->code.'_object';
        if($this->$object) return $this->$object();
        else{
            foreach (Direction::all() as $direction){
                if($this->application->direction == $direction) continue;
                $object = $direction->code.'_object';
                if($this->$object) return $this->$object();
            }
        }
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
