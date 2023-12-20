<?php

namespace App\Http\Requests\clients;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ClientStatusRequest extends FormRequest
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

            'name' => [
                'required', 'string', 'max:255', 'regex:/\p{Arabic}+/u',
                Rule::unique('client_statuses')->ignore($this->clientStatus)
            ],
            'name_en' => ['regex:/^[a-zA-Z]+(?:\s[a-zA-Z]+)?$/', 'max:255',
                Rule::unique('client_statuses')->ignore($this->clientStatus)
            ],
        ];
    }

    public function messages()
    {
        return [
            'name.regex' => 'يجب ادخله بالحروف باللغة  العربية',
            'name_en.regex' => 'هذا الحقل لابد ان يكون حروف فقط بالغة الانجليزية',


        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            if ($validator->failed()) {
                if ($this->method() == 'POST')
                    $validator->errors()->add('method', $this->method());   // handle your new error message here
                else
                    $validator->errors()->add('method', $this->method())->add('id', $this->clientStatus);   // handle your new error message here

            }
        });
    }
}
