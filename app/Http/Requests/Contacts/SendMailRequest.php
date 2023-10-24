<?php

namespace App\Http\Requests\Contacts;

use Illuminate\Foundation\Http\FormRequest;

class SendMailRequest extends FormRequest
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
            "username" => "required",
            "email" => "required|email",
            "content" => "required",
        ];
    }

    public function messages()
    {
        $message = [
            'username.required' => __('message.sender_name'),
            'email.required' => __('message.sender_email'),
            'email.email' => __('message.sender_email'),
            'content.required' => __('message.sender_content'),
        ];
        return $message;
    }
}
