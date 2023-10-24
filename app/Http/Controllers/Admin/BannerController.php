<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Banners\AddBannerRequest;
use App\Http\Requests\Banners\UpdateBannerRequest;
use App\Services\BannerService;

/**
 * Class BannerController
 * @package App\Http\Controllers\Admin
 */
class BannerController extends Controller
{
    protected $service;
    /**
     * Map model
     * @return mixed
     */
    public function __construct(BannerService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $banners = $this->service->getAll();

        return view('admin.banners.index', compact('banners'));
    }

    public function add()
    {
        return view('admin.banners.add');
    }

    public function postAdd(AddBannerRequest $request)
    {
        $request = $request->validated();

        $data = $this->service->add($request);

        if ($data){
            return redirect(route('admin.banners.index'))->with('msg', 'Thêm banner thành công');
        }else{
            return redirect()->back()->with('msg', 'Đã xảy ra lỗi, vui long thử lại');
        }

    }

    public function update($id)
    {
        $banner = $this->service->get($id);

        return view('admin.banners.update', compact('banner'));
    }

    public function postUpdate(UpdateBannerRequest $request, $id)
    {
        $request = $request->validated();

        $data = $this->service->update($request, $id);

        if ($data){
            return redirect(route('admin.banners.index'))->with('msg', 'Cập nhật banner thành công');
        }else{
            return redirect()->back()->with('msg', 'Đã xảy ra lỗi, vui long thử lại');
        }

    }

    public function delete($id)
    {
        return $this->service->delete($id);
    }
}
