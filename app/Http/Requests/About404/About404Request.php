<?php

namespace App\Http\Requests\About404;

use Illuminate\Foundation\Http\FormRequest;

/**
 * [auto-gen-property]
 * @property int $id
 * @property string $description_vi
 * @property string $description_en
 * @property string $description_jp
 * @property string $description_kr
 * @property string $deleted_at
 * @property string $created_at
 * @property string $updated_at
 * [/auto-gen-property]
 */
class About404Request extends FormRequest
{
    /**
     * @return string[]
     */
    public function attributes()
    {
        return [
            'id' => '',
            'description_vi' => '',
            'description_en' => '',
            'description_jp' => '',
            'description_kr' => '',
            'deleted_at' => '',
            'created_at' => '',
            'updated_at' => ''
        ];
    }
}