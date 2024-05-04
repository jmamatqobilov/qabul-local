<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ApplicationModerateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return (Auth::user()->canDo('MODERATE_APPLICATION'));
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'responsible'   => 'sometimes|required_with:deadline_date|required_if:action,accept|max:255',
            'deadline_date' => 'sometimes|required_with:responsible|required_if:action,accept|date',
            'deny_comment'  => 'sometimes|required_if:action,reject|max:255',
            'action' => 'required|in:accept,reject,save',
            'objects_count' => 'numeric|min:1|not_in:0',
        ];
    }
}
