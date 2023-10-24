<?php

namespace App\Http\Requests\About404;

class About404StoreRequest extends About404Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            # [auto-gen-rules]
            'description_vi' => 'required|string',
            'description_en' => 'required|string',
            'description_jp' => 'required|string',
            'description_kr' => 'required|string',
            'deleted_at' => 'nullable|string',
            'created_at' => 'nullable|string',
            'updated_at' => 'nullable|string'
            # [/auto-gen-rules]
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'description_vi.required' => 'Thông tin không được để trống',
            'description_en.required' => 'Thông tin không được để trống',
            'description_jp.required' => 'Thông tin không được để trống',
            'description_kr.required' => 'Thông tin không được để trống',
        ];
    }
}