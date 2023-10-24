<?php

namespace App\Http\Requests\Menu;

use Illuminate\Foundation\Http\FormRequest;


/**
 * [auto-gen-property]
 * @property int $id
 * @property string $name_vi
 * @property string $name_en
 * @property string $name_jp
 * @property string $name_kr
 * @property int $parent_id
 * @property int $position
 * @property string $url
 * @property int $layout
 * @property string $deleted_at
 * @property string $created_at
 * @property string $updated_at
 * [/auto-gen-property]
 */
class MenuRequest extends FormRequest
{
    /**
     * @return string[]
     */
    public function attributes()
    {
        return [
            'id' => '',
            'name_vi' => '',
            'name_en' => '',
            'name_jp' => '',
            'name_kr' => '',
            'parent_id' => '',
            'position' => '',
            'url_vi' => '',
            'url_en' => '',
            'layout' => '',
            'deleted_at' => '',
            'created_at' => '',
            'updated_at' => ''
        ];
    }
}