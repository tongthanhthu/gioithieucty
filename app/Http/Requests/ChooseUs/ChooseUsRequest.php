<?php

namespace App\Http\Requests\ChooseUs;

use Illuminate\Foundation\Http\FormRequest;

class ChooseUsRequest extends FormRequest
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
            'content_vi' => 'required',
            'content_en' => 'required',
            'content_jp' => 'required',
            'content_kr' => 'required',
            'link_video' => 'required'
        ];
    }

    public function messages()
    {
        $message = [
            'content_vi.required' => 'hãy viết nội dung tiếng Việt',
            'content_en.required' => 'hãy viết nội dung tiếng Anh',
            'content_jp.required' => 'hãy viết nội dung tiếng Nhật',
            'content_kr.required' => 'hãy viết nội dung tiếng Hàn',
            'link_video.required' => 'link không được để trống',
        ];
        return $message;
    }
}
