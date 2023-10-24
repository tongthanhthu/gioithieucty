<?php

namespace App\Repositories\Categories;

use App\Repositories\BaseRepository;
use App\Models\Categories;

/**
 * Class CategoriesRepository
 * @package App\Repositories\Categories
 */
class CategoriesRepositoryEloquent extends BaseRepository implements CategoriesRepository
{
    /**
     * Map model
     * @return mixed
     */
    public function model()
    {
        return Categories::class;
    }
}
