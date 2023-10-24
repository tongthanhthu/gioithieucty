<?php

namespace App\Http\Controllers\Admin;

use Laracasts\Flash\Flash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\JobCategoryService;
use App\Http\Requests\JobCategory\JobCategoryStoreRequest;
use App\Http\Requests\JobCategory\JobCategoryUpdateRequest;

/**
 * @package App\Http\Controllers\Admin
 */
class JobCategoryController extends Controller
{
    protected $service;
    /**
     * Map model
     * @return mixed
     */
    public function __construct(JobCategoryService $service)
    {
        $this->service = $service;
    }

    public function index(){
        $posts = $this->service->getAll();
        return view('admin.job_category.index', compact('posts'));
    }

    public function add(){
        return view('admin.job_category.add');
    }

    public function store(JobCategoryStoreRequest $request)
    {
        $params = $request->validated();
        try{
            $this->service->store($params);
            Flash::success('Thêm mới thành công.');
            return redirect()->route('admin.job_category.index');
        }
        catch (\Exception $e){
            Flash::success('Thêm mới thất bại.');
            return redirect()->back()->withErrors($e->getMessage());
        }
    }
    
    public function edit($id)
    {
        $post = $this->service->getById($id);
        return view('admin.job_category.update',compact('post'));
    }

    public function update(JobCategoryUpdateRequest $request, $id)
    {
        $params = $request->validated();
        try
        {
            $this->service->update($id, $params);
            Flash::success('Cập nhật thành công.');
            return redirect()->route('admin.job_category.index');
        }catch(\Exception $e){
            Flash::success('Cập nhật thất bại.');
            return redirect()->route('admin.job_category.index');
        }
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        try
        {
            $this->service->delete($id);
            Flash::success('Xóa thành công.');
            return redirect()->route('admin.job_category.index');
        }catch(\Exception $e){
            Flash::success('Xóa thất bại.');
            return redirect()->route('admin.job_category.index');
        }
    }
}
