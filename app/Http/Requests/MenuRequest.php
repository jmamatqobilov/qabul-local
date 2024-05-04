<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class MenuRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::user()->canDo('MANAGE_MENUS');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name_ru' => 'required|max:255',
            'name_uz' => 'required|max:255',
            'path' => 'required|max:255',
            'parent' => 'required|numeric',
            'role_id' => 'required|exists:roles,id'
        ];
    }
}
