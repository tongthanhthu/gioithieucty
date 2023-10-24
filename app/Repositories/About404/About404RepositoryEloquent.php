<?php

namespace App\Repositories\About404;

use App\Repositories\BaseRepository;
use App\Models\About404;

/**
 * Class About404Repository
 * @package App\Repositories\About404
 */
class About404RepositoryEloquent extends BaseRepository implements About404Repository
{
    /**
     * Map model
     * @return mixed
     */
    public function model()
    {
        return About404::class;
    }
}
