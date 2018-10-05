<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Create_Customer_Request extends FormRequest
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
            'name' => 'bail|required|max:50',
            'phone' => 'required|integer|max:11',
            'email' => 'required|email|max:30'
        ];
    }

    public function messages()
    {
        return[
        'name.required' => "Name need a String",
        'phone.required' => "Phone need a Integer",
        'email.required' => "email need a email not null",
        'name.max' => 'Max 50 ',
        'phone.max' => 'Max 11',
        'email.max' => 'max 30',
        'phone.integer' => 'need a integer',
        'email.email' => 'need a email'
        ];
    }
}
