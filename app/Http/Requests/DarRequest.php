<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DarRequest extends FormRequest
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
            'logo' => 'required',
            'logo.*' => 'mimes:jpg,jpeg,png',
            'wing' => 'required',
            'last_hour' => 'required',
            'first_hour' => 'required',
            'first_periode' =>'required',
            'last_periode' =>'required',

        ];
    }
}