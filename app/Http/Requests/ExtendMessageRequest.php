<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ExtendMessageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //sreturn (Auth::user()->canDo('MANAGE_APPLICATIONS') || Auth::user()->canDo('ADD_ENDPOINT')); //false;
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'text' => 'required|min:3|max:1000',
            'attachment'=> 'mimes:jpeg,bmp,png,pdf,doc,docx,xlsx,rar,zip,jpg|max:100000',
        ];
    }
}
