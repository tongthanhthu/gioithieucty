<?php

namespace App\Http\Requests\JobCategory;
use Illuminate\Foundation\Http\FormRequest;


class JobCategoryUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            # [auto-gen-rules]
            'title_vi' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'title_jp' => 'required|string|max:255',
            'title_kr' => 'required|string|max:255',
            // 'slug_vi' => 'nullable|string|max:255',
            // 'slug_en' => 'nullable|string|max:255',
            // 'slug_jp' => 'nullable|string|max:255',
            // 'slug_kr' => 'nullable|string|max:255',
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

       return  [
            'title_vi.required' => 'Hãy nhập tên ',
            'title_en.required' => 'Hãy nhập tên ',
            'title_kr.required' => 'Hãy nhập tên ',
            'title_jp.required' => 'Hãy nhập tên ',
        ];
    }
}