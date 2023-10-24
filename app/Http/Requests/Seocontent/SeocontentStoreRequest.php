<?php

namespace App\Http\Requests\Seocontent;
use Illuminate\Foundation\Http\FormRequest;

class SeocontentStoreRequest extends SeocontentRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */

    public function rules() {
        return [
            # [auto-gen-rules]
            'position' => 'required|integer',
            'description' => 'required|string|max:255',
            'keywords' => 'required|string|max:255',
            'property_name' => 'required|string|max:255',
            'property_description' => 'required|string|max:255',
            'property_og_title' => 'required|string|max:100',
            'property_og_description' => 'required|string|max:255',
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
         $message = [
            'position' => 'Hãy nhập nội dung phù hợp',
            'description' => 'Hãy nhập nội dung phù hợp',
            'keywords' => 'Hãy nhập nội dung phù hợp',
            'property_name.required' => 'Hãy nhập nội dung phù hợp',
            'property_description.required' => 'Hãy nhập nội dung phù hợp',
            'property_og_title.required' => 'Hãy nhập nội dung phù hợp',
            'property_og_description.required'  => 'Hãy nhập nội dung phù hợp',
        ];
        return $message;
    }
}