<?php

namespace App\Http\Requests\Student;

use App\Http\Requests\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\Validator;
use Illuminate\Http\Exception\HttpResponseException;
use Carbon\Carbon;

class EditStudentDataRequest extends Request
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
            'name'  => 'required',
            'address' => 'required|max:255',
            'birthday'  => 'required|before:'.Carbon::now(),
            'still_on_course' => 'required'
        ];
    }
}
