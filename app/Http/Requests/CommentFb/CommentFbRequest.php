<?php

namespace App\Http\Requests\CommentFb;

use Illuminate\Foundation\Http\FormRequest;

/**
 * [auto-gen-property]
 * @property int $id
 * @property int $id_fb
 * @property string $deleted_at
 * @property string $created_at
 * @property string $updated_at
 * [/auto-gen-property]
 */
class CommentFbRequest extends FormRequest
{
    /**
     * @return string[]
     */
    public function attributes()
    {
        return [
            'id' => '',
            'id_fb' => '',
            'deleted_at' => '',
            'created_at' => '',
            'updated_at' => ''
        ];
    }
}