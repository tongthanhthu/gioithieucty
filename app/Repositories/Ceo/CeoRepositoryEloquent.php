<?php

namespace App\Repositories\Ceo;

use App\Repositories\BaseRepository;
use App\Models\Ceo;

/**
 * Class CeoRepository
 * @package App\Repositories\Ceo
 */
class CeoRepositoryEloquent extends BaseRepository implements CeoRepository
{
    /**
     * Map model
     * @return mixed
     */
    public function model()
    {
        return Ceo::class;
    }
}
