<?php

namespace App\Http\Requests\apartment;

use Illuminate\Foundation\Http\FormRequest;

class ApartmentRequest extends FormRequest
{
   
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'=>'required',
            'floor'=>'required',
            'type_id'=>'required',
            'image'=>'sometimes',
            'area'=>'required',
            'price'=>'sometimes',
            'type'=>'required',
            'p_week'=>'required_if:type,==,day',
            'p_day'=>'required_if:type,==,day',
            'units'=>'required',
            // 'period'=>'required_if:type,==,week',
            'prices'=>'required_if:type,==,week|array',
            'prices.*'=>'required_if:type,==,week',
            'value_id'=> 'required|array|min:1', 
            'desc'=>'sometimes'
        ];
    }
}
