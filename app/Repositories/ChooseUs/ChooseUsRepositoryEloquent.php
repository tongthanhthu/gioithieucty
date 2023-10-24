<?php

namespace App\Repositories\ChooseUs;

use App\Repositories\BaseRepository;
use App\Models\ChooseUs;

/**
 * Class ChooseUsRepository
 * @package App\Repositories\ChooseUs
 */
class ChooseUsRepositoryEloquent extends BaseRepository implements ChooseUsRepository
{
    /**
     * Map model
     * @return mixed
     */
    public function model()
    {
        return ChooseUs::class;
    }
}
