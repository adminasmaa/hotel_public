<?php

namespace App\Http\Requests\main;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CompanyRequest extends FormRequest
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
                'required', 'string', 'regex:/^[\p{L}\p{M}\s.\-]+$/u', Rule::unique('companies')->ignore($this->company)->where(function ($q) {
                    $q->whereNull('deleted_at');
                })
            ],
            'email' => ['sometimes', 'nullable', Rule::unique('companies')->ignore($this->company)],
            'phone' => 'required|numeric',
            'fax' => 'required|numeric',

            'address' => [
                'required', 'string', 'regex:/^[\p{L}\p{M}\s.\-]+$/u',
            ],
            'store_phone' => 'required|numeric',
            'delegeate_phone' => 'required|numeric',
            'delegeate_name' => [
                'required', 'string', 'regex:/^[\p{L}\p{M}\s.\-]+$/u',
            ],


        ];


    }


    public function messages()
    {
        return [
            'delegeate_name.regex' => 'هذا الحقل لابد ان يكون حروف فقط ',
            'name.regex' => 'هذا الحقل لابد ان يكون حروف فقط ',


        ];

    }
}
