<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StatusChange extends Model
{
    protected $fillable = [
        'event_date',
        'user_id',
        'application_id',
        'status_id'
    ];

    public function status(){
        return $this->belongsTo('App\Models\ApplicationStatus', 'status_id','id');
    }

    public function application(){
        return $this->belongsTo('App\Models\Application', 'application_id', 'id');
    }

    public function user(){
        return $this->belongsTo('App\User','user_id', 'id');
    }

}
