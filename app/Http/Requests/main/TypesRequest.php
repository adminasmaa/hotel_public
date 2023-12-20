<?php

namespace App\Http\Requests\main;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TypesRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {

        return [
            //
            'name' => [
                'required', 'string', 'max:255', 'regex:/\p{Arabic}+/u',
                Rule::unique('types')->ignore($this->type)
            ],


            'name_en' => ['string', 'regex:/^[a-zA-Z]+(?:\s[a-zA-Z]+)?$/',
                Rule::unique('types')->ignore($this->type)
            ],


            'class_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.regex' => 'هذا الحقل لابد ان يكون حروف فقط بالغة الغربية  ',
            'name_en.regex' => 'هذا الحقل لابد ان يكون حروف فقط بالغة الانجليزية',


        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            if ($validator->failed()) {
                if ($this->method() == 'POST')
                    $validator->errors()->add('method', $this->method()); // handle your new error message here
                else
                    $validator->errors()->add('method', $this->method())->add('id', $this->type->id); // handle your new error message here


            }
        });
    }

}
