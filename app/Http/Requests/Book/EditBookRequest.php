<?php

namespace App\Http\Requests\Book;
use Illuminate\Http\Response;
use Illuminate\Validation\Validator;
use Illuminate\Http\Exception\HttpResponseException;

use App\Http\Requests\Request;

class EditBookRequest extends Request
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
            'name' => 'required',
            'author' => 'required',
            'stock' => 'required|min:1|numeric',
            'price' => 'required|numeric|min:1'
        ];
    }
}
