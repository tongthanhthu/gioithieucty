<?php

namespace App\Http\Requests\Logo;

use Illuminate\Foundation\Http\FormRequest;

class AddLogoRequest extends FormRequest
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
            "file" => "required|image",
            "icon" => "required|image",
            "image_share" => "required|image",
        ];
    }

    public function messages()
    {
        $message = [
            'file.required' => 'Hãy chọn ảnh cho Logo',
            'file.image' => 'Logo phải la ảnh',
            'icon.required' => 'Hãy chọn ảnh cho Icon',
            'icon.image' => 'Icon phải là ảnh',
            'image_share.required' => 'Hãy chọn ảnh cho Icon',
            'image_share.image' => 'Icon phải là ảnh',
        ];
        return $message;
    }
}
