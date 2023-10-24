<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChooseUs\ChooseUsRequest;
use App\Services\ChooseUsService;
use Laracasts\Flash\Flash;

/**
 * Class ChooseUsController
 * @package App\Http\Controllers\Admin
 */
class ChooseUsController extends Controller
{
    protected $service;
    /**
     * Map model
     * @return mixed
     */
    public function __construct(ChooseUsService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $chooseUs = $this->service->getChooseUs();
        return view('admin.choose_us.index', compact('chooseUs'));
    }

    public function add(ChooseUsRequest $request)
    {
        $params = $request->validated();
        try
        {
            $params['link_video'] = $this->service->getYoutubeEmbedUrl($params['link_video']);
            $this->service->store($params);
            Flash::success('Thêm mới thành công.');

            return redirect(route('admin.choose_us.index'))->with('message', 'thêm mới thành công');
        }
        catch(\Exception $e)
        {
            return redirect(route('admin.choose_us.index'))->with('errors', 'Đã xảy ra lỗi, vui lòng thử lại');
        }

    }

    public function update(ChooseUsRequest $request, $id)
    {
        $params = $request->validated();
        try
        {
            $params['link_video'] = $this->service->getYoutubeEmbedUrl($params['link_video']);
            $this->service->update($id,$params);
            return redirect(route('admin.choose_us.index'))->with('message', 'cập nhật thành công');
        }
        catch(\Exception $e)
        {
            return redirect(route('admin.choose_us.index'))->with('errors', 'Đã xảy ra lỗi, vui lòng thử lại');
        }

    }
}
