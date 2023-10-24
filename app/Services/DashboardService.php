<?php

namespace App\Services;

use App\Repositories\Counts\CountsRepository;

/**
 * Class DashboardService
 * @package App\Services\DashboardService
 */
class DashboardService
{

    protected $countsRepository;
    public function __construct(CountsRepository $countsRepository)
    {
        $this->countsRepository = $countsRepository;
    }

    public function getCounts(){
        return $this->countsRepository->first();
    }
}
