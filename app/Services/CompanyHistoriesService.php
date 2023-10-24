<?php

namespace App\Services;

use App\Models\CompanyHistories;
use App\Repositories\CompanyHistories\CompanyHistoriesRepository;
use Carbon\Carbon;

/**
 * Class CompanyHistoriesService
 * @package App\Services\CompanyHistoriesService
 */
class CompanyHistoriesService
{
    protected $companyHistoriesRepository;
    /**
     * Map model
     * @return mixed
     */
    public function __construct
    (
        CompanyHistoriesRepository $companyHistoriesRepository
    )
    {
        $this->companyHistoriesRepository = $companyHistoriesRepository;
    }

    public function getAll()
    {
        $data = $this->companyHistoriesRepository->orderby('formation_time', 'asc')->paginate(10);
        return $data;
    }

    public function getAllInHome()
    {
        $data = $this->companyHistoriesRepository->orderby('formation_time', 'asc')->all();
        return $data;
    }

    public function store($params)
    {
        if($params['image']){
            $params['image']= str_replace('public/','',$this->uploadFile($params['image'])) ;
        }
        $params['formation_time'] = Carbon::createFromFormat('Y-m', $params['formation_time'])->startOfMonth()->format('Y-m-d');
        $data = $this->companyHistoriesRepository->create($params);
        return $data;
    }

    private function uploadFile($file)
    {
        $typeFile = $file->getClientOriginalExtension();
        $fullNameFile = str_replace(".".$typeFile, '', $file->getClientOriginalName());
        $numberRandom = mt_rand(1, 9999);
        $nameFile     = Carbon::now()->format('ymdHis') . $numberRandom . '.webp';
        $path = $file->storeAs('public/uploads/histories', $nameFile);
        return $path;
    }

    public function getbyId($id)
    {
        $data = $this->companyHistoriesRepository->find($id);
        return $data;
    }

    public function update($params, $id)
    {
        if(isset($params['image'])){
            $params['image']= str_replace('public/','',$this->uploadFile($params['image'])) ;
        }
        
        if(isset($params['formation_time'])){
            $params['formation_time'] = Carbon::createFromFormat('Y-m', $params['formation_time'])->startOfMonth()->format('Y-m-d');
        }
        $data = $this->companyHistoriesRepository->update($params, $id);
        return $data;
    }

    public function delete($id)
    {
        $data = $this->companyHistoriesRepository->delete($id);
        return $data;
    }

}
