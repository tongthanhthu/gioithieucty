<?php

namespace App\Repositories\CompanyIntroduce;

use App\Repositories\BaseRepository;
use App\Models\CompanyIntroduce;

/**
 * Class CompanyIntroduceRepository
 * @package App\Repositories\CompanyIntroduce
 */
class CompanyIntroduceRepositoryEloquent extends BaseRepository implements CompanyIntroduceRepository
{
    /**
     * Map model
     * @return mixed
     */
    public function model()
    {
        return CompanyIntroduce::class;
    }
}
