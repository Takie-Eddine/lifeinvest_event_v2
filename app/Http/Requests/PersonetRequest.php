<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PersonetRequest extends FormRequest
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
            'first_name'=> 'required|max:100',
            // 'last_name' => 'required|max:100',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|unique:persones,phone',
            'ofice_phone' => 'nullable|regex:/^([0-9\s\-\+\(\)]*)$/|unique:persones,ofice_phone',
            'email' => 'nullable|email|unique:persones',
            'photo' => 'nullable',
            'photo.*' => 'mimes:jpg,jpeg,png',
            'doshtu'=> 'required_without_all:rekmaz,undefined',
            'rekmaz'=> 'required_without_all:doshtu,undefined',
            'undefined'=> 'required_without_all:doshtu,rekmaz',

        ];
    }


    public function messages(){
        return [

            'first_name.required' => __('request.first name'),
            'first_name.max' => __('request.first name1'),
            'last_name.required' => __('request.last name'),
            'last_name.max' => __('request.last name1'),
            'phone.required' => __('request.phone'),
            'phone.unique' => __('request.phone1'),
            'email.required' => __('request.email'),
            'doshtu.required_without_all' => 'check one at least',
            'rekmaz.required_without_all' => 'check one at least',
            ];
    }
}
