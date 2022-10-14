<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ParticipantRequest extends FormRequest
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
            'first_name' => 'required|max:100',
            'last_name' => 'required|max:100',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|unique:participants,phone,'.$this -> id,
            //'company_name' => 'required|max:100',
            'email'=>'required|email|unique:participants,email',
            'country' => 'required|exists:countries,id',
            'participation' =>'required|in:online,presence',
            // 'policies' => 'required',
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
            'country.required' => __('request.country'),
            'city.required' => __('request.city'),
            'policies.required' =>  __('request.policies'),
            'participation.required' => __('request.participation'),
            ];
    }
}
