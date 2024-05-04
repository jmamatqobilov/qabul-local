<?php

namespace App\Traits;

use Illuminate\Support\Facades\App;

trait Translatable{
    protected $defaultLocale = 'ru';

    public static function boot()
    {
        parent::boot();
        static::retrieved(function($model)
        {
            $model->append('name');
        });
    }
    public function getNameAttribute()
    {
        $locale = App::getLocale() ?? config('app.locale');
        $fieldname = 'name_'.$locale;
        return $this->$fieldname;
    }

    public function getAlterAttribute()
    {
        $locale = App::getLocale() ?? config('app.locale');
        $fieldname = 'alter_'.$locale;
        return $this->$fieldname;
    }
}
