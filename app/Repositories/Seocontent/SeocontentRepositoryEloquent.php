<?php

namespace App\Repositories\Seocontent;

use App\Repositories\BaseRepository;
use App\Models\Seocontent;

/**
 * Class SeocontentRepository
 * @package App\Repositories\Seocontent
 */
class SeocontentRepositoryEloquent extends BaseRepository implements SeocontentRepository
{
    /**
     * Map model
     * @return mixed
     */
    public function model()
    {
        return Seocontent::class;
    }
}
