<?php

namespace App\Http\Requests\Benefit;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBenefitRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'des_vi' =>  'required',
            'des_en' =>  'required',
            'des_jp' =>  'required',
            'des_kr' =>  'required',
            'path' =>  'required',
        ];
    }

    public function messages()
    {
        $message = [
            'des_vi.required' => 'Hãy nhập mô tả',
            'des_en.required' => 'Hãy nhập mô tả',
            'des_jp.required' => 'Hãy nhập mô tả',
            'des_kr.required' => 'Hãy nhập mô tả',
            'path.required' => 'Hãy nhập class icon',
        ];
        return $message;
    }
}
