<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Spatie\Image\Image;

class Photo extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'url',
        'title',
        'inspection_id'
    ];

    public function inspection(){
        return $this->belongsTo('App\Models\Inspection','inspection_id','id');
    }

    public function getUrlFormattedAttribute(){
        if($this->url) {
            $thumbImage = 'photos/a'.$this->inspection->application->id.'/thumbs/'.basename($this->url);
            if (!Storage::exists($thumbImage)) {
                if (!File::isDirectory('photos/a'.$this->inspection->application->id))
                    File::makeDirectory('photos/a'.$this->inspection->application->id);
                if (!File::isDirectory('photos/a'.$this->inspection->application->id.'/thumbs'))
                    File::makeDirectory('photos/a'.$this->inspection->application->id.'/thumbs');
                Image::load($this->url)->width(200)->height(200)->save(
                    'photos/a'.$this->inspection->application->id.'/thumbs/'.basename($this->photo)
                );
            }
            return $thumbImage;
        }
        return null;
    }
}
