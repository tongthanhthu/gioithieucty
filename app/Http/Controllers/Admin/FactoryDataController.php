<?php

namespace App\Http\Controllers\Admin;

use Laracasts\Flash\Flash;
use App\Models\FactoryData;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\FactoryDataService;
use App\Http\Requests\FactoryData\FactoryDataStoreRequest;

class FactoryDataController extends Controller
{
    protected $service;
    /**
     * Map model
     * @return mixed
     */
    public function __construct(FactoryDataService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        $data = $this->service->getFrirstContact();
        return view('admin.factory_data.index', compact('data'));
    }

    public function store(FactoryDataStoreRequest $request){
        $params = $request->validated();
        try
        {
            $this->service->store($params);
            Flash::success('Thêm mới thành công.');
            return redirect()->route('admin.factory_data.index');
        }catch(\Exception $e){
            Flash::success('Thêm mới thất bại.');
            return redirect()->route('admin.factory_data.index');
        }
    }

    public function update(FactoryDataStoreRequest $request, $id)
    {
        $params = $request->validated();
        try
        {
            $this->service->update($params, $id);
            Flash::success('Cập nhật thành công.');
            return redirect()->route('admin.factory_data.index');
        }catch(\Exception $e){
            Flash::success('Cập nhật thất bại.');
            return redirect()->route('admin.factory_data.index');
        }
    }
}
