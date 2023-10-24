<?php

namespace App\Http\Requests\Banners;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBannerRequest extends FormRequest
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
            "title_vi" => "required",
            "title_en" => "",
            "title_jp" => "",
            "title_kr" => "",
            "file" => "",
            "status" => "",
            "description_vi" => "required",
            "description_en" => "",
            "description_jp" => "",
            "description_kr" => "",
            "priority" => "required|numeric|min:1",
        ];
    }

    public function messages()
    {
        $message = [
            'title_vi.required' => 'Hãy nhập tiêu đề cho banner',
            'file.required' => 'Hãy chọn ảnh cho banner',
            'description_vi.required' => 'Hãy nhập mô tả',
            'priority.required' => 'Hãy nhập số thứ tự ưu tiên',
            'priority.numeric' => 'Số thứ tự phải là số',
            'priority.min' => 'Số thứ tự phải là số dương',
        ];
        return $message;
    }
}
