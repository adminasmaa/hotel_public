<?php

namespace App\Http\Requests\hr;

use Illuminate\Foundation\Http\FormRequest;

class MessageRequest extends FormRequest
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
            'title'=>'required',
            'desc'=>'required',
            'profession_id'=>'required_if:type_message_send,==,all',

        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            if ($validator->failed()) {

                $validator->errors()->add('id', $this->to);


            }
        });
    }
}
