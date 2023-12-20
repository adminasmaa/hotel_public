<?php

namespace App\Http\Requests\apartment;

use Illuminate\Foundation\Http\FormRequest;

class ContentRequest extends FormRequest
{
 
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            "name"    => "required|array|min:1",
            "name.ar"  => "required|string",
            "name.en"  => "nullable|string|regex:/^[a-zA-Z]+(?:\s[a-zA-Z]+)?$/",
            "price"=>'required',
            "home_content_id"=>"required",
            "type"=>"required",
        ];
    }
}
