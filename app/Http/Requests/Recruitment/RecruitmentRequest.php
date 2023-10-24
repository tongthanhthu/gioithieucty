<?php

namespace App\Http\Requests\Recruitment;

use Illuminate\Foundation\Http\FormRequest;

class RecruitmentRequest extends FormRequest
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
            'name_vi' =>  'required',
            'name_en' =>  '',
            'name_jp' =>  '',
            'name_kr' =>  '',
            'location_vi' =>  'required',
            'location_en' =>  '',
            'location_jp' =>  '',
            'location_kr' =>  '',
            'exp_vi' =>  'required',
            'exp_en' =>  '',
            'exp_jp' =>  '',
            'exp_kr' =>  '',
            'wage_vi' =>  'required',
            'wage_en' =>  '',
            'wage_jp' =>  '',
            'wage_kr' =>  '',

            'form_vi' =>  'required',
            'form_en' =>  '',
            'form_jp' =>  '',
            'form_kr' =>  '',

            'deadline_vi' =>  'required',
            'deadline_en' =>  '',
            'deadline_jp' =>  '',
            'deadline_kr' =>  '',

            'rank_vi' =>  'required',
            'rank_en' =>  '',
            'rank_jp' =>  '',
            'rank_kr' =>  '',

            'description_vi' =>  'required',
            'description_en' =>  '',
            'description_jp' =>  '',
            'description_kr' =>  '',

            'request_vi' =>  'required',
            'request_en' =>  '',
            'request_jp' =>  '',
            'request_kr' =>  '',

            'right_vi' =>  'required',
            'right_en' =>  '',
            'right_jp' =>  '',
            'right_kr' =>  '',

            'other_vi' =>  'required',
            'other_en' =>  '',
            'other_jp' =>  '',
            'other_kr' =>  '',

            'welfare' =>  '',
            'job_category_id' =>  'required',
        ];
    }

    public function messages()
    {
        $message = [
            'name_vi.required' => 'Hãy nhập tiêu đề tuyển dụng',
            'location_vi.required' => 'Hãy nhập địa điểm làm việc',
            'exp_vi.required' => 'Hãy nhập yêu cầu kinh nghiệm',
            'wage_vi.required' => 'Hãy nhập mức lương',
            'form_vi.required' => 'Hãy nhập phương thức làm việc',
            'deadline_vi.required' => 'Hãy nhập thời gian hết hạn',
            'rank_vi.required' => 'Hãy nhập rank tuyển dụng',
            'description_vi.required' => 'Hãy nhập mô tả việc làm',
            'request_vi.required' => 'Hãy nhập yêu cầu công việc',
            'right_vi.required' => 'Hãy nhập quyền lợi',
            'other_vi.required' => 'Hãy nhập thông tin khác',
            'job_category_id.required' => 'Hãy chọn vị trí tuyển dụng',
        ];
        return $message;
    }
}
