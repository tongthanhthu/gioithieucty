<?php

namespace App\Repositories\FactoryData;

use App\Repositories\BaseRepository;
use App\Models\FactoryData;

/**
 * Class FactoryDataRepository
 * @package App\Repositories\FactoryData
 */
class FactoryDataRepositoryEloquent extends BaseRepository implements FactoryDataRepository
{
    /**
     * Map model
     * @return mixed
     */
    public function model()
    {
        return FactoryData::class;
    }
}
