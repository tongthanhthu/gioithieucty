<?php

namespace App\Http\Requests\Introduce;

class IntroduceStoreRequest extends IntroduceRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            # [auto-gen-rules]
            // 'image' => 'required|string|max:255',
            'title_vi' => 'required|string|max:255|unique:introduces,title_vi',
            'title_en' => 'required|string|max:255|unique:introduces,title_en',
            'title_jp' => 'required|string|max:255|unique:introduces,title_jp',
            'title_kr' => 'required|string|max:255|unique:introduces,title_kr',
            // 'slug_vi' => 'nullable|string|max:255',
            // 'slug_en' => 'nullable|string|max:255',
            // 'slug_jp' => 'nullable|string|max:255',
            // 'slug_kr' => 'nullable|string|max:255',
            'description_short_vi' => 'required|string',
            'description_short_en' => 'required|string',
            'description_short_jp' => 'nullable|string',
            'description_short_kr' => 'nullable|string',
            'description_vi' => 'required|string',
            'description_en' => 'required|string',
            'description_jp' => 'nullable|string',
            'description_kr' => 'nullable|string',
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
            'title_vi.required' => 'Hãy viết nội dung',
            'title_kr.required' => 'Hãy viết nội dung',
            'title_jp.required' => 'Hãy viết nội dung',
            'title_en.required' => 'Hãy viết nội dung',
            'title_vi.unique' => 'Tên là duy nhất',
            'title_en.unique' => 'Tên là duy nhất',
            'title_jp.unique' => 'Tên là duy nhất',
            'title_kr.unique' => 'Tên là duy nhất',
            'title_en.required' => 'Hãy viết nội dung',
            'description_vi.required' => 'Hãy viết nội dung',
            'description_en.required' => 'Hãy viết nội dung',
            'description_short_vi.required' => 'Hãy viết nội dung',
            'description_short_en.required' => 'Hãy viết nội dung',
        ];
    }
}