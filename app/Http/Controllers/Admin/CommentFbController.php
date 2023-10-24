<?php

namespace App\Http\Controllers\Admin;

use Laracasts\Flash\Flash;
use Illuminate\Http\Request;
use App\Services\CommentFbService;
use App\Http\Controllers\Controller;
use App\Http\Requests\CommentFb\CommentFbStoreRequest;
use App\Services\FactoryDataService;
use App\Http\Requests\FactoryData\FactoryDataStoreRequest;

class CommentFbController extends Controller
{
    protected $service;
    /**
     * Map model
     * @return mixed
     */
    public function __construct(CommentFbService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        $data = $this->service->getFrirstContact();
        return view('admin.comment_fb.index', compact('data'));
    }
    public function text()
    {
        return view('admin.comment_fb.text');
    }

    public function store(CommentFbStoreRequest $request){
        $params = $request->validated();
        try
        {
            $this->service->store($params);
            Flash::success('Thêm mới thành công.');
            return redirect()->route('admin.comment_fb.index');
        }catch(\Exception $e){
            Flash::success('Thêm mới thất bại.');
            return redirect()->route('admin.comment_fb.index');
        }
    }

    public function update(CommentFbStoreRequest $request, $id)
    {
        $params = $request->validated();
        try
        {
            $this->service->update($params, $id);
            Flash::success('Cập nhật thành công.');
            return redirect()->route('admin.comment_fb.index');
        }catch(\Exception $e){
            Flash::success('Cập nhật thất bại.');
            return redirect()->route('admin.comment_fb.index');
        }
    }
}
