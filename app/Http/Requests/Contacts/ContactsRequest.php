<?php

namespace App\Http\Requests\Contacts;

use Illuminate\Foundation\Http\FormRequest;

/**
 * [auto-gen-property]
 * @property int $id
 * @property string $phone
 * @property string $email
 * @property string $timework_vi
 * @property string $timework_en
 * @property string $timework_jp
 * @property string $timework_kr
 * @property string $address_vi
 * @property string $address_en
 * @property string $address_jp
 * @property string $address_kr
 * @property string $about_vi
 * @property string $about_en
 * @property string $about_jp
 * @property string $about_kr
 * @property string $deleted_at
 * @property string $created_at
 * @property string $updated_at
 * [/auto-gen-property]
 */
class ContactsRequest extends FormRequest
{
    /**
     * @return string[]
     */
    public function attributes()
    {
        return [
            'id' => '',
            'phone' => '',
            'email' => '',
            'timework_vi' => '',
            'timework_en' => '',
            'timework_jp' => '',
            'timework_kr' => '',
            'address_vi' => '',
            'address_en' => '',
            'address_jp' => '',
            'address_kr' => '',
            'about_vi' => '',
            'about_en' => '',
            'about_jp' => '',
            'about_kr' => '',
            'deleted_at' => '',
            'created_at' => '',
            'updated_at' => ''
        ];
    }
}