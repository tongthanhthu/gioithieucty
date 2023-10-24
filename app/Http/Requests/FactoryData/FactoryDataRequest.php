<?php

namespace App\Http\Requests\FactoryData;

use Illuminate\Foundation\Http\FormRequest;


/**
 * [auto-gen-property]
 * @property int $id
 * @property int $factory
 * @property int $machines
 * @property int $human
 * @property string $created_at
 * @property string $updated_at
 * [/auto-gen-property]
 */
class FactoryDataRequest extends FormRequest
{
    /**
     * @return string[]
     */
    public function attributes()
    {
        return [
            'id' => '',
            'factory' => '',
            'machines' => '',
            'human' => '',
            'created_at' => '',
            'updated_at' => ''
        ];
    }
}