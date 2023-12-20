<?php

namespace App\Http\Requests\apartment;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class HomeContentRequest extends FormRequest
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
            'name'=>[
                'required',
                Rule::unique('apart_contents')->ignore($this->homeContent)
            ],
            'name_en'=>'required',
            'desc'=>'sometimes'
        ];
    }


    public function withValidator($validator)
    {
            $validator->after(function ($validator) {
                if ($validator->failed()) {
                    $validator->errors()->add('method', $this->method()); 
                }
            });
    }
}
