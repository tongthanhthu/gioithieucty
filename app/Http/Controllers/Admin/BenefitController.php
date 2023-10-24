<?php

namespace App\Http\Controllers\Admin;

use App\Services\BenefitService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Benefit\BenefitRequest;
use App\Http\Requests\Benefit\UpdateBenefitRequest;

/**
 * Class BenefitController
 * @package App\Http\Controllers\Admin
 */
class BenefitController extends Controller
{
    protected $service;
    /**
     * Map model
     * @return mixed
     */
    public function __construct(BenefitService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $benefits = $this->service->getAll();

        return view('admin.benefits.index', compact('benefits'));
    }

    public function tutorial()
    {
        return view('admin.benefits.tutorial');
    }

    public function add()
    {
        return view('admin.benefits.add');
    }

    public function postAdd(BenefitRequest $request)
    {
        $request = $request->validated();

        $data = $this->service->add($request);

        if ($data){
            return redirect(route('admin.benefits.index'))->with('msg', 'Thêm phúc lợi thành công');
        }else{
            return redirect()->back()->with('msg', 'Đã xảy ra lỗi, vui lòng thử lại');
        }

    }

    public function update($id)
    {
        $benefit = $this->service->get($id);

        return view('admin.benefits.update', compact('benefit'));
    }

    public function postUpdate(UpdateBenefitRequest $request, $id)
    {
        $request = $request->validated();

        $data = $this->service->update($request, $id);

        if ($data){
            return redirect(route('admin.benefits.index'))->with('msg', 'Cập nhật phúc lợi thành công');
        }else{
            return redirect()->back()->with('msg', 'Đã xảy ra lỗi, vui lòng thử lại');
        }

    }

    public function delete($id)
    {
        return $this->service->delete($id);
    }

    
}
