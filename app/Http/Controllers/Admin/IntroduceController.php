<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Introduce\IntroduceStoreRequest;
use App\Http\Requests\Introduce\IntroduceUpdateRequest;
use App\Services\IntroduceService;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;

/**
 * @package App\Http\Controllers\Admin
 */
class IntroduceController extends Controller
{
    protected $service;
    /**
     * Map model
     * @return mixed
     */
    public function __construct(IntroduceService $service)
    {
        $this->service = $service;
    }

    public function index(){
        $posts = $this->service->getAll();
        return view('admin.introduce.index', compact('posts'));
    }

    public function add(){
        return view('admin.introduce.add');
    }

    public function store(IntroduceStoreRequest $request)
    {
        $params = $request->validated();
        try{
            $this->service->store($params);
            Flash::success('Thêm mới thành công.');
            return redirect()->route('admin.introduce.index');
        }
        catch (\Exception $e){
            Flash::success('Thêm mới thất bại.');
            return redirect()->back()->withErrors($e->getMessage());
        }
    }
    
    public function edit($id)
    {
        $post = $this->service->getById($id);
        return view('admin.introduce.update',compact('post'));
    }

    public function update(IntroduceUpdateRequest $request, $id)
    {
        $params = $request->validated();
        try
        {
            $this->service->update($id, $params);
            Flash::success('Cập nhật thành công.');
            return redirect()->route('admin.introduce.index');
        }catch(\Exception $e){
            Flash::success('Cập nhật thất bại.');
            return redirect()->route('admin.introduce.index');
        }
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        try
        {
            $this->service->delete($id);
            Flash::success('Xóa thành công.');
            return redirect()->route('admin.introduce.index');
        }catch(\Exception $e){
            Flash::success('Xóa thất bại.');
            return redirect()->route('admin.introduce.index');
        }
    }
}
