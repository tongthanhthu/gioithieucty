<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Services\CeoService;
use App\Services\CompanyHistoriesService;
use App\Services\CompanyIntroduceService;
use App\Services\IntroduceService;

/**
 * Class NewsController
 * @package App\Http\Controllers\Client
 */
class IntroduceController extends Controller
{
    protected $service;
    protected $companyIntroduceService;
    protected $ceoService;
    protected $companyHistoriesService;
    /**
     * Map model
     * @return mixed
     */
    public function __construct
    (
        IntroduceService $service, 
        CompanyIntroduceService $companyIntroduceService,
        CeoService $ceoService,
        CompanyHistoriesService $companyHistoriesService
    ){
        $this->service = $service;
        $this->companyIntroduceService = $companyIntroduceService;
        $this->ceoService = $ceoService;
        $this->companyHistoriesService = $companyHistoriesService;
    }

    public function index()
    {
        $introduce = $this->companyIntroduceService->getInfor();
        $ceo = $this->ceoService->getCeo();
        $histories = $this->companyHistoriesService->getAllInHome();
        return view('client.page.introduces.info', compact('introduce', 'ceo','histories' ));
    }

    public function detail($slug)
    {
        $data = $this->service->getDetail($slug);
        return view('client.page.introduces.info_detail', compact('data'));
    }
}
