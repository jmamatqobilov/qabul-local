<?php

namespace App\Models;

use App\Traits\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\App;

class Territory extends Model
{
    use Translatable, SoftDeletes;
    protected $fillable = [
        'name_ru',
        'name_uz',
        'director_fio',
        'code'
    ];
    public function applications(){
        return $this->hasMany('App\Models\Application', 'hududiy_id','id');
    }
    public function users(){
        return $this->hasMany('App\User', 'territory_id', 'id');
    }

    public function getFullNameAttribute()
    {
        $locale = App::getLocale() ?? config('app.locale');
        $fieldname = 'name_'.$locale;
        return $this->$fieldname . ' - ' . $this->director_fio;
    }
}
