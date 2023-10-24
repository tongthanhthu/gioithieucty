<?php

namespace App\Http\Requests\Contacts;

use Illuminate\Foundation\Http\FormRequest;

class ReceiveMailRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            "email" => "required|email",
        ];
    }

    public function messages()
    {
        $message = [
            'email.required' => 'Hãy nhập email người gửi',
            'email.email' => 'Email không đúng định dạng',
        ];
        return $message;
    }
}
