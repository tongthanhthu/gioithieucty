<?php

namespace App\Http\Requests\Seocontent;

use Illuminate\Foundation\Http\FormRequest;


/**
 * [auto-gen-property]
 * @property int $id
 * @property int $position
 * @property string $description
 * @property string $keywords
 * @property string $property_name
 * @property string $property_description
 * @property string $property_og_title
 * @property string $property_og_description
 * @property string $deleted_at
 * @property string $created_at
 * @property string $updated_at
 * [/auto-gen-property]
 */
class SeocontentRequest extends FormRequest
{
    /**
     * @return string[]
     */
    public function attributes()
    {
        return [
            'id' => '',
            'position' => '',
            'description' => '',
            'keywords' => '',
            'property_name' => '',
            'property_description' => '',
            'property_og_title' => '',
            'property_og_description' => '',
            'deleted_at' => '',
            'created_at' => '',
            'updated_at' => ''
        ];
    }
}