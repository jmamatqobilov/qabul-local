<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

abstract class ParentObject extends Model
{
//    use SoftDeletes;

    protected $file_areas = [
        ['object_type_id', 'select', 'required', 'd_object_types', 'id']
    ];
    protected $dates = ['deleted_at'];
    public $child_prefix;

    public function __construct($file_areas = [])
    {
        $this->file_areas = $file_areas;
    }

    public function application()
    {
        return $this->belongsTo('App\Models\Application', 'application_id', 'id')->withTrashed();
    }

    public function getFileAreas()
    {
        return $this->file_areas;
    }

    public function getValidationArray()
    {
        $valarr = [];
        foreach ($this->file_areas as $field) {
            if ($field[1] == 'file') {
                $valarr[$field[0] . '_file[]'] = ($field[2] == 'required' ? 'required_without:' . $field[0] . '|' : '') . 'mimes:jpeg,bmp,png,pdf,doc,docx,xlsx,rar,zip,jpg|max:10240';
                $valarr[$field[0]] = ($field[2] == 'required' ? 'required_without:' . $field[0] . '_file|' : '') . 'numeric|gt:0|nullable';
            } elseif ($field[1] == 'text') {
                $valarr[$field[0]] = ($field[2] ? $field[2] : '');
            } elseif ($field[1] == 'select') {
                $valarr[$field[0]] = ($field[2] ? $field[2] . '|' : '') . 'exists:' . $field[3] . ',' . $field[4];
            }
        }
        return $valarr;
    }

    public function getValidationFilesArray()
    {
        return [
            "loyiha-smeta_file.*" => "mimes:jpeg,bmp,png,pdf,doc,docx,xlsx,rar,zip,jpg|max:10240",
            "ekpulatatsiya-r_file.*" => "mimes:jpeg,bmp,png,pdf,doc,docx,xlsx,rar,zip,jpg,|max:10240",
            "antenna-machta-m_file.*" => "mimes:jpeg,bmp,png,pdf,doc,docx,xlsx,rar,zip,jpg,|max:10240",
            "ffv_file.*" => "mimes:jpeg,bmp,png,pdf,doc,docx,xlsx,rar,zip,jpg,|max:10240",
            "sanitariya-r_file.*" => "mimes:jpeg,bmp,png,pdf,doc,docx,xlsx,rar,zip,jpg,|max:10240",
            "operativ-qidiruv_file.*" => "mimes:jpeg,bmp,png,pdf,doc,docx,xlsx,rar,zip,jpg,|max:10240",
            "tugallangan-obyekt_file.*" => "mimes:jpeg,bmp,png,pdf,doc,docx,xlsx,rar,zip,jpg,|max:10240",

            "loyiha-smeta_file[]" => "mimes:jpeg,bmp,png,pdf,doc,docx,xlsx,rar,zip,jpg|max:10240",
            "ekpulatatsiya-r_file[]" => "mimes:jpeg,bmp,png,pdf,doc,docx,xlsx,rar,zip,jpg,|max:10240",
            "antenna-machta-m_file[]" => "mimes:jpeg,bmp,png,pdf,doc,docx,xlsx,rar,zip,jpg,|max:10240",
            "ffv_file[]" => "mimes:jpeg,bmp,png,pdf,doc,docx,xlsx,rar,zip,jpg,|max:10240",
            "sanitariya-r_file[]" => "mimes:jpeg,bmp,png,pdf,doc,docx,xlsx,rar,zip,jpg,|max:10240",
            "operativ-qidiruv_file[]" => "mimes:jpeg,bmp,png,pdf,doc,docx,xlsx,rar,zip,jpg,|max:10240",
            "tugallangan-obyekt_file[]" => "mimes:jpeg,bmp,png,pdf,doc,docx,xlsx,rar,zip,jpg,|max:10240",
        ];
    }

    public function getCustomValidationMessage(){
        $valarr = [];
        foreach($this->file_areas as $field){
            if($field[1] == 'file'){
                $valarr[$field[0].'.required_without'] = '';
                $valarr[$field[0].'_file.required_without'] = __('validation.custom_required_without');
            }
        }
        return $valarr;
    }
    public function getCustomAttributes(){
        $valarr = [];
        foreach($this->file_areas as $field){
            $valarr[$field[0]] = __('fieldnames.'.$field[0]);
        }
        return $valarr;
    }
    public function getCommentValidationArray(){
        $valarr = [];
        foreach($this->getFileAreas() as $field){
            $valarr[$field[0].'_comment'] = 'max:255';
        }
        return $valarr;
    }

    public function comments(){
        return $this->hasMany('App\Models\ValidationComment',$this->child_prefix.'_object_id','id')->where('is_solved',false);
    }

    public function inspections(){
        return $this->hasMany('App\Models\Inspection',$this->child_prefix.'_object_id','id');
    }
    public function endpoints(){
        return $this->hasMany('App\Models\Endpoint',$this->child_prefix.'_object_id','id');
    }
    public function endpoints_all(){
        return $this->hasMany('App\Models\Endpoint',$this->child_prefix.'_object_id','id')->withTrashed();
    }

    public function object_type(){
        return $this->belongsTo('App\Models\DObjectType','object_type_id','id');
    }
    public function docrel($foreignKey){
        return $this->belongsTo('App\Models\Document', $foreignKey,'id');
    }
// mine
    public function documents()
    {
        return $this->hasMany('App\Models\Document');
    }

    public function getNameAttribute()
    {
        return $this->object_type->name.' - '.$this->punkt_ustanovki;
    }
}
