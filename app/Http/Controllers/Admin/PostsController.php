<?php

namespace App\Http\Controllers\Admin;

use Laracasts\Flash\Flash;
use Illuminate\Http\Request;
use App\Services\PostsService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Posts\PostsStoreRequest;
use App\Http\Requests\Posts\PostsUpdateRequest;

/**
 * Class PostsController
 * @package App\Http\Controllers\Admin
 */
class PostsController extends Controller
{
    protected $service;
    /**
     * Map model
     * @return mixed
     */
    public function __construct(PostsService $service)
    {
        $this->service = $service;
    }

    public function index(){
        $posts = $this->service->getAll();
        return view('admin.posts.index', compact('posts'));
    }

    public function add(){
        return view('admin.posts.add');
    }

    public function store(PostsStoreRequest $request)
    {
        $params = $request->validated();

        try{
            $this->service->store($params);
            Flash::success('Thêm mới thành công.');
            return redirect()->route('admin.posts.index');
        }
        catch (\Exception $e){
            Flash::success('Thêm mới thất bại.');
            return redirect()->back()->withErrors($e->getMessage());
        }
    }
    
    public function edit($id)
    {
        $post = $this->service->getById($id);
        return view('admin.posts.update',compact('post'));
    }

    public function update(PostsUpdateRequest $request, $id)
    {
        $params = $request->validated();
        try
        {
            $this->service->update($id, $params);
            Flash::success('Cập nhật thành công.');
            return redirect()->route('admin.posts.index');
        }catch(\Exception $e){
            Flash::success('Cập nhật thất bại.');
            return redirect()->route('admin.posts.index');
        }
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        try
        {
            $this->service->delete($id);
            Flash::success('Xóa thành công.');
            return redirect()->route('admin.posts.index');
        }catch(\Exception $e){
            Flash::success('Xóa thất bại.');
            return redirect()->route('admin.posts.index');
        }
    }
}
