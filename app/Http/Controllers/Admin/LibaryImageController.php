<?php

namespace App\Http\Controllers\Admin;

use Laracasts\Flash\Flash;
use App\Services\CeoService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\LibaryImageService;
use App\Http\Requests\Ceo\CeoStoreRequest;
use App\Http\Requests\Ceo\CeoUpdateRequest;
use App\Http\Requests\LibaryImage\LibaryImageStoreRequest;
use App\Http\Requests\LibaryImage\LibaryImageUpdateRequest;

/**
 * Class CeoController
 * @package App\Http\Controllers\Admin
 */
class LibaryImageController extends Controller
{
    protected $service;
    /**
     * Map model
     * @return mixed
     */
    // lybary_image
    public function __construct(LibaryImageService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        $lybary_image = $this->service->getImage();
        // dd($lybary_image);
        return view('admin.lybary_image.index', compact('lybary_image'));
    }

    public function store(LibaryImageStoreRequest $request){
        $params = $request->validated();
        try
        {
            $this->service->store($params);
            Flash::success('Tạo thành công.');
            return redirect()->route('admin.lybary_image.index');
        }catch(\Exception $e){
            Flash::success('Tạo thất bại.');
            return redirect()->route('admin.lybary_image.index');
        }
    }

    public function delete($id)
    {
        return $this->service->delete($id);
    }
}
