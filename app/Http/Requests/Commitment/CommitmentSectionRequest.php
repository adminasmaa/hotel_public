<?php

namespace App\Http\Requests\Commitment;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CommitmentSectionRequest extends FormRequest
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
                'required',
                Rule::unique('commitment_sections')->ignore($this->commitmentSection)->where(function($q){
                    $q->whereNull('deleted_at');
               })
            ],
        ];
    }
    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            if ($validator->failed()) {
                if ($this->method() == 'POST')
                    $validator->errors()->add('method', $this->method()); // handle your new error message here
                else
                    $validator->errors()->add('method', $this->method())->add('id', $this->commitmentSection->id); // handle your new error message here


            }
        });
    }
}
