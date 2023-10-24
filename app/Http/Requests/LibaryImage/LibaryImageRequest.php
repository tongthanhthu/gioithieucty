<?php

namespace App\Http\Requests\LibaryImage;

use Illuminate\Foundation\Http\FormRequest;

/**
 * [auto-gen-property]
 * @property int $id
 * @property string $image
 * @property string $created_at
 * @property string $updated_at
 * [/auto-gen-property]
 */
class LibaryImageRequest extends FormRequest
{
    /**
     * @return string[]
     */
    public function attributes()
    {
        return [
            'id' => '',
            'image' => '',
            'created_at' => '',
            'updated_at' => ''
        ];
    }
}