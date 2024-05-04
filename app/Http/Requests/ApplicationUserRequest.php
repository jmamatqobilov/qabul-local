<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ApplicationUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return (Auth::user()->canDo('MANAGE_APPLICATIONS') || Auth::user()->canDo('GIVE_APPLICATION')); //false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $required = 'required|';
        if(in_array($this->method(), ['PUT', 'PATCH']))
            $required = '';
        return [
            'hududiy_id'=> 'required|exists:territories,id',
            'direction_id'=> 'required|exists:directions,id',
            'objects_count'=> 'required|numeric|min:1|max:999|not_in:0',
            'order'=> 'mimes:jpeg,bmp,png,pdf,doc,docx,xlsx,rar,zip,jpg|max:100000',
            'final_act'=> 'mimes:jpeg,bmp,png,pdf,doc,docx,xlsx,rar,zip,jpg|max:100000'
        ];
    }

}
