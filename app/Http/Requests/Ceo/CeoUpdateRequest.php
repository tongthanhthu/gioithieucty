<?php

namespace App\Http\Requests\Ceo;

class CeoUpdateRequest extends CeoRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            # [auto-gen-rules]
            'image' => '',
            'name_vi' => 'nullable|string|max:255',
            'name_en' => 'nullable|string|max:255',
            'name_jp' => 'nullable|string|max:255',
            'name_kr' => 'nullable|string|max:255',
            'position_vi' => 'nullable|string|max:255',
            'position_en' => 'nullable|string|max:255',
            'position_jp' => 'nullable|string|max:255',
            'position_kr' => 'nullable|string|max:255',
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