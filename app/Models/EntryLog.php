<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EntryLog extends Model
{
    protected $fillable = [
        'user_id',
        'entry_date',
        'ip_address',
        'user_agent',
        'session_id'
    ];

    public function user(){
        return $this->belongsTo('App\User','user_id','id');
    }

    public function getEntryDateFormatAttribute(){
        return \Carbon\Carbon::parse($this->entry_date)->formatLocalized('%d.%m.%Y');
    }
}
