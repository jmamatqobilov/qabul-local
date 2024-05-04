<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class InspectionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::user()->canDo('MODERATE_OBJECTS'); //false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'date' => 'required|max:250',
            'employees' => 'required|max:250',
            't_object_id' => 'exists:t_objects,id',
            'r_object_id' => 'exists:r_objects,id',
            'm_object_id' => 'exists:m_objects,id',
            's_object_id' => 'exists:s_objects,id',
            'inspection_act' => 'sometimes|required|mimetypes:application/pdf|max:10000',
            'photo.*' => 'sometimes|required|image|max:2000',
            'title.*' => 'sometimes|max:250'
        ];
    }
}
