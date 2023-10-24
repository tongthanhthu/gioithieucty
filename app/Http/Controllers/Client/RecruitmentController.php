<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Recruitment\RecruitmentRequest;
use App\Http\Requests\Recruitment\SendMailRequest;
use App\Models\Benefit;
use App\Models\CompanyIntroduce;
use App\Models\Contacts;
use App\Models\JobCategory;
use App\Services\RecruitmentService;

/**
 * Class RecruitmentController
 * @package App\Http\Controllers\Admin
 */
class RecruitmentController extends Controller
{
    protected $service;
    /**
     * Map model
     * @return mixed
     */
    public function __construct(RecruitmentService $service)
    {
        $this->service = $service;
    }
    public function list()
    {
        $params = request()->all();
        $recruitments = $this->service->getAll($params);
        $logo = $this->service->getLogo();
        $positions = JobCategory::query()->limit(5)->get();


        return view('client.page.recruitments.index', compact('recruitments', 'logo', 'positions'));
    }

    public function detail($slug)
    {
        $recruitment = $this->service->getBySlug($slug);
        $logo = $this->service->getLogo();
        $benefits = Benefit::all();
        $company = CompanyIntroduce::query()->first();
        $contact = Contacts::query()->first();

        return view('client.page.recruitments.detail',
                    compact('logo', 'recruitment', 'benefits', 'company','contact'));
    }

    public function sendMail(SendMailRequest $request)
    {
        $request = $request->validated();
        $data = $this->service->sendMail($request);
        if ($data){
            return redirect()->back()->with('msg', __('message.send_mail_success'));
        }else{
            return redirect()->back()->with('msg', __('message.send_mail_failed'));
        }
    }
}
