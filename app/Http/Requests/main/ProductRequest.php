<?php

namespace App\Http\Requests\main;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductRequest extends FormRequest
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

            'bar_code' => ['required', Rule::unique('products')->ignore($this->product)->where(function ($q) {
                $q->whereNull('deleted_at');
            })],
            'company_id' => ['required'],
            'class_id' => ['required'],
            'marks_id' => ['required'],
            'country_id' => ['required'],
            'modal' =>'numeric',
            'name' => [
                'required', 'string', 'regex:/^[\p{L}\p{M}\s.\-]+$/u',
                Rule::unique('products')->ignore($this->product)->where(function ($q) {
                    $q->whereNull('deleted_at');
                })],

        ];
    }
    public function messages()
    {
        return [
            'name.regex' => 'هذا الحقل لابد ان يكون حروف فقط ',


        ];
    }
}
