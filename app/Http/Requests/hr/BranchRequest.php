<?php

namespace App\Http\Requests\hr;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class BranchRequest extends FormRequest
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
            "name"    => "required|array|min:2",
            "name.ar"  => [
                'required',
            ],
            "name.en"  => "required",
            'phone'=>'sometimes',
            'email'=>'sometimes',
            'logo'=>'sometimes',
            'address'=>'sometimes',
            'link'=>'sometimes',
            'location'=>'sometimes',
            'desc'=>'sometimes',

        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            if ($validator->failed()) {
                if ($this->method() == 'POST')
                    $validator->errors()->add('method', $this->method()); // handle your new error message here
                else
                    $validator->errors()->add('method', $this->method())->add('id', $this->branch->id); // handle your new error message here
            }
        });
    }

}
