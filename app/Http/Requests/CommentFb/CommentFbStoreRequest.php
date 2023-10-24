<?php

namespace App\Http\Requests\CommentFb;

class CommentFbStoreRequest extends CommentFbRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            # [auto-gen-rules]
            'id_fb' => 'required|integer',
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
            'id_fb.required' => 'hãy viết nội dung ',
        ];
    }
}