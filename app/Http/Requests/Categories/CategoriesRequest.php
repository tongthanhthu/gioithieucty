<?php

namespace App\Http\Requests\Categories;

use Illuminate\Foundation\Http\FormRequest;


/**
 * [auto-gen-property]
 * @property int $id
 * @property int $parent_id
 * @property string $name_vi
 * @property string $name_en
 * @property string $name_jp
 * @property string $name_kr
 * @property string $slug_vi
 * @property string $slug_en
 * @property string $slug_jp
 * @property string $slug_kr
 * @property string $description_vi
 * @property string $description_en
 * @property string $description_jp
 * @property string $description_kr
 * @property int $status
 * @property int $position
 * @property string $deleted_at
 * @property string $created_at
 * @property string $updated_at
 * [/auto-gen-property]
 */
class CategoriesRequest extends FormRequest
{
    /**
     * @return string[]
     */
    public function attributes()
    {
        return [
            'id' => '',
            'parent_id' => '',
            'name_vi' => '',
            'name_en' => '',
            'name_jp' => '',
            'name_kr' => '',
            'slug_vi' => '',
            'slug_en' => '',
            'slug_jp' => '',
            'slug_kr' => '',
            'description_vi' => '',
            'description_en' => '',
            'description_jp' => '',
            'description_kr' => '',
            'status' => '',
            'position' => '',
            'deleted_at' => '',
            'created_at' => '',
            'updated_at' => ''
        ];
    }
}