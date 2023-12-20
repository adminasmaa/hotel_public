<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Route as FacadesRoute;
use Illuminate\Validation\Rule;

class ContactMessagRequest extends FormRequest
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
            'phone' => 'integer'
        ];
    }
    // public function messages()
    // {
    //     return [
    //         'phone.numeric' => 'هذا الحقل لابد ان يكون ارقام فقط ',


    //     ];
    // }
   

 
}
