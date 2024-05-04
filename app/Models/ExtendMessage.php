<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ExtendMessage extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'text',
        'attachment',
        'application_id',
        'author_id'
    ];

    public function application(){
        return $this->belongsTo('App\Models\Application','application_id','id')->withTrashed();
    }

    public function author(){
        return $this->belongsTo('App\User','author_id','id');
    }

    public function prolongs(){
        return $this->hasMany('App\Models\Prolong','application_id','id');
    }
}
