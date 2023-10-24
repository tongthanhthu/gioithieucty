<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CompanyIntroduce\CompanyIntroduceStoreRequest;
use App\Http\Requests\CompanyIntroduce\CompanyIntroduceUpdateRequest;
use App\Services\CompanyIntroduceService;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;

/**
 * Class CompanyIntroduceController
 * @package App\Http\Controllers\Admin
 */
class CompanyIntroduceController extends Controller
{
    protected $service;
    /**
     * Map model
     * @return mixed
     */
    public function __construct(CompanyIntroduceService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        $introduce = $this->service->getInfor();
        return view('admin.introduce.company', compact('introduce'));
    }

    public function store(CompanyIntroduceStoreRequest $request){
        $params = $request->validated();
        try
        {
            $this->service->store($params);
            Flash::success('Thêm mới thành công.');
            return redirect()->route('admin.main_introduce.index');
        }catch(\Exception $e){
            Flash::success('Thêm mới thất bại.');
            return redirect()->route('admin.main_introduce.index');
        }
    }

    public function update(CompanyIntroduceUpdateRequest $request, $id)
    {
        $params = $request->validated();
        try
        {
            $this->service->update($params, $id);
            Flash::success('Cập nhật thành công.');
            return redirect()->route('admin.main_introduce.index');
        }catch(\Exception $e){
            Flash::success('Cập nhật thất bại.');
            return redirect()->route('admin.main_introduce.index');
        }
    }
}
