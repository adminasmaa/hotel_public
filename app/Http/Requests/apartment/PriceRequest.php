<?php

namespace App\Http\Requests\apartment;

use Illuminate\Foundation\Http\FormRequest;

class PriceRequest extends FormRequest
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
            'discount'=>'required',
            'apart_id'=>'required',
            'from'=>'required',
            'to'=>'required',
            'days'=>'sometimes'
        ];
    }
 
}
