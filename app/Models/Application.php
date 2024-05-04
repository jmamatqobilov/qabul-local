<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Application extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'direction_id',
        'objects_count',
        'order_id',
        'act_id',
        'owner_id',
        'hududiy_id',
        'decree_id',
        'decree_num',
        'decree_date',
        'responsible',
        'deadline_date',
        'apply_datetime',
        'deny_comment',
        'final_act_id',
        'failed_issue',
        'status_id'
    ];

    public function getDecreeFormatAttribute()
    {
        return __(':decreenum-FA от :decreedate', ['decreenum' => $this->decree_num, 'decreedate' => \Carbon\Carbon::parse($this->decree_date)->formatLocalized('%d.%m.%Y')]);
    }

    public function getDeadlineDateFormatAttribute()
    {
        return \Carbon\Carbon::parse($this->deadline_date)->formatLocalized('%d.%m.%Y');
    }

    public function owner(){
        return $this->belongsTo('App\User','owner_id','id')->withTrashed();
    }
    public function photos(){
        return $this->hasManyThrough('App\Models\Photo', 'App\Models\Inspection');
    }
    public function hududiy(){
        return $this->belongsTo('App\Models\Territory','hududiy_id','id');
    }
    public function direction(){
        return $this->belongsTo('App\Models\Direction','direction_id', 'id');
    }

    public function order(){
        return $this->belongsTo('App\Models\Document','order_id','id');
    }
    public function act(){
        return $this->belongsTo('App\Models\Document','act_id','id');
    }
    public function final_act(){
        return $this->belongsTo('App\Models\Document','final_act_id','id');
    }

    public function decree(){
        return $this->belongsTo('App\Models\Document','decree_id','id');
    }

    public function status(){
        return $this->belongsTo('App\Models\ApplicationStatus','status_id','id');
    }

    public function objects(){
        $objects = $this->direction->code.'_objects';
        return $this->$objects();
    }
    public function numberOfEndpoints(){
        return count($this->endpoints->whereNull('deleted_at'));
    }
    public function numberOfObjects(){
        return count($this->objects->whereNull('deleted_at'));
    }
    public function numberOfDeletedObjects(){
        return count($this->objects->whereNotNull('deleted_at'));
    }
    public function numberOfAllObjects(){
        return count($this->objects);
    }

    public function t_objects(){
        return $this->hasMany('App\Models\TObject','application_id','id');
    }
    public function s_objects(){
        return $this->hasMany('App\Models\SObject','application_id','id');
    }
    public function r_objects(){
        return $this->hasMany('App\Models\RObject','application_id','id');
    }
    public function m_objects(){
        return $this->hasMany('App\Models\MObject','application_id','id');
    }
    public function endpoints(){
        return $this->hasMany('App\Models\Endpoint','application_id','id');
    }
    public function inspections(){
        return $this->hasMany('App\Models\Inspection','application_id','id')
            ->orderBy('updated_at', 'desc');
    }
    public function prolongs(){
        return $this->hasMany('App\Models\Prolong','application_id','id');
    }
    public function change_log(){
        return $this->hasMany('App\Models\StatusChange','application_id','id');
    }
    public function extendMessages(){
        return $this->hasMany('App\Models\ExtendMessage','application_id','id');
    }

    public function hasNotification($markAsRead = false){
        $returnVal = false;
        foreach(Auth::user()->unreadNotifications as $notification){
            if($notification->data['group'] == 'applications' && $notification->data['id'] == $this->id){
                $returnVal = true;
                if($markAsRead) $notification->markAsRead();
            }
        }
        return $returnVal;
    }

    public function
    getCurrentModel(){
        switch($this->direction->code){
            case 't': return new TObject; break;
            case 's': return new SObject; break;
            case 'r': return new RObject; break;
            case 'm': return new MObject; break;
        }
    }

    public function checkObjectId($object_id){
        return $this->objects()->where('id',$object_id)->firstOrFail();
    }

}
