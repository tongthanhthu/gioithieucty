<?php

namespace App\Services;

use App\Repositories\Ceo\CeoRepository;
use Carbon\Carbon;

/**
 * Class CeoService
 * @package App\Services\CeoService
 */
class CeoService
{

    protected $ceoRepository;
    public function __construct(CeoRepository $ceoRepository)
    {
        $this->ceoRepository = $ceoRepository;
    }

    public function getCeo()
    {
        return $this->ceoRepository->first();
    }

    public function store($params)
    {
        if($params['image']){
            $params['image']= str_replace('public/','',$this->uploadFile($params['image'])) ;
        }
        return $this->ceoRepository->create($params);
    }

    public function update($params, $id)
    {
        if(array_key_exists('image', $params)){
            $params['image']= str_replace('public/','',$this->uploadFile($params['image'])) ;
        }

        return $this->ceoRepository->update($params, $id);
    }

    private function uploadFile($file)
    {
        $typeFile = $file->getClientOriginalExtension();
        $fullNameFile = str_replace(".".$typeFile, '', $file->getClientOriginalName());
        $numberRandom = mt_rand(1, 9999);
        $nameFile     = Carbon::now()->format('ymdHis') . $numberRandom . '.webp';
        $path = $file->storeAs('public/uploads/ceo', $nameFile);

        return $path;
    }
}
