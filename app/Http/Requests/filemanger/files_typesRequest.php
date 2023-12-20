<?php

namespace App\Http\Requests\filemanger;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class files_typesRequest extends FormRequest
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
                'required', 'string', 'regex:/^[\p{L}\p{M}\s.\-]+$/u',
                Rule::unique('files_types')->ignore($this->files_type)
            ],
        ];
    }
    public function messages()
    {
        return [
            'name.regex' => 'هذا الحقل لابد ان يكون حروف فقط ',


        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            if ($validator->failed()) {
                if ($this->method() == 'POST')
                    $validator->errors()->add('method', $this->method()); // handle your new error message here
                else

                    $validator->errors()->add('method', $this->method())->add('id', $this->files_type->id); // handle your new error message here


            }

        });
    }


}
