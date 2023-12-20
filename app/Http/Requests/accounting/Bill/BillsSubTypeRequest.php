<?php

namespace App\Http\Requests\accounting\Bill;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BillsSubTypeRequest extends FormRequest
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

    public function rules()
    {
        return [
            'name' => [
                'required',
                Rule::unique('bills_sub_types')->ignore($this->billsSubType)->where(function($q){
                    $q->whereNull('deleted_at');
               })
            ],
            'type_id'=>'required',
        ];
    }
    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            if ($validator->failed()) {
                if ($this->method() == 'POST')
                    $validator->errors()->add('method', $this->method()); // handle your new error message here
                else
                    $validator->errors()->add('method', $this->method())->add('id', $this->billsSubType->id); // handle your new error message here


            }
        });
    }
}
