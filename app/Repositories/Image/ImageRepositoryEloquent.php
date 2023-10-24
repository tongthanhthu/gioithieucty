<?php

namespace App\Repositories\Image;

use App\Repositories\BaseRepository;
use App\Models\Image;

/**
 * Class ImageRepository
 * @package App\Repositories\Image
 */
class ImageRepositoryEloquent extends BaseRepository implements ImageRepository
{
    /**
     * Map model
     * @return mixed
     */
    public function model()
    {
        return Image::class;
    }
}
