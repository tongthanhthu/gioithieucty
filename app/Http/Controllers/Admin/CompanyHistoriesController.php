<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Categories\CategoriesStoreRequest;
use App\Http\Requests\CompanyHistories\CompanyHistoriesStoreRequest;
use App\Http\Requests\CompanyHistories\CompanyHistoriesUpdateRequest;
use App\Services\CompanyHistoriesService;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;

/**
 * Class CompanyHistoriesController
 * @package App\Http\Controllers\Admin
 */
class CompanyHistoriesController extends Controller
{
    protected $service;
    /**
     * Map model
     * @return mixed
     */
    public function __construct(CompanyHistoriesService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $histories = $this->service->getAll();
        return view('admin.company.histories',compact('histories'));
    }

    public function add()
    {
        return view('admin.company.add_history');
    }

    public function store(CompanyHistoriesStoreRequest $request)
    {
        $params = $request->validated();
        try
        {
            $this->service->store($params);
            Flash::success('Thêm mới thành công.');
            return redirect()->route('admin.company.histories.index');

        }catch(\Exception $e){
            Flash::success('Thêm mới thất bại.');
            return redirect()->route('admin.company.histories.index');
        }
    }
    
    public function edit($id)
    {
        $history = $this->service->getbyId($id);
        return view('admin.company.edit_history',compact('history'));
    }

    public function update(CompanyHistoriesUpdateRequest $request, $id)
    {
        $params = $request->validated();
        try
        {
            $this->service->update($params,$id);
            Flash::success('Cập nhật thành công.');
            return redirect()->route('admin.company.histories.index');
        }catch(\Exception $e){
            Flash::success('Cập nhật thất bại.');
            return redirect()->route('admin.company.histories.index');
        }
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        try
        {
            $this->service->delete($id);
            Flash::success('Xóa thành công.');
            return redirect()->route('admin.company.histories.index');
        }catch(\Exception $e){
            Flash::success('Xóa thất bại.');
            return redirect()->route('admin.company.histories.index');
        }
    }
}
