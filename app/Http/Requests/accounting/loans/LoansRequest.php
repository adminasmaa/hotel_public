<?php

namespace App\Http\Requests\accounting\loans;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class LoansRequest extends FormRequest
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
                'required', 'string', 'regex:/^[\p{L}\p{M}\s.\-]+$/u', Rule::unique('loans')->ignore($this->loan)->where(function ($q) {
                    $q->whereNull('deleted_at');
                })
            ],

            'loan_branch_id' => 'required',
            'branch_id' => 'required',
            'phone' => 'required',
            'pay_type' => [
                'required', 'string', 'regex:/^[\p{L}\p{M}\s.\-]+$/u',
            ],
            'pay_amount' => 'required|numeric|lt:loan_amount',
            'loan_amount' => 'required|numeric',
            'installment_amount' => 'required|numeric|lt:loan_amount',
            'loan_date' => 'required||date_format:Y-m-d',
            'installment_data' => 'required||date_format:Y-m-d|after:loan_date',


        ];
    }

    public function messages()
    {
        return [
            'name.regex' => 'هذا الحقل لابد ان يكون حروف فقط ',
            'pay_type.regex' => 'هذا الحقل لابد ان يكون حروف فقط ',
            'after' =>'هذا التاريخ يجب ان يكون بعد تاريخ المعاملة',


        ];
    }


}
