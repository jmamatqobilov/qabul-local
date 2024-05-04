<?php

namespace App\Models;

use App\Traits\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DObjectType extends Model
{
    use Translatable, SoftDeletes;

    protected $fillable = [
        'name_ru',
        'name_uz',
        'code',
        'direction_id',
        'endpoint_fields'
    ];

    public function direction()
    {
        return $this->belongsTo('App\Models\Direction');
    }

    public function endpoints()
    {
        return $this->hasMany('App\Models\Endpoint', 'object_type_id', 'id');
    }

    public function getEndpointFieldsAttribute($value)
    {
        if (is_null($value)) {
            if ($this->direction->code == 't' || $this->direction->code == 's') {
                $value = '{"ts_assembly_value":"","ts_cable_length":"","ts_cable_type_new":"","ts_cable_vols":""}';
            } elseif ($this->direction->code == 'r' || $this->direction->code == 'm') {
                $value = '{"rm_broadcasting_standard":"","rm_station_power":"","rm_station_purpose":"","rm_antenna_type":"","rm_antenna_suspension_height":"","rm_transceivers_count":""}';
            } else {
                $value = '{}';
            }
        }
        return $value;
    }
}
