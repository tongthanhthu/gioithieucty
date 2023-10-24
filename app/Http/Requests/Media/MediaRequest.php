<?php

namespace App\Http\Requests\Media;

use Illuminate\Foundation\Http\FormRequest;


/**
 * [auto-gen-property]
 * @property int $id
 * @property string $link_twitter
 * @property string $link_facebook
 * @property string $link_instagram
 * @property string $link_youtube
 * @property string $link_google
 * @property string $deleted_at
 * @property string $created_at
 * @property string $updated_at
 * [/auto-gen-property]
 */
class MediaRequest extends FormRequest
{
    /**
     * @return string[]
     */
    public function attributes()
    {
        return [
            'id' => '',
            'link_twitter' => '',
            'link_facebook' => '',
            'link_instagram' => '',
            'link_youtube' => '',
            'link_google' => '',
            'link_messenger' => '',
            'link_ggmap' => '',

            'deleted_at' => '',
            'created_at' => '',
            'updated_at' => ''
        ];
    }
}