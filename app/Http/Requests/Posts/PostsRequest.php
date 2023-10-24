<?php

namespace App\Http\Requests\Posts;

use Illuminate\Foundation\Http\FormRequest;

/**
 * [auto-gen-property]
 * @property int $id
 * @property string $image
 * @property string $title_vi
 * @property string $title_en
 * @property string $title_jp
 * @property string $title_kr
 * @property string $slug_vi
 * @property string $slug_en
 * @property string $slug_jp
 * @property string $slug_kr
 * @property string $description_short_vi
 * @property string $description_short_en
 * @property string $description_short_jp
 * @property string $description_short_kr
 * @property string $description_vi
 * @property string $description_en
 * @property string $description_jp
 * @property string $description_kr
 * @property string $author
 * @property int $status
 * @property string $deleted_at
 * @property string $created_at
 * @property string $updated_at
 * [/auto-gen-property]
 */
class PostsRequest extends FormRequest
{
    /**
     * @return string[]
     */
    public function attributes()
    {
        return [
            'id' => '',
            'image' => '',
            'title_vi' => '',
            'title_en' => '',
            'title_jp' => '',
            'title_kr' => '',
            'slug_vi' => '',
            'slug_en' => '',
            'slug_jp' => '',
            'slug_kr' => '',
            'description_short_vi' => '',
            'description_short_en' => '',
            'description_short_jp' => '',
            'description_short_kr' => '',
            'description_vi' => '',
            'description_en' => '',
            'description_jp' => '',
            'description_kr' => '',
            'tag_vi' => '',
            'tag_en' => '',
            'tag_jp' => '',
            'tag_kr' => '',
            'author' => '',
            'status' => '',
            'deleted_at' => '',
            'created_at' => '',
            'updated_at' => ''
        ];
    }
}