<?php

namespace App\Http\Controllers\Admin;

use Laracasts\Flash\Flash;
use Illuminate\Http\Request;
use App\Services\CategoriesService;
use App\Http\Controllers\Controller;
use App\Repositories\Categories\CategoriesRepository;
use App\Http\Requests\Categories\CategoriesStoreRequest;
use App\Http\Requests\Categories\CategoriesUpdateRequest;

/**
 * Class CategoryController
 * @package App\Http\Controllers\Admin
 */
class CategoryController extends Controller
{
    protected $service;
    protected $categoriesRepository;
    /**
     * Map model
     * @return mixed
     */
    public function __construct
    (
        CategoriesService $service,
        CategoriesRepository $categoriesRepository
    )
    {
        $this->service = $service;
        $this->categoriesRepository = $categoriesRepository;
    }

    public function index(Request $request)
    {
        $categories = $this->service->getList();
        return view('admin.categories.index', compact('categories'));
    }
    
    public function add(Request $request)
    {
        $categories = $this->service->getListSub();
        return view('admin.categories.add',compact('categories'));
    }

    public function store(CategoriesStoreRequest $request)
    {
        $params = $request->validated();
        try
        {
            $this->service->store($params);
            Flash::success('Thêm thành công.');
            return redirect()->route('admin.categories.index');
        }catch(\Exception $e){
            Flash::success('Thêm thất bại.');
            return redirect()->route('admin.categories.index');
        }
    }
    
    public function edit($id)
    {
        $categories = $this->service->getListSub();
        $category = $this->service->getById($id);
        return view('admin.categories.update',compact('category', 'categories'));
    }

    public function update(CategoriesUpdateRequest $request, $id)
    {
        $params = $request->validated();
        try
        {
            $this->service->update($params, $id);
            Flash::success('Cập nhật thành công');
            return redirect()->route('admin.categories.index');
        }catch(\Exception $e){
            Flash::success('Cập nhật thất bại');
            return redirect()->route('admin.categories.index');
        }
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        try
        {
            if($this->service->getCheckCategoryParent($id) > 0){
                Flash::success('Không thể xóa vì chứa danh mục con');
                return redirect()->route('admin.categories.index');
            }
            $this->service->delete($id);
            Flash::success('Loại bỏ thành công');
            return redirect()->route('admin.categories.index');
        }catch(\Exception $e){
            Flash::success('Loại bỏ thất bại');
            return redirect()->route('admin.categories.index');
        }
    }
}
