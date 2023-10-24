<?php

namespace App\Http\Requests\Recruitment;

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
            "name" => "required",
            "phone" => "required",
            "title" => "required",
            "email" => "required|email",
            "contents_description" => "required",
            "file" => "required",
        ];
    }

    public function messages()
    {
        $message = [
            'name.required' => __('message.sender_name'),
            'phone.required' => __('message.sender_phone'),
            'title.required' => __('message.sender_title'),
            'email.required' => __('message.sender_email'),
            'email.email' => __('message.sender_email'),
            'contents_description.required' => __('message.sender_content'),
            'file.required' => __('message.sender_file'),
        ];
        return $message;
    }
}
