<?php

namespace App\Repositories\Counts;

use App\Repositories\BaseRepository;
use App\Models\Counts;

/**
 * Class CountsRepository
 * @package App\Repositories\Counts
 */
class CountsRepositoryEloquent extends BaseRepository implements CountsRepository
{
    /**
     * Map model
     * @return mixed
     */
    public function model()
    {
        return Counts::class;
    }
}
