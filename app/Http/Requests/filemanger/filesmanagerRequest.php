<?php

namespace App\Http\Requests\filemanger;

use Illuminate\Foundation\Http\FormRequest;



use Illuminate\Validation\Rule;


class filesmanagerRequest extends FormRequest
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
                Rule::unique('filesmangers')->ignore($this->filesmanger)->where(function ($q) {
                    $q->whereNull('deleted_at');
                })],
            'path'=>[$this->method() == 'PUT'?'sometimes':'required'],
            'file_dept_id'=>'required',
            'file_type_id'=>'required',
            'branch_id'=>'required',

        ];


    }






}
