<?php

namespace App\Services;

use Illuminate\Support\Carbon;
use App\Repositories\CompanyIntroduce\CompanyIntroduceRepository;

/**
 * Class CompanyIntroduceService
 * @package App\Services\CompanyIntroduceService
 */
class CompanyIntroduceService
{
    protected $companyIntroduceRepository;

    public function __construct(CompanyIntroduceRepository $companyIntroduceRepository)
    {
        $this->companyIntroduceRepository = $companyIntroduceRepository;
    }

    public function getInfor()
    {
        return $this->companyIntroduceRepository->first();
    }

    public function store($params)
    {
        if($params['image']){
            $params['image'] = str_replace('public', '', $this->uploadFile($params['image']));
        }
        return $this->companyIntroduceRepository->create($params);
    }

    public function uploadFile($params)
    {
        $numberRandom = mt_rand(1, 9999);
        $nameFile = Carbon::now()->format('ymdHis') . $numberRandom . 'webp';
        $path = $params->storeAs('public/uploads/introduces', $nameFile);
        return $path;
    }

    public function update($params, $id)
    {
        if(isset($params['image'])){
            $params['image'] = str_replace('public', '', $this->uploadFile($params['image']));
        }
        return $this->companyIntroduceRepository->update($params, $id);
    }

}
