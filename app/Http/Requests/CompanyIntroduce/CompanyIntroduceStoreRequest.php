<?php

namespace App\Http\Requests\CompanyIntroduce;

class CompanyIntroduceStoreRequest extends CompanyIntroduceRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            # [auto-gen-rules]
            'experience' => 'required|integer|min:1',
            'image' => 'required',
            'company_name_vi' => 'required|string',
            'company_name_en' => 'nullable|string',
            'company_name_jp' => 'nullable|string',
            'company_name_kr' => 'nullable|string',
            'description_short_vi' => 'required|string',
            'description_short_en' => 'nullable|string',
            'description_short_jp' => 'nullable|string',
            'description_short_kr' => 'nullable|string',
            'description_vi' => 'nullable|string',
            'description_en' => 'nullable|string',
            'description_jp' => 'nullable|string',
            'description_kr' => 'nullable|string',
            'company_diagram_vi' => 'nullable|string',
            'company_diagram_en' => 'nullable|string',
            'company_diagram_jp' => 'nullable|string',
            'company_diagram_kr' => 'nullable|string',
            'mission_vi' => 'required|nullable|string',
            'mission_en' => 'nullable|string',
            'mission_jp' => 'nullable|string',
            'mission_kr' => 'nullable|string',
            'vision_vi' => 'required|nullable|string',
            'vision_en' => 'nullable|string',
            'vision_jp' => 'nullable|string',
            'vision_kr' => 'nullable|string',
            'core_value_vi' => 'required|nullable|string',
            'core_value_en' => 'nullable|string',
            'core_value_jp' => 'nullable|string',
            'core_value_kr' => 'nullable|string',
            'business_philosophy_vi' => 'required|nullable|string',
            'business_philosophy_en' => 'nullable|string',
            'business_philosophy_jp' => 'nullable|string',
            'business_philosophy_kr' => 'nullable|string',
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
            'image.required' => 'Ảnh bắt buộc',
            'experience.required' => 'Kinh nghiệm bắt buộc',
            'experience.min' => 'Kinh nghiệm bắt buộc trên 1 năm',
            'mission_vi.required' => 'Sứ mệnh bắt buộc',
            'vision_vi.required' => 'Tầm nhìn bắt buộc',
            'core_value_vi.required' => 'giá trị cốt lõi bắt buộc',
            'business_philosophy_vi.required' => 'Triết lý bắt buộc',
        ];
    }
}