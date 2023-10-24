<?php

namespace App\Http\Requests\CompanyHistories;

use Illuminate\Foundation\Http\FormRequest;

/**
 * [auto-gen-property]
 * @property int $id
 * @property string $formation_time
 * @property string $image
 * @property string $title_vi
 * @property string $title_en
 * @property string $title_jp
 * @property string $title_kr
 * @property string $description_vi
 * @property string $description_en
 * @property string $description_jp
 * @property string $description_kr
 * @property string $deleted_at
 * @property string $created_at
 * @property string $updated_at
 * [/auto-gen-property]
 */
class CompanyHistoriesRequest extends FormRequest
{
    /**
     * @return string[]
     */
    public function attributes()
    {
        return [
            'id' => '',
            'formation_time' => '',
            'image' => '',
            'title_vi' => '',
            'title_en' => '',
            'title_jp' => '',
            'title_kr' => '',
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