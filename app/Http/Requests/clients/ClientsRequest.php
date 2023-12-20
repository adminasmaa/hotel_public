<?php

namespace App\Http\Requests\clients;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Route as FacadesRoute;
use Illuminate\Validation\Rule;

class ClientsRequest extends FormRequest
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

        $array1 = [
            'name' => ['required', 'string', 'max:255', 'regex:/\p{Arabic}+/u'],
            'name_en' => ['required', 'string', 'regex:/^[a-zA-Z]+(?:\s[a-zA-Z]+)?$/', 'max:255'],

            'gender' => ['sometimes'],

            'nationality_id' => 'required',
            'branch_id' => 'required',
            'phone' => 'required|numeric',
            'approve_id' => 'required',
            'num' => 'required',
            'client_statuses_id' => 'sometimes',
            'client_img_1' => [$this->method() == 'PUT' ? 'sometimes' : 'required'],
            'client_img_2' => [$this->method() == 'PUT' ? 'sometimes' : 'required'],

            'status_reason' => "nullable|string",
        ];
        $array2 = str_contains(url()->previous(), 'bookings') ? [
            'book_date' => 'required',
        ] : [];
        $array3 = $this->method() == 'POST' ? [
            'password' => ['required', 'confirmed']
        ] : [];
        return array_merge($array1, $array2, $array3);
    }

    public function messages()
    {
        return [
            'required_without_all' => 'يجب ادخال واحد من العناصر["الرقم القومى","جواز السفر","رخصه القيادة","بطاقه الاحوال "]',
            'name.regex' => 'يجب ادخله بالحروف باللغة  العربية',

        ];
    }


}
