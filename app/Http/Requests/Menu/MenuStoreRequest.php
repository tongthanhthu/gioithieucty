<?php

namespace App\Http\Requests\Menu;

class MenuStoreRequest extends MenuRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            # [auto-gen-rules]
            'name_vi' => 'required|string|max:250',
            'name_en' => 'required|string|max:250',
            'name_jp' => 'required|string|max:250',
            'name_kr' => 'required|string|max:250',
            'parent_id' => 'nullable|integer',
            'position' => 'nullable|integer',
            'url_vi' => 'nullable|string|max:500',
            'url_en' => 'nullable|string|max:500',
            'status' => 'integer',
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
            'name_vi.required' => 'Hãy viết nội dung',
            'name_en.required' => 'Hãy viết nội dung',
            'name_jp.required' => 'Hãy viết nội dung',
            'name_kr.required' => 'Hãy viết nội dung',
        ];
    }
}