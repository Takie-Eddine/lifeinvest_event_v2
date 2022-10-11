<?php

namespace App\Http\Requests;

use App\Models\Country;
use Illuminate\Foundation\Http\FormRequest;

class InvestorRequest extends FormRequest
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
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|max:100|unique:investors,phone,'.$this -> id,
            //'company_name' => 'required|max:100',
            'country' => 'required|exists:countries,id',
            // 'city' => 'required',
            'email'=>'required|email',
            'share_value' => 'required|exists:options,share_value',
            'share_number' => 'required',
            'investment_value' => 'required',
            //'policies' => 'required',
            //'policies' => 'required',
            'project' => 'required|in:doshtu,rekmaz'
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

            'share_value.required' => __('request.share value'),
            'share_number.required' => __('request.share number'),
            'investment_value.required' => __('request.investment value'),
            'policies.required' =>  __('request.policies'),
            'project.required' =>  __('request.project'),
            'project.in' =>  __('request.project1'),
            ];
    }


}
