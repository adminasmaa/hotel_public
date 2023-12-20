<?php

namespace App\Http\Requests\hr;

use App\Rules\Uppercase;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class EmployeeNotesRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }

   
    public function rules()
    {
    
        return [
            'text' => ['required','string'],
            'note_type' => 'required',
         ];
        
    }

    public function withValidator($validator)
    {
            $validator->after(function ($validator) {
                if ($validator->failed()) {
                    $validator->errors()->add('method', $this->method()); // handle your new error message here
                }
            });
    }
}
