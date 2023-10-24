<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\About404\About404StoreRequest;
use App\Services\About404Service;
use Laracasts\Flash\Flash;

/**
 * Class About404Controller
 * @package App\Http\Controllers\Admin
 */
class About404Controller extends Controller
{
    protected $service;
    /**
     * Map model
     * @return mixed
     */
    public function __construct(About404Service $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $error = $this->service->getFrirstError();
        return view('admin.errors.index', compact('error'));
    }

    public function store(About404StoreRequest $request){
        $params = $request->validated();
        try
        {
            $this->service->store($params);
            Flash::success('Thêm mới thành công.');
            return redirect()->route('admin.error.index');
        }catch(\Exception $e){
            Flash::success('Thêm mới thất bại.');
            return redirect()->route('admin.error.index');
        }
    }

    public function update(About404StoreRequest $request, $id)
    {
        $params = $request->validated();
        try
        {
            $this->service->update($params, $id);
            Flash::success('Cập nhật thành công.');
            return redirect()->route('admin.error.index');
        }catch(\Exception $e){
            Flash::success('Cập nhật thất bại.');
            return redirect()->route('admin.error.index');
        }
    }
}
