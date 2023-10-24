<?php

namespace App\Repositories\JobCategory;

use App\Repositories\BaseRepository;
use App\Models\JobCategory;

/**
 * Class JobCategoryRepository
 * @package App\Repositories\JobCategory
 */
class JobCategoryRepositoryEloquent extends BaseRepository implements JobCategoryRepository
{
    /**
     * Map model
     * @return mixed
     */
    public function model()
    {
        return JobCategory::class;
    }
}
