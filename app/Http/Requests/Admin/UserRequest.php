<?php

namespace App\Http\Requests\Admin;


use App\Http\Requests\Request;
use Illuminate\Support\Facades\Auth;

class UserRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::user()->canDo('MANAGE_USERS'); //false;
    }

    protected function getValidatorInstance()
    {
        $validator = parent::getValidatorInstance();
        $validator->sometimes('password', 'required|min:6|confirmed', function($input)
        {
            if(!empty($input->password) || ((empty($input->password) && $this->route()->getName() !== 'admin.users.update'))) {
                return true;
            }
            return false;
        });
        return $validator;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $id = (isset($this->route()->parameter('user')->id)) ? $this->route()->parameter('user')->id : 1;
        return [
            'company_name'=> 'required|max:255',
            'email'=> 'required|email|max:255|unique:users,email,'.$id,
            'director_fio'=> 'required|max:255',
            'inn'=> 'required|digits:9|unique:users,inn,'.$id,
            'address'=> 'max:255',
            'license'=> 'max:255',
            'role_id' => 'required|integer',
            'direction_id' => 'nullable|exists:directions,id',
            'territory_id' => 'nullable|exists:territories,id',
            'is_director' => 'boolean'
        ];
    }
}
