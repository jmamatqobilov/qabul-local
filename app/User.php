<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Spatie\Image\Image;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *permissions
     * @var array
     */
    protected $fillable = [
        'company_name',
        'email',
        'photo',
        'direction_id',
        'territory_id',
        'is_director',
        'director_fio',
        'inn',
        'address',
        'license',
        'password',
    ];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'is_director'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles(){
        return $this->belongsToMany('App\Role','role_user');
    }

    public function direction(){
        return $this->belongsTo('App\Models\Direction');
    }

    public function territory(){
        return $this->belongsTo('App\Models\Territory');
    }

    public function documents(){
        return $this->hasMany('App\Models\Document');
    }

    public function applications(){
        return $this->hasMany('App\Models\Application','owner_id','id');
    }

    public function change_log(){
        return $this->hasMany('App\Models\StatusChange','user_id','id');
    }

    public function messages(){
        return $this->hasMany('App\Models\ExtendMessage','user_id','id');
    }

    public function entryLogs(){
        return $this->hasMany('App\Models\EntryLog','user_id','id')->orderBy('created_at', 'DESC');;
    }
    public function lastEntry(){
        return $this->hasMany('App\Models\EntryLog','user_id','id')->latest()->first();
    }

    public function getCurrentUserAttribute(){
        return $this->id == Auth::user()->id;
    }

    public function getPhotoFormattedAttribute(){
        if($this->photo) {
            $thumbImage = 'photos/u'.$this->id.'/thumbs/'.basename($this->photo);
            if (!Storage::exists($thumbImage)) {
                if (!File::isDirectory('photos/u' . $this->id))
                    File::makeDirectory('photos/u' . $this->id);
                if (!File::isDirectory('photos/u' . $this->id . '/thumbs'))
                    File::makeDirectory('photos/u' . $this->id . '/thumbs');
                Image::load($this->photo)->width(200)->height(200)->save(
                    'photos/u'.$this->id.'/thumbs/'.basename($this->photo)
                );
            }
            return $thumbImage;
        }
        return null;
    }

    public static function director(){
        return User::where('is_director','true')->get();
    }

    public function assignRole(Role $role)
    {
        return $this->roles()->save($role);
    }

    public function canDo($permission, $require = false){
        if(is_array($permission)){
            foreach ($permission as $permName){
                $permName = $this->canDo($permName);
                if($permName && !$require){
                    return true;
                }elseif (!$permName && $require){
                    return false;
                }
            }
            return $require;
        }else{
            foreach ($this->roles as $role){
                foreach($role->permissions as $perm){
                    if(Str::is($permission,$perm->name)){
                        return true;
                    }
                }
            }
        }
    }

    public function hasRole($name, $require = false){
        if(is_array($name)){
            foreach ($name as $roleName){
                $hasRole = $this->hasRole($roleName);
                if($hasRole && !$require){
                    return true;
                }elseif (!$hasRole && $require){
                    return false;
                }
            }
            return $require;
        }else{
            foreach ($this->roles as $role){
                if($role->code == $name){
                    return true;
                }
            }
        }
    }
}
