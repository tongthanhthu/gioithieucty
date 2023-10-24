<?php

namespace App\Http\Requests\CompanyIntroduce;

use Illuminate\Foundation\Http\FormRequest;


/**
 * [auto-gen-property]
 * @property int $id
 * @property int $experience
 * @property string $description_short_vi
 * @property string $description_short_en
 * @property string $description_short_jp
 * @property string $description_short_kr
 * @property string $description_vi
 * @property string $description_en
 * @property string $description_jp
 * @property string $description_kr
 * @property string $company_diagram_vi
 * @property string $company_diagram_en
 * @property string $company_diagram_jp
 * @property string $company_diagram_kr
 * @property string $mission_vi
 * @property string $mission_en
 * @property string $mission_jp
 * @property string $mission_kr
 * @property string $vision_vi
 * @property string $vision_en
 * @property string $vision_jp
 * @property string $vision_kr
 * @property string $core_value_vi
 * @property string $core_value_en
 * @property string $core_value_jp
 * @property string $core_value_kr
 * @property string $business_philosophy_vi
 * @property string $business_philosophy_en
 * @property string $business_philosophy_jp
 * @property string $business_philosophy_kr
 * @property string $deleted_at
 * @property string $created_at
 * @property string $updated_at
 * [/auto-gen-property]
 */
class CompanyIntroduceRequest extends FormRequest
{
    /**
     * @return string[]
     */
    public function attributes()
    {
        return [
            'id' => '',
            'image' => '',
            'company_name_vi' => '',
            'company_name_en' => '',
            'company_name_jp' => '',
            'company_name_kr' => '',
            'experience' => '',
            'description_short_vi' => '',
            'description_short_en' => '',
            'description_short_jp' => '',
            'description_short_kr' => '',
            'description_vi' => '',
            'description_en' => '',
            'description_jp' => '',
            'description_kr' => '',
            'company_diagram_vi' => '',
            'company_diagram_en' => '',
            'company_diagram_jp' => '',
            'company_diagram_kr' => '',
            'mission_vi' => '',
            'mission_en' => '',
            'mission_jp' => '',
            'mission_kr' => '',
            'vision_vi' => '',
            'vision_en' => '',
            'vision_jp' => '',
            'vision_kr' => '',
            'core_value_vi' => '',
            'core_value_en' => '',
            'core_value_jp' => '',
            'core_value_kr' => '',
            'business_philosophy_vi' => '',
            'business_philosophy_en' => '',
            'business_philosophy_jp' => '',
            'business_philosophy_kr' => '',
            'deleted_at' => '',
            'created_at' => '',
            'updated_at' => ''
        ];
    }
}