<?php

namespace App\Http\Requests\Posts;

class PostsStoreRequest extends PostsRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            # [auto-gen-rules]
            'title_vi' => 'required|unique:posts,title_vi|string|max:255',
            'title_en' => 'required|unique:posts,title_vi|string|max:255',
            'title_jp' => 'required|unique:posts,title_jp|string|max:255',
            'title_kr' => 'required|unique:posts,title_kr|string|max:255',
            'description_short_vi' => 'required|string',
            'description_short_en' => 'required|string',
            'description_short_jp' => 'nullable|string',
            'description_short_kr' => 'nullable|string',
            'image' => 'required',
            'description_vi' => 'required|string',
            'description_en' => 'required|string',
            'description_jp' => 'nullable|string',
            'description_kr' => 'nullable|string',
            'tag_vi' => 'nullable|string|max:255',
            'tag_en' => 'nullable|string|max:255',
            'tag_jp' => 'nullable|string|max:255',
            'tag_kr' => 'nullable|string|max:255',
            'author' => 'required|string|max:255',
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
            'title_vi.required' => 'Hãy viết nội dung',
            'title_en.required' => 'Hãy viết nội dung',
            'title_kr.required' => 'Hãy viết nội dung',
            'title_jp.required' => 'Hãy viết nội dung',
            'title_vi.unique' => 'Trùng nội dung',
            'title_en.unique' => 'Trùng nội dung',
            'title_kr.unique' => 'Trùng nội dung',
            'title_jp.unique' => 'Trùng nội dung',
            'description_vi.required' => 'Hãy viết nội dung',
            'description_en.required' => 'Hãy viết nội dung',
            'description_short_vi.required' => 'Hãy viết nội dung',
            'description_short_en.required' => 'Hãy viết nội dung',
            'author.required' => 'Hãy viết nội dung',
            'image.required' => 'Hãy tải ảnh lên',
        ];
    }
}