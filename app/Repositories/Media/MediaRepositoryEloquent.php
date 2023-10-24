<?php

namespace App\Repositories\Media;

use App\Repositories\BaseRepository;
use App\Models\Media;

/**
 * Class MediaRepository
 * @package App\Repositories\Media
 */
class MediaRepositoryEloquent extends BaseRepository implements MediaRepository
{
    /**
     * Map model
     * @return mixed
     */
    public function model()
    {
        return Media::class;
    }
}
