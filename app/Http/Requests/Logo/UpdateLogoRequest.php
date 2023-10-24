<?php

namespace App\Http\Requests\Logo;

use Illuminate\Foundation\Http\FormRequest;

class UpdateLogoRequest extends FormRequest
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
            "file" => "",
            "icon" => "",
            "status" => "",
            "image_share" => "",
        ];
    }
}
