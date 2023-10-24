<?php

namespace App\Http\Requests\CompanyHistories;

class CompanyHistoriesStoreRequest extends CompanyHistoriesRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            # [auto-gen-rules]
            'formation_time' => 'required|string',
            'image' => 'required',
            'title_vi' => 'nullable|string|max:255',
            'title_en' => 'nullable|string|max:255',
            'title_jp' => 'nullable|string|max:255',
            'title_kr' => 'nullable|string|max:255',
            'description_vi' => 'nullable|string',
            'description_en' => 'nullable|string',
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
            # messages
        ];
    }
}