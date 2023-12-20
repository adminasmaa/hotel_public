<?php

namespace App\Http\Requests\accounting\Bill;

use Illuminate\Foundation\Http\FormRequest;

class BillRequest extends FormRequest
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
            'name'=>'required',
            'type_id'=>'required',
            'subType_id'=>'sometimes',
            'branch_id'=>'required',
            'value'=>'required',
            'date'=>'required',
            'desc'=>'sometimes',
        ];
    }
}
