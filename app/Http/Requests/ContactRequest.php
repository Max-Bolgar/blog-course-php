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
           'name' => 'required|max:10',
           'email' => 'required|email'
        ];
    }
    
    public function messages() {
        return [
            'required' => 'Поле ":attribute" обязательное к заполнению',
            'max' => 'Максимальная длина поля ":attribute" является :max символов',
            'email' => 'Поле ":attribute" должно соответствовать формат email',
        ];
    }
}
