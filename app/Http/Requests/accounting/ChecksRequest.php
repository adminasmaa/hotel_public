<?php

namespace App\Http\Requests\accounting;

use Illuminate\Foundation\Http\FormRequest;
use Validator;
use Illuminate\Validation\Rule;


class ChecksRequest extends FormRequest
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
            'amount' => ['required', 'int', 'min:0'],
            'branch_id' => 'required',
            'type' => 'required',
            'with_name' => ['required', 'regex:/^[\p{L}\p{M}\s.\-]+$/u'],
            'check_no' => [
                'required', 'int', 'min:1', Rule::unique('checks')->ignore($this->check)->where(function ($q) {
                    $q->whereNull('deleted_at');
                })
            ],
            'recip_name' => ['required', 'regex:/^[\p{L}\p{M}\s.\-]+$/u'],

            'due_date' => 'required|date_format:Y-m-d|after:yesterday',
        ];
    }

    public function messages()
    {
        return [
            'due_date.after' => 'هذا التاريخ يجب ان يبدأ  من اليوم  ',
            'min' => 'لا يجب ادخال مبلغ اقل من الصفر',
            'regex' => 'هذا الحقل لابد ان يكون حروف فقط ',

        ];
    }


}
