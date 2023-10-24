<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\PartnerService;
use Illuminate\Http\Request;
use App\Http\Requests\Partner\PartnerStoreRequest;
use App\Http\Requests\Partner\ParterUpdateRequest;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

/**
 * Class PartnerController
 * @package App\Http\Controllers\Admin
 */
class PartnerController extends Controller
{
    protected $service;
    /**
     * Map model
     * @return mixed
     */
    public function __construct(PartnerService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $partner = $this->service->getAll();

        return view('admin.partner.index', compact('partner'));
    }

    public function add()
    {
        return view('admin.partner.add');
    }

    public function store(PartnerStoreRequest $request)
    {
        $params = $request->validated();
        $data = $this->service->store($params);

        if ($data){
            return redirect(route('admin.partner.index'))->with('message', 'Thêm đối tác thành công');
        }else{
            return redirect()->back()->with('errors', 'Đã xảy ra lỗi, vui long thử lại');
        }
    }

    public function edit($id)
    {
        $partner = $this->service->getById($id);
        if (empty($partner)) {
            return redirect(route('admin.partner.index'))->with('errors', 'Không tìm thấy đối tác');
        }

        return view('admin.partner.update', compact('partner'));
    }

    public function update(ParterUpdateRequest $request, $id)
    {
        $params = $request->validated();
        DB::beginTransaction();
        try {
            $this->service->update($params, $id);
            DB::commit();
            
            return redirect(route('admin.partner.index'))->with('message', 'Cập nhật đối tác thành công');
        } catch (Exception $e) {
            DB::rollBack();

            return redirect()->back()->with('errors', 'Đã xảy ra lỗi, vui lòng thử lại');
        }
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        $data = $this->service->delete($id);

        if ($data){
            return redirect(route('admin.partner.index'))->with('message', 'Xóa đối tác thành công');
        }else{
            return redirect()->back()->with('errors', 'Đã xảy ra lỗi, vui lòng thử lại');
        }
    }
}
