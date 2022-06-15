<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApiUsersCatalogRequest extends FormRequest
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
     * More info about How to pass BAN to change "fio"->unique in updating?
     * https://www.csrhymes.com/2019/06/22/using-the-unique-validation-rule-in-laravel-form-request.html
     * @return array
     */
    public function rules()
    {    
        return [
            'fio' => 'required|string|max:255|unique:users_catalogs,fio',
            'email' => 'required|string',
            'phone' => 'required|string',
        ];
    }
}
