<?php

namespace App\Http\Controllers\Admin;

use Laracasts\Flash\Flash;
use Illuminate\Http\Request;
use App\Services\MediaService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Media\MediaStoreRequest;

class MediaController extends Controller
{
    protected $service;
    /**
     * Map model
     * @return mixed
     */
    public function __construct(MediaService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        $contact = $this->service->getFrirstContact();
        return view('admin.social_media.index', compact('contact'));
    }

    public function store(MediaStoreRequest $request){
        $params = $request->validated();
        try
        {
            $this->service->store($params);
            Flash::success('Thêm mới thành công.');
            return redirect()->route('admin.social_media.index');
        }catch(\Exception $e){
            Flash::success('Thêm mới thất bại.');
            return redirect()->route('admin.social_media.index');
        }
    }

    public function update(MediaStoreRequest $request, $id)
    {
        $params = $request->validated();
        try
        {
            $this->service->update($params, $id);
            Flash::success('Cập nhật thành công.');
            return redirect()->route('admin.social_media.index');
        }catch(\Exception $e){
            Flash::success('Cập nhật thất bại.');
            return redirect()->route('admin.social_media.index');
        }
    }
}
