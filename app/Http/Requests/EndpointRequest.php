<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class EndpointRequest extends FormRequest
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return (Auth::user()->canDo('MANAGE_APPLICATIONS') || Auth::user()->canDo('ADD_ENDPOINT')); //false;
    }

    protected function failedValidation(Validator $validator)
    {
        $faileds = $validator->failed();
        $object = $this->request->get('object_id');
        if (array_key_exists('hidden', $faileds) && $object) {
            throw (new ValidationException($validator))
                ->errorBag($this->errorBag)
                ->redirectTo($this->getRedirectUrl() . '/' . $object);
        }
        throw (new ValidationException($validator))
            ->errorBag($this->errorBag)
            ->redirectTo($this->getRedirectUrl());
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            't_object_id' => 'sometimes|required|exists:t_objects,id',
            'r_object_id' => 'sometimes|required|exists:r_objects,id',
            'm_object_id' => 'sometimes|required|exists:m_objects,id',
            's_object_id' => 'sometimes|required|exists:s_objects,id',
            'hidden' => 'required|in:1',
            'endpoint_type' => 'required|max:255',
            'vendor_name' => 'nullable|max:255',
            'model' => 'nullable|max:255',
            'vendor_country' => 'nullable|in:'.implode(',', array_keys(__('countries'))),
            'produce_year' => 'nullable|integer|min:1950|max:2070',
            'ts_assembly_value' => 'nullable|numeric',
            'ts_cable_length' => 'nullable|numeric',
            'ts_cable_type_new' => 'nullable|exists:dictionary_values,id',
            'ts_cable_vols' => 'nullable|exists:dictionary_values,id',
            'rm_broadcasting_standard' => 'nullable|exists:dictionary_values,id',
            'rm_station_power' => 'nullable|numeric',
            'rm_station_purpose' => 'nullable|exists:dictionary_values,id',
            'rm_antenna_type' => 'nullable|exists:dictionary_values,id',
            'rm_antenna_suspension_height' => 'nullable|numeric',
            'rm_transceivers_count' => 'nullable|numeric',
        ];
    }
}
