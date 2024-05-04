<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Document extends Model
{
    use SoftDeletes;
    //
    protected $fillable = ['file_name', 'file_url', 'doc_type', 't_object_id', 's_object_id', 'r_object_id', 'm_object_id' ];
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function applications(){
        return $this->hasMany('App\Models\Application');
    }
    public function t_objects(){
        return $this->hasMany('App\Models\TObject');
    }
    public function s_objects(){
        return $this->hasMany('App\Models\SObject');
    }
    public function r_objects(){
        return $this->hasMany('App\Models\RObject');
    }
    public function m_objects(){
        return $this->hasMany('App\Models\MObject');
    }

}
