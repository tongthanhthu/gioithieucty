<?php

namespace App\Http\Requests\Categories;

use Illuminate\Foundation\Http\FormRequest;


class CategoriesStoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */

     public function authorize()
     {
         return true;
     }

    public function rules() {
        return [
            # [auto-gen-rules]
            'parent_id' => 'integer',
            'name_vi' => 'required|string|max:250|unique:categories,name_vi',
            'name_en' => 'required|string|max:250|unique:categories,name_en',
            'name_jp' => 'required|string|max:250|unique:categories,name_jp',
            'name_kr' => 'required|string|max:250|unique:categories,name_kr',
            'description_vi' => 'nullable|string',
            'description_en' => 'nullable|string',
            'description_jp' => 'nullable|string',
            'description_kr' => 'nullable|string',
            'status' => 'integer',
            'position' => 'integer',
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
            'name_vi.required' => 'Tên không được để trống',
            'name_en.required' => 'Tên không được để trống',
            'name_jb.required' => 'Tên không được để trống',
            'name_kr.required' => 'Tên không được để trống',
            'name_vi.unique' => 'Dữ liệu đã tồn tại',
            'name_en.unique' => 'Dữ liệu đã tồn tại',
        ];
    }
}