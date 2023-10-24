<?php

namespace App\Repositories\CompanyHistories;

use App\Repositories\BaseRepository;
use App\Models\CompanyHistories;

/**
 * Class CompanyHistoriesRepository
 * @package App\Repositories\CompanyHistories
 */
class CompanyHistoriesRepositoryEloquent extends BaseRepository implements CompanyHistoriesRepository
{
    /**
     * Map model
     * @return mixed
     */
    public function model()
    {
        return CompanyHistories::class;
    }
}
