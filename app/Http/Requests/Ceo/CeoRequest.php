<?php

namespace App\Http\Requests\Ceo;

use Illuminate\Foundation\Http\FormRequest;

/**
 * [auto-gen-property]
 * @property int $id
 * @property string $image
 * @property string $name_vi
 * @property string $name_en
 * @property string $name_jp
 * @property string $name_kr
 * @property string $position_vi
 * @property string $position_en
 * @property string $position_jp
 * @property string $position_kr
 * @property string $description_vi
 * @property string $description_en
 * @property string $description_jp
 * @property string $description_kr
 * @property string $deleted_at
 * @property string $created_at
 * @property string $updated_at
 * [/auto-gen-property]
 */
class CeoRequest extends FormRequest
{
    /**
     * @return string[]
     */
    public function attributes()
    {
        return [
            'id' => '',
            'image' => '',
            'name_vi' => '',
            'name_en' => '',
            'name_jp' => '',
            'name_kr' => '',
            'position_vi' => '',
            'position_en' => '',
            'position_jp' => '',
            'position_kr' => '',
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