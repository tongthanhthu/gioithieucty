<?php

namespace App\Http\Requests\Contacts;

class ContactsStoreRequest extends ContactsRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            # [auto-gen-rules]
            'phone' => 'required|string|max:255',
            'email' => 'required|email|string|max:255',
            'timework_vi' => 'nullable|string|max:255',
            'timework_en' => 'nullable|string|max:255',
            'timework_jp' => 'nullable|string|max:255',
            'timework_kr' => 'nullable|string|max:255',
            'address_vi' => 'required|string',
            'address_en' => 'nullable|string',
            'address_jp' => 'nullable|string',
            'address_kr' => 'nullable|string',
            'about_vi' => 'nullable|string|max:255',
            'about_en' => 'nullable|string|max:255',
            'about_jp' => 'nullable|string|max:255',
            'about_kr' => 'nullable|string|max:255',
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