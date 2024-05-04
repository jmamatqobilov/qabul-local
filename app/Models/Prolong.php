<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Prolong extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'application_id',
        'message_id',
        'order',
        'decree_num',
        'decree_date',
        'deadline_date',
        'old_deadline_date'
    ];

    public function getDecreeFormatAttribute()
    {
        return __(':decreenumFA-:prolongnum от :decreedate', ['decreenum' => $this->application->decree_num, 'prolongnum' => $this->decree_num, 'decreedate' => \Carbon\Carbon::parse($this->decree_date)->formatLocalized('%d.%m.%Y')]);
    }

    public function getDeadlineDateFormatAttribute()
    {
        return \Carbon\Carbon::parse($this->deadline_date)->formatLocalized('%d.%m.%Y');
    }

    public function getOldDeadlineDateFormatAttribute()
    {
        return \Carbon\Carbon::parse($this->old_deadline_date)->formatLocalized('%d.%m.%Y');
    }

    public function application(){
        return $this->belongsTo('App\Models\Application','application_id','id');
    }

    public function message(){
        return $this->belongsTo('App\Models\ExtendMessage', 'message_id', 'id');
    }


}
