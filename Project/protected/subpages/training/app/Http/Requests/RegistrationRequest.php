<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistrationRequest extends FormRequest
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
            'name' => 'required|max:16|min:3',
            'email' => 'required',
            'password' => 'required',
        ];
    }

    public function messages()
    {
        return [

            'name.min' => 'A nevnek legalabb 3 karakterbol kell allnia!',
            'name.max' => 'A nev nem lehet hosszabb 16 karakternel.',
            'email.required' => 'Email megadasa kotelezo',
            'password.required' => 'A jelszo mezo nem lehet ures.',
        ];
    }
}
