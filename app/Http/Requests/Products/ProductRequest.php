<?php

namespace App\Http\Requests\Products;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductRequest extends FormRequest
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
            'name_vi' =>  'required|unique:products,name_vi',
            'name_en' =>  'required|unique:products,name_en',
            'name_jp' =>  'required|unique:products,name_jp',
            'name_kr' =>  'required|unique:products,name_kr',
            'file' =>  'required|image',
            'files' =>  'required',
            'files.*' =>  'image|mimes:jpeg,png,jpg,gif,webp',
            'key_vi' =>  '',
            'key_en' =>  '',
            'key_jp' =>  '',
            'key_kr' =>  '',
            'value_vi' =>  '',
            'value_en' =>  '',
            'value_jp' =>  '',
            'value_kr' =>  '',
            'category_id' =>  'required|exists:categories,id',
            'description_vi' =>  'required',
            'description_en' =>  '',
            'description_jp' =>  '',
            'description_kr' =>  '',
        ];
    }

    public function messages()
    {
        $message = [
            'name_vi.required' => 'Hãy nhập tên sản phẩm',
            'name_en.required' => 'Hãy nhập tên sản phẩm',
            'name_jp.required' => 'Hãy nhập tên sản phẩm',
            'name_kr.required' => 'Hãy nhập tên sản phẩm',
            'name_vi.unique' => 'Tên sản phẩm đã tồn tại',
            'name_en.unique' => 'Tên sản phẩm đã tồn tại',
            'name_jp.unique' => 'Tên sản phẩm đã tồn tại',
            'name_kr.unique' => 'Tên sản phẩm đã tồn tại',
            'file.required' => 'Hãy chọn ảnh đại diện cho sản phẩm',
            'files.required' => 'Hãy chọn ảnh cho sản phẩm',
            'file.image' => 'Tệp phải là hình ảnh.',
            'files.*.image' => 'Tệp phải là hình ảnh.',
            'files.*.mimes' => 'Định dạng hình ảnh không hợp lệ.',
            'status.required' => 'Hãy nhập trạng thái sản phẩm',
            'client_vi.required' => 'Hãy nhập tên khách hàng',
            'location_vi.required' => 'Hãy nhập địa điểm',
            'building_area_vi.required' => 'Hãy nhập khu vực thi công',
            'category_id.required' => 'Hãy chọn danh mục cho sản phẩm',
            'category_id.exists' => 'Danh mục không tồn tại',
            'description_vi.required' => 'Hãy nhập mô tả cho sản phẩm',
            'client_en.required' => 'Hãy nhập đúng thông tin',
            'location_en.required' => 'Hãy nhập đúng thông tin',
            'building_area_en.required' => 'Hãy nhập đúng thông tin',
            'description_en.required' => 'Hãy nhập đúng thông tin',
        ];
        return $message;
    }
}
