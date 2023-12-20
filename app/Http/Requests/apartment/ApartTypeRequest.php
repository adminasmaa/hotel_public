<?php

namespace App\Http\Requests\apartment;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ApartTypeRequest extends FormRequest
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
                Rule::unique('apart_types')->ignore($this->apartType)->where(function($q){
                    $q->whereNull('deleted_at');
               })
            ],
            'type_name'=>'required',
            'bed_id'=>'required',
            'view_id'=>'required',                      
            'content_id'=>'required|array|min:1',
            'branch_id'=>'required',
        ];
    }
}
