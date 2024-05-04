<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class EntityRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::user()->canDo('MANAGE_DICTIONARY'); //false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'direction_id' => 'sometimes|required|exists:directions,id',
            'name_ru' => 'required|max:255',
            'name_uz' => 'required|max:255',
            'code' => 'required|max:255',
            'endpoint_fields' => 'sometimes|json'
        ];
    }
}
