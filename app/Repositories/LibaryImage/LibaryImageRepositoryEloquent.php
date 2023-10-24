<?php

namespace App\Repositories\LibaryImage;

use App\Repositories\BaseRepository;
use App\Models\LibaryImage;

/**
 * Class LibaryImageRepository
 * @package App\Repositories\LibaryImage
 */
class LibaryImageRepositoryEloquent extends BaseRepository implements LibaryImageRepository
{
    /**
     * Map model
     * @return mixed
     */
    public function model()
    {
        return LibaryImage::class;
    }
}
