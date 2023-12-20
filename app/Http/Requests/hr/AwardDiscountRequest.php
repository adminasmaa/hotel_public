<?php

namespace App\Http\Requests\hr;

use Illuminate\Foundation\Http\FormRequest;

class AwardDiscountRequest extends FormRequest
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
            'employee_id'=>'required',
            'type'=>'required',
            'value'=>'required',
            'discount_value'=>'required_if:type,==,discount',
            'exchange_date'=>'required||date_format:Y-m-d',
            'due_date'=>'required_if:type,==,discount|nullable|date_format:Y-m-d|after:exchange_date',          
            'reason'=>'sometimes', 
        ];
    }
    
    public function messages()
    {
        return [
            'after' =>'هذا التاريخ يجب ان يكون بعد تاريخ الصرف',
        ];
    }
}