<?php

namespace App\Http\Requests\Media;

class MediaStoreRequest extends MediaRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            # [auto-gen-rules]
            'link_twitter' => 'required|string|max:255',
            'link_facebook' => 'required|string|max:255',
            'link_instagram' => 'required|string|max:255',
            'link_youtube' => 'required|string|max:255',
            'link_google' => 'required|string|max:255',
            'link_messenger' => 'required|string',
            'link_ggmap' => 'required|string',

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
            'link_twitter.required' => 'Hãy viết nội dung',
            'link_facebook.required' => 'Hãy viết nội dung',
            'link_instagram.required' => 'Hãy viết nội dung',
            'link_youtube.required' => 'Hãy viết nội dung',
            'link_google.required' => 'Hãy viết nội dung',
            'link_messenger.required' => 'Hãy viết nội dung',
            'link_ggmap.required' => 'Hãy viết nội dung',
        ];
    }
}