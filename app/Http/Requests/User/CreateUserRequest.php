<?php

namespace App\Http\Requests\User;

use App\Http\Requests\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\Validator;
use Illuminate\Http\Exception\HttpResponseException;

class CreateUserRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'name' => 'required',
            'username' => 'required|unique:users,username',
            'email' => 'email',
            'password' => 'required|min:6',
            'confirm_password' => 'required|same:password|min:6'
        ];

        return $rules;
    }
}
