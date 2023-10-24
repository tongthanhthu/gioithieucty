<?php

namespace App\Http\Controllers\Admin;

use App\Models\JobCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\JobCategoryService;
use App\Services\RecruitmentService;
use App\Http\Requests\Recruitment\RecruitmentRequest;
use App\Repositories\JobCategory\JobCategoryRepository;
use App\Http\Requests\Recruitment\UpdateRecruitmentRequest;

/**
 * Class RecruitmentController
 * @package App\Http\Controllers\Admin
 */
class RecruitmentController extends Controller
{
    protected $service, $jobRepo;
    /**
     * Map model
     * @return mixed
     */
    public function __construct(RecruitmentService $service, JobCategoryRepository $jobRepo)
    {
        $this->service = $service;
        $this->jobRepo = $jobRepo;
    }
    public function index()
    {
        $recruitments = $this->service->getAll();

        return view('admin.recruitments.index', compact('recruitments'));
    }

    public function add()
    {
        $options  = $this->service->getOptions();

        $jobCategories =  $this->jobRepo->orderByDesc('updated_at')->limit(5)->get();

        return view('admin.recruitments.add', compact('options','jobCategories'));
    }

    public function postAdd(RecruitmentRequest $request)
    {
        $request = $request->validated();

        $data = $this->service->add($request);

        if ($data){
            return redirect(route('admin.recruitments.index'))->with('msg', 'Thêm tin tuyển dụng thành công');
        }else{
            return redirect()->back()->with('msg', 'Đã xảy ra lỗi, vui lòng thử lại');
        }
    }

    public function update($id)
    {
        $jobCategories = $this->jobRepo->orderByDesc('updated_at')->limit(5)->get();
        $options  = $this->service->getOptions();
        $recruitments = $this->service->findId($id);

        return view('admin.recruitments.update', compact('options','jobCategories','recruitments'));
    }

    public function postUpdate(RecruitmentRequest $request, $id)
    {
        $request = $request->validated();

        $data = $this->service->update($request, $id);

        if ($data){
            return redirect(route('admin.recruitments.index'))->with('msg', 'Cập nhật tin tuyển dụng thành công');
        }else{
            return redirect()->back()->with('msg', 'Đã xảy ra lỗi, vui long thử lại');
        }

    }

    public function delete($id)
    {
        return $this->service->delete($id);
    }
}
