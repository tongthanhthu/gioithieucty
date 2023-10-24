<?php

namespace App\Http\Requests\LibaryImage;

class LibaryImageStoreRequest extends LibaryImageRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            # [auto-gen-rules]
            'files' => 'required',
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
            'files.required' => 'Hãy tải lên ảnh',
        ];
    }
}