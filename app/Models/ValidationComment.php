<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ValidationComment extends Model
{
    use SoftDeletes;

    protected $fillable = [
        't_object_id',
        's_object_id',
        'r_object_id',
        'm_object_id',
        'field_name',
        'comment',
        'is_solved'
    ];


}
