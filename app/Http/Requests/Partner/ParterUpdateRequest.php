<?php

namespace App\Http\Requests\Partner;

use Illuminate\Foundation\Http\FormRequest;

class ParterUpdateRequest extends FormRequest
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
            "title" => "required",
            "url" => "",
            "status" => "required",
            'file' => 'mimes:jpeg,png,jpg,gif',
        ];
    }

    public function messages()
    {
        $message = [
            'title.required' => 'Hãy viết tên đối tác',
            'status.required' => 'hãy chọn trạng thái',
            'file.mimes' => 'Định dạng ảnh không đúng',
        ];
        return $message;
    }
}
