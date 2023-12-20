<?php

namespace App\Http\Requests\rating;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RatingRequest extends FormRequest
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
                'profession_id'=>'required',
                'type_id' => 'required',
                'user_id'=>'required',
             ];
    }

 
}
