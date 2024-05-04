<?php

namespace App\Http\Requests;


use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */

    protected function getValidatorInstance()
    {
        $validator = parent::getValidatorInstance();
        $validator->sometimes('password',  'required_with:current_password|different:current_password|min:6|confirmed', function ($input){
            return (
                !empty($input->password) ||
                !empty($input->current_password)
            );
        });
        $validator->sometimes('current_password', ['required_with:password','min:6', new MatchOldPassword()], function ($input){
            return (
                !empty($input->password) ||
                !empty($input->current_password)
            );
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
        return [
            'email' => 'required|email|max:255|unique:users,email,'.Auth::user()->id,
            'director_fio' => 'sometimes|max:255',
            'photo' => 'image|mimes:jpg,png,jpeg,gif,svg|max:4096|dimensions:min_width=100,min_height=100',
            'address' => 'sometimes|max:255',
            'license' => 'max:255'
        ];
    }
}
