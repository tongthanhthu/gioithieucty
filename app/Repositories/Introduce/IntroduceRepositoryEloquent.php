<?php

namespace App\Repositories\Introduce;

use App\Repositories\BaseRepository;
use App\Models\Introduce;

/**
 * Class IntroduceRepository
 * @package App\Repositories\Introduce
 */
class IntroduceRepositoryEloquent extends BaseRepository implements IntroduceRepository
{
    /**
     * Map model
     * @return mixed
     */
    public function model()
    {
        return Introduce::class;
    }
}
