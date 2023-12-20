<?php

namespace App\Http\Requests\Checkall;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CheckallRequest extends FormRequest
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
            'type_id'=>'required',
            'order'=>['sometimes',Rule::unique('checkalls')->ignore($this->checkall)],
            'question'=>'required',
        ];
    }



    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            if ($validator->failed()) {
                if ($this->method() == 'POST')
                    $validator->errors()->add('method', $this->method()); // handle your new error message here
                else
                    $validator->errors()->add('method', $this->method())->add('id', $this->checkall->id); // handle your new error message here


            }

        });

    }
}
