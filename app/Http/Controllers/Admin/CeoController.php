<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Ceo\CeoStoreRequest;
use App\Http\Requests\Ceo\CeoUpdateRequest;
use App\Services\CeoService;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;

/**
 * Class CeoController
 * @package App\Http\Controllers\Admin
 */
class CeoController extends Controller
{
    protected $service;
    /**
     * Map model
     * @return mixed
     */
    public function __construct(CeoService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        $ceo = $this->service->getCeo();
        return view('admin.company.ceo', compact('ceo'));
    }

    public function store(CeoStoreRequest $request){
        $params = $request->validated();
        try
        {
            $this->service->store($params);
            Flash::success('Tạo thành công.');
            return redirect()->route('admin.company.ceo.index');
        }catch(\Exception $e){
            Flash::success('Tạo thất bại.');
            return redirect()->route('admin.company.ceo.index');
        }
    }

    public function update(CeoUpdateRequest $request, $id)
    {
        $params = $request->validated();
        try
        {
            $this->service->update($params, $id);
            Flash::success('Cập nhật thành công.');
            return redirect()->route('admin.company.ceo.index');
        }catch(\Exception $e){
            Flash::success('Cập nhật thất bại.');
            return redirect()->route('admin.company.ceo.index');
        }
    }
}
