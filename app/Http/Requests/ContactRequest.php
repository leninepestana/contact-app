<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // With dd we can retrieve the value and the 
        // id of current route
        // dd($this->route('contact'));

        // The method method() will return what we are see 
        // when request is being sent
        //dd($this->method());
        // This method checks if the assigned user has the permission to do something
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
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'company_id' => 'required|exists:companies,id',
        ];
    }

    // Method is resposible to customize 
    // validation messages erros
    public function attributes()
    {
        return [
            'company_id' => 'company'
        ];
    }

    // Method is resposible to customize
    // message error validation in this case 
    // (e.g. field_key_email.validation_rules)
    public function messages()
    {
        /*
        return [
            'email.email' => "The email that you entered is not valid.",
            "first_name.required" => "The first name field cannot be empty.",
            "email.required" => "The email field cannot be empty."
        ];
        */
        return [
            'email.email' => "The email that you entered is not valid.",
            "*.required" => "The :attribute field cannot be empty."
        ];
    }
}
