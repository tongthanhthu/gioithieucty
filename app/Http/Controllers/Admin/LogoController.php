<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Logo\AddLogoRequest;
use App\Http\Requests\Logo\UpdateLogoRequest;
use App\Services\LogoService;

/**
 * Class LogoController
 * @package App\Http\Controllers\Admin
 */
class LogoController extends Controller
{
    protected $service;
    /**
     * Map model
     * @return mixed
     */
    public function __construct(LogoService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $logos = $this->service->getAll();

        return view('admin.logos.index', compact('logos'));
    }

    public function add()
    {
        return view('admin.logos.add');
    }

    public function postAdd(AddLogoRequest $request)
    {
        $request = $request->validated();

        $data = $this->service->add($request);

        if ($data){
            return redirect(route('admin.logos.index'))->with('msg', 'Thêm Logo thành công');
        }else{
            return redirect()->back()->with('msg', 'Đã xảy ra lỗi, vui long thử lại');
        }

    }

    public function update($id)
    {
        $logo = $this->service->get($id);

        return view('admin.logos.update', compact('logo'));
    }

    public function postUpdate(UpdateLogoRequest $request, $id)
    {
        $request = $request->validated();

        $data = $this->service->update($request, $id);

        if ($data){
            return redirect(route('admin.logos.index'))->with('msg', 'Cập nhật logo thành công');
        }else{
            return redirect()->back()->with('msg', 'Đã xảy ra lỗi, vui long thử lại');
        }

    }

    public function delete($id)
    {
        return $this->service->delete($id);
    }
}
