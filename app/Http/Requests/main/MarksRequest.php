<?php

namespace App\Http\Requests\main;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class MarksRequest extends FormRequest
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
                Rule::unique('marks')->ignore($this->mark)->where(function ($q) {
                    $q->whereNull('deleted_at');
                })],
            'company_id'=>['required'],
            'company_img'=>[$this->method() == 'PUT'?'sometimes':'required'],
            'discount'=>'nullable|int',

         ];
    }
    public function messages()
    {
        return [
            'name.regex' => 'هذا الحقل لابد ان يكون حروف فقط    ',


        ];
    }

}
