<?php

namespace App\Http\Requests\Student;

use App\Http\Requests\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\Validator;
use Illuminate\Http\Exception\HttpResponseException;

class RegisterStudentRequest extends Request
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
        return [
            //
        ];
    }
}
